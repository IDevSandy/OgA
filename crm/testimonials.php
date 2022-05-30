<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Testimonials";
          $btn="Update";
          }
          else
          {
          $title="Add New Testimonials";
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
        <!-- Pace page -->Testimonials Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Testimonials Management</li>
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
                     $BindData=$obj->select_record("testimonials",$where);
                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Testimonials</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="testimonials">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">

  				<div class="form-group col-md-3 col-xs-12">
                    <label for="title">Name</label>
                    <input type="text" class="form-control input-sm" name="name" placeholder="Enter Full Name" maxlength="300" value="<?php echo $t=$BindData['name'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">City</label>
                            <input type="text" class="form-control input-sm" name="city" placeholder="Enter City/Designation" maxlength="100" value="<?php echo $ct=$BindData['city'] ?? ''; ?>" required>
                          </div>

                          <div class="form-group col-md-3 col-xs-12">
                          <label for="title">Image <small class="text-danger">*accept only .jpg,.png files </small></label>
                          <input type="file" name="source" class="form-control input-sm" accept="image/*"/>
                          <?php
                          if(isset($BindData['file_url']) && $BindData['file_url'] !="")
                          {
                          ?>
                          <a href="../<?php echo $BindData['file_url'];?>" style="cursor:pointer;" class="btn btn-success btn-xs pull-right example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i> View Attachment</a>
                          <?php
                          }
                          ?>
                                   <input type="hidden" value="<?php echo $fl=$BindData['file_url']?? '';?>" name="old-logo">
                                 </div>


                  <div class="form-group col-md-3 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

              <div class="col-xs-12">
                <div class="form-group">
                    <label for="title">Feedback</label>
                    <textarea class="form-control input-sm" name="description" placeholder="Enter Feedback"><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
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
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr>
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>sno</th>
                            <th>name</th>
                            <th>city</th>
                            <th>image</th>
                            <th>feedback</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                 <tr >
                                  <th>id</th>
                                  <th>sno</th>
                               <th>name</th>
                                <th>city</th>
                                <th>image</th>
                                <th>feedback</th>
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
  	self.location="testimonials.php?m=active";
}

$(function () {
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_testimonials'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
         { data: 'sno', name: 'sno' },
           { data: 'name', name: 'name' },
           { data: 'city', name: 'city' },
           { data: 'image', name: 'image' },
           { data: 'feedback', name: 'feedback' },
           { data: 'last_update', name: 'last_update' },
           { data: 'status', name: 'status' },
           { data: 'actions', name: 'actions', orderable: true, searchable: true }
           ]
           // table.on( 'draw', function () {
           //        $('.livicon').each(function(){
           //            $(this).updateLivicon();
           //        });
           //    });
    });
   });
  </script>
