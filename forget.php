<?php  

require_once './connection.php';

if(isset($_POST["rsubmit"])){
    $Username = $_POST["rusername"];
    $email = $_POST["remail"];
    $password = $_POST["rpassword"];

    $updatepassword = "UPDATE userregister SET password = '$password' WHERE username = '$Username' AND email = '$email'";


    mysqli_query($connection, $updatepassword);
    header('location:login.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget password</title>
    <?php require_once './webinclude/head.php' ?>
</head>

<body>
<div class="container forgetcontainer">

<form method="post" id="" action="">
                    <input type="email" id="r-email" class="r-email" name="remail" placeholder="Email" required/>
                    <input type="text" id="username_register" name="rusername" class="r-username" placeholder="Username" required/>
                    <input type="password" id="password_register" name="rpassword" class="r-password" placeholder="New Password" required/>
                    <input type="password" id="password_register" name="rconfpassword" class="r-confpassword" placeholder="Confirm New Password" required/>
                    <p class="msg2"></p>
                    <input type="submit" name="rsubmit" class="r-submit" value="Proceed"/>
                  </form>
                  </div>


    <?php require_once './webinclude/footer.php' ?>
    <script>
        $(document).ready(function(){
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
        })
    </script>
</body>

</html>