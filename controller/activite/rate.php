<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "xplore";

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_act = $_POST["id_act"];
        $rating = $_POST["rating"];

        // Insert into ratee table
        $sql = "INSERT INTO ratee (id_act, rate) VALUES (:id_act, :rate)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_act', $id_act);
        $stmt->bindParam(':rate', $rating);

        if ($stmt->execute()) {
            echo "New Rate added successfully";
        } else {
            echo "Error: Unable to add rate";
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
