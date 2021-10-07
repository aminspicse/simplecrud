<?php

include 'config.php';

if(!$_SESSION['id']){
    echo "<script> location.href = 'login.php' </script>";
}

if(isset($_POST['submit'])){

    $name = $_POST['full_name'];
    $email = $_POST['email_address'];
    $password = $_POST['password'];

   
    $sql = "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$password')";

    mysqli_query($conn,$sql);
}