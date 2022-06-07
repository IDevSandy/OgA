<?php

session_start();

// include('database/engine_db_config.php');

// $con=mysqli_connect(HOST,DBUSER,DBPASSWORD,DBNAME) or die("Error in Connect database");

require_once('operations/dataOperation.php');

$obj = new DataOperation;

if($_SESSION['PEL_LOGIN_BY'] != "yes" ) {

  // session_destroy();

  header("Location:index.php?q=session expired!");

}

if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == "yes" ) {

  session_destroy();

  header("Location:index.php?q=logout successfully!");

}



function number_format_short( $n, $precision = 1 ) {

    if ($n < 900) {

        // 0 - 900

        $n_format = number_format($n, $precision);

        $suffix = '';

    } else if ($n < 900000) {

        // 0.9k-850k

        $n_format = number_format($n / 1000, $precision);

        $suffix = 'K';

    } else if ($n < 900000000) {

        // 0.9m-850m

        $n_format = number_format($n / 1000000, $precision);

        $suffix = 'M';

    } else if ($n < 900000000000) {

        // 0.9b-850b

        $n_format = number_format($n / 1000000000, $precision);

        $suffix = 'B';

    } else {

        // 0.9t+

        $n_format = number_format($n / 1000000000000, $precision);

        $suffix = 'T';

    }

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"

  // Intentionally does not affect partials, eg "1.50" -> "1.50"

    if ( $precision > 0 ) {

        $dotzero = '.' . str_repeat( '0', $precision );

        $n_format = str_replace( $dotzero, '', $n_format );

    }

    return $n_format . $suffix;

}

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title> Dashboard | PEL CRM</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.6 -->

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Select2 -->

 <link rel="stylesheet" href="plugins/select2/select2.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="plugins/pace/pace.min.css">



  <!-- iCheck -->

  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">

  <!-- Morris chart -->

  <link rel="stylesheet" href="plugins/morris/morris.css">

  <!-- jvectormap -->

  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <!-- Date Picker -->

  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

  <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <!-- DataTables -->

   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">



  <!-- iCheck for checkboxes and radio inputs -->

<link rel="stylesheet" href="plugins/iCheck/all.css">

<!-- Lightbox plugin css-->

<link rel="stylesheet" href="plugins/lightbox/css/lightbox.min.css"/>

<!-- Sweetalert -->

<link rel="stylesheet" href="plugins/sweetalert/sweetalert.css"/>

<!-- toastr -->

<link rel="stylesheet" href="plugins/toastr/toastr.min.css"/>



<!-- Custom Css -->

<link rel="stylesheet" href="dist/custom.css">

<link rel="stylesheet" href="dist/tabs2.css">



<!-- Custom Font-awesome -->

<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

  <script type="text/javascript">

        function display_c(){

        var refresh=1000; // Refresh rate in milli seconds

        mytime=setTimeout('display_ct()',refresh)

        }



        function display_ct() {

        var strcount

        var x = new Date()

        document.getElementById('ct').innerHTML = x;

        tt=display_c();

        }



  function PopupCenter(url, title, w, h) {

    // Fixes dual-screen position                         Most browsers      Firefox

    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;

    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;



    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;

    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;



    var left = ((width / 2) - (w / 2)) + dualScreenLeft;

    var top = ((height / 2) - (h / 2)) + dualScreenTop;

    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);



    // Puts focus on the newWindow

    if (window.focus) {

        newWindow.focus();

    }

  }

</script>
<style>
.f25 {
  font-size: 25px;
  padding: 5px;
  font-weight: 500;
}
.m5 {
  margin: 0px 20px 0px 25px;
  text-align:center;

}
</style>

</head>

<body class="hold-transition skin-red sidebar-mini sidebar-collapse fixed" onload="javascript:display_ct();">

