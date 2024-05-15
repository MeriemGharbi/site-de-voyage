<?php
include_once "../config.php";

try {
    $pdo = config::getConnexion();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($_GET['id_voiture'])) {
        $id_voiture = $_GET['id_voiture'];

        $stmt = $pdo->prepare("DELETE FROM car WHERE id_voiture = :id_voiture");
        $stmt->bindParam(':id_voiture', $id_voiture);
        $stmt->execute();

        header('location: ../view/showcar.php');
        exit();
    } else {
        echo "Car ID not provided.";
    }
} catch(PDOException $e) {
    echo "Deletion failed: " . $e->getMessage();
}
?>
