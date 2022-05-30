<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select title from laboratories where id=".$_REQUEST['lid']));

        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Services";
          $btn="Update";
          }
          else
          {
          $title="Add New Services";
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
        <!-- Pace page -->Add Services for <a href="laboratories.php?id=<?php echo $_REQUEST['lid']; ?>"><?php echo $ptitle['title'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="laboratories.php"><i class="fa fa-bank"></i> Laboratory</a></li>

        <li class="active">Lab Services Management</li>
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
                     $BindData=$obj->select_record("lab_services",$where);
                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Services</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="lab_services">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="lid" value="<?php echo $lid=$_REQUEST['lid'] ?? ''; ?>">
                <div class="row">

  				<div class="form-group col-md-3 col-xs-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control input-sm" name="title" placeholder="Enter Title" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Timeline</label>
                <input id="name9" type="tel"  name="timeline" placeholder="Enter Timeline" class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['timeline'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
              </div>
              <div class="form-group col-md-3 col-xs-12">
                        <label for="title">Testing Charge (<i class="fa fa-inr"></i>) </label>
            <input id="name91" type="tel"  name="testing_charge" placeholder="Enter Testing Charge" class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['testing_charge'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
          </div>
          <div class="form-group col-md-3 col-xs-12">
                    <label for="title">Sample Size</label>
        <input id="name911" type="tel"  name="sample_size" placeholder="Enter Sample Size" class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['sample_size'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
      </div>
      <div class="form-group col-md-6 col-xs-12">
                 <label for="status">Standards</label>
                 <select class="form-control input-sm select2"  name="standard_id" >
                        <option value="">Please Select</option>
                        <?php
                         $where= array(
                         "status" => 1,
                         );
                         $standard=$obj->fetch_all_record("standards",$where);
                         foreach ($standard as $s) {
                           // var_dump($s);
                         ?>
                         <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['standard_id']) && $BindData['standard_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                         <?php
                       }
                         ?>
                      </select>
               </div>
                  <div class="form-group col-md-6 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

              <div class="col-xs-12">
                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
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
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                    text-transform:uppercase;">
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>title</th>
                            <th>Standard</th>
                            <th>timeline</th>
                            <th>Sample Size</th>
                            <th>testing charge</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['lid']??'';
                         $where= array(
                         "lab_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("lab_services",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title'];?> </td>
                    
                    <td>
                   <?php
                   if($row['standard_id'] != "0") {
                     $where= array(
                     "id" => $row['standard_id'],
                     );
                     $st=$obj->select_record("standards",$where);
                     echo $st['title'];
                   } else {
                     echo "No Standard";
                   }

                    ?>
                  </td>
                    <td><span class="text-danger"><?php echo $row['timeline'];?> Days </span></td>
                    <td><?php echo $row['sample_size'];?> Samples </td>
                    <td><span class="text-success"><b><i class="fa fa-inr"></i> <?php echo $row['testing_charge'];?> </b></span></td>

                            <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

          <td><?php echo $sts=$row['status'] != 0 ? '<small class="label bg-green">Active</small>': '<small class="label bg-red">Inactive</small>'; ?></td>

           <td> <a href="labservices.php?id=<?php echo $row['id'];?>&lid=<?php echo $_REQUEST['lid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

            <a  href="javascript:void(0);" onclick="javascript:deleteThisRecord(<?php echo $row['id']; ?>,'lab_services');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>


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
                                  <th>title</th>
                                  <th>Standard</th>
                                  <th>timeline</th>
                              <th>Sample Size</th>
                              <th>testing charge</th>
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
  	self.location="labservices.php?m=active&lid=<?php echo $_REQUEST['lid']; ?>";
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
