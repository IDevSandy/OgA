<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        $disable='';
        if(isset($_REQUEST['id'])){

          $title="Edit Invoice";
          $btn="Update";
          $disable='disabled';

          }
          else
          {
          $title="Add New Invoice";
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
        <!-- Pace page -->Invoice Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Invoice Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
                     $id=$_REQUEST['id'] ?? '';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("invoices",$where);

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-table"></i> List Invoices</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="invoice">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-xs-12 col-md-9">
                             <label for="status">Order Number</label>
                             <select class="form-control select2 input-sm" id="order_id" name="order_id" required>
                       <option value="">Please Select</option>
                       <?php
                       $where= array(
                       "order_status" => 'completed',
                       );
                       $category=$obj->fetch_all_record("orders",$where);
                       foreach ($category as $s) {

                       ?>
                       <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['order_id']) && $BindData['order_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['order_code']." | ".$s['client_name']." | ".$s['mobile']." | ".$s['email']." | ".$s['address'];?></option>
                       <?php
                     }
                       ?>
                     </select>
                           </div>
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Invoice Date</label>
                            <input type="date" class="form-control input-sm" name="invoice_date"  value="<?php echo $t=$BindData['invoice_date'] ?? ''; ?>" required>
                          </div>



<div class="col-xs-12  table-responsive">

                <table id="dataTable" class="table table-bordered">
                  <tr>
                    <th>Service Name</th>
                    <th>Quantity</th>
                    <th>Charge</th>
                    <th>Offer Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                  </tr>
                  <tbody id="data">

                    <?php
                    if($id != "") {
                      $where= array(
                      "invoice_id" => $id
                      );
                      $sc=$obj->fetch_all_record("invoice_items",$where);
                      foreach ($sc as $d) {

                      ?>
       <tr>
         <td>
           <select class="form-control input-sm select21"  name="service_id[]  " onchange="getDetails(this)">
             <option value="">Please Select</option>
                  <?php
                   $where= array(
                   "status" => 1,
                   );
                   $subcategory=$obj->fetch_all_record("subcategories",$where);
                   foreach ($subcategory as $s) {
                     $condition= array(
                     "subcategory_id" => $s['id'],
                     );
                   echo  '<optgroup label="'.$s['title'].'">';
                   $services=$obj->fetch_all_record("services",$condition);
                   foreach ($services as $s2) {

                   ?>
                <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($d['service_id']) && $d['service_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'].' | '.$s2['charge'].' | '.$s2['offer_price'];?></option>
                   <?php
                     }
                       echo '</optgroup>';
                     }
                   ?>
            </select>
         </td>
         <td style="width:80px;"><input type="number" name="qty[]" class="form-control input-sm" value="<?php echo $t=$d['quantity'] ?? '1'; ?>" min="1" onkeypress="javascript:allowNumeric(this,event);" onchange="updateQty(this);" ></td>
         <td ><input type="tel" name="charge[]" class="form-control input-sm" value="<?php echo $t=$d['charge'] ?? '0'; ?>" readonly></td>
         <td ><input type="tel" name="offer_price[]" class="form-control input-sm" value="<?php echo $t=$d['offer_price'] ?? '0'; ?>" readonly></td>
         <td ><input type="tel" name="subtotal[]" class="form-control input-sm subtotal" value="<?php echo $t=$d['subtotal'] ?? '0'; ?>" readonly></td>

         <td><button type="button" class="btn btn-success btn-sm" onclick="addRow('dataTable')" >(+)</button> &nbsp;&nbsp; <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this);finalUpdate();">(-)</button></td>

       </tr>
                <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td>
                        <select class="form-control input-sm select21"  name="service_id[]  " onchange="getDetails(this)">
                          <option value="">Please Select</option>
                               <?php
                                $where= array(
                                "status" => 1,
                                );
                                $subcategory=$obj->fetch_all_record("subcategories",$where);
                                foreach ($subcategory as $s) {
                                  $condition= array(
                                  "subcategory_id" => $s['id'],
                                  );
                                echo  '<optgroup label="'.$s['title'].'">';
                                $services=$obj->fetch_all_record("services",$condition);
                                foreach ($services as $s2) {

                                ?>
                             <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($d['service_id']) && $d['service_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'].' | '.$s2['charge'].' | '.$s2['offer_price'];?></option>
                                <?php
                                  }
                                    echo '</optgroup>';
                                  }
                                ?>
                         </select>
                      </td>
                      <td style="width:80px;"><input type="number" name="qty[]" class="form-control input-sm" value="<?php echo $t=$d['quantity'] ?? '1'; ?>" min="1" onkeypress="javascript:allowNumeric(this,event);" onchange="updateQty(this);" readonly></td>
                      <td ><input type="tel" name="charge[]" class="form-control input-sm" value="<?php echo $t=$d['charge'] ?? '0'; ?>" readonly></td>
                      <td ><input type="tel" name="offer_price[]" class="form-control input-sm" value="<?php echo $t=$d['offer_price'] ?? '0'; ?>" readonly></td>
                      <td ><input type="tel" name="subtotal[]" class="form-control input-sm subtotal" value="<?php echo $t=$d['subtotal'] ?? '0'; ?>" readonly></td>

                      <td><button type="button" class="btn btn-success btn-sm" onclick="addRow('dataTable')" <?php echo isset($disable)?$disable:''; ?>>(+)</button> &nbsp;&nbsp; <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this);finalUpdate();" <?php echo isset($disable)?$disable:''; ?>>(-)</button></td>

                    </tr>
                  <?php
                  }
                    ?>
                  </tbody>
                </table>

              </div>

            <div class="col-xs-12 col-md-8 text-right font-weight-bold">
              Subtotal ( <i class="fa fa-inr"></i> ):
            </div>
            <div class="col-xs-12 col-md-4  form-group">
              <input type="tel" name="subtotal_amt" class="form-control input-sm" value="<?php echo $t=$BindData['amount'] ?? ''; ?>" id="subtotal_amt" readonly>
            </div>
            <div class="col-xs-12 col-md-8 text-right font-weight-bold">
              Discount  ( <i class="fa fa-inr"></i> ):
            </div>
            <div class="col-xs-12 col-md-4 form-group">
                <input type="tel" name="discount" class="form-control input-sm" id="discount" value="<?php echo $t=$BindData['discount'] ?? '0'; ?>" onkeypress="javascript:allowNumeric(this,event);" onkeyup="UpdateDis(this)">
            </div>
            <div class="col-xs-12 col-md-8 text-right font-weight-bold">
              Grand Total  ( <i class="fa fa-inr"></i> ):
            </div>
            <div class="col-xs-12 col-md-4  form-group">
              <input type="tel" name="grand_total" class="form-control input-sm" value="<?php echo $t=$BindData['txn_amount'] ?? '0'; ?>" id="grand_total"  readonly >

            </div>

              <div class="col-xs-12">
                <!-- <div class="form-group">
                    <label for="title">Process Layouts</label>
                    <textarea class="form-control input-sm ckeditor" name="remarks" placeholder="Enter Process Layouts"><?php echo $r=$BindData['process_layouts'] ?? ''; ?></textarea>
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
                             <!-- <div class="row">
                               <div class="form-group col-md-2 col-xs-12">
                                          <label for="status">Lead Generated By</label>
                                          <select class="form-control select2 input-sm" id="sender_name">
                                    <option value="0">All</option>
                                    <?php
                                    $where= array(
                                    "status" => 1,
                                    "role_id" => 2
                                    );
                                    $su=$obj->fetch_all_record("system_users",$where);
                                    foreach ($su as $s) {
                                      // var_dump($s);
                                    ?>
                                    <option value="<?php echo $s['id']; ?>" ><?php echo $s['name'];?></option>
                                    <?php
                                  }
                                    ?>
                                  </select>
                                        </div>
                                        <div class="form-group  col-xs-12 col-md-2">
                                           <label for="status">Lead Source</label>
                                             <select name="lead_source" class="form-control input-sm" id="lead_source">
                                               <option value="0" >All</option>
                                               <option value="direct" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='direct' ? 'selected=selected' :''; ?>>Direct</option>
                                               <option value="website" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='website' ? 'selected=selected' :''; ?>>Website</option>
                                               <option value="email" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='email' ? 'selected=selected' :''; ?>>Email</option>
                                               <option value="adwords" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='adwords' ? 'selected=selected' :''; ?>>Adwords</option>
                                               <option value="social media" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='social media' ? 'selected=selected' :''; ?>>Social Media</option>
                                               <option value="referred" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='referred' ? 'selected=selected' :''; ?>>Referred</option>
                                               <option value="other sources" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='other sources' ? 'selected=selected' :''; ?>>Other Sources</option>
                                             </select>
                                         </div>
                                         <div class="form-group  col-xs-12 col-md-2">
                                                    <label for="status">Lead Status</label>
                                              <select name="lead_status" class="form-control input-sm" id="lead_status">
                                                <option value="0" >All</option>
                                                <option value="ongoing" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='ongoing' ? 'selected=selected' :''; ?>>On Going</option>
                                                <option value="not reachable" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='not reachable' ? 'selected=selected' :''; ?>>Not Reachable</option>
                                                <option value="won" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='won' ? 'selected=selected' :''; ?>>Won</option>
                                                <option value="loss" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='loss' ? 'selected=selected' :''; ?>>Loss</option>
                                                <option value="completed" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='completed' ? 'selected=selected' :''; ?>>Completed</option>
                                              </select>
                                             </div>
                                            <div class="form-group col-md-2 col-xs-12">
                                                      <label for="title">Start Date</label>
                                                      <input type="date" class="form-control input-sm" name="start_date" id="start_date" >
                                                    </div>
                                                    <div class="form-group col-md-2 col-xs-12">
                                                              <label for="title">End Date</label>
                                                              <input type="date" class="form-control input-sm" name="end_date" id="end_date" >
                                                            </div>
                                                 <div class="form-group col-md-2 col-xs-12">
                                                   <label>&nbsp;</label><br/>
                                                   <button class="btn btn-default" id="btnSearch"><i class="fa fa-search"></i> Search</button> &nbsp;
                                                   <button class="btn btn-default" onclick="RefreshView();"><i class="fa fa-refresh"></i> </button>

                                                 </div>
                             </div> -->
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr >
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Sno</th>
                                <th>Invoice Id</th>
                                <th>Client</th>
                                <th>Operated By</th>
                                <th>last Update</th>
                                <th>Action</th>

                                  <th>Generated BY</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                   <tr >
                                  <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                  <th>id</th>
                                  <th>Sno</th>
                                  <th>Invoice Id</th>
                                  <th>Client</th>
                                    <th>Operated By</th>
                                  <th>last Update</th>
                                    <th>Action</th>
                                    <th>Generated BY</th>


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
  	self.location="invoice.php?m=active";
}

