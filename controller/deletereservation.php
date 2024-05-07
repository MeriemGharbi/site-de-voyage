<?php
include_once "../config.php";

try {
    $pdo = config::getConnexion();
    $id_reservation = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM reservation WHERE id_reservation = :id_reservation");
    $stmt->bindParam(':id_reservation', $id_reservation);
    $stmt->execute();
    header("location:showreservation.php?message=DeleteSuccess");
} catch(PDOException $e) {
    header("location:showreservation.php?message=DeleteFailed");
}
?>
