<?php
include 'config.php';
session_start();

    if(!$_SESSION['id']){
        echo "<script> location.href = 'login.php' </script>";
    }

    $sql = "select * from food";
    $result = mysqli_query($conn,$sql);

    //$row = mysqli_fetch_array($result);

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>CRUD</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <a class="navbar-brand" href="#">CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

    </div>
    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Welcome to <?php echo $_SESSION['name'] ?></h1>
                    <div class="card">
                        <div class="card-header">Add Food</div>
                        <div class="card-body">
                            <form name="my-form" action="AddFood.php" method="post" enctype="multipart/form-data">
                                

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Food Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="food_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Price</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="price">
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Picture</label>
                                    <div class="col-md-6">
                                        <input type="file" id="email_address" class="form-control" name="image">
                                    </div>
                                </div>
                            
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                        Add Food
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        <table class="container table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <th><?= $row['id']?></th>
                    <td><?= $row['name']?></td>
                    <td><?= $row['price']?></td>
                    <td><img src="<?= $row['image']?>" alt="" height="50px"></td>
                    <td>
                        <a href="editfood.php?fid=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
                        <a href="deletefood.php?fid=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>