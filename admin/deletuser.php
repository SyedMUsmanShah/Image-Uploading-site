<?php

require_once '../connection.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM userregister WHERE id=$id";

    $res = mysqli_query($connection, $sql);

    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_array($res)){
            $data[] = $row;
        }
        $data = array_shift($data);
    }
    
    $sqli = "DELETE FROM userregister WHERE id=$id";
    $res2 = mysqli_query($connection, $sqli);

    header("location:allusers.php");
}

?>