$(function () {
    fill_datatable();
    function fill_datatable(start_date = '', end_date = '' , sender_name= '', lead_source='' , lead_status=''){
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_invoice',
           'type':'POST',
           'data':{
            start_date:start_date,end_date:end_date,lead_source:lead_source,sender_name:sender_name,lead_status:lead_status
           }
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
           { data: 'sno', name: 'sno' },
            { data: 'code', name: 'code' },
            { data: 'client', name: 'client' },
            { data: 'operated_by', name: 'operated_by' },
            { data: 'last_update', name: 'last_update' },
           { data: 'actions', name: 'actions', orderable: true, searchable: true },
           { data: 'generated_by', name: 'generated_by' },


           ]
           // "columnDefs": [
           //          {
           //              "targets": [ 0 ],
           //              "visible": false,
           //              "searchable": false
           //          }
           //      ]
           // table.on( 'draw', function () {
           //        $('.livicon').each(function(){
           //            $(this).updateLivicon();
           //        });
           //    });
    });
  }
    $('#btnSearch').click(function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var lead_source = $('#lead_source').val();
    var sender_name = $('#sender_name').val();
    var lead_status = $('#lead_status').val();
    if(start_date != '' && end_date != '' && sender_name != "" && lead_source !="" && lead_status !="")
    {
    $('#memListTable').DataTable().destroy();
    fill_datatable(start_date, end_date, sender_name, lead_source,lead_status);
    }
    else
    {
    alert('Select All filter option');
    $('#memListTable').DataTable().destroy();
    fill_datatable();
    }
    });
    // Auto Complete
    // $( ".ttl" ).autocomplete({
    //    source: 'api-controller.php?action=get_title&tbl=services',
    //  });
