<?php
include '../config.php';
$conn = config::getConnexion();

// Debugging: Check the received data
var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['offer_id']) && isset($_POST['reaction'])) {
    // Get the offer ID and reaction sent from the form
    $offerId = $_POST['offer_id'];
    $reaction = $_POST['reaction'];

    try {
        // Update the likes/dislikes count in the database based on the reaction
        if ($reaction === 'like') {
            $sql = "UPDATE offres SET likes = likes + 1 WHERE idOffre = :offer_id";
        } elseif ($reaction === 'dislike') {
            $sql = "UPDATE offres SET dislikes = dislikes + 1 WHERE idOffre = :offer_id";
        } else {
            echo json_encode(['error' => 'Invalid reaction']);
            exit; // Exit script if reaction is invalid
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':offer_id', $offerId);
        $stmt->execute();

        // Check for errors in SQL execution
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'No rows affected']);
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // Handle invalid request or missing data
    echo json_encode(['error' => 'Invalid request']);
}
?>
