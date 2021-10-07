<?php
include 'config.php';
session_start();

    if(!$_SESSION['id']){
        echo "<script> location.href = 'login.php' </script>";
    }


    $id = $_GET['fid'];

    $sql = "DELETE FROM FOOD WHERE ID = '$id'";
    if(mysqli_query($conn,$sql)){
        echo "<script> alert('Deleted') </script>"; 
        echo "<script> location.href = 'home.php' </script>"; 
    }

    //$row = mysqli_fetch_array($result);

?>