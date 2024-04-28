
<?php
include '../../config.php';
$conn = config::getConnexion();



//////////////////////////////////////////////////////////////////////////////////////////SUPPRESSION
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteOffre'])) {
    $idOffreToDelete = $_POST['deleteOffre']; // Corrected key name
    try {
        $deleteQuery = $conn->prepare("DELETE FROM offres WHERE idOffre = :idOffre");
        $deleteQuery->execute(['idOffre' => $idOffreToDelete]);
        // Refresh 
        echo "<meta http-equiv='refresh' content='0'>";
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression de l\'offre: ' . $e->getMessage();
    }
}

//////////////////////////////////////////////////////////////////////////////////////////

header("Location: ../../view/display.php?");
    exit(); // Ensure script stops here
    
?>
 
