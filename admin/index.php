<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header('location:signin.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
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




    <div class="hello" style="height: 100vh;">

    </div>









      <?php require_once './includes/footer.php' ?>
      <!-- Footer End -->
    </div>
    <!-- Content End -->
  </div>
</body>

</html>