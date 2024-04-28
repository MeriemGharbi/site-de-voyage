<?php
// Connexion à la base de données
include '../config.php';
$conn = config::getConnexion();

// Récupération des données du formulaire
$nomHotel = $_POST['nomHotel'];
$adresse = $_POST['adresse'];
$description = $_POST['description'];
$etoiles = $_POST['etoiles'];
$prixHotel = $_POST['prixHotel'];
$infoContact = $_POST['infoContact'];
$lienPhotoHotel = $_POST['lienPhotoHotel'];

// Requête d'ajout
$sql = "UPDATE hotels SET adresse = :adresse, description = :description, etoiles = :etoiles, prixHotel = :prixHotel, infoContact = :infoContact , lienPhotoHotel = :lienPhotoHotel WHERE nomHotel = :nomHotel";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':etoiles', $etoiles);
    $stmt->bindParam(':prixHotel', $prixHotel);
    $stmt->bindParam(':infoContact', $infoContact);
    $stmt->bindParam(':nomHotel', $nomHotel);
    $stmt->bindParam(':lienPhotoHotel', $lienPhotoHotel);

    $stmt->execute();

    
    // Redirection vers modification_form.php avec un message de succès
    header("Location: ../view/display.php?");
    exit(); // Assure que le script s'arrête ici
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
