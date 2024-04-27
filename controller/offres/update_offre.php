<?php
// Connexion à la base de données
include '../config.php';
$conn = config::getConnexion();

// Récupération des données du formulaire
$lienOffre1 = $_POST['lienOffre1'];
$lienOffre2 = $_POST['lienOffre2'];
$lienOffre3 = $_POST['lienOffre3'];
$descriptionOffre = $_POST['descriptionOffre'];
$prixOffre = $_POST['prixOffre'];
$nomHotel = $_POST['nomHotel'];
// Requête d'ajout
$sql = "UPDATE hotels SET lienOffre1 = :adrlienOffre1, lienOffre2 = :lienOffre2, lienOffre3 = :lienOffre3, descriptionOffre = :descriptionOffre, prixOffre = :prixOffre , nomHotel = :nomHotel WHERE idOffre = :idOffre";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lienOffre1', $lienOffre1);
    $stmt->bindParam(':lienOffre2', $lienOffre2);
    $stmt->bindParam(':lienOffre3', $lienOffre3);
    $stmt->bindParam(':prixOffre', $prixOffre);
    $stmt->bindParam(':descriptionOffre', $descriptionOffre);
    $stmt->bindParam(':dateAjoutOffre', $dateAjoutOffre);
    $stmt->bindParam(':nomHotel', $nomHotel);

    $stmt->execute();

    // Redirection vers modification_form.php avec un message de succès
    header("Location: ../view/display.php?");
    exit(); // Assure que le script s'arrête ici
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
