<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header('location:signin.php');
}
require_once '../connection.php';

$sql = "SELECT * FROM userregister";

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
    <title>allusers</title>
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



      <table class="table" style="color: white;">
  <thead>
    <tr>
      <th>id</th>
      <th>username</th>
      <th>email</th>
      <th>date created</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $main){ ?>
    <tr>
      
      <td>
        <?php echo $main["id"]; ?>
      </td>
      <td>
        <?php echo $main["username"]; ?>
      </td>
      <td>
        <?php echo $main["email"]; ?>
      </td>
      <td>
        <?php echo $main["date"]; ?>
      </td>
      <td>
      <a href="deletuser.php?id=<?php echo $main["id"] ?>" class="btn btn-primary">delete</a>
      </td>

    </tr>
    <?php } ?>
  </tbody>
</table>










      <?php require_once './includes/footer.php' ?>
      <!-- Footer End -->
    </div>
    <!-- Content End -->
  </div>
    
</body>
</html>