//      $("form").submit(function(){
//   alert("Submitted");
// });
   });


   // Find records
   function getDetails(ele) {
     var sid=ele.value;
     var Parent=ele.parentNode.parentNode;
     if(sid != "") {
       Parent.cells[1].childNodes[0].removeAttribute("readonly");
       var sel=$(ele).find('option').filter(':selected').text().split("|");

       // var qty=Parent.cells[1].childNodes[0].value;
       $(Parent.cells[2].childNodes[0]).val(sel[1]);
       $(Parent.cells[3].childNodes[0]).val(sel[2]);
       var subtotal=parseFloat(Parent.cells[1].childNodes[0].value) * parseFloat(sel[2]);
       // alert(subtotal);
       $(Parent.cells[4].childNodes[0]).val(subtotal);
       var sum = 0;
       $('.subtotal').each(function(){
           sum += parseFloat(this.value);  // Or this.innerHTML, this.innerText
       });
    //   alert(sum);
       $('#subtotal_amt').val(sum);
      var total= parseFloat(sum)- parseFloat($('#discount').val());
     $('#grand_total').val(total);

   } else {
     Parent.cells[1].childNodes[0].setAttribute("readonly", true);
   }

   }
   function updateQty(ele) {
     var qty=ele.value;
     var Parent=ele.parentNode.parentNode;
     var subtotal=parseFloat(qty) * parseFloat( $(Parent.cells[3].childNodes[0]).val());
     // alert(subtotal);
     $(Parent.cells[4].childNodes[0]).val(subtotal);
     var sum = 0;
     $('.subtotal').each(function(){
         sum += parseFloat(this.value);  // Or this.innerHTML, this.innerText
     });
  //   alert(sum);
     $('#subtotal_amt').val(sum);
    var total= parseFloat(sum)- parseFloat($('#discount').val());
   $('#grand_total').val(total);
   }
   function UpdateDis(ele) {
     var sum = 0;
     $('.subtotal').each(function(){
         sum += parseFloat(this.value);  // Or this.innerHTML, this.innerText
     });
     $('#subtotal_amt').val(sum);
     if(ele.value != "" && ele.value  >= 0 ) {
       var total= parseFloat(sum)- parseFloat(ele.value);
      $('#grand_total').val(total);
    } else {
        $('#grand_total').val(sum);
    }
   }
    function finalUpdate() {
      var sum = 0;
      $('.subtotal').each(function(){
          sum += parseFloat(this.value);  // Or this.innerHTML, this.innerText
      });
   //   alert(sum);
      $('#subtotal_amt').val(sum);
     var total= parseFloat(sum)- parseFloat($('#discount').val());
    $('#grand_total').val(total);

    }

  </script>
