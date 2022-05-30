<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select title from categories where id=".$_REQUEST['cid']));

        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Subcategory";
          $btn="Update";
          }
          else
          {
          $title="Add New Subcategory";
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
        <!-- Pace page -->Add Subcategories for <a href="categories.php?id=<?php echo $_REQUEST['cid']; ?>"><?php echo $ptitle['title'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>		<li><a href="categories.php"><i class="fa fa-cube"></i> Categories</a></li>

        <li class="active">Subcategories Management</li>
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
                     $BindData=$obj->select_record("subcategories",$where);
                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Subcategories</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="subcategories">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="cid" value="<?php echo $did=$_REQUEST['cid'] ?? ''; ?>">
                <div class="row">

  				<div class="form-group col-md-4 col-xs-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control input-sm" name="title" placeholder="Enter Title" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-xs-12">
                  <label for="title"> File Image <small class="text-danger">*accept only .jpg,.png,files </small></label>
                  <?php
                  if(isset($BindData['file_url']) && $BindData['file_url'] !="")
                  {
                  ?>
                  <a class="example-image-link btn btn-warning btn-xs pull-right" href="../<?php echo $BindData['file_url']?>" title="<?php echo $BindData['title']; ?>" data-lightbox="example-1" style="margin-top:5px;"><i class="fa fa-eye"></i></a>
                  <?php
                  }
                  ?>
                  <input type="file" name="source" class="form-control input-sm" accept="image/*"/>

                           <input type="hidden" value="<?php echo $fl=$BindData['file_url']?? '';?>" name="old-logo">
                         </div>


                  <div class="form-group col-md-4 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>
                           <div class="form-group  col-xs-12">
                               <label for="title">Description</label>
                               <textarea class="form-control input-sm ckeditor" name="description" placeholder="Enter Description/ Remarks for Categories" required><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
                             </div>
                        </div> <!-- End row 1-->
                             <div class="panel panel-primary">
                               <div class="panel-heading"><h4 class="font-weight-bold"> For SEO Purposes </h4></div>
                               <div class="panel-body">
                                 <div class="row">
                                   <div class="form-group col-md-4 col-xs-12">
                                             <label for="title">Meta Title</label>
                                             <input type="text" class="form-control input-sm" name="meta_title" placeholder="Enter Meta Title" maxlength="100" value="<?php echo $t=$BindData['meta_title'] ?? ''; ?>" >
                                           </div>
                                           <div class="form-group col-md-4 col-xs-12">
                                                     <label for="title">Meta Keywords</label>
                                                     <input type="text" class="form-control input-sm" name="meta_keys" placeholder="Enter Keywords" maxlength="150" value="<?php echo $t=$BindData['meta_keys'] ?? ''; ?>" >
                                                   </div>
                                                   <div class="form-group col-md-4 col-xs-12">
                                                     <label for="title">Meta Description</label>
                                                     <input type="text" class="form-control input-sm" name="meta_desc" placeholder="Enter Meta Description" maxlength="200" value="<?php echo $t=$BindData['meta_desc'] ?? ''; ?>" >
                                                   </div>

                                 </div>
                               </div>
                             </div> <!-- End Panel 2-->
                        <div class="row">
              <div class="col-xs-12">
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
                                 <tr >
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                            <th>title</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['cid']??'';
                         $where= array(
                         "category_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("subcategories",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title'];?> </td>

                            <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

          <td><?php echo $sts=$row['status'] != 0 ? '<small class="label bg-green">Active</small>': '<small class="label bg-red">Inactive</small>'; ?></td>

           <td> <a href="subcategories.php?id=<?php echo $row['id'];?>&cid=<?php echo $_REQUEST['cid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

            <a  href="javascript:void(0);" onclick="javascript:deleteThisRecord(<?php echo $row['id']; ?>,'subcategories');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>


          </td>
                          </tr>
          				<?php
          				}
                }
          				?>
                          </tbody>
                               <tfoot>
                                 <tr >
                                  <th>id</th>
                              <th>title</th>
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
  	self.location="subcategories.php?m=active&cid=<?php echo $_REQUEST['cid']; ?>";
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
