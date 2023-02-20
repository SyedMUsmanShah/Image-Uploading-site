<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header('location:login.php');
}
$user = $_SESSION["Username"];

require_once './connection.php';

if(isset($_POST["post"])){
    
    $image = $_FILES["image"]["name"];
    $tmp_image = $_FILES["image"]["tmp_name"];
    move_uploaded_file($tmp_image, './images/' . $image);
    $title = $_POST["title"];
    $description = $_POST["description"];
    $social = $_POST["social"];
    $username = $user;

    $sqli = "INSERT INTO post (image,title,description,username,social) VALUE ('$image','$title','$description','$username','$social')";
    mysqli_query($connection, $sqli);

    $postID = mysqli_insert_id($connection);

    foreach($_FILES['Multipleimages']['tmp_name'] as $key => $value){
        $detailimages = $_FILES["Multipleimages"]["name"][$key];
        $tmp_detailimages = $_FILES["Multipleimages"]["tmp_name"][$key];
        move_uploaded_file($tmp_detailimages, './images/' . $detailimages);

    $insert = "INSERT INTO multipleimages (images,postid) VALUE ('$detailimages','$postID')";

    mysqli_query($connection,$insert);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once './webinclude/head.php' ?>
    <style>
        
    </style>
</head>

<body>
    <?php require_once './webinclude/usernav.php' ?>


    <div class="post-box">
        <form action="" method="post" enctype="multipart/form-data">
        <h1 class="creat-post-heading">Creat Post</h1>
        <div class="f-file">
            <label for="">Upload main image</label><input type="file" name="image" id="" class="images">
        </div>
        <div class="s-file">
            <label for="">Upload Multiple images related to your post image</label><input type="file" name="Multipleimages[]" id="" class="images" multiple>
        </div>
        <input type="text" class="title" name="title" id="" placeholder="Enter Title">
        <textarea name="description" id="" cols="30" rows="10" class="description" placeholder="Enter Description"></textarea>
        <input type="text" name="social" id="" class="social" placeholder="Paste your any social media link to get contacted by viewrs">

        <button type="submit" class="btn post" name="post">POST</button>
    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js" integrity="sha512-igl8WEUuas9k5dtnhKqyyld6TzzRjvMqLC79jkgT3z02FvJyHAuUtyemm/P/jYSne1xwFI06ezQxEwweaiV7VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>