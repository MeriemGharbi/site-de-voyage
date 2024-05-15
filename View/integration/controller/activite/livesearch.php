<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.activity {
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px; /* Reduce padding to make the cards smaller */
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center; /* Vertically center align content */
}

.activity-img {
    width: 200px; /* Adjust image width */
    height: auto; /* Maintain aspect ratio */
}

.activity-details {
    padding: 10px;
    text-align: left;
    flex: 1;
    color: black;
}

.activity-details h3 {
    font-size: 24px; /* Reduce heading font size */
    margin-bottom: 10px; /* Reduce margin to the next element */
    color: #2a2185;
    text-align: center;
}

.activity-details p {
    font-size: 14px; /* Reduce paragraph font size */
    margin-bottom: 5px; /* Reduce margin to the next element */
    font-weight: 600; /* Adjust font weight */
}

.left-content {
    flex: 1;
}

.table-container {
    padding: 20px;
    display: flex;
    justify-content: center;
    margin-left: 60px;
    width: 100%; /* Adjust width to fit the content */
}


    </style>
</head>
<body>
<?php
// Include the configuration file
include '../../config.php'; 
$pdo = config::getConnexion();

// Check if the input is set
if(isset($_POST['input'])){
    $input = $_POST['input'];
    // Prepare the SQL query using placeholders to prevent SQL injection
    $query = "SELECT * FROM activity WHERE 
              nom_activity LIKE :input OR 
              date LIKE :input OR 
              description LIKE :input OR 
              id_category LIKE :input";
    
    // Prepare the statement using the PDO connection object ($pdo)
    $stmt = $pdo->prepare($query);
    
    // Bind the parameter
    $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the results
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result) > 0){ ?>
    <div class="table-container">
        <div class="cardBox">
            <?php
            foreach($result as $row){
                // Assign values to variables from the row
                $id = $row['id_act'];
                $nom_activity = $row['nom_activity'];
                $description = $row['description'];
                $lieu = $row['lieu'];
                $date = $row['date'];
                $prix = $row['prix'];
                $capacity_max = $row['capacity_max'];
                $image = $row['image'];
                $id_category = $row['id_category'];
                $duration = $row['duration'];
                $date_debut = $row['date_debut'];
                $date_fin = $row['date_fin'];
            ?>
            <div class="card">
                <div class="activity-details">
                    <div class="activity-name"><?php echo $nom_activity; ?></div>
                    <div class="activity-name"><?php echo $description; ?></div>
                    <div class="activity-name">Location: <?php echo $lieu; ?></div>
                    <div class="activity-name">Date: <?php echo $date; ?></div>
                    <div class="activity-name">Price: <?php echo $prix; ?></div>
                    <div class="activity-name">Capacity: <?php echo $capacity_max; ?></div>
                    <div class="activity-name">Start Date: <?php echo $date_debut; ?></div>
                    <div class="activity-name">End Date: <?php echo $date_fin; ?></div>
                </div>
                <div class="activity-image">
                    <img src="<?php echo $image; ?>" alt="<?php echo $nom_activity; ?>">
                </div>
            </div>
            <?php } ?>
        </div>
    <?php } else {
        echo "<h6>No data found</h6>";
    }
}
?>
</div>
</body>
</html>
