<?php
// Include the database configuration file
include '../../config.php';  // Update the path if needed
$con=config::getConnexion();
// Get the sorting order from the AJAX request
$sortOrder = $_GET['sort_alphabet'];

// Prepare the SQL query based on the sorting order
if ($sortOrder == 'a-z') {
    $sql = "SELECT * FROM category ORDER BY nom_category ASC";
} elseif ($sortOrder == 'z-a') {
    $sql = "SELECT * FROM category ORDER BY nom_category DESC";
} else {
    // Default sorting order
    $sql = "SELECT * FROM category";
}

try {
    // Prepare and execute the SQL query
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the sorted category data as HTML table rows
    if (count($categories) > 0) {
        foreach ($categories as $category) {
            echo "<tr>";
            echo "<td>" . $category['id_category'] . "</td>";
            echo "<td>" . $category['nom_category'] . "</td>";
            echo "<td>" . $category['level'] . "</td>";
            echo "<td>" . $category['season'] . "</td>";
            echo "<td>" . $category['popularity'] . "</td>";
            echo "<td>" . $category['mobility'] . "</td>";
            // Output other table data as needed
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No categories found</td></tr>";
    }
} catch(PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}
?>