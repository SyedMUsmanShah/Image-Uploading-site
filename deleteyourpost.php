<?php

require_once './connection.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM post WHERE id=$id";

    $res = mysqli_query($connection, $sql);

    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_array($res)){
            $data[] = $row;
        }
        $data = array_shift($data);
        $image = $data["image"];
    }
    unlink('./images/' . $image);
    
    $sqli = "DELETE FROM post WHERE id=$id";
    $res2 = mysqli_query($connection, $sqli);


    // deleting-multiple-images 

    $multisql = "SELECT * FROM multipleimages WHERE postid = $id";
    $multiresult = mysqli_query($connection, $multisql);

    if(mysqli_num_rows($multiresult)>0){
        while($multirow = mysqli_fetch_array($multiresult)){
            $multidata[] = $multirow;
        }
    }
    foreach($multidata as $mainmultidata){

        unlink('./images/' . $mainmultidata["images"]);
    }
    
    $multisqli = "DELETE FROM multipleimages WHERE postid = $id";
    $multires = mysqli_query($connection, $multisqli);



    header("location:yourposts.php");
}

?>