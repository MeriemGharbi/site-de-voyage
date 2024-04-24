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
        $existingImageQuery = mysqli_query($con, "SELECT image FROM activity WHERE id_act = '$ID_ACT'");
        $existingImageData = mysqli_fetch_array($existingImageQuery);
        $img_des = $existingImageData['image'];
    } else {
        // File upload
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "uploadImage/".$img_name;
        move_uploaded_file($img_loc,'uploadImage/'.$img_name); 
    }

    // Update the record
    mysqli_query($con, "UPDATE `activity` SET `nom_activity`='$NOM_ACTIVITY', `description`='$DESCRIPTION', `lieu`='$LIEU', `date`='$DATE', `prix`='$PRIX', `capacity_max`='$CAPACITY_MAX', `image`='$img_des', `id_category`='$ID_CATEGORY', `duration`='$DURATION',`date_debut`='$DATE_DEBUT', `date_fin`='$DATE_FIN'  WHERE id_act = '$ID_ACT'");

    header("location:showActivity.php");
}
?>
