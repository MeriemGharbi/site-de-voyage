<?php
// include db connection
include_once "../config.php";

if(isset($_POST['submit_map'])){
    try {
        // Retrieve form data
        $map = $_POST['map'];

        // Connect to the database
        $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to fetch id_category based on your criteria (you'll need to adjust this query according to your specific requirements)
        $stmt = $pdo->prepare("SELECT id_category FROM category WHERE your_criteria_here");
        // Execute statement
        $stmt->execute();
        // Fetch the id_category
        $id_category_row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_category = $id_category_row['id_category'];

        // Prepare SQL statement to insert map data into the activity table
        $stmt = $pdo->prepare("INSERT INTO `activity` (`map`, `id_category`) VALUES (?, ?)");
        
        // Bind parameters
        $stmt->bindParam(1, $map);
        $stmt->bindParam(2, $id_category);

        // Execute statement
        $stmt->execute();

        // If successful, redirect to showActivity.php
        header("Location: showActivity.php");
        exit(); // Make sure to exit after redirecting
    } catch(PDOException $e) {
        // If there was an error, display error message
        echo "Error: " . $e->getMessage();
    }
}
?>
