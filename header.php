<?php session_start();
   include('database.php');
   $obj=new query();  
   //define("BASE_URL", "https://techabilititsolutions.com/");
   
   ?>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/fev.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>OgA</title>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Scrollbar css -->
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css" />
    <!-- Owl Carousel css -->
    <link rel="stylesheet" type="text/css" href="owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="owl-carousel/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="owl-carousel/owl.transitions.css" />
    <!-- youtube css -->
    <link rel="stylesheet" type="text/css" href="css/RYPP.css" />
    <!-- jquery-ui css -->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- animate -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- fonts css -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/Pe-icon-7-stroke.css" />
    <link rel="stylesheet" type="text/css" href="css/flaticon.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<header>
        <!-- Mobile Menu Start -->
        <div class="mobile-menu-area navbar-fixed-top hidden-sm hidden-md hidden-lg">
            <nav class="mobile-menu" id="mobile-menu">
                <div class="sidebar-nav">
                    <ul class="nav side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                        <button class="btn mobile-menu-btn" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li><a href="index.php">Home</a></li>
                        <!-- <li>
                            <a href="#">All pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Home <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="home-style-one.html">Home style one</a> </li>
                                        <li><a href="home-style-two.html">Home style two</a></li>
                                        <li><a href="home-style-three.html">Home style three</a></li>
                                        <li><a href="home-style-four.html">Home style four</a></li>
                                        <li><a href="home-style-five.html">Home style five</a></li>
                                    </ul>
                                    /.nav-third-level
                                </li>
                                <li>
                                    <a href="#">Categories <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="category-style-one.html">Category style one</a> </li>
                                        <li><a href="category-style-two.html">Category style two</a></li>
                                        <li><a href="category-style-three.html">Category style three</a></li>
                                    </ul>
                                     /.nav-third-level 
                                </li>
                                <li>
                                    <a href="#">Archive <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="archive-one.html">Archive style one</a> </li>
                                        <li><a href="archive-two.html">Archive style two</a></li>
                                    </ul>
                                     /.nav-third-level 
                                </li>
                                <li>
                                    <a href="#">News <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="details-style-one.html">News post one</a> </li>
                                        <li><a href="details-style-two.html">News post two</a></li>
                                        <li><a href="details-style-three.html">News post three</a></li>
                                    </ul>
                                     /.nav-third-level 
                                </li>
                                <li>
                                    <a href="#">Contact <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="contact-style-one.html">Contact style one</a> </li>
                                        <li><a href="contact-style-two.html">Contact style two</a></li>
                                    </ul>
                                     /.nav-third-level 
                                </li>
                                <li><a href="login%26registration.html">Login & Registration</a></li>
                            </ul>
                            /.nav-second-level 
                        </li>-->
                            <li> 
                            <a href="#">Success Story <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                        <li><a href="international.php">International</a> </li>
                                        <li><a href="national.php">National</a></li>
                                        <li><a href="state.php">State</a></li>
                                        <li><a href="local.php">Local</a></li>
                                </ul>
                            </li>
                        <li><a href="govermentschemes.php">Goverment Schemes</a></li>
                        <li><a href="career.php">Career</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li>
                            <a href="login.php">Login Or Register<span class="fa arrow"></span></a>
                            <!-- <ul class="nav nav-second-level">
                                <li><a href="contact-style-one.html">Contact style one</a> </li>
                                <li><a href="contact-style-two.html">Contact style two</a></li>
                            </ul> -->
                        </li>
                        <!-- social icon -->
                        <li>
                            <div class="social">
                                <ul>
                                    <li><a href="#" class="facebook"><i class="fa  fa-facebook"></i> </a></li>
                                    <li><a href="#" class="twitter"><i class="fa  fa-twitter"></i></a></li>
                                    <li><a href="#" class="google"><i class="fa  fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="top_header_icon">
                    <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </span>
                    <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </span>
                    <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Google"><i class="fa fa-google-plus"></i></a>
                        </span>
                    <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a>
                        </span>
                    <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Pintereset"><i class="fa fa-pinterest-p"></i></a>
                        </span>
                </div>
                <div id="showLeft" class="nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- Mobile Menu End -->
        <!-- top header -->
        <div class="top_header hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <div class="top_header_menu_wrap">
                            <ul class="top-header-menu">
                                <li><a href="register.php">REGISTER</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">LOGIN</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="login-inner">
                                                <input type="text" class="form-control" id="name_email" name="name_email" placeholder="username or emaile">
                                                <hr>
                                                <input type="password" class="form-control" id="pass" name="pass" placeholder="*******">
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" value="">Remember me</label>
                                                <button type="button" class="btn btn-lr btn-active">LOGIN</button>
                                                <button type="button" class="btn btn-lr">REGISTR</button>
                                                <div class="foeget"><a href="#">Forget username/password?</a></div>
                                                <div class="social_icon">
                                                    <div class="social_icon_box social_icon_box_1">
                                                        <div class="icon facebook-icon"></div>
                                                        <span class="social_info">Login with facebook</span>
                                                    </div>
                                                </div>
                                                <div class="social_icon">
                                                    <div class="social_icon_box social_icon_box_2">
                                                        <div class="icon twitter-icon"></div>
                                                        <span class="social_info">Login with twitter</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="contact.php">CONTACT</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--breaking news-->
                    <div class="col-sm-8 col-md-7">
                        <div class="newsticker-inner">
                            <ul class="newsticker">
                                <li><span class="color-1">Career</span><a href="career.php">Etiam imperdiet volutpat libero eu tristique.imperdiet volutpat libero eu tristique.</a></li>
                                <li><span class="color-2">International</span><a href="#">Curabitur porttitor ante eget hendrerit adipiscing.</a></li>
                                <li><span class="color-3">Health</span><a href="#">Praesent ornare nisl lorem, ut condimentum lectus gravida ut.</a></li>
                                <li><span class="color-4">technology</span><a href="#">Nunc ultrices tortor eu massa placerat posuere.</a></li>
                                <li><span class="color-1">Travel</span><a href="#">Etiam imperdiet volutpat libero eu tristique.imperdiet volutpat libero eu tristique.</a></li>
                            </ul>
                            <div class="next-prev-inner">
                                <a href="#" id="prev-button"><i class='pe-7s-angle-left'></i></a>
                                <a href="#" id="next-button"><i class='pe-7s-angle-right'></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="top_header_icon">
                            <span class="top_header_icon_wrap">
                                    <a target="_blank" href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                                </span>
                            <span class="top_header_icon_wrap">
                                    <a target="_blank" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                                </span>
                            <span class="top_header_icon_wrap">
                                    <a target="_blank" href="#" title="Google"><i class="fa fa-google-plus"></i></a>
                                </span>
                            <span class="top_header_icon_wrap">
                                    <a target="_blank" href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a>
                                </span>
                            <span class="top_header_icon_wrap">
                                    <a target="_blank" href="#" title="Pintereset"><i class="fa fa-pinterest-p"></i></a>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top_banner_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-sm-4">
                        <div class="header-logo">
                            <!-- logo -->
                            <a href="index.php">
                                <img class="td-retina-data img-responsive" src="images/LOGO_OGA.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-8 col-md-8 col-sm-8 hidden-xs">
                        <div class="header-banner">
                            <a href="#"><img class="td-retina img-responsive" src="images/top-bannner.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- navber -->
        <div class="container hidden-xs">
            <nav class="navbar">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php" class="category01">HOME</a></li>
                        <!-- <li class="dropdown ">
                            <a href="#" class="dropdown-toggle category02" data-toggle="dropdown" >ALL PAGES <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li class="dropdown-submenu"><a href="#">Home</a>
                                    <ul class="dropdown-menu zoomIn">
                                        <li><a href="home-style-one.html">Home style one</a></li>
                                        <li><a href="home-style-two.html">Home style two</a></li>
                                        <li><a href="home-style-three.html">Home style three</a></li>
                                        <li><a href="home-style-four.html">Home style four</a></li>
                                        <li><a href="home-style-five.html">Home style five</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a href="#">Categories</a>
                                    <ul class="dropdown-menu zoomIn">
                                        <li><a href="category-style-one.html">Category style one</a></li>
                                        <li><a href="category-style-two.html">Category style two</a></li>
                                        <li><a href="category-style-three.html">Category style three</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a href="#">Archive</a>
                                    <ul class="dropdown-menu zoomIn">
                                        <li><a href="archive-one.html">Archive style one</a></li>
                                        <li><a href="archive-two.html">Archive style two</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a href="#">News</a>
                                    <ul class="dropdown-menu zoomIn">
                                        <li><a href="details-style-one.html">News post one</a></li>
                                        <li><a href="details-style-two.html">News post two</a></li>
                                        <li><a href="details-style-three.html">News post three</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a href="#">Contact</a>
                                    <ul class="dropdown-menu zoomIn">
                                        <li><a href="contact-style-one.html">Contact style one</a> </li>
                                        <li><a href="contact-style-two.html">Contact style two</a></li>
                                    </ul>
                                </li>
                                <li><a href="login%26registration.html">Login & Registration</a></li>
                            </ul>
                        </li> -->
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">SUCCESS STORY <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="international.php">INTERNATIONAL</a></li>
                                <li class="dropdown-submenu"><a href="national.php">NATIONAL</a>
                                    <ul class="dropdown-menu zoomIn">
                                        <li><a href="#">Style one</a></li>
                                        <li><a href="#">Style two</a></li>
                                        <li><a href="#">Style three</a></li>
                                        <li><a href="#">Style four</a></li>
                                        <li><a href="#">Style five</a></li>
                                        <li><a href="#">Style six</a></li>
                                        <li><a href="#">Style seven</a></li>
                                    </ul>
                                </li>
                                <!--<li class="divider"></li>-->
                                <li><a href="state.php">STATE</a></li>
                                <li><a href="local.php">LOCAL</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Separated</a></li>
                                <li><a href="#">One more</a></li>
                                <li><a href="#">Separated</a></li>
                            </ul>
                        </li>
                        <li><a href="career.php" class="category04">CAREER</a></li>
                        <li><a href="govermentschemes.php" class="category05">GOVERMENT SCHEMES</a></li>
                        <li><a href="blog.php" class="category06">BLOG</a></li>
                        <li><a href="#" class="category07">TECHNOLOGY</a></li>
                        <li><a href="#" class="category08">LIFESTYLE</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category09" data-toggle="dropdown">CONTACT<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="contact-style-one.html">Contact style one</a> </li>
                                <li><a href="contact-style-two.html">Contact style two</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- navbar-collapse -->
            </nav>
        </div>
    </header>
    <!-- newsfeed Area
        ============================================ -->
    