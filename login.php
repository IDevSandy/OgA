<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
</head>
<?php include('header.php');?>
<body>
<section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Login & Registration</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="index.php" title="">Home</a></li>
                            <li><a href="#" title="">Login & Registration</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="login-reg-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="login-form-inner">
                        <h3 class="category-headding ">LOGIN TO YOUR ACCOUNT</h3>
                        <div class="headding-border bg-color-1"></div>
                        <form>
                            <label>Username Or Email <sup>*</sup></label>
                            <input type="text" class="form-control" id="name_email" name="name_email" placeholder="Username or Email">
                            <label>Password <sup>*</sup></label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="*******">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="">Remember me</label>
                            <button type="button" class="btn btn-style">Login</button>
                            
                            <div class="foeget"><a href="#">Forget username/password?
                            <button type="button" class="btn btn-style">Register</button>
                            
                                </a>
                                
                            
                            
   
                            
                            
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="social_icon">
                                        <div class="social_icon_box social_icon_box_1">
                                            <div class="icon facebook-icon"></div>
                                            <span class="social_info">Login with facebook</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="social_icon">
                                        <div class="social_icon_box social_icon_box_2">
                                            <div class="icon twitter-icon"></div>
                                            <span class="social_info">Login with twitter</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="register-form-inner">
                        <h3 class="category-headding ">REGISTER NOW!</h3>
                        <div class="headding-border bg-color-1"></div>
                        <form>
                            <label>Username Or Email <sup>*</sup></label>
                            <input type="text" class="form-control" id="name_email_2" name="name_email_2" placeholder="Username or Email">
                            <label>Password <sup>*</sup></label>
                            <input type="password" class="form-control" id="pass_2" name="pass" placeholder="Write Your Password Here ...">
                            <label>Repeat Password <sup>*</sup></label>
                            <input type="password" class="form-control" id="pass_3" name="pass" placeholder="Rewrite Your Password Here ...">
                            <button type="button" class="btn btn-style">Register Now!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
</body>
<?php include('footer.php');?>
</html>