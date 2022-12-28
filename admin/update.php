<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">

    <title>products crud</title>
  </head>
  <body>

  
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
				<div>
	 				<a class="website_logo" href="../index1.php">
	 					<img class="resizingLogo" src="../gallery pic/playtech_logo.png">
	 				</a>
	 			</div>
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="../index1.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="../games.php">Games</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" aria-current="page" href="../accesories.php">Accesories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="./admin/login.php" tabindex="-1" aria-disabled="true">Admin</a>
              </li>
            </ul>
            <!-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <h1 style="margin-left:10%;margin-top:2%">Create new Product</h1>

    
    <p>
        <a href="dashboard.php" class="btn btn-success" style="margin-left:10%"><--</a>
    </p>



    <?php

         
          include_once "connexion.php";
         
          $id = $_GET['id'];

          $req = mysqli_query($con , "SELECT * FROM product WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       
       if(isset($_POST['submit'])){
        if(!empty($image)){
          $req = mysqli_query($con, "UPDATE product SET productName = '$productN' , quantity = '$quantity' , price = '$price' , image = '$image' WHERE id = $id");

        }else{
          if (empty(trim($_POST['productN']))) {
            $errors[] = 'Product title is required';
        } else{
           
           extract($_POST);

            if((!empty(trim($productN))) && ((!empty($quantity)) && ($quantity>0)) && ((!empty($price)) && ($price>0))){
               
               $req = mysqli_query($con, "UPDATE product SET productName = '$productN' , quantity = '$quantity' , price = '$price' WHERE id = $id");
                if($req){
                    header("location: dashboard.php");
                }else {
                  $errors[] = 'Product did not updated fill, the form correctly.';
                }

           }else {
               
              $errors[] = 'Fill the form correctly';
           }
           
           
       }
      }
    }
    
    ?>



<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error): ?>
        <div><?php echo $error ?></div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>


    <form action="" method="post" enctype="multipart/form-data" style="width:80%; margin-left:10%">
        <div class="form-group">
            <label>Product Image :</label>
            <br>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label>productName</label>
            <input type="text" name="productN" class="form-control" required value="<?=$row['productName']?>">
        </div>
        <div class="form-group">
            <label>quantity</label>
            <input type="number" class="form-control" name="quantity" required min=1 value="<?=$row['quantity']?>">
        </div>
        <div class="form-group">
            <label>price</label>
            <input type="number" name="price" class="form-control" required min=1 value="<?=$row['price']?>">
        </div>
        <button type="submit" value="Modifier" name="submit" class="btn" style="background-color:black;color: white;">Submit</button>
    </form>
  </body>
</html>