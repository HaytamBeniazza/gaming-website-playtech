<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
				<div>
	 				<a class="website_logo" href="../index1.php">
	 					<img class="resizingLogo" src="../gallery pic/playtech_logo.png">
	 				</a>
	 			</div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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


    

<?php

         
          include_once "connexion.php";
         
          $id = $_GET['id'];

          $req = mysqli_query($con , "SELECT * FROM product WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       
       if(isset($_POST['submit'])){
           
           extract($_POST);
           if($price<=0 || $quantity<=0)
           {
            header('Location:error.php');
           }else{
            if(isset($productN) && isset($quantity) && isset($price)){
               
               $req = mysqli_query($con, "UPDATE product SET productName = '$productN' , quantity = '$quantity' , price = '$price' WHERE id = $id");
                if($req){
                    header("location: index.php");
                }else {
                    $message = "produit non modifié";
                }

           }else {
               
               $message = "Veuillez remplir tous les champs !";
           }
           }
           
       }
    
    ?>

    <div class="form">
        <a href="dashboard.php" class="back_btn"><img src="../images/back.png" style="height: 20px; height:20px;"> Retour</a>
        <h2>Modifier produit : <?=$row['productName']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>productName</label>
            <input type="text" name="productN" required value="<?=$row['productName']?>">
            <label>quantity</label>
            <input type="number" name="quantity" required min=1 value="<?=$row['quantity']?>">
            <label>price</label>
            <input type="number" name="price" required min=1 value="<?=$row['price']?>">
            <input type="submit" value="Modifier" name="submit">
            
        </form>
    </div>
</body>
</html>