<?php
include_once "../config.php";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ID_VOITURE = $_GET['id_voiture'];
    $stmt = $pdo->prepare("DELETE FROM car WHERE id_voiture = :id_voiture");
    $stmt->bindParam(':id_voiture', $ID_VOITURE);
    $stmt->execute();
    header('location: showcar.php');
} catch(PDOException $e) {
    echo "Deletion failed: " . $e->getMessage();
}
?>
