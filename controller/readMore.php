<?php

include '../config.php';
$conn = config::getConnexion();

// Check if hotel name is provided in the URL
if(isset($_GET['hotel'])) {
    // Get the hotel name from the URL parameter
    $hotelName = $_GET['hotel'];
    $sql = "SELECT * FROM hotels WHERE nomHotel = :hotel";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hotel', $hotelName, PDO::PARAM_STR);
    $stmt->execute();

    $selectedHotel = $stmt->fetch(PDO::FETCH_ASSOC);
}

include('../view/readMore_template.php');
?>

