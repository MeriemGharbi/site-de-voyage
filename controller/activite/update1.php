<?php
if(isset($_POST["submit_map"]))
{
    $map = $_POST["map"];
    ?>
    <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $map; ?>&output=embed"></iframe>
<?php }

include '../../config.php'; 
$con=config::getConnexion();
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
    $map = $_POST['map'];

    // Check if image field is empty
    if($_FILES['image']['size'] == 0) {
        // Image field is not updated, retain the existing image
        $stmt_select = $con->prepare("SELECT image FROM activity WHERE id_act = :id_act");
        $stmt_select->bindParam(":id_act", $ID_ACT);
        $stmt_select->execute();
        $existingImageData = $stmt_select->fetchColumn();
        $stmt_select->closeCursor(); // Close the cursor to allow the next query
        $img_des = $existingImageData;
    } else {
        // File upload
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "uploadImage/".$img_name;
        move_uploaded_file($img_loc,'uploadImage/'.$img_name); 
    }

    // Update the record using prepared statements
    $stmt_update = $con->prepare("UPDATE `activity` SET `nom_activity`=:nom_activity, `description`=:description, `lieu`=:lieu, `date`=:date, `prix`=:prix, `capacity_max`=:capacity_max, `image`=:image, `id_category`=:id_category, `duration`=:duration, `date_debut`=:date_debut, `date_fin`=:date_fin, `map`=:map  WHERE id_act = :id_act");
    $stmt_update->bindParam(":nom_activity", $NOM_ACTIVITY);
    $stmt_update->bindParam(":description", $DESCRIPTION);
    $stmt_update->bindParam(":lieu", $LIEU);
    $stmt_update->bindParam(":date", $DATE);
    $stmt_update->bindParam(":prix", $PRIX);
    $stmt_update->bindParam(":capacity_max", $CAPACITY_MAX);
    $stmt_update->bindParam(":image", $img_des);
    $stmt_update->bindParam(":id_category", $ID_CATEGORY);
    $stmt_update->bindParam(":duration", $DURATION);
    $stmt_update->bindParam(":date_debut", $DATE_DEBUT);
    $stmt_update->bindParam(":date_fin", $DATE_FIN);
    $stmt_update->bindParam(":map", $map);
    $stmt_update->bindParam(":id_act", $ID_ACT);
    $stmt_update->execute();

    header("location: ../../view/back.php");
}
?>