<div class="wrapper">



  <header class="main-header">

    <!-- Logo -->

    <a href="home.php" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>OgA</b></span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>OgA</b> <i>Admin</i></span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>



      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav hidden-xs">
        <li class="font-weight-bold m5">
             <a href="home.php" style="padding: 0px;" class="">
             <i class="fa fa-dashboard f25" ></i> <p class="small">Dashboard</p>
             </a>
           </li>

            <!-- <li class="font-weight-bold m5">
                <a href="categories.php" style="padding: 0px;" class="">
                <i class="fa fa-cube f25" ></i> <p class="small">Categories</p>
                </a>
              </li> -->
            <!-- <li class="font-weight-bold m5">
                 <a href="services.php" style="padding: 0px;" class="">
                 <i class="fa fa-send f25" ></i> <p class="small">Services</p>
                 </a>
               </li> -->
               <li class="font-weight-bold m5">
                    <a href="testimonials.php" style="padding: 0px;" class="">
                    <i class="fa fa-thumbs-up f25" ></i> <p class="small">Testimonials</p>
                    </a>
            <!-- <li class="font-weight-bold m5">
               <a href="portfolios.php" style="padding: 0px;" class="">
               <i class="fa fa-file-image-o f25" ></i> <p class="small">Portfolios</p>
               </a>
             </li> -->

             <li class="font-weight-bold m5">
              <a href="blogs.php" style="padding: 0px;" class="">
              <i class="fa fa-cube f25" ></i> <p class="small">Blogs</p>
              </a>
            </li>
              



          <!-- Messages: style can be found in dropdown.less->

          <li class="dropdown messages-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-envelope-o"></i>

              <span class="label label-success">4</span>

            </a>

            <ul class="dropdown-menu">

              <li class="header">You have 4 messages</li>

              <li>

                <!-- inner menu: contains the actual data ->

                <ul class="menu">

                  <li><!-- start message ->

                     <a href="#">

                      <div class="pull-left">

                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                      </div>

                      <h4>

                        Support Team

                        <small><i class="fa fa-clock-o"></i> 5 mins</small>

                      </h4>

                      <p>Why not buy a new awesome theme?</p>

                    </a>

                  </li>

                  <!-- end message ->

                  <li>

                    <a href="#">

                      <div class="pull-left">

                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">

                      </div>

                      <h4>

                        AdminLTE Design Team

                        <small><i class="fa fa-clock-o"></i> 2 hours</small>

                      </h4>

                      <p>Why not buy a new awesome theme?</p>

                    </a>

                  </li>

                  <li>

                    <a href="#">

                      <div class="pull-left">

                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">

                      </div>

                      <h4>

                        Developers

                        <small><i class="fa fa-clock-o"></i> Today</small>

                      </h4>

                      <p>Why not buy a new awesome theme?</p>

                    </a>

                  </li>

                  <li>

                    <a href="#">

                      <div class="pull-left">

                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">

                      </div>

                      <h4>

                        Sales Department

                        <small><i class="fa fa-clock-o"></i> Yesterday</small>

                      </h4>

                      <p>Why not buy a new awesome theme?</p>

                    </a>

                  </li>

                  <li>

                    <a href="#">

                      <div class="pull-left">

                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">

                      </div>

                      <h4>

                        Reviewers

                        <small><i class="fa fa-clock-o"></i> 2 days</small>

                      </h4>

                      <p>Why not buy a new awesome theme?</p>

                    </a>

                  </li>

                </ul>

              </li>

              <li class="footer"><a href="#">See All Messages</a></li>

            </ul>

          </li>

          <!-- Notifications: style can be found in dropdown.less ->

          <li class="dropdown notifications-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-bell-o"></i>

              <span class="label label-warning">10</span>

            </a>

            <ul class="dropdown-menu">

              <li class="header">You have 10 notifications</li>

              <li>

                <!-- inner menu: contains the actual data ->

                <ul class="menu">

                  <li>

                    <a href="#">

                      <i class="fa fa-users text-aqua"></i> 5 new members joined today

                    </a>

                  </li>

                  <li>

                    <a href="#">

                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the

                      page and may cause design problems

                    </a>

                  </li>

                  <li>

                    <a href="#">

                      <i class="fa fa-users text-red"></i> 5 new members joined

                    </a>

                  </li>

                  <li>

                    <a href="#">

                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made

                    </a>

                  </li>

                  <li>

                    <a href="#">

                      <i class="fa fa-user text-red"></i> You changed your username

                    </a>

                  </li>

                </ul>

              </li>

              <li class="footer"><a href="#">View all</a></li>

            </ul>

          </li>

          <!-- Tasks: style can be found in dropdown.less ->

          <li class="dropdown tasks-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-flag-o"></i>

              <span class="label label-danger">9</span>

            </a>

            <ul class="dropdown-menu">

              <li class="header">You have 9 tasks</li>

              <li>

                <!-- inner menu: contains the actual data ->

                <ul class="menu">

                  <li><!-- Task item ->

                    <a href="#">

                      <h3>

                        Design some buttons

                        <small class="pull-right">20%</small>

                      </h3>

                      <div class="progress xs">

                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                          <span class="sr-only">20% Complete</span>

                        </div>

                      </div>

                    </a>

                  </li>

                  <!-- end task item ->

                  <li><!-- Task item ->

                    <a href="#">

                      <h3>

                        Create a nice theme

                        <small class="pull-right">40%</small>

                      </h3>

                      <div class="progress xs">

                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                          <span class="sr-only">40% Complete</span>

                        </div>

                      </div>

                    </a>

                  </li>

                  <!-- end task item ->

                  <li><!-- Task item ->

                    <a href="#">

                      <h3>

                        Some task I need to do

                        <small class="pull-right">60%</small>

                      </h3>

                      <div class="progress xs">

                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                          <span class="sr-only">60% Complete</span>

                        </div>

                      </div>

                    </a>

                  </li>

                  <!-- end task item ->

                  <li><!-- Task item ->

                    <a href="#">

                      <h3>

                        Make beautiful transitions

                        <small class="pull-right">80%</small>

                      </h3>

                      <div class="progress xs">

                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                          <span class="sr-only">80% Complete</span>

                        </div>

                      </div>

                    </a>

                  </li>

                  <!-- end task item ->

                </ul>

              </li>

              <li class="footer">

                <a href="#">View all tasks</a>

              </li>

            </ul>

          </li>

          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle dp" data-toggle="dropdown" style="padding: 15px 15px !important;">

              <img src="dist/img/sudhu.jpeg" class="user-image" alt="User Image">

              <span class="hidden-xs"><?php echo $_SESSION['USER']; ?></span>

            </a>

            <ul class="dropdown-menu">

              <!-- User image -->

              <li class="user-header">

                <img src="dist/img/sudhu.jpeg" class="img-circle" alt="User Image">



                <p>

                <?php echo $_SESSION['USER']; ?> - Web Developer

                  <small id="ct">Member since Nov. 2012</small>

                </p>

              </li>

              <!-- Menu Body ->

              <li class="user-body">

                <div class="row">

                  <div class="col-xs-4 text-center">

                    <a href="#">Followers</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Sales</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Friends</a>

                  </div>

                </div>

                <!-- /.row ->

              </li>

              <!-- Menu Footer-->

              <li class="user-footer">

                <div class="pull-left">

                  <a href="#" class="btn btn-default btn-flat">Profile</a>

                </div>

                <div class="pull-right">

                  <a href="home.php?logout=yes" class="btn btn-default btn-flat">Sign out</a>

                </div>

              </li>

            </ul>

          </li>

          <!-- Control Sidebar Toggle Button -->

          <li>

            <a href="#" data-toggle="control-sidebar" style="padding: 15px 15px !important;"><i class="fa fa-gears"></i></a>

          </li>

        </ul>

      </div>

    </nav>

  </header>
