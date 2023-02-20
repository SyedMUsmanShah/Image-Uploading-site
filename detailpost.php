<?php 
session_start();

require_once './connection.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM post WHERE id = $id";

    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
    }
  

    $sqli = "SELECT * FROM multipleimages WHERE postid = $id";
    $res = mysqli_query($connection, $sqli);

    if(mysqli_num_rows($res)>0){
        while($rows = mysqli_fetch_assoc($res)){
            $multidata[] = $rows;
        }
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detailpost</title>
    <?php require_once './webinclude/head.php' ?>
    <style>
        *{
            color: white;
        }
    </style>
</head>
<body>
<div class="fixed z-20 w-screen h-12 items-center bg-zinc-900 backdrop-blur bg-opacity-80 flex px-3 md:px-6 justify-between">
        <div class="flex items-center justify-start flex-1">
            <a href="home.php" class="h-12 flex items-center cursor-pointer logo">
                MISS AI WORLD BEAUTY
            </a>
            
        </div>
        

    </div>
<?php foreach($data as $main){ ?>
    <div class="col-12 row detailpost-box">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="col-8 container detailpost-title">
                <h1><?php echo $main["title"] ?></h1>
            </div>
            <div class="col-12 container detailpost-description">
                <h6><?php echo $main["description"] ?></h6>
            </div>

            <div class="col-12 col-md-6 contact-Publisher container">
                contact Publisher: <a href="<?php echo $main["social"] ?>" target="_blank" rel="noopener noreferrer"><img src="./images/icons8-contact-us-64.png" alt="" srcset=""></a>
            </div>
            <div class="detailpost-vote col-12">
                <?php

                    if(isset($_POST["vote"]) && !isset($_SESSION["voted"])){
                        $_SESSION["voted"] = true;

                        $exevote = $main["vote"];
                        $add = 1;
                        $totalvotes = $exevote + $add;
                        
                        
                        $update = "UPDATE post SET vote ='$totalvotes' WHERE id = '$id'";

                        $voteres = mysqli_query($connection, $update);
                        
                    }
                ?>
                <form action="" method="post">
            <button type="submit" name="vote" class="vote btn btn-primary">VOTE</button><span class="vote-count"><?php echo $main["vote"] ?></span><span class="vote-count-title">Votes</span>
            </form>
        </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 row">
            
            <?php foreach($multidata as $multimain){ ?>
            <div class="col-6 col-sm-6 col-md-4 col-lg-4 detailpost-multiImages">
                <img src="./images/<?php echo $multimain["images"] ?>" alt="" srcset="">
            </div>
            <?php } ?>
        </div>

        
    </div>
<?php } ?>

    <?php require_once './webinclude/footer.php' ?>
</body>
</html>