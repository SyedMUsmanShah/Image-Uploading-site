<?php

session_start();

require_once 'connection.php';

if(isset($_POST["rsubmit"])){
    $Username = $_POST["rusername"];
    $email = $_POST["remail"];
    $password = $_POST["rpassword"];

    $sql = "INSERT INTO userregister (username,email,password) VALUE ('$Username','$email','$password')";

    mysqli_query($connection, $sql);
    header('location:login.php');
}



// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:welcome.php");

}


if(isset($_POST["lsubmit"])){
    $lusername = $_POST["lusername"];
    $lemail = $_POST["lemail"];
    $lpassword = $_POST["lpassword"];

    $sqli = "SELECT * FROM userregister WHERE email='$lemail' AND password='$lpassword'";

    $res = mysqli_query($connection, $sqli);

    if(mysqli_num_rows($res)>0){
        
		$_SESSION["loggedin"] = true;
        $_SESSION["Username"] = $lusername;
        header('location:welcome.php');
    }
    else{
        echo "wrong email or password";
    }
    
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <?php require_once './webinclude/head.php' ?>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php require_once './webinclude/navbar.php' ?>
<div class="lr-wrapper" align="center">
              <div class="lr-content">
                <div class="lr-head">
                  <div class="lr-l_b" id="login" onClick>
                    <div></div>
                    <span>Login</span>
                  </div>
                  <div class="lr-r_b" id="register">
                    <div></div>
                    <span>SignUp</span>
                  </div>
                </div>
                <div class="lr-main">
                  <form method="post" id="l-f" action="">
                    <input type="text" id="username_login" name="lusername" class="l-username" placeholder="Username" required/>
                    <input type="email" id="l-email" class="l-email" name="lemail" placeholder="Email" required/>
                    <input type="password" id="password_login" name="lpassword" class="l-password" placeholder="Password" required/>
                    <input type="submit" name="lsubmit" class="lsubmit" value="Login"/>
                    <a href="forget.php" class="forgetpassword">Forget your password?</a>
                  </form>
                  <form method="post" id="r-f" action="">
                    <input type="email" id="r-email" class="r-email" name="remail" placeholder="Email" required/>
                    <input type="text" id="username_register" name="rusername" class="r-username" placeholder="Username" required/>
                    <input type="password" id="password_register" name="rpassword" class="r-password" placeholder="Password" required/>
                    <input type="password" id="password_register" name="rconfpassword" class="r-confpassword" placeholder="Confirm Password" required/>
                    <p class="msg2"></p>
                    <input type="submit" name="rsubmit" class="r-submit" value="Sign Up"/>
                  </form>
                </div>
              </div>
            </div>





            <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script>
      $(document).ready(function(){
        $("#register").click(function(){
          $("#login").css("background-color", "#ecf0f1");
          $("#login > span").css("color", "#333");
          $("#register").css("background-color", "#e74c3c");
          $("#register > span").css("color", "white");
          $("#l-f").toggle(500);
          $("#r-f").toggle(1000);
        })
        $("#login").click(function(){
          $("#register").css("background-color", "#ecf0f1");
          $("#register > span").css("color", "#333");
          $("#login").css("background-color", "#e74c3c");
          $("#login > span").css("color", "white");
          $("#l-f").toggle(1000);
          $("#r-f").toggle(500);
        })



        $(".r-confpassword").keyup(function(){
            $password = $(".r-password").val()
            $repassword = $(".r-confpassword").val()
            if ($password != $repassword){
                $(".msg2").text("Password do not match").css({"color":"red", "font-size":"15px"})
            }
            else {
                $(".msg2").text("Password match").css({"color":"green", "font-size":"15px"})
            }
        })
        $(".r-password").keyup(function(){
            $password = $(".r-password").val()
            $repassword = $(".r-confpassword").val()
            if ($password != $repassword){
                $(".msg2").text("Password do not match").css({"color":"red", "font-size":"15px"})
            }
            else {
                $(".msg2").text("Password match").css({"color":"green", "font-size":"15px"})
            }
        })


      });
</script>
</body>
</html>