<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select * from invoices where id=".$_REQUEST['pid']));
  $c=mysqli_fetch_array(mysqli_query($obj->con,"select * from orders where id=".$ptitle['order_id']));
  $sItems=mysqli_fetch_array(mysqli_query($obj->con,"select * from invoice_items where invoice_id=".$_REQUEST['pid']));
  $payments=mysqli_fetch_array(mysqli_query($obj->con,"select SUM(amount) AS 'PaidAmount' from payment_schedules where invoice_id=".$_REQUEST['pid']));
    $restAmount=(float)$ptitle['txn_amount'] - (float)$payments['PaidAmount'];
     $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Update Payment";
          $btn="Update";
          }
          else
          {
          $title="New Payment";
          $btn="Save";
          }
          $act1='';
          $act2='';
          if(isset($_REQUEST['m'])){
          $act2='active';$act1='';
          }
          else
          {$act1='active';$act2='';}
          ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Pace page --> Payments for <a href="invoice.php?id=<?php echo $_REQUEST['pid']; ?>"><?php echo $ptitle['invoice_code'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="invoice.php"><i class="fa fa-tags"></i>Invoice</a></li>
        <li class="active">Project Payment Schedules</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details for <a href="invoice.php?id=<?php echo $_REQUEST['pid']; ?>"><?php echo $ptitle['invoice_code'];?></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding table-responsive">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th>Fields</th>
                  <th>Data</th>
                  <th>Fields</th>
                  <th>Data</th>
                </tr>
                <tr>
                  <td>Invoice Code</td>
                  <td><?php echo $ptitle['invoice_code'];?></td>
                  <td>Name</td>
                  <td>
                  <?php
                  echo $c['client_name'];
                   ?>
                  </td>


                </tr>
                <tr>
                  <td>Service For</td>
                  <td>
                  <?php
                  $pfor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$sItems['service_id']));
                  echo $pfor['title'];
                   ?>
                  </td>
                  <td>Mobile</td>
                  <td>
                    <?php echo $c['mobile']; ?>
                  </td>

                </tr>
<tr>


  <td>Email</td>
  <td>
    <?php echo $c['email']; ?>
  </td>
  <td>Amount</td>
  <td>
  <i class="fa fa-inr"></i>  <?php echo $ptitle['txn_amount']; ?>
  </td>
</tr>
<tr>
  <td>Address</td>
  <td>
    <?php echo $c['address']; ?>
  </td>
  <td>Rest Amount</td>
  <td>
  <i class="fa fa-inr"></i>  <?php echo $restAmount; ?>
  </td>
</tr>
<tr>
  <td>Invoice Date</td>
  <td>
    <?php echo $ptitle['invoice_date']; ?>
  </td>
  <td>Order Date</td>
  <td>
    <?php echo $c['service_date']; ?>
  </td>
</tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="clearfix">&nbsp;</div>
          <?php
                     $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("payment_schedules",$where);
                     // $mob=isset($BindData['mobile1']) && $BindData['mobile1'] != ''? explode('-',$BindData['mobile1']) : '';
                     // $mob2=isset($BindData['mobile2']) && $BindData['mobile2'] != ''? explode('-',$BindData['mobile2']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Payments</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="payment_schedules">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="pid" value="<?php echo $pid=$ptitle['id'] ?? ''; ?>">
                  <!-- <input type="hidden" name="total_cost"  id="total_cost" value="<?php echo $tc=$ptitle['total_cost'] ?? ''; ?>"> -->
                <div class="row">
                  <div class="form-group  col-xs-12 col-md-3">
                             <label for="status">Mode of Payment</label>
                       <select name="mode" class="form-control input-sm" required>
                         <option value="cash" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='cash' ? 'selected=selected' :''; ?>>Cash</option>
                         <option value="cheque" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='cheque' ? 'selected=selected' :''; ?>>Cheque</option>
                         <option value="RTIGS" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='RTIGS' ? 'selected=selected' :''; ?>>RTIGS</option>
                         <option value="NEFT" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='NEFT' ? 'selected=selected' :''; ?>>NEFT</option>
                         <option value="Bhim UPI" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='Bhim UPI' ? 'selected=selected' :''; ?>>Bhim UPI</option>
                         <option value="paytm" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='paytm' ? 'selected=selected' :''; ?>>Paytm</option>
                         <option value="phone pay" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='phone pay' ? 'selected=selected' :''; ?>>Phone Pay</option>
                         <option value="google pay" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='google pay' ? 'selected=selected' :''; ?>>Google Pay</option>
                         <option value="others" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='others' ? 'selected=selected' :''; ?>>others</option>
                       </select>
                      </div>
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Credited To </label>
                            <input type="text" class="form-control input-sm" name="credited_to"  maxlength="100" placeholder="Enter Person Name" value="<?php echo $t=$BindData['credited_to'] ?? ''; ?>" required>
                  </div>
                  <!-- <div class="form-group col-md-4 col-xs-12">
                            <label for="title">Received By </label>
                            <input type="text" class="form-control input-sm" name="received_by"  maxlength="200" placeholder="Enter Person Name" value="<?php echo $rb=$BindData['received_by'] ?? ''; ?>" required>
                  </div> -->

                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Payment Date</label>
                            <input type="date" class="form-control input-sm" name="payment_date"  maxlength="200" placeholder="Enter Payment Date" value="<?php echo $t=$BindData['payment_date'] ?? ''; ?>" required>
                          </div>

                          <div class="form-group col-md-3 col-xs-12">
                                    <label for="title">Next Payment Date</label>
                                    <input type="date" class="form-control input-sm" name="next_payment_date" id="datefield1" maxlength="200" placeholder="Enter Next Payment Date" value="<?php echo $nft=$BindData['next_payment_date'] ?? ''; ?>" required>
                          </div>
                          <div class="form-group col-md-4 col-xs-12">
                          <label for="title">Amount ( <i class="fa fa-inr"></i> )</label>
                          <input type="tel"  name="amount" placeholder="Enter Payment Amount" class="form-control input-sm" maxlength="10" value="<?php echo $cf=$BindData['amount'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);"  required>
                                   </div>
                                   <div class="form-group col-md-4 col-xs-12">
                                             <label for="title">Transaction Id </label>
                                             <input type="text" class="form-control input-sm" name="transaction_id"  maxlength="100" placeholder="Enter Transaction Id" value="<?php echo $ti=$BindData['transaction_id'] ?? ''; ?>" required>
                                   </div>
                                   <div class="form-group col-md-4 col-xs-12">
                                  <label for="title">Payment ScreenShot Attachment <small class="text-danger">*accept only .jpg,.png,files </small></label>
                                  <input type="file" name="source" class="form-control input-sm" accept="image/*"/>
                                  <?php
                                  if(isset($BindData['file_url']) && $BindData['file_url'] !="")
                                  {
                                  ?>
                                  <a href="../<?php echo $BindData['file_url'];?>" style="cursor:pointer;" class="btn btn-success btn-xs pull-right" target="_blank"><i class="fa fa-eye" ></i> View Attachment</a>
                                  <?php
                                  }
                                  ?>
                                            <input type="hidden" value="<?php echo $fl=$BindData['file_url']?? '';?>" name="old-logo">
                                          </div>
                                   <!-- <div class="form-group col-md-6 col-xs-12">
                                   <label for="title">Rest Amount ( <i class="fa fa-inr"></i> )</label>
                                   <input type="tel"  name="rest_amount" id="rest_amount" placeholder="" class="form-control input-sm" maxlength="10" value="<?php echo $ra=$BindData['rest_amount'] ?? $ptitle['total_cost']; ?>" onkeypress="javascript:allowNumeric(this,event);" readonly  >
                                            </div> -->
                                     <div class="form-group  col-xs-12">
                                         <label for="title">Description/ Remarks</label>
                                         <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks for Project" required><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
                                       </div>
              <div class="col-xs-12">
                <!-- <div class="form-group">
                    <label for="title">Description</label>
                    <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
                  </div> -->
                <div class="form-group text-center ">
                <button type="submit" class="btn btn-primary" ><?php echo $btn; ?></button>
                </div>
              </div><!-- End Col 3 -->
            </div><!-- end row-->
              </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo $act2;?>" id="tab_2">
                <div class="box">

                           <!-- /.box-header -->
                           <div class="box-body table-responsive">
                             <table id="example2" class="table table-hover table-striped">
                               <thead>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                    text-transform:uppercase;">
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>mode</th>
                                <th>Receiving</th>
                                <th>amount</th>
                                <th>ScreenShot</th>
                                <th>Remarks</th>
                                <th>Schedules</th>
                            <th>last Update</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['pid']??'';
                         $where= array(
                         "invoice_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("payment_schedules",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         $r_by=mysqli_fetch_array(mysqli_query($obj->con,"select name from system_users where id=".$row['received_by']));
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['mode']; ?></td>
                    <td><p class="text-danger">Credited to: <b><?php echo $row['credited_to']; ?></b></p><p class="text-success">Received By: <b><?php echo $r_by['name']; ?></b></p></td>
                    <td><p class="text-danger">Transaction Id: <b><?php echo $row['transaction_id']; ?></b></p><p class="text-success">Amount: <b><i class="fa fa-inr"></i> <?php echo $row['amount']; ?></b></p></td>
<td>
                         <img src="../<?php echo $row['file_url']; ?>" class="img-responsive img-rounded"  width="70" height="70">
                         <a class="example-image-link btn btn-warning btn-xs" href="../<?php echo $row['file_url']?>" title="<?php echo $row['transaction_id']; ?>" data-lightbox="example-1" style="margin-top:5px;"><i class="fa fa-eye"></i></a>
                       </td>
                       <td><textarea class="form-control" disabled style="width:100%" rows="4"><?php echo $row['description']; ?></textarea></td>

                       <td><p class="text-danger">Last Payment Date: <b><?php $d=date_create($row['payment_date']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Next Payment Date:  <b><?php echo $u_at= $row['next_payment_date'] != null ? date_format(date_create($row['next_payment_date']),'d-M-Y') : ''; ?></b></p> </td>

          <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y h:i A');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

           <td> <a href="payment-schedules.php?id=<?php echo $row['id'];?>&pid=<?php echo $_REQUEST['pid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

            <!-- <a  href="javascript:void(0);" onclick="javascript:deleteThisRecord(<?php echo $row['id']; ?>,'client_references');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a> -->


          </td>
                          </tr>
          				<?php
          				}
                }
          				?>
                          </tbody>
                               <tfoot>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                  text-transform:uppercase;">
                                  <th>id</th>
                                  <th>mode</th>
                                  <th>Receiving</th>
                                  <th>amount</th>
                                  <th>ScreenShot</th>
                                  <th>Remarks</th>
                                  <th>Schedules</th>
                              <th>last Update</th>

                              <th>Action</th>
                               </tr>
                               </tfoot>
                             </table>
                           </div>
                           <!-- /.box-body -->
                      </div>
              </div>
              <!-- /.tab-pane -->
              <!-- <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div> -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
      </div>
</section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php');?>
  <script>
  function 	RefreshView() {
  	self.location="payment-schedules.php?m=active&pid=<?php echo $_REQUEST['pid']; ?>";
}
$(function () {
  setDate();
$('#example2').DataTable({
   "order": [[ 0, "desc" ]],
  "columnDefs": [
           {
               "targets": [ 0 ],
               "visible": false,
               "searchable": false
           }
       ]
});
});
function duePayments(payment) {
var total=document.getElementById('total_cost').value;
  if(payment !=0 && payment != ""){
  var dueAmount= parseFloat(total)- parseFloat(payment);
  document.getElementById('rest_amount').value=dueAmount;
} else {
  document.getElementById('rest_amount').value=total;
}

// alert(payment);
}

  </script>
  <script>
  try
  {
	    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
  }
  catch (kjhkjk)
  {
  }
</script>
