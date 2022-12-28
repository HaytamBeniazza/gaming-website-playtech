<?php
include_once "connexion.php";



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="admin.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title class="add-title">products crud</title>
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
                <a class="nav-link text-light" href="games.php">Games</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" aria-current="page" href="accesories.php">Accesories</a>
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

    <h1 style="margin-left:10%; margin-top:2%">Create new Product</h1>

    <p>
        <a style="margin-left:10%" href="dashboard.php" class="btn btn-success"><--</a>
    </p>
	


    <?php

    if (isset($_POST['submit'])) {
      if (empty(trim($_POST['productN']))) {
        $errors[] = 'Product title is required';
    } else {


        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/gaming-playtech/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            $taza = "uploads/" . $_FILES["fileToUpload"]["name"];
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    extract($_POST);
    {
        $req = mysqli_query($con, "INSERT INTO `product` (`id`, `productName`, `quantity`, `price`, `cat_id`, `image`, `filter`) VALUES (NULL, '$productN', '$quantity','$price', '$select', '$taza', '$filter')");
    if ($req) {
        header("location: dashboard.php");
    } else {
        $message = "produit non ajouté";
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
            <input type="file" name="fileToUpload" required>
        </div>
        <div class="form-group">
            <label>Product Title :</label>
            <input type="text" name="productN" class="form-control" value='' required >
            <?php 
            if (empty($_POST['name'])) {
                echo "The name field is empty";
            } else {
              echo "The name field is not empty";
            }
            ?>
        </div>
        <div class="form-group">
            <label>Product Quantity :</label>
            <input type="number" step=".01" class="form-control" name="quantity" required min=0>
        </div>
        <div class="form-group">
            <label>Product Price :</label>
            <input type="number" step=".01" class="form-control" name="price" required min=0>
        </div>
        <select  class="form-control" name="select" required>
                <option selected disabled value="">Select an option</option>
                <?php
                $req1 = "SELECT * FROM `category` ";
                $result = $con->query($req1);

                while ($key = $result->fetch_assoc()) {
                    echo "<option value=" . $key['id'] . ">" . $key['type'] . "</option>";
                }

                ?>

            <input style="margin-top: 50px; background-color:black; color:white; margin-bottom:100px;" type="submit" value="Ajouter" name="submit">

    </form>
  </body>
</html>