<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select title from services where id=".$_REQUEST['sid']));

        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Media";
          $btn="Update";
          }
          else
          {
          $title="Add New Media";
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
        <!-- Pace page -->Add Images for <a href="services.php?id=<?php echo $_REQUEST['sid']; ?>"><?php echo $ptitle['title'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="services.php"><i class="fa fa-send"></i> Services</a></li>

        <li class="active">Services Media Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Show Images</h3>
                  </div>
                  <div class="box-body">
                             <div class="row">
                               <?php
                        $sid=$_REQUEST['sid']??'';
                        $where= array(
                        "service_id" => $sid,
                        );
                        $myrow = $obj->fetch_all_record("medias",$where);
                        if($myrow != null) {
                        foreach ($myrow as $row) {
                        ?>
                  		   <div class="col-md-2 col-xs-6 text-center">
                  		   <img src="../<?php echo $row['file_url']?>" style="width:150px;height:150px;margin:auto;margin-bottom:15px;" class="img-responsive img-rounded" >
             <p class="text-success"> <select class="form-control input-sm" onchange="javascript:setFeatured(this.value,<?php echo $row['id']; ?>,'medias',<?php echo $row['service_id']; ?>)" >
                               <option value="">Set Featured Image</option>
                              <option <?php if($row['status'] == "1") { echo 'selected=selected'; }?> value="1">Yes</option>
                            </select></p>        		   <p><a class="example-image-link btn btn-info btn-xs" href="../<?php echo $row['file_url']?>" title="<?php echo $row['title'];?>" data-lightbox="example-1"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="javascript:deleteThisRecord(<?php echo $row['id'];?>,'medias')"><i class="fa fa-trash-o"></i></a></p>
                  		   </div>
                         <?php
                         }
                       }
                             ?>
                  		   </div>
                              </div>

                      <!-- form start -->
                    </div>
                    <div class="clearfix">&nbsp;</div>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <!-- <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Media</a></li> -->
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="medias">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="sid" value="<?php echo $sid=$_REQUEST['sid'] ?? ''; ?>">
                <div class="row">

  				            <div class="form-group col-md-6 col-xs-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control input-sm" name="title" placeholder="Enter Title" maxlength="100" value="" required>
                  </div>
                  <div class="form-group col-md-6 col-xs-12">
  <label for="title">Image <small class="text-danger">*accept only .jpg,.png files </small></label>
  <input type="file" name="source[]" class="form-control input-sm" accept="image/*"/>
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



                  <!-- <div class="form-group col-md-4 col-xs-12">
                             <label for="status">Set Featured</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Yes</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>No</option>

                       </select>
                           </div> -->

              <div class="col-xs-12">
                <!-- <div class="form-group">
                    <label for="title">Description/ Remarks</label>
                    <textarea class="form-control input-sm" name="remarks" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['remarks'] ?? ''; ?></textarea>
                  </div> -->
                <div class="form-group text-center ">
                <button type="submit" class="btn btn-primary" ><?php echo $btn; ?></button>
                </div>
              </div><!-- End Col 3 -->
            </div><!-- end row-->
              </form>
              </div>
              <!-- /.tab-pane -->

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
  	self.location="medias.php?sid=<?php echo $_REQUEST['sid']; ?>";
}

  </script>
