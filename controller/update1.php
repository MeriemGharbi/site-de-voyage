<?php
include_once "../config.php";

if(isset($_POST['update'])){
    // Retrieve form data
    $ID_ACT = $_POST['id_act'];
    $NOM_ACTIVITY = $_POST['nom_activity'];
    $DESCRIPTION = $_POST['description'];
    $LIEU = $_POST['lieu'];
    $DATE = $_POST['date'];
    $DATE_DEBUT = $_POST['date_debut'];
    $DATE_FIN = $_POST['date_fin'];
    $PRIX = $_POST['prix'];
    $CAPACITY_MAX = $_POST['capacity_max'];
    $ID_CATEGORY = $_POST['id_category'];
    $DURATION = $_POST['duration'];

    // Check if image field is empty
    if($_FILES['image']['size'] == 0) {
        // Image field is not updated, retain the existing image
        $stmt_select = $con->prepare("SELECT image FROM activity WHERE id_act = ?");
        $stmt_select->bind_param("i", $ID_ACT);
        $stmt_select->execute();
        $stmt_select->bind_result($existingImageData);
        $stmt_select->fetch();
        $stmt_select->close(); // Close the SELECT statement
        $img_des = $existingImageData;
    } else {
        // File upload
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "uploadImage/".$img_name;
        move_uploaded_file($img_loc,'uploadImage/'.$img_name); 
    }

    // Update the record using prepared statements
    $stmt_update = $con->prepare("UPDATE `activity` SET `nom_activity`=?, `description`=?, `lieu`=?, `date`=?, `prix`=?, `capacity_max`=?, `image`=?, `id_category`=?, `duration`=?, `date_debut`=?, `date_fin`=?  WHERE id_act = ?");
    $stmt_update->bind_param("ssssdissisii", $NOM_ACTIVITY, $DESCRIPTION, $LIEU, $DATE, $PRIX, $CAPACITY_MAX, $img_des, $ID_CATEGORY, $DURATION, $DATE_DEBUT, $DATE_FIN, $ID_ACT);
    $stmt_update->execute();
    $stmt_update->close(); // Close the UPDATE statement

    header("location:showActivity.php");
}
?>
