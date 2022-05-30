<?php
session_start();
require_once('operations/dataOperation.php');
$obj = new DataOperation;
if($_SESSION['LOGIN_BY'] != "yes" ) {
  // session_destroy();
  header("Location:index.php?q=session expired!");
}
if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == "yes" ) {
  session_destroy();
  header("Location:index.php?q=logout successfully!");
}

function number_format_short( $n, $precision = 1 ) {
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ( $precision > 0 ) {
        $dotzero = '.' . str_repeat( '0', $precision );
        $n_format = str_replace( $dotzero, '', $n_format );
    }
    return $n_format . $suffix;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Patna Repair | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    thead>tr:first-child {
        color: #fff;
        background: #FF512F;
        text-transform: uppercase;
    }

    .f50 {
        font-size: 30px;
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }

        tr:first-child {
            color: #fff;
            background: #FF512F;
            text-transform: uppercase;
        }
    }
    </style>
</head>
<?php
           $id=$_REQUEST['id'] ?? '';
           $where= array(
           "id" => $id,
           );
           $BindData=$obj->select_record("invoices",$where);
           $condition= array(
           "id" => $BindData['order_id']
           );
           $row=$obj->select_record("orders",$condition);

           ?>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <!-- <i class="fa fa-globe"></i> VegMatoFresh
          <small class="pull-right">Date: <?php $d=date_create($BindData['created_at']); echo date_format($d,'d-M-Y');?></small> -->
                        <img class="img-responsive img-rounded pull-right"
                            src="https://patnarepair.com/images/logo/logo.png" style='width:190px;'>
                        <address>
                            <strong class="f50">PATNA REPAIR SALES & SERVICES</strong><br>
                            <small>
                                Shivpuri, Beur Road, Near Aluminum Factory<br>
                                Anisabad, Patna -800002(BIHAR)<br>
                                Contact: (+91) 8409426140, (+91) 9304462117<br>
                                Email: patnarepair@gmail.com<br>
                                Website: www.patnarepair.com
                            </small>
                        </address>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <p class="font-weight-bold"><strong><u>BILLING DETAILS</u></strong></p>
                <address>
                    <b>GSTIN: </b>10AAZFP2089H1ZZW<br>
                    <b>Invoice No:</b> <?php echo $BindData['invoice_code'];?><br>
                    <b>Order No:</b> <?php echo $row['order_code'];?><br>
                    <!-- <b>Payment Method:</b><?php echo $BindData['payment_method'];?><br> -->
                    <!-- <b>Time Slot:</b> <?php echo $BindData['time_slot']; ?><br> -->
                    <b>Date:</b> <?php $d=date_create($BindData['invoice_date']); echo date_format($d,'d-M-Y');?>
                </address>

            </div>
            <div class="col-sm-4 invoice-col">

                <p class="font-weight-bold"><strong><u>CLIENT DETAILS</u></strong></p>
                <address>
                    <strong><?php echo $row['client_name']; ?></strong><br>
                    <?php echo $row['address'];?><br>
                    Phone: <?php echo $row['mobile'];?><br>
                    Email: <?php echo $row['email'];?>
                </address>
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <p class="font-weight-bold"><strong><u>BANKING DETAILS</u></strong></p>
                    <address>
                        <strong>ANDHRA BANK</strong><br>
                        IFSC Code: ANDB0003113<br>
                        Name: PATNA REPAIR SALES & SERVICES<br>
                        Acc. No.: 311311100000821<br>
                    </address>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Rate</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            if($id != "") {
              $where= array(
              "invoice_id" => $id
              );
              $sc=$obj->fetch_all_record("invoice_items",$where);
              $i=0;
              foreach ($sc as $d) {
                $service=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from services where id='".$d['service_id']."'"));

              ?>

                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><b><?php echo $service['title'];?></b></td>
                                <td><i class="fa fa-inr"></i> <?php echo $d['offer_price'];?></td>
                                <td><?php echo $d['quantity'];?></td>
                                <td><i class="fa fa-inr"></i> <?php echo $d['subtotal'];?></td>
                            </tr>
                            <?php
        $i++;
        }
      }
        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="dist/img/credit/visa.png" alt="Visa">
                    <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="dist/img/credit/american-express.png" alt="American Express">
                    <img src="dist/img/credit/paypal2.png" alt="Paypal">
                    <!--
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <img src="../x_images/pay.jpg" class="img-responsive img-rounded" style="width:150px">
          <span class="text-muted">You can also pay by scan QR Code</span>

        </p> -->
                    <p> <small>*This quotation is Computer Generated. Signature doesn’t required.</small></p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><i class="fa fa-inr"></i> <?php echo $BindData['amount']; ?></td>
                            </tr>
                            <!-- <tr>
              <th>Taxable Amount: </th>
              <td><i class="fa fa-inr"></i> <?php echo $totalprc; ?></td>
            </tr>
            <tr>
              <th>CGST (9%)</th>
              <td><i class="fa fa-inr"></i> <?php echo $tempgst/2; ?></td>
            </tr>
            <tr>
              <th>SGST (9%)</th>
              <td><i class="fa fa-inr"></i> <?php echo $tempgst/2; ?></td>
            </tr>
          <tr>
              <th>Shipping:</th>
              <td><i class="fa fa-inr"></i> 00</td>

              <td><i class="fa fa-inr"></i> <?php echo $sp= $finalprc < 90 ? 15 : '00.00'; ?></td>
            </tr> -->
                            <tr>
                                <th>Discount: </th>
                                <td><i class="fa fa-inr"></i> <?php echo $BindData['discount']; ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><i class="fa fa-inr"></i> <?php echo $BindData['txn_amount']; ?></td>
                            </tr>
                        </table>
                        <!-- <p class="lead">Inclusive of all taxes</p> -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="#!" class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
                    <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button> -->
                    <a href="#!" class="btn btn-primary pull-right" style="margin-right: 5px;"
                        onclick="window.print();">
                        <i class="fa fa-download"></i> Generate PDF
                    </a>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>