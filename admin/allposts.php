<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header('location:signin.php');
}

require_once '../connection.php';

$sql = "SELECT * FROM post ORDER BY vote DESC";

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
    <title>allposts</title>
    <?php require_once './includes/head.php' ?>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php require_once './includes/sidebar.php' ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require_once './includes/navbar.php' ?>
            <!-- Navbar End -->


            <div class="container col-12">
                <div class="row">

                    <?php foreach ($data as $main) { ?>

                        <div class="updatepost col-4 col-md-4 col-sm-4 col-lg-3 mt-5">
                        <div class="post-masonry">
                            <div class="post-thumb">
                                <!-- Button trigger modal -->
                                <img src="../images/<?php echo $main["image"] ?>" alt="">

                                <div class="post-hover text-center">
                                    <div class="inside">
                                        <span class="date"></span>
                                        <h4><a href="detailposts.php?id=<?php echo $main ["id"] ?>"><?php echo $main["title"] ?></a></h4>
                                        <p><?php echo $main["description"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.post-masonry -->
                        <div class="text-center">
                            <a href="deletpost.php?id=<?php echo $main["id"] ?>" class="btn btn-primary">delete</a>
                        </div>
                    </div>

                    <?php } ?>
                    
                </div>
                
            </div>











            <?php require_once './includes/footer.php' ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>

</body>

</html>