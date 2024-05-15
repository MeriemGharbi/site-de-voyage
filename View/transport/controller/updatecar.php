<?php
include_once "../config.php";

if(isset($_POST['send'])) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", ""); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        extract($_POST);
        $sql = "UPDATE car SET marque = ?, modele = ?, annee = ?, prix_journee = ?, couleur = ?, type = ?, disponibilite = ?, image = ? WHERE id_voiture = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$marque, $modele, $annee, $prix_journee, $couleur, $type, $disponibilite, $image, $id_voiture]);
        
        header("location:../view/showCar.php");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM car WHERE id_voiture = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id_voiture']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style1.css">
    <title>Update Car</title>
</head>
<body>
<div class="container">
   <!-- Navigation -->
   <div class="navigation">
   <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                           <!-- <ion-icon name="logo-apple"></ion-icon>-->
                        </span>
                        <span class="title">
                            <div class="official">
                            Xplore
                            </div>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="user">
                            <img src="../view/backoffice/img/user.png">
                            </div>
                        </span>
                        <span class="title">User</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/sale.png">
                            </div>
                        </span>
                        <span class="title">offers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/activity.png">
                            </div>
                        </span>
                        <span class="title">activities</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/car.png">
                            </div>
                        </span>
                        <span class="title">Car rent</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                    <span class="icon">
                        <div class ="user">
                            <img src="../view/backoffice/img/pay.png">
                            </div>
                        </span>
                        
                        <span class="title">Payement</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/comment.png">
                            </div>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/exit.png">
                            </div>
                        </span>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
            <a href="../view/index1.html"><button type="button" class="btn1"><span></span>Return</button></a>
   </div>
        
   <!-- Main content -->
   <div class="main">
   <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search for reservation here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="logo">
                <img src="../view/img/xplore.png" alt="">
                </div>
            </div>
    
        <form action="" method="post">
            <div class="form">
                <div class="text-center">
                    <h1>Update Car</h1>
                </div>
                <label for="marque">Brand:</label>
                <input type="text" name="marque" placeholder="Brand" value="<?php echo $row['marque']; ?>">
   
                <label for="modele">Model:</label>
                <input type="text" name="modele" placeholder="Model" value="<?php echo $row['modele']; ?>">

                <label for="annee">Year:</label>
                <input type="text" name="annee" placeholder="Year" value="<?php echo $row['annee']; ?>">

                <label for="prix_journee">Price per Day:</label>
                <input type="text" name="prix_journee" placeholder="Price per Day" value="<?php echo $row['prix_journee']; ?>">

                <label for="couleur">Color:</label>
                <input type="text" name="couleur" placeholder="Color" value="<?php echo $row['couleur']; ?>">

                <label for="type">Type:</label>
                <input type="text" name="type" placeholder="Type" value="<?php echo $row['type']; ?>">

                <label for="disponibilite">Availability:</label>
                <input type="text" name="disponibilite" placeholder="Availability" value="<?php echo $row['disponibilite']; ?>">

                <label for="image">Image URL:</label>
                <input type="text" name="image" placeholder="Image URL" value="<?php echo $row['image']; ?>">

                <input type="hidden" name="id_voiture" value="<?php echo $row['id_voiture']; ?>">
                <input type="submit" value="Update" name="send">
                <a class="link back" href="../view/showcar.php">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script src="car.js"></script>
<script src="../view/backoffice/assets/js/main.js"></script>
   <!-- =========== Scripts =========  -->

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

