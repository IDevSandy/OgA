 <?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Clients";
          $btn="Update";
          }
          else
          {
          $title="Add New Clients";
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
        <!-- Pace page -->Clients Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Clients Management</li>
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
                     $BindData=$obj->select_record("clients",$where);
                     $mob=isset($BindData['mobile']) && $BindData['mobile'] != ''? explode('-',$BindData['mobile']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Clients</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="clients">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-xs-12 col-md-6">
                            <label for="title">Client Type</label>
                            <select name="type" class="form-control input-sm" onchange="UpdateList(this.value)" required >
                              <option value="">Please Select</option>
                            <option value="household" <?php echo $t=isset($BindData['type']) && $BindData['type']=='household' ? 'selected=selected' :''; ?>>Household</option>
                            <option value="corporate" <?php echo $t=isset($BindData['type']) && $BindData['type']=='corporate' ? 'selected=selected' :''; ?>>Corporate</option>
                            </select>
                          </div>
                          <div class="form-group  col-xs-12 col-md-6 ">
                                     <label for="status">Status</label>
                                     <select name="status" class="form-control input-sm" >
                                 <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                                 <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                               </select>
                                   </div>
                  <div class="form-group col-md-3 col-xs-12 ">
                            <label for="title">Company</label>
                            <input type="text" class="form-control input-sm fe" name="title" placeholder="Enter Company Name" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                          </div>
                          <div class="form-group col-md-3 col-xs-12">
                              <label for="title">Owner Name</label>
                              <input type="text"  name="owner_name" class="form-control input-sm" placeholder="Enter Owner Name" maxlength="200" value="<?php echo $cf=$BindData['owner_name'] ?? ''; ?>" >
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
                                    <label for="title">Mobile Number</label>
 <input id="name6" type="tel"  name="mobile" class="form-control input-sm" placeholder="Enter Mobile Number" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                           </div>


                             <div class="form-group col-md-6 col-xs-12 ">
                                     <label for="title">Industry</label>
                                     <textarea class="form-control input-sm fe" name="industry" placeholder="Enter Industry Type"><?php echo $r=$BindData['industry'] ?? ''; ?></textarea>
                              </div>
                             <div class="form-group col-md-6 col-xs-12">
                                   <label for="title">Address</label>
                                   <textarea class="form-control input-sm" name="address" placeholder="Enter Address"><?php echo $r=$BindData['address'] ?? ''; ?></textarea>
                              </div>
                             <!-- <div class="form-group col-md-3 col-xs-12">
                                <label for="title">Country</label>
                                <input type="text"  name="country" class="form-control input-sm" maxlength="100" placeholder="Enter Country" value="<?php echo $cf=$BindData['country'] ?? 'India'; ?>" >
                              </div> -->
                              <div class="form-group col-xs-12 col-md-6 ">
                                   <label for="status">State</label>
                                   <select class="form-control input-sm select2"  name="state_id" id="cstate_id" onchange="javascript:getCity(this.value,1);">
                                          <option value="">Please Select</option>
                                          <?php

                                           $country=mysqli_query($obj->con,"SELECT country FROM `states` where status=1 group by country");
                                           foreach ($country as $s) {
                                             $condition= array(
                                             "country" => $s['country'],
                                              "status" => 1
                                             );
                                           echo  '<optgroup label="'.$s['country'].'">';
                                           $states=$obj->fetch_all_record("states",$condition);
                                           foreach ($states as $s2) {
                                           ?>
                                           <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($BindData['state_id']) && $BindData['state_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'];?></option>
                                           <?php
                                         }
                                           echo '</optgroup>';
                                         }
                                           ?>
                                        </select>
                                 </div>

                                <div class="form-group col-md-6 col-xs-12 ">
                                           <label for="status">City</label>
                                           <select class="form-control input-sm select2" id="ccity" name="city_id" >
                                                  <option value="">Please Select</option>
                                                  <?php
                                                  $sid=$BindData['state_id'] ?? '0';
                                                  $where= array(
                                                  "state_id"=> $sid,
                                                  "status" => 1
                                                  );
                                                  $city=$obj->fetch_all_record("cities",$where);
                                                  foreach ($city as $s) {

                                                  ?>
                                                  <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['city_id']) && $BindData['city_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                                  <?php
                                                }
                                                  ?>
                                                </select>
                                         </div>
                                <div class="form-group col-md-3 col-xs-12">
                                          <label for="title">Pincode</label>
                              <input  type="tel"  name="pincode" placeholder="Enter Pincode" class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['pincode'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                            </div>
                            <div class="form-group col-md-3 col-xs-12 ">
                                      <label for="title">GSTIN Number</label>
                                      <input type="text" class="form-control input-sm fe" name="gstin_number" placeholder="Enter GST Number" maxlength="16" value="<?php echo $t=$BindData['gstin_number'] ?? ''; ?>" >
                                    </div>
                            <div class="form-group col-md-3 col-xs-12">
                                      <label for="title">Email</label>
                                      <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="100" value="<?php echo $t=$BindData['email'] ?? ''; ?>" >
                                    </div>
                             <div class="form-group col-md-3 col-xs-12 ">
                           <label for="title">Website</label>
                           <input type="text"  name="website" class="form-control input-sm fe" maxlength="100" placeholder="Enter Website" value="<?php echo $cf=$BindData['website'] ?? ''; ?>" >
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
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr>
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Sno</th>
                                <th>Code</th>
                                <th>title</th>
                                <th>contact details</th>
                                <th>owner name</th>
                                <th>industry</th>
                                <th>follow up</th>
                                <th>references</th>
                                <th>attachments</th>
                            <th>last Update</th>
                           <th>Status</th>
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
                              <th>title</th>
                              <th>contact details</th>
                              <th>owner name</th>
                              <th>industry</th>
                              <th>follow up</th>
                              <th>references</th>
                              <th>attachments</th>
                              <th>last Update</th>
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
  	self.location="clients.php?m=active";
}

$(function () {
  UpdateList('<?php echo $BindData['type'];?>');
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_clients'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
           { data: 'sno', name: 'sno' },
            { data: 'code', name: 'code' },
          { data: 'title', name: 'title' },
           { data: 'mobile', name: 'mobile' },
           { data: 'owner_name', name: 'owner_name' },
           { data: 'industry', name: 'industry' },
           { data: 'followups', name: 'followups' },
           { data: 'references', name: 'references' },
            { data: 'attachments', name: 'attachments' },
           { data: 'last_update', name: 'last_update' },
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
                  action: 'get_clients_records',tbl:'clients',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;
          
          var personal_detail='<div class="table-responsive"><table class="table table-striped"><tbody class="css"><tr><th class="css1">Title</td><td>'+allData['data'].title+'</th></tr><tr><th class="css1">client Code</td><td>'+allData['data'].client_code	+'</th></tr><tr><th class="css1">Address</td><td>'+allData['data'].address+'</th></tr><tr><th class="css1">Mobile</td><td>'+allData['data'].mobile+'</th></tr><tr><th class="css1">Owner Name</td><td>'+allData['data'].owner_name+'</th></tr><tr><th class="css1">Industry</td><td>'+allData['data'].industry+'</th></tr><tr><th class="css1">	Type</td><td>'+allData['data'].type+'</th></tr><tr><th class="css1">State</th><td>'+allData['data'].state_id+'</td></tr><tr><th class="css1">City</th><td>'+allData['data'].city_id+'</td></tr> <tr><th class="css1">Pincode</th><td>'+allData['data'].pincode+'</td></tr><tr><th class="css1">GSTIN Number</td><td>'+allData['data'].gstin_number+'</td></tr><tr><th class="css1">Email</th><td>'+allData['data'].email+'</td></tr><tr><th class="css1">Website</th><td>'+allData['data'].website+'</td></tr></tbody></table></div>';


					
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
   function UpdateList(ele) {
     if(ele !="" && ele == "household") {
       // var fe= $('.fe').val() ? $('#paddress').val() : 'undefined';
          $('.fe').attr("readonly",true);
     } else {
         $('.fe').attr("readonly",false);
     }
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
