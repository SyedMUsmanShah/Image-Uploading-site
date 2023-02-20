<?php

session_start();

require_once './connection.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header('location:login.php');
}

$user = $_SESSION["Username"];

$sql = "SELECT * FROM post WHERE username = '$user'";

$res = mysqli_query($connection, $sql);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>your posts</title>
    <?php require_once './webinclude/head.php' ?>
</head>

<body>
    <?php require_once './webinclude/usernav.php' ?>


    <div class="main-posts">
        <div class="container">
            <div class="row">

                <?php foreach ($data as $main) { ?>
                    <?php
                    $id = $main["id"];
                    $sqli = "SELECT * FROM multipleimages WHERE postid = $id";
                    $result = mysqli_query($connection, $sqli);

                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $multidata[] = $rows;
                        }
                    }

                    ?>
                    <div class="updatepost col-4 col-md-4 col-sm-4 col-lg-3 mt-5">
                        <div class="post-masonry">
                            <div class="post-thumb">
                                <!-- Button trigger modal -->
                                <img src="./images/<?php echo $main["image"] ?>" alt="">

                                <div class="post-hover text-center">
                                    <div class="inside">
                                        <span class="date"></span>
                                        <h4><a href="detailpost.php?id=<?php echo $main ["id"] ?>"><?php echo $main["title"] ?></a></h4>
                                        <p><?php echo $main["description"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.post-masonry -->
                        <div class="text-center">
                            <a href="deleteyourpost.php?id=<?php echo $main["id"] ?>" class="btn btn-primary">delete</a>
                        </div>
                    </div>



                <?php } ?>
            </div>
        </div>



        <?php require_once './webinclude/footer.php' ?>
</body>

</html>