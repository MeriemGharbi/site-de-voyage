<?php
include '../config.php';

$conn = config::getConnexion();

// Retrieve the search query from the URL parameter
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

try {
    // Construct the SQL query with a dynamic search condition
    $sql = "SELECT offres.nomHotel, hotels.lienPhotoHotel, hotels.adresse, hotels.description, offres.descriptionOffre, chambres.typeChambre, chambres.prixChambre
            FROM offres
            LEFT JOIN hotels ON offres.nomHotel = hotels.nomHotel
            LEFT JOIN chambres ON hotels.nomHotel = chambres.nomHotel";

    if (!empty($searchQuery)) {
        $sql .= " WHERE offres.nomHotel LIKE ?";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        
        // Bind the parameter with the wildcard
        $stmt->bindValue(1, '%' . $searchQuery . '%', PDO::PARAM_STR);
        
        // Execute the query
        $stmt->execute();
    } else {
        // If search query is empty, execute the query without WHERE clause
        $stmt = $conn->query($sql);
    }

    // Check if any results found
    if ($stmt->rowCount() > 0) {
        // Fetch and output data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>Hotel Name: " . $row["nomHotel"] . "</p>";
            echo "<p>Photo Link: " . $row["lienPhotoHotel"] . "</p>";
            echo "<p>Address: " . $row["adresse"] . "</p>";
            echo "<p>Description: " . $row["description"] . "</p>";
            echo "<p>Offer Description: " . $row["descriptionOffre"] . "</p>";
            echo "<p>Room Type: " . $row["typeChambre"] . "</p>";
            echo "<p>Room Price: " . $row["prixChambre"] . "</p>";
            echo "<hr>"; // Add a horizontal line between each result
        }
    } else {
        echo "0 results found for search query: " . $searchQuery;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
