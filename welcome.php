<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './webinclude/head.php' ?>
</head>

<body>

    <?php require_once './webinclude/usernav.php' ?>

    <div class="container intro">
        <div class="heading">
            <h1>Miss AI World Beauty</h1>
        </div>
        <div class="sub-heading">
            <h6>AI world beauty Contest</h6>
        </div>
    </div>


    <!-- MAIN POSTS -->
    <?php require_once './webinclude/mainposts.php' ?>




    <?php require_once './webinclude/footer.php' ?>
</body>

</html>