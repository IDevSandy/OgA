<?php include('include/header.php');?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Pace page -->Change Password
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Change Password</li>
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
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          Yippe! Updated Successfully.
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
          Welcome to Password Management. Here you can update the password.
        </div>';
        }
        ?>

        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" action="engine-controller.php" method="post">
            <input type="hidden" name="action" value="change_password">
            <input type="hidden" name="id" value="<?php echo $_SESSION['USER_ID'];?>">
              <div class="box-body">
              <small class="text-danger" id="msg"></small>
                <div class="form-group">
                  <label for="exampleInputPassword1">Current Password</label>
                  <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Enter Your current Password" name="old_password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">New Password</label>
                  <input type="password" class="form-control input-sm" id="exampleInputPassword2" placeholder="Enter New Your password" name="new_password"  required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword3">Confirm Password</label>
                  <input type="text" class="form-control input-sm" id="exampleInputPassword3" placeholder="Enter Confirm password" name="confirm_password" required>
                </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="submit">Update</button>
              </div>
            </form>
          </div>
</section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php');?>
<!-- <script>
function checkPassword() {
 var currpass=document.getElementById('exampleInputPassword1').value;
  var newpass=document.getElementById('exampleInputPassword2').value;
  var cpass=document.getElementById('exampleInputPassword2').value;
  if(currpass != "" && newpass !="") {
 if(currpass == newpass) {
  document.getElementById('submit').disabled=true;
    document.getElementById('msg').innerHTML="Current Password and New Password Should not be same";
 }
  }
if(newpass !="" &&  cpass !="") {
  if(newpass == cpass) {
    document.getElementById('submit').disabled=true;
    document.getElementById('msg').innerHTML="New Password and Confirm Password Should be same";
  }
  }
  else {
    document.getElementById('submit').disabled=false;
    document.getElementById('msg').innerHTML='';
  }
}
</script> -->
