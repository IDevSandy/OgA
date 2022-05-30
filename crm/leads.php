<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Leads";
          $btn="Update";
          }
          else
          {
          $title="Add New Lead";
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
        <!-- Pace page -->Leads Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Leads Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
            require_once('include/countryCodes.php');
                     $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("leads",$where);
                     $mob=isset($BindData['ref_mobile']) && $BindData['ref_mobile'] != ''? explode('-',$BindData['ref_mobile']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-table"></i> List Leads</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="leads">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Date</label>
                            <input type="date" class="form-control input-sm" name="date"  maxlength="200" placeholder="Enter Lead Creation Date" value="<?php echo $t=$BindData['date'] ?? ''; ?>" required>
                          </div>
                          <div class="form-group  col-xs-12 col-md-3">
                             <label for="status">Lead Source</label>
                               <select name="lead_source" class="form-control input-sm" >
                                 <option value="direct" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='direct' ? 'selected=selected' :''; ?>>Direct</option>
                                 <option value="website" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='website' ? 'selected=selected' :''; ?>>Website</option>
                                 <option value="email" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='email' ? 'selected=selected' :''; ?>>Email</option>
                                 <option value="adwords" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='adwords' ? 'selected=selected' :''; ?>>Adwords</option>
                                 <option value="social media" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='social media' ? 'selected=selected' :''; ?>>Social Media</option>
                                 <option value="referred" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='referred' ? 'selected=selected' :''; ?>>Referred</option>
                                 <option value="other sources" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='other sources' ? 'selected=selected' :''; ?>>Other Sources</option>
                               </select>
                           </div>
                           <div class="form-group col-md-3 col-xs-12">
                                      <label for="status">Proposal For</label>
                                      <select class="form-control input-sm select2"  name="service_id" >
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
                                                $charges=$s2['charge'];

                                                // var_dump($s);
                                              ?>
                                              <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($BindData['service_id']) && $BindData['service_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'].' ( ₹ '.$charges.' )';?></option>
                                              <?php
                                            }
                                              echo '</optgroup>';
                                            }
                                              ?>
                                           </select>
                                    </div>
                  <div class="form-group col-md-3 col-xs-12">
                             <label for="status">Client</label>
                             <select class="form-control select2 input-sm" id="client" name="client_id" required>
                       <option value="">Please Select</option>
                       <?php
                       $where= array(
                       "status" => 1,
                       );
                       $category=$obj->fetch_all_record("clients",$where);
                       foreach ($category as $s) {
                         // var_dump($s);
                       ?>
                       <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['client_id']) && $BindData['client_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title']." ( ".$s['owner_name']." ) ";?></option>
                       <?php
                     }
                       ?>
                     </select>
                           </div>

                  <div class="form-group col-md-6 col-xs-12">
                            <label for="title">Referral Name </label>
                            <input type="text" class="form-control input-sm" name="ref1_name" placeholder="Enter Referral Name" maxlength="200" value="<?php echo $t=$BindData['ref_name'] ?? ''; ?>" >
                          </div>
                          <div class="form-group col-md-2 col-xs-12">
                            <label for="title">Country Code</label>
                            <select name="countryCode" class="form-control select21 input-sm" id="">
                               <?php
                               foreach($countryArray as $code => $country){
                                   $countryName = ucwords(strtolower($country["name"])); // Making it look good
                                   ?>
                                   <option  value="+<?php echo $country["code"]; ?>" <?php echo $cc=isset($mob[0]) && $mob[0]==$country["code"] ? 'selected=selected' :''; ?>><?php echo $countryName." (+".$country["code"].")"; ?> </option>
                               <?php
                               //$output .= "<option value='".$country["code"]."' ".(($code==strtoupper($defaultCountry))?"selected":"").">".$code." - ".$countryName." (+".$country["code"].")</option>";
                                 }
                               ?>

                             </select>
                          </div>
                         <div class="form-group col-md-4 col-xs-12">
                                   <label for="title">Referral Mobile Number</label>
 <input id="name6" type="tel"  name="ref_mobile" class="form-control input-sm" placeholder="Enter Referral Person Mobile Number" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
                          </div>

            <div class="form-group col-md-3 col-xs-12">
            <label for="title">Proposal Cost (<i class="fa fa-inr"></i>)</label>
            <input type="tel"  name="proposal_cost" placeholder="Enter Proposal Cost" class="form-control input-sm" maxlength="10" value="<?php echo $cf=$BindData['proposal_cost'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
                     </div>
                     <div class="form-group col-md-3 col-xs-12">
                               <label for="title">Proposal Date</label>
                               <input type="date" class="form-control input-sm" name="proposal_date"   placeholder="Enter proposal date" value="<?php echo $t=$BindData['proposal_date'] ?? ''; ?>" >
                             </div>
                             <div class="form-group col-md-3 col-xs-12">
             <label for="title">Attachment <small class="text-danger">*accept only .jpg,.png,.pdf,.xls,xlsx files </small></label>
             <input type="file" name="source" class="form-control input-sm" accept="image/jpeg,image/png,application/pdf,image/x-eps,application/vnd.ms-excel"/>
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
                                    <div class="form-group col-md-3 col-xs-12">
                                    <label for="title">Client Budget (<i class="fa fa-inr"></i>)</label>
                                    <input type="tel"  name="client_budget" placeholder="Enter Client Budget" class="form-control input-sm" maxlength="10" value="<?php echo $cf=$BindData['client_budget'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
                                             </div>

                                             <div class="form-group col-xs-12 col-md-6">
                                                 <label for="title">Description/ Remarks</label>
                                                 <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
                                               </div>
                  <div class="form-group  col-xs-12 col-md-6">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
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
                             </div>
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                    text-transform:uppercase;">
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Sno</th>
                                <th>Code</th>
                                <th>Client</th>
                                <th>Proposal For</th>
                                <th>lead Source</th>
                                <th>creation Date</th>
                                <th>total follow up</th>
                                <th>last followup</th>
                                <th>generated by</th>
                                <th>lead Status</th>
                                <th>last Update</th>
                                <th>Follow Ups</th>
                                 <th>Status</th>
                                  <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                  text-transform:uppercase;">
                                  <th>id</th>
                                  <th>Sno</th>
                                  <th>Code</th>
                                  <th>Client</th>
                                  <th>Proposal For</th>
                                  <th>lead Source</th>
                                  <th>creation Date</th>
                                  <th>total follow up</th>
                                  <th>last followup</th>
                                  <th>generated by</th>
                                  <th>lead Status</th>
                                  <th>last Update</th>
                                  <th>Follow Ups</th>
                                   <th>Status</th>
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
  	self.location="leads.php?m=active";
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
           'url':'api-controller.php?action=get_leads',
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
           { data: 'proposal_for', name: 'proposal_for' },
           { data: 'lead_source', name: 'lead_source' },
           { data: 'creation_date', name: 'creation_date' },
           { data: 'total_followup', name: 'total_followup' },
           { data: 'last_followup', name: 'last_followup' },
           { data: 'generated_by', name: 'generated_by' },
            { data: 'lead_status', name: 'lead_status' },
            { data: 'last_update', name: 'last_update' },
           { data: 'follow_up', name: 'follow_up' },
           { data: 'status', name: 'status' },
           { data: 'actions', name: 'actions', orderable: true, searchable: true }
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
   });
   //popup
   $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        var myBooktitle=$(this).data('title');
        var tbl=$(this).data('tbl');
		$(".modal-dialog").css("width", "60%");
        if(myBookId != "") {
          $.ajax({
              type: "POST",
              url: "api-controller.php",
              data: {
                  action: 'get_leads_records',tbl:'leads',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;
          
          var personal_detail='<div class="table-responsive"><table class="table table-striped"><tbody class="css"><tr><th class="css1">Title</td><td>'+allData['data'].title+'</th></tr><tr><th class="css1">Vendor Code	</td><td>'+allData['data'].vendor_code	+'</th></tr><tr><th class="css1">Address</td><td>'+allData['data'].address+'</th></tr><tr><th class="css1">Image</th><td><img class="img-responsive img-rounded pull-left" src="../'+allData['data'].file_url+'" alt="" style="width: 150px; height: 150px;" /></td></tr><tr><th class="css1">Mobile</td><td>'+allData['data'].mobile+'</th></tr><tr><th class="css1">Owner Name</td><td>'+allData['data'].owner_name+'</th></tr><tr><th class="css1">Country</td><td>'+allData['data'].country+'</td></tr><tr><th class="css1">State</th><td>'+allData['data'].state+'</td></tr><tr><th class="css1">City</th><td>'+allData['data'].city+'</td></tr> <tr><th class="css1">Pincode</th><td>'+allData['data'].pincode+'</td></tr><tr><th class="css1">Email</th><td>'+allData['data'].email+'</td></tr><tr><th class="css1">Website</th><td>'+allData['data'].website+'</td></tr></tbody></table></div>';


					
                  }
                  $(".modal-body").html(  personal_detail );
        }
      });
    }
        $(".modal-title").html(myBooktitle);

        // As pointed out in comments,
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
   });
   //popup
  </script>
