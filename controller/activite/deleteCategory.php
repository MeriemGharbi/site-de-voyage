<?php
// $_GET array is then used to retrieve the id
$id_category = $_GET['id'];
// Include the configuration file containing database connection settings
include '../../config.php';
$con=config::getConnexion();
try {
    // Create a new PDO connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xplore";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query
    $sql = "DELETE FROM category where id_category = :id_category";
    $stmt = $con->prepare($sql);
    
    // Bind the parameter
    $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    // If the deletion is successful, redirect to the page showing activities with a success message
    header("location:showCategory.php?message=DeleteSuccess");
} catch(PDOException $e) {
    // If an error occurs, redirect to the page showing activities with an error message
    header("location:showCategory.php?message=DeleteFailed");
    // You can also output the error for debugging purposes
    // echo "Error: " . $e->getMessage();
}
?>
