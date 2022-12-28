<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Work+Sans:400,600" rel="stylesheet">
	<!-- <link rel="stylesheet" href="./nav.css"> -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<title>PlayTech</title>
	<link rel="stylesheet" href="navBar.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
				<div>
	 				<a class="website_logo" href="index1.php">
	 					<img class="resizingLogo" src="gallery pic/playtech_logo.png">
	 				</a>
	 			</div>
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="index1.php">Home</a>
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
      
      <div class="container">

      <?php
        include_once 'admin/connexion.php';
        $req = mysqli_query($con, "SELECT * FROM `product` WHERE `cat_id`= 3");
        $rows = $req->fetch_all(MYSQLI_ASSOC);
        $space = " &ensp; &ensp;";
        $space2 =  $space ." : " . $space;
            foreach ($rows as $row) { 
                ?>
            
        <div class="filterDiv <?= $row['filter'] ?>"><img src="<?php echo $row['image'] ?>" alt="">
                <p> ProductName  <?php echo $row['productName'] ?></p>
                <p> Price   <?php echo $row['price'] ?> DH</p>
                <p> Quantity <?php echo $row['quantity'] ?></p>
            </div>
    
        <?php 
        }
    
        ?>
      </div>
      

    <footer>
        <div class="footer-all">
            <h3>follow us</h3>
            <li class="socialm">
                <ul> <a href="#"><img id="media" src="./pictures/insta__1_-removebg-preview.png" alt=""></a></ul>
                <ul> <a href="#"><img id="media" src="./pictures/insta__2_-removebg-preview.png" alt=""></a></ul>
                <ul> <a href="#"><img id="media" src="./pictures/twit-removebg-preview.png" alt=""></a></ul>
                <ul> <a href="#"><img id="media" src="./pictures/yt-removebg-preview.png" alt=""></a></ul>
            </li>
            <dd class="infofooter" >
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>

            </dd>
            
        </div>
     </footer>
     <script src="js/app.js"></script>
</body>
</html>