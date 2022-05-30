<?php include('include/header.php');?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php');?>
<?php
$BindData=array();
$r=mysqli_fetch_array(mysqli_query($con,"select name from roles where id=".$_REQUEST['rid']));
// $rd=mysqli_query($con,"select * from role_rights where role_id=".$_REQUEST['rid']);
// while($row=mysqli_fetch_assoc($r)) {
//   array_push($BindData,$row['category_id']);
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Privileges Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Privileges Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php
        if(isset($_REQUEST['q']) && $_REQUEST['q'] == "success" ) {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Yippe!</h4>
           Updated Successfully.
        </div>';
        } else if(isset($_REQUEST['q']) && $_REQUEST['q'] == "error"){
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          Updation failed. Try Again Later.
        </div>';
        } else {
          echo '<div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i>Welcome!</h4>
          Welcome to Privileges Management. Here you can set the privileges for different roles.
        </div>';
        }
        ?>

        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Set Privileges for <a href="system_roles.php?id=<?php echo $_REQUEST['rid']; ?>"><?php echo $r['name'];?></a></h3>
              <!-- <div class="box-tools pull-right">
                        <a class="btn bg-navy btn-sm" ><i class="fa fa-angellist"></i> All Privileges</a>
                      </div> -->
            </div>

            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="action" value="privileges">
            <input type="hidden" name="rid" value="<?php echo $_REQUEST['rid']; ?>">

              <div class="box-body table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <tr style="color:#fff;background-color:#605ca8;text-transform:uppercase;">
                          <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                             <th>Module Name</th>
                             <th>Write</th>
                             <th>Update</th>
                                <th>Read</th>
                           <th>Delete</th>
                    </tr>
                    <?php
                    $q=mysqli_query($con,"select * from system_modules where status=1");
                    while($m=mysqli_fetch_array($q)) {
                    $rr=mysqli_fetch_array(mysqli_query($con,"select * from role_rights where role_id='".$_REQUEST['rid']."' AND module_id=".$m['id']));
//print_r($rr);
                      ?>
                      <tr>
                        <td><?php echo $m['name']; ?> <input type="hidden" name="mid[]" value="<?php echo $m['id']; ?>"></td>
                      <!--   <td><input type="checkbox" class="arc_id flat-red" name="rr_create[]" value="1" <?php echo $result = $rr['rr_create']==1 ? 'checked=true' : ''; ?> ></td>
                        <td><input type="checkbox" class="arc_id flat-red" name="rr_update[]" value="1" <?php echo $result = $rr['rr_edit']==1 ? 'checked=true' : ''; ?>></td>
                        <td><input type="checkbox" class="arc_id flat-red" name="rr_view[]" value="1" <?php echo $result = $rr['rr_view']==1 ? 'checked=true' : ''; ?>></td>
                        <td><input type="checkbox" class="arc_id flat-red" name="rr_delete[]" value="1" <?php echo $result = $rr['rr_delete']==1 ? 'checked=true' : ''; ?>></td> -->
<td><select class="form-control input-sm" name="rr_create[]">
<option <?php echo $result = $rr['rr_create']==1 ? 'selected=selected' : ''; ?> value="1">Yes</option>
<option <?php echo $result = $rr['rr_create']==0 ? 'selected=selected' : ''; ?> value="0">No</option>
</select> </td>
<td><select class="form-control input-sm" name="rr_update[]">
<option <?php echo $result = $rr['rr_edit']==1 ? 'selected=selected' : ''; ?> value="1">Yes</option>
<option <?php echo $result = $rr['rr_edit']==0 ? 'selected=selected' : ''; ?> value="0">No</option>
</select> </td>
<td><select class="form-control input-sm" name="rr_view[]">
<option <?php echo $result = $rr['rr_view']==1 ? 'selected=selected' : ''; ?> value="1">Yes</option>
<option <?php echo $result = $rr['rr_view']==0 ? 'selected=selected' : ''; ?> value="0">No</option>
</select> </td>
<td><select class="form-control input-sm" name="rr_delete[]">
<option <?php echo $result = $rr['rr_delete']==1 ? 'selected=selected' : ''; ?> value="1">Yes</option>
<option <?php echo $result = $rr['rr_delete']==0 ? 'selected=selected' : ''; ?> value="0">No</option>
</select> </td>


                      </tr>
                      <?php
                    }
                    ?>
                </table>

              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
</section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php');?>
