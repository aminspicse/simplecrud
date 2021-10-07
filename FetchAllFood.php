<?php
include 'config.php';
session_start();

    if(!$_SESSION['id']){
        echo "<script> location.href = 'login.php' </script>";
    }

    $sql = "select * from food";
    $result = mysqli_query($conn,$sql);

    //$row = mysqli_fetch_array($result);


    while($row = mysqli_fetch_array($result)){

        echo $row['id'];
    }