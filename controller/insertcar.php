<?php
include_once "../config.php";

if(isset($_POST['upload'])){
    try {
        $MARQUE = $_POST['marque'];
        $MODELE = $_POST['modele'];
        $ANNEE = $_POST['annee'];
        $PRIX_JOURNEE = $_POST['prix_journee'];
        $COULEUR = $_POST['couleur'];
        $TYPE = $_POST['type'];
        $DISPONIBILITE = $_POST['disponibilite'];
        $image = $_FILES['image'];
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "uploadImage/".$img_name;
        move_uploaded_file($img_loc, 'uploadImage/'.$img_name);

        $pdo = new PDO("mysql:host=localhost;dbname=2a41", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO `car` (`marque`, `modele`, `annee`, `prix_journee`, `couleur`, `type`, `disponibilite`, `image`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $MARQUE);
        $stmt->bindParam(2, $MODELE);
        $stmt->bindParam(3, $ANNEE);
        $stmt->bindParam(4, $PRIX_JOURNEE);
        $stmt->bindParam(5, $COULEUR);
        $stmt->bindParam(6, $TYPE);
        $stmt->bindParam(7, $DISPONIBILITE);
        $stmt->bindParam(8, $img_des);
        $stmt->execute();
        header("Location: showcarfront.php");
        exit(); 
    } catch(PDOException $e) {
    
        echo "Error: " . $e->getMessage();
    }
}
?>
