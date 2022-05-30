<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Update Expense";
          $btn="Update";
          }
          else
          {
          $title="Add New Expense";
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
        <!-- Pace page -->Expenses Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Expenses Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
            // require_once('include/countryCodes.php');
                     $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("expenses",$where);
                     // $mob=isset($BindData['ref_mobile']) && $BindData['ref_mobile'] != ''? explode('-',$BindData['ref_mobile']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-table"></i> List Expenses</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="expenses">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group  col-xs-12 col-md-4">
                             <label for="status">Mode of Payment</label>
                       <select name="mode" class="form-control input-sm" required>
                         <option value="cash" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='cash' ? 'selected=selected' :''; ?>>Cash</option>
                         <option value="cheque" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='cheque' ? 'selected=selected' :''; ?>>Cheque</option>
                         <option value="RTIGS" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='RTIGS' ? 'selected=selected' :''; ?>>RTIGS</option>
                         <option value="NEFT" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='NEFT' ? 'selected=selected' :''; ?>>NEFT</option>
                         <option value="Bhim UPI" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='Bhim UPI' ? 'selected=selected' :''; ?>>Bhim UPI</option>
                         <option value="paytm" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='paytm' ? 'selected=selected' :''; ?>>Paytm</option>
                         <option value="phone pay" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='phone pay"' ? 'selected=selected' :''; ?>>Phone pay"</option>
                         <option value="google pay" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='google pay' ? 'selected=selected' :''; ?>>Google Pay</option>
                         <option value="others" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='others' ? 'selected=selected' :''; ?>>others</option>
                       </select>
                      </div>
                  <div class="form-group col-md-4 col-xs-12">
                            <label for="title">Send To </label>
                            <input type="text" class="form-control input-sm" name="credited_to"  maxlength="100" placeholder="Enter Person Name" value="<?php echo $t=$BindData['credited_to'] ?? ''; ?>" required>
                  </div>


                  <div class="form-group col-md-4 col-xs-12">
                            <label for="title">Payment Date</label>
                            <input type="date" class="form-control input-sm" name="payment_date"  maxlength="200" placeholder="Enter Payment Date" value="<?php echo $t=$BindData['payment_date'] ?? ''; ?>" required>
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
                             <div class="row">
                               <div class="form-group col-md-2 col-xs-12">
                                          <label for="status">Sender Name</label>
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
                                                   <label for="status">Mode of Payment</label>
                                             <select name="mode" class="form-control input-sm" id="mode">
                                               <option value="0" >All</option>
                                               <option value="cash" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='cash' ? 'selected=selected' :''; ?>>Cash</option>
                                               <option value="cheque" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='cheque' ? 'selected=selected' :''; ?>>Cheque</option>
                                               <option value="RTIGS" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='RTIGS' ? 'selected=selected' :''; ?>>RTIGS</option>
                                               <option value="NEFT" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='NEFT' ? 'selected=selected' :''; ?>>NEFT</option>
                                               <option value="Bhim UPI" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='Bhim UPI' ? 'selected=selected' :''; ?>>Bhim UPI</option>
                                               <option value="paytm" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='paytm' ? 'selected=selected' :''; ?>>Paytm</option>
                                               <option value="phone pay" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='phone pay"' ? 'selected=selected' :''; ?>>Phone Pay</option>
                                               <option value="google pay" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='google pay' ? 'selected=selected' :''; ?>>Google Pay</option>
                                               <option value="others" <?php echo $ls=isset($BindData['mode']) && $BindData['mode']=='others' ? 'selected=selected' :''; ?>>others</option>
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
                                                 <div class="form-group col-md-4 col-xs-12">
                                                   <label>&nbsp;</label><br/>
                                                   <button class="btn btn-default" id="btnSearch"><i class="fa fa-search"></i> Search</button> &nbsp;
                                                   <button class="btn btn-default" onclick="RefreshView();"><i class="fa fa-refresh"></i> </button>

                                                 </div>
                             </div>
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr>
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Sno</th>
                                <th>Code</th>
                                <th>mode</th>
                                <th>credited to</th>
                                <th>amount</th>
                                <th>transaction Id</th>
                                <th>attachment</th>
                                <th>Payment Date</th>
                                <th> Remarks</th>
                                <th>last Update</th>
                                  <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                 <tr>
                                  <th>id</th>
                                  <th>Sno</th>
                                  <th>Code</th>
                                  <th>mode</th>
                                  <th>credited to</th>
                                  <th>amount</th>
                                  <th>transaction Id</th>
                                  <th>attachment</th>
                                  <th>Payment Date</th>
                                  <th> Remarks</th>
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
  	self.location="expenses.php?m=active";
}

$(function () {
  fill_datatable();
  function fill_datatable(start_date = '', end_date = '' , mode=' ', sender_name= ''){
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_expenses',
           'type':'POST',
           'data':{
            start_date:start_date,end_date:end_date,mode:mode,sender_name:sender_name
           }
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
           { data: 'sno', name: 'sno' },
            { data: 'code', name: 'code' },
            { data: 'mode', name: 'mode' },
           { data: 'credited_to', name: 'credited_to' },
           { data: 'amount', name: 'amount' },
           { data: 'transaction_id', name: 'transaction_id' },
           { data: 'file_url', name: 'file_url' },
           { data: 'payment_date', name: 'payment_date' },
           { data: 'description', name: 'description' },
            { data: 'last_update', name: 'last_update' },
           { data: 'actions', name: 'actions', orderable: true, searchable: true }
           ]

    });
  }
    $('#btnSearch').click(function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var mode = $('#mode').val();
    var sender_name = $('#sender_name').val();
    if(start_date != '' && end_date != '' && sender_name != "" && mode !="")
    {
    $('#memListTable').DataTable().destroy();
    fill_datatable(start_date, end_date, mode, sender_name);
    }
    else
    {
    alert('Select All filter option');
    $('#memListTable').DataTable().destroy();
    fill_datatable();
    }
    });
   });
  </script>
