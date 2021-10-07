<?php

include 'config.php';
session_start();
if(isset($_POST['submit'])){

    $email = $_POST['email_address'];
    $password = $_POST['password'];

   //var_dump($email);
    $sql = "select * from users where email='$email' and password = '$password'";

    $result=mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    
    if(mysqli_num_rows($result)>0){
        echo "<script> location.href = 'home.php' </script>";
    }
    


}