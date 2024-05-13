<?php
// Connexion à la base de données
include '../../config.php';
$conn = config::getConnexion();

// Récupération des données du formulaire
$nomHotel = $_POST['nomHotel'];
$adresse = $_POST['adresse'];
$description = $_POST['description'];
$etoiles = $_POST['etoiles'];
$infoContact = $_POST['infoContact'];
$lienPhotoHotel = $_POST['lienPhotoHotel'];
$idChambre = $_POST['idChambre'];
// Requête d'ajout
$sql = "UPDATE hotels SET adresse = :adresse, description = :description, etoiles = :etoiles, infoContact = :infoContact , lienPhotoHotel = :lienPhotoHotel WHERE nomHotel = :nomHotel";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':etoiles', $etoiles);
    $stmt->bindParam(':infoContact', $infoContact);
    $stmt->bindParam(':nomHotel', $nomHotel);
    $stmt->bindParam(':lienPhotoHotel', $lienPhotoHotel);

    $stmt->execute();






////////////////////chambre
 // Prepare SQL statement for updating chambre table with idOffre
 $requeteChambre = $conn->prepare("UPDATE chambres SET nomHotel = :nomHotel WHERE idChambre = :idChambre");

 // Bind parameters for updating chambre table
 $requeteChambre->bindParam(':nomHotel', $nomHotel);
 $requeteChambre->bindParam(':idChambre', $idChambre);

 // Execute the query to update chambre table
 $requeteChambre->execute();


    
    // Redirection vers modification_form.php avec un message de succès
    header("Location: ../../view/back.php?");
    exit(); // Assure que le script s'arrête ici
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
