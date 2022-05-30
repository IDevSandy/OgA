<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select * from vendors where id=".$_REQUEST['aid']));

        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Documents";
          $btn="Update";
          }
          else
          {
          $title="Add New Documents";
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
        <!-- Pace page -->Add Documents for <a href="vendors.php?id=<?php echo $_REQUEST['aid']; ?>"><?php echo $ptitle['title'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="vendors.php"><i class="fa fa-group"></i> Vendors</a></li>

        <li class="active">Vendors Documents Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
                     $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("vendor_attachments",$where);
                     $zid=$ptitle['zone_id']??'';
                     $conditon= array(
                     "id" => $zid,
                     );
                     $zone=$obj->select_record("zones",$conditon);

                     ?>
                     <?php
                     if(isset($_REQUEST['aid']) && $_REQUEST['aid'] !="") {
                       ?>
                       <div class="row">
                         <div class="col-md-4 col-xs-12">
                                   <!-- Widget: user widget style 1 -->
                                   <div class="box box-widget widget-user-2">
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
                                     <div class="widget-user-header bg-rainbow1">
                                       <div class="widget-user-image">
                                         <img class="img-circle" src="../<?php echo $ptitle['file_url']; ?>" alt="<?php echo $ptitle['owner_name']; ?>">
                                       </div>
                                       <!-- /.widget-user-image -->
                                       <h3 class="widget-user-username"><?php echo $ptitle['owner_name']; ?></h3>
                                       <h5 class="widget-user-desc"><?php echo $ptitle['title']; ?></h5>
                                     </div>
                                     <div class="box-footer no-padding">
                                       <ul class="nav nav-stacked">
                                         <li><a href="#"><?php echo $ptitle['mobile']; ?> <span class="pull-right badge bg-blue"><i class="fa fa-phone"></i></span></a></li>
                                         <li><a href="#"><?php echo $ptitle['email']; ?> <span class="pull-right badge bg-aqua"><i class="fa fa-envelope"></i></span></a></li>
                                         <li><a href="#"><?php echo $ptitle['website']; ?> <span class="pull-right badge bg-green"><i class="fa fa-globe"></i></span></a></li>
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
                             <dd><?php echo $ptitle['address']; ?></dd>
                             <dt>Country</dt>
                             <dd><?php echo $ptitle['country']; ?></dd>
                             <dt>State</dt>
                             <dd><?php echo $ptitle['state']; ?></dd>
                             <dt>City</dt>
                             <dd><?php echo $ptitle['city']; ?></dd>
                             <dt>Pincode</dt>
                             <dd><?php echo $ptitle['pincode']; ?></dd>
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
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Attachments</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="vendor_attachments">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="aid" value="<?php echo $aid=$_REQUEST['aid'] ?? ''; ?>">
                <div class="row">

  				            <div class="form-group col-md-4 col-xs-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control input-sm" name="title" placeholder="Enter Title" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-xs-12">
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



                  <div class="form-group col-md-4 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

              <div class="col-xs-12">
                <div class="form-group">
                    <label for="title">Description/ Remarks</label>
                    <textarea class="form-control input-sm" name="remarks" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['remarks'] ?? ''; ?></textarea>
                  </div>
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
                                 <tr>
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>title</th>
                                <th>document</th>

                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['aid']??'';
                         $where= array(
                         "vendor_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("vendor_attachments",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><a href="../<?php echo $row['file_url'];?>" style="cursor:pointer;" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye" ></i></a>&nbsp;&nbsp;<a href="../<?php echo $row['file_url'];?>" style="cursor:pointer;" class="btn btn-success btn-xs" download><i class="fa fa-download" ></i></a></td>


                            <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

          <td><?php echo $sts=$row['status'] != 0 ? '<small class="label bg-green">Active</small>': '<small class="label bg-red">Inactive</small>'; ?></td>

           <td> <a href="vendorattachments.php?id=<?php echo $row['id'];?>&aid=<?php echo $_REQUEST['aid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

            <a  href="javascript:void(0);" onclick="javascript:deleteThisRecord(<?php echo $row['id']; ?>,'vendor_attachments');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>


          </td>
                          </tr>
          				<?php
          				}
                }
          				?>
                          </tbody>
                               <tfoot>
                                 <tr>
                                  <th>id</th>
                                  <th>title</th>
                                  <th>Document</th>
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
  	self.location="vendorattachments.php?m=active&aid=<?php echo $_REQUEST['aid']; ?>";
}
$(function () {
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
  </script>
