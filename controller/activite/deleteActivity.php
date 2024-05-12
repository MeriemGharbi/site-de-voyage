<?php
include '../../config.php'; 
try {
    // Fetch the activity ID from GET parameters
    $ID_ACT = $_GET['id_act'];
    
    // Prepare the SQL DELETE statement
    $stmt = $con->prepare("DELETE FROM activity WHERE id_act = :id_act");
    
    // Bind the parameter to the statement
    $stmt->bindParam(':id_act', $ID_ACT, PDO::PARAM_INT);
    
    // Execute the statement
    $stmt->execute();
    
    // Redirect to the showActivity.php page after deletion
    header('Location:  ../../view/backoffice/activity.php');
} catch (PDOException $e) {
    // Handle exceptions (optional)
    echo "Error: " . $e->getMessage();
}
?>
