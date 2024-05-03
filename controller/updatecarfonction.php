<?php
// Include your database configuration file
include_once "../config.php";

if(isset($_POST['update'])){
    // Retrieve form data
    $id_voiture = $_POST['id_voiture'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix_journee = $_POST['prix_journee'];
    $couleur = $_POST['couleur'];
    $type = $_POST['type'];
    $disponibilite = $_POST['disponibilite'];

    // Check if image field is empty
    if($_FILES['image']['size'] == 0) {
        // Image field is not updated, retain the existing image
        $stmt_select = $con->prepare("SELECT image FROM car WHERE id_voiture = ?");
        $stmt_select->bind_param("i", $id_voiture);
        $stmt_select->execute();
        $stmt_select->bind_result($existingImageData);
        $stmt_select->fetch();
        $stmt_select->close(); // Close the SELECT statement
        $image = $existingImageData;
    } else {
        // File upload
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $image = "uploadImage/".$img_name;
        move_uploaded_file($img_loc,'uploadImage/'.$img_name); 
    }

    // Update the record using prepared statements
    $stmt_update = $con->prepare("UPDATE `car` SET `marque`=?, `modele`=?, `annee`=?, `prix_journee`=?, `couleur`=?, `type`=?, `disponibilite`=?, `image`=? WHERE id_voiture = ?");
    $stmt_update->bind_param("ssssssssi", $marque, $modele, $annee, $prix_journee, $couleur, $type, $disponibilite, $image, $id_voiture);
    $stmt_update->execute();
    $stmt_update->close(); // Close the UPDATE statement

    header("location:showcar.php");
}
?>
