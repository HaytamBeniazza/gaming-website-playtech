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
                <a class="nav-link text-light" href="login.php" tabindex="-1" aria-disabled="true">Admin</a>
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




    <h1 style="margin-left:10%; margin-top:2%">Products crud</h1>

    <p>
        <a style="margin-left:10%" href="../index1.php" class="btn btn-primary"><--</a>
        <a href="add.php" class="btn btn-success">Create Product</a>
    </p>

    <table class="table" style="width:80%; margin-left:10%">
        <thead>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
        include_once "connexion.php";
                
                $req = mysqli_query($con , "SELECT * FROM product");
                if(mysqli_num_rows($req) == 0){
                    
                    ?> <h6 style="margin-left:10%">Il n'y a pas encore de prouduit !</h6>
                    <?php
                    
                }else {
                    
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['productName']?></td>
                            <td><?=$row['quantity']?> Item</td>
                            <td><?=$row['price']?>DH</td>
                            
                            <td><a href="update.php?id=<?=$row['id']?>"><img src="../images/pen.png" style="width: 20px; height:20px; margin-right: 20px;"></a> <a href="supprimer.php?id=<?=$row['id']?>"><img src="../images/trash.png" style="width: 20px; height:20px;"></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
    </table>
  </body>
</html>