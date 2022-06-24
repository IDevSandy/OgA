<?php session_start();
// if($_SESSION['BLOG_LOGIN_BY'] && $_SESSION['BLOG_LOGIN_BY'] == "yes" ) {

//     // session_destroy();
  
//     header("Location:user/manage_blog.php?q=already login!");
  
//   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
</head>
<?php include('header.php');?>
<?php
 $connect= new mysqli("localhost","root","","oga_db" );
?>
<style>
    #mtoast{
        position:fixed;z-index:99;
        top: 5px; right:5px;
        width: 200px;
        padding: 10px;
        border: 1px solid #c52828;
        background: #ffebe1;
        border: 1px solid #000;
        display: none;

    }
</style>
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
                        <form method = "POST">
                            <label>Username Or Email <sup>*</sup></label>
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Your Email" required>
                            <label>Password <sup>*</sup></label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your Password" required>
                                <br>
                            <button type="submit" name="login" class="btn btn-style" onclick="">Login</button>
                            <?php
                            if(isset($_POST ["login"])){
      
                                $name=$_POST['uname'];
                                $pswd=$_POST['pass'];
                                $where =array(
                                    "status"=>1,
                                );
                                $c=$obj->getData('system_users','*',$where,'id','desc');
                                foreach($c as $c){
                                    if ($name==$c['email']){
                                        if($pswd==$c['password']){
                                            $_SESSION['BLOG_LOGIN_BY']="yes";
                                            $_SESSION['USERNAME']=$c['name'];
                                            //header('location:blog.php?result=login_success');
                                           echo '<script>window.location.href="user/manage_blog.php?result=loginsuccess"</script>';


                                        }else{
                                            echo "Username or Password invalid" ;
                                        }

                                    

                                    }
                                    
                                }
                                
                            }
                            ?>

                        </form>

                        </div>
                </div>
                <div class="col-sm-6">
                    <div class="register-form-inner">
                        <h3 class="category-headding ">REGISTER NOW!</h3>
                        <div class="headding-border bg-color-1"></div>
                    <div id="mtoast" onclick="this.style.display='none'"></div>
                        <form method = "POST">
                            <label>Name <sup>*</sup></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" ' required>
                            <label>Email <sup>*</sup></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" ' required>
                            <label>Password <sup>*</sup></label>
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Write Your Password Here ..." onchange='pwd_check()' required>
                            <label>Repeat Password <sup>*</sup></label>
                            <input type="password" class="form-control" id="repwd" name="repwd" placeholder="Rewrite Your Password Here ..." onchange='pwd_check()' required>
                            <p id='password_status'></p>
                            <button type="submit" value='Toast' name="reg" id="submit" class="btn btn-style" onclick="mtoast('Registration Successful! You can login to account')"; disabled>Register Now!</button>

<?php


                             
  
   if(isset($_POST ["reg"])){
      
    $nme=$_POST['name'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $repwd=$_POST['repwd'];
    // if ($pwd===$repwd ){
         $query="INSERT INTO system_users (name,email,password,status) VALUES ('$nme','$email','$pwd','1')";
          if (mysqli_query($connect,$query)){
            
              echo '<script>alert("Registration Successful! You can login to account");</script>';
              echo '<script>window.location.href="login.php?result=success"</script>';
                //echo '<script>mtoast("hi")</script>';

            }else {
                echo '<script>alert("Error");</script>';
            }
       }
       
    
    //}
    // else{
    //     echo '<p class="login-box-msg text-danger">Password did not match</p>';
   // }

     ?> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
</body>
<script>
//     function pwd_check(){
//     if (document.getElementById('pwd').value==document.getElementById('repwd').value){
//         document.getElementById('submit').disabled=false;
//     }else {
//         confirm.setCustomValidity('Password Not Match');
//         document.getElementById('submit').disabled=true;
//     }
// }
var confirmField = document.getElementById("repwd");
var passwordField = document.getElementById("pwd");

function pwd_check(){
    var status = document.getElementById("password_status");
    var submit = document.getElementById("submit");

    status.innerHTML = "";
    submit.removeAttribute("disabled");

    if(confirmField.value === "")
        return;

    if(passwordField.value === confirmField.value)

        return;

    status.innerHTML = "Passwords don't match";
    submit.setAttribute("disabled", "disabled");
}

passWordField.addEventListener("change", function(event){
    checkPasswordMatch();
});
confirmField.addEventListener("change", function(event){
    checkPasswordMatch();
});
function mtoast (msg) {
    var toast=document.getElementById("mtoat");
    toast.innerHTML=msg;
    toast.classList.add("show");
}
</script>
<?php include('footer.php');?>
</html>