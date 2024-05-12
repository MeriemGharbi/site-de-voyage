<?php
include_once "../../config.php"; 

$sortOrder = isset($_GET['sort_alphabet']) ? $_GET['sort_alphabet'] : null;
$sortType = isset($_GET['sort_date']) ? $_GET['sort_date'] : null;
$sortPrice = isset($_GET['sort_price']) ? $_GET['sort_price'] : null; // Add this line to get the price sorting parameter

if ($sortOrder == 'a-z') {
    $sql = "SELECT * FROM activity ORDER BY nom_activity ASC"; // Assuming 'nom_activity' is the column name for activity names
} elseif ($sortOrder == 'z-a') {
    $sql = "SELECT * FROM activity ORDER BY nom_activity DESC";
} elseif ($sortType == 'recent') {
    $sql = "SELECT * FROM activity ORDER BY date DESC"; // Sort by date from recent to oldest
} elseif ($sortType == 'oldest') {
    $sql = "SELECT * FROM activity ORDER BY date ASC"; // Sort by date from oldest to recent
} elseif ($sortPrice == 'price-high') { // Add condition for sorting by price from higher to lower
    $sql = "SELECT * FROM activity ORDER BY prix DESC"; // Assuming 'prix' is the column name for prices
} elseif ($sortPrice == 'price-low') { // Add condition for sorting by price from lower to higher
    $sql = "SELECT * FROM activity ORDER BY prix ASC";
} else {
    // Default sorting order
    $sql = "SELECT * FROM activity";
}

try {
    // Prepare and execute the SQL query
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the sorted activity data as HTML table rows
    if (count($activities) > 0) {
        foreach ($activities as $activity) {
            echo "<tr>";
            echo "<td>" . $activity['id_act'] . "</td>";
            echo "<td>" . $activity['nom_activity'] . "</td>";
            echo "<td>" . $activity['description'] . "</td>";
            echo "<td>" . $activity['lieu'] . "</td>";
            echo "<td>" . $activity['date'] . "</td>";
            echo "<td>" . $activity['prix'] . "</td>";
            echo "<td>" . $activity['capacity_max'] . "</td>";
            echo "<td><img src='" . $activity['image'] . "' width='100'></td>"; // Display image
            echo "<td>" . $activity['id_category'] . "</td>";
            echo "<td>" . $activity['duration'] . "</td>";
            echo "<td>" . $activity['date_debut'] . "</td>";
            echo "<td>" . $activity['date_fin'] . "</td>";
            echo "<td>" . $activity['map'] . "</td>"; // Display map
            // Output other table data as needed
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='13'>No activities found</td></tr>"; // Adjust colspan according to the number of columns in your table
    }
} catch(PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}
?>
