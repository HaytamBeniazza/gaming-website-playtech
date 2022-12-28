<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="../index1.php" class="back_btn"><img src="../images/back.png"> Retour</a>
    <div class="container2">
        <a href="ajouter.php" class="Btn_add"> <img src="../images/plus.png"> Ajouter</a>
        
        <table>
            <tr id="items">
                <th>productName</th>
                <th>Quantity</th>
                <th>price</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                
                include_once "connexion.php";
                
                $req = mysqli_query($con , "SELECT * FROM product");
                if(mysqli_num_rows($req) == 0){
                    
                    echo "Il n'y a pas encore de prout ajouter !" ;
                    
                }else {
                    
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['productName']?></td>
                            <td><?=$row['quantity']?></td>
                            <td><?=$row['price']?>DH</td>
                            
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="../images/pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="../images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </div>
        
</body>
</html>