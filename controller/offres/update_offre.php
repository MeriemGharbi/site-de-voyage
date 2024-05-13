<?php
// Connexion à la base de données
include '../../config.php';
$conn = config::getConnexion();

// Récupération des données du formulaire
$lienOffre1 = $_POST['lienOffre1'];
$lienOffre2 = $_POST['lienOffre2'];
$lienOffre3 = $_POST['lienOffre3'];
$descriptionOffre = $_POST['descriptionOffre'];
$nomHotel = $_POST['nomHotel'];
$idOffre = $_POST['idOffre']; 


// Requête de mise à jour
$sql = "UPDATE offres SET lienOffre1 = :lienOffre1, lienOffre2 = :lienOffre2, lienOffre3 = :lienOffre3, descriptionOffre = :descriptionOffre, nomHotel = :nomHotel WHERE idOffre = :idOffre";

try {
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':lienOffre1', $lienOffre1);
    $stmt->bindParam(':lienOffre2', $lienOffre2);
    $stmt->bindParam(':lienOffre3', $lienOffre3);
    $stmt->bindParam(':descriptionOffre', $descriptionOffre);
    $stmt->bindParam(':nomHotel', $nomHotel);
    $stmt->bindParam(':idOffre', $idOffre); // Binding idOffre

    // Exécution de la requête
    $stmt->execute();

    // Redirection vers une page avec un message de succès
    header("Location: ../../view/back.php");
    exit(); // Assure que le script s'arrête ici
    
} catch(PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Error: " . $e->getMessage();
}
?>
