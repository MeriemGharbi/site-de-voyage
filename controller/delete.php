
<?php
include '../config.php';
$conn = config::getConnexion();


//////////////////////////////////////////////////////////////////////////////////////////SUPPRESSION
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteHotel'])) {
    $nomHotelToDelete = $_POST['deleteHotel'];
    try {
        $deleteQuery = $conn->prepare("DELETE FROM hotels WHERE nomHotel = :nomHotel");
        $deleteQuery->execute(['nomHotel' => $nomHotelToDelete]);
        // Refresh 
        echo "<meta http-equiv='refresh' content='0'>";
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression de l\'hôtel: ' . $e->getMessage();
    }
}
//////////////////////////////////////////////////////////////////////////////////////////
header("Location: ../view/display.php?");
    exit(); // Ensure script stops here
?>