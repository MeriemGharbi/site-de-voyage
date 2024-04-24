<?php
// include db connection
include_once "../config.php";

if(isset($_POST['upload'])){
    // Retrieve form data
    $NOM_ACTIVITY = $_POST['nom_activity'];
    $DESCRIPTION = $_POST['description'];
    $LIEU = $_POST['lieu'];
    $DATE = $_POST['date_debut'];
    $DATE_DEBUT = $_POST['date_fin'];
    $DATE_FIN = $_POST['date'];
    $PRIX = $_POST['prix'];
    $CAPACITY_MAX = $_POST['capacity_max'];
    $image = $_FILES['image'];
    $ID_CATEGORY = $_POST['id_category'];
    $DURATION = $_POST['duration'];
    // File upload
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadImage/".$img_name;
    move_uploaded_file($img_loc,'uploadImage/'.$img_name);

    // Insert data into database
    $query = "INSERT INTO `activity` ( `nom_activity`, `description`, `lieu`, `date`, `prix`, `capacity_max`, `image`, `id_category`, `duration`, `date_debut`,`date_fin`  ) 
              VALUES ('$NOM_ACTIVITY','$DESCRIPTION','$LIEU','$DATE','$PRIX','$CAPACITY_MAX','$img_des','$ID_CATEGORY','$DURATION' ,'$DATE_DEBUT' , '$DATE_FIN')";
    $result = mysqli_query($con, $query);

    // Check if insertion was successful
    if($result) {
        // If successful, redirect to showActivity.php
        header("Location: showActivity.php");
        exit(); // Make sure to exit after redirecting
    } else {
        // If there was an error, display error message
        echo "Error: " . mysqli_error($con);
    }
}
?>
