<?php

    include 'config.php';

    session_start();

    if(!$_SESSION['id']){
        echo "<script> location.href = 'login.php' </script>";
    }


    if(isset($_POST['submit'])){
        $name = $_POST['food_name'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];

        if(move_uploaded_file($_FILES['image']['tmp_name'],"file/".$_FILES['image']['name'])){
           
           $sql = "INSERT INTO `food`(`name`, `price`, `image`) VALUES ('$name','$price','file/$image')";

           mysqli_query($conn,$sql);

           echo "<script> location.href = 'home.php' </script>";
        }
    }