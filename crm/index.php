<?php
session_start();
if(isset($_SESSION['PEL_LOGIN_BY']) && $_SESSION['PEL_LOGIN_BY'] == "yes" ) {
  header("Location:home.php?q=already login");
} else {
  //header("Location:index.php?q=session expired!");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PEL CRM | Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/custome.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="#"><b>Admin </b> </a>
  </div> -->
  <!-- /.login-logo -->
  <div class="login-box-body">

    <?php
    if(isset($_REQUEST['q']) && $_REQUEST['q']=="error") {
      echo '<p class="login-box-msg text-danger">Invalid Credentials! Try Again.</p>';
    } else {
     echo ' <p class="login-box-msg">Sign in to start your session</p>';
    }
    ?>


    <form action="engine-controller.php" method="post">
    <input type="hidden" name="action" value="authentication">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary1 btn-block">Sign In</button>
        </div>
        <div class="col-xs-12" style="padding:10px;">
           <!-- <a href="forget.php">Forget password</a> -->
           <!-- <p class="login-box-msg1">Powered By </p>
             <img src="http://www.techabilit.com/images/logo/logo.png" style="width:200px"> -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
    </form>



<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<!-- <script src="plugins/iCheck/icheck.min.js"></script> -->
<!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script> -->
</body>
</html>
