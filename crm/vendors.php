<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Vendor";
          $btn="Update";
          }
          else
          {
          $title="Add New Vendor";
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
        <!-- Pace page -->Vendor Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Vendor Management</li>
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
                     $BindData=$obj->select_record("vendors",$where);
                     $mob=isset($BindData['mobile']) && $BindData['mobile'] != ''? explode('-',$BindData['mobile']) : '';
                     $zid=$BindData['zone_id']??'';
                     $conditon= array(
                     "id" => $zid,
                     );
                     $zone=$obj->select_record("zones",$conditon);
                     // $zone=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from zones where id=".$BindData['zone_id']));
                     // $zones=$zone['title'] !='' ? '<a href="zones.php?id='.$BindData['zone_id'].'" class="btn btn-rainbow1 btn-xs"> '.$zone['title'].'</a>' : 'No Zone Assigned';

                     ?>
        <!-- Custom Tabs -->
        <?php
        if(isset($_REQUEST['id']) && $_REQUEST['id'] !="") {
          ?>
          <div class="row">
            <div class="col-md-4 col-xs-12">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-rainbow1">
                          <div class="widget-user-image">
                            <img class="img-circle" src="../<?php echo $BindData['file_url']; ?>" alt="<?php echo $row['owner_name']; ?>">
                          </div>
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username"><?php echo $BindData['owner_name']; ?></h3>
                          <h5 class="widget-user-desc"><?php echo $BindData['title']; ?></h5>
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="#"><?php echo $BindData['mobile']; ?> <span class="pull-right badge bg-blue"><i class="fa fa-phone"></i></span></a></li>
                            <li><a href="#"><?php echo $BindData['email']; ?> <span class="pull-right badge bg-aqua"><i class="fa fa-envelope"></i></span></a></li>
                            <li><a href="#"><?php echo $BindData['website']; ?> <span class="pull-right badge bg-green"><i class="fa fa-globe"></i></span></a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>

                    <div class="col-md-4 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Location</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Address</dt>
                <dd><?php echo $BindData['address']; ?></dd>
                <dt>Country</dt>
                <dd><?php echo $BindData['country']; ?></dd>
                <dt>State</dt>
                <dd><?php echo $BindData['state']; ?></dd>
                <dt>City</dt>
                <dd><?php echo $BindData['city']; ?></dd>
                <dt>Pincode</dt>
                <dd><?php echo $BindData['pincode']; ?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Zone Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
            if($zone['title'] != "") {
              // $city=mysqli_fetch_assoc($obj -> con, "select title from lo")
            ?>
            <dl class="dl-horizontal">
              <dt>Zone Name</dt>
              <dd><?php echo $zone['title']; ?></dd>
              <dt>Manager Name</dt>
              <dd><?php echo $zone['manager_name']; ?></dd>
              <dt>Mobile No.</dt>
              <dd><?php echo $zone['mobile']; ?></dd>
              <dt>Email Id</dt>
              <dd><?php echo $zone['email']; ?></dd>
              <dt>Phone Number</dt>
              <dd><?php echo $zone['phone_no']; ?></dd>
            </dl>
            <?php
          } else {
            echo 'Zone not Assigned Yet';
          }
            ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          </div>
          <div class="clearfix">&nbsp;</div>
        <?php
        }
         ?>

        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Vendors</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="vendors">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Vendor Name / Company Name</label>
                            <input type="text" class="form-control input-sm" name="title" placeholder="Enter Vendor / Company Name" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                          </div>
                          <div class="form-group col-md-3 col-xs-12">
          <label for="title">Owner Name</label>
 <input type="text"  name="owner_name" placeholder="Enter Owner Name" class="form-control input-sm" maxlength="200" value="<?php echo $cf=$BindData['owner_name'] ?? ''; ?>" >
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
 <input id="name6" type="tel"  name="mobile" placeholder="Enter Mobile Number" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                           </div>

                           <div class="form-group col-md-4 col-xs-12">
                                     <label for="title">Email</label>
                                     <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="100" value="<?php echo $t=$BindData['email'] ?? ''; ?>" required>
                                   </div>
                            <div class="form-group col-md-4 col-xs-12">
            <label for="title">Website</label>
   <input type="text"  name="website" placeholder="Enter Website" class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['website'] ?? ''; ?>" >
                             </div>
                             <div class="form-group col-md-4 col-xs-12">
                                       <label for="title">Address</label>
                                       <textarea class="form-control input-sm" name="address" placeholder="Enter Address"><?php echo $r=$BindData['address'] ?? ''; ?></textarea>
                              </div>
                             <div class="form-group col-md-3 col-xs-12">
             <label for="title">Country</label>
    <input type="text"  name="country" placeholder="Enter Country " class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['country'] ?? 'India'; ?>" >
                              </div>
                              <div class="form-group col-md-3 col-xs-12">
              <label for="title">State</label>
     <input type="text"  name="state" placeholder="Enter State " class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['state'] ?? ''; ?>" >
                               </div>
                               <div class="form-group col-md-3 col-xs-12">
               <label for="title">City</label>
      <input type="text"  name="city" placeholder="Enter City " class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['city'] ?? ''; ?>" >
                                </div>
                                <div class="form-group col-md-3 col-xs-12">
                                          <label for="title">Pincode</label>
                              <input id="name9" type="tel"  name="pincode" placeholder="Enter Pincode " class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['pincode'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                       <label for="status">Zones</label>
                                       <select class="form-control select2 input-sm" id="zone" name="zone_id">
                                 <option value="">Please Select</option>
                                 <?php
                                 $where= array(
                                 "status" => 1,
                                 );
                                 $zones=$obj->fetch_all_record("zones",$where);
                                 foreach ($zones as $s) {
                                   // var_dump($s);
                                 ?>
                                 <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['zone_id']) && $BindData['zone_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                 <?php
                               }
                                 ?>
                               </select>
                                     </div>
                                     <div class="form-group col-md-4 col-xs-12">
                                    <label for="title">Profile Picture <small class="text-danger">*accept only .jpg,.png,files </small></label>
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
                  <div class="form-group  col-xs-4">
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
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr>
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Sno</th>
                                <th>Code</th>
                                <th>title</th>
                                <th>Zones</th>
                                <th>Profile</th>
                                <th>contact details</th>
                                <th>owner name</th>
                                <th>services</th>
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
                              <th>Zones</th>
                                  <th>Profile</th>
                              <th>Contact details</th>
                              <th>owner name</th>
                              <th>services</th>
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
  	self.location="vendors.php?m=active";
}

$(function () {
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_vendors'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
           { data: 'sno', name: 'sno' },
            { data: 'code', name: 'code' },
            { data: 'title', name: 'title' },
            { data: 'zone', name: 'zone' },
          { data: 'image', name: 'image' },
           { data: 'contact_detail', name: 'contact_detail' },
           { data: 'owner_name', name: 'owner_name' },
           { data: 'services', name: 'services' },
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
                  action: 'get_vendors_records',tbl:'vendors',id:myBookId
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
