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
    padding: 20px;
    margin-bottom: 20px;
    display: flex; /* Add flex display to align content */
    justify-content: space-between; /* Add space between content */
    
    
}

.activity-details {
    padding: 20px;
    text-align: left;
    flex: 1; /* Fill remaining space */
    color: black;

}

.activity-img {
    width: 500px;
    height:700px;
}
.table td {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
}


.table th {
    font-weight: bold;
    font-size: 30px;
    line-height: 1.5;
    margin-bottom: 50px;
}
.activity-details {
    padding: 20px;
    text-align: left;
    flex: 1; /* Fill remaining space */
}

.left-content {
    flex: 1; /* Fill remaining space */
}

.activity-details h3 {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 60px;
    color: #2a2185;
    text-align:center;
}

.activity-details p {
    font-size: 20px;
    line-height: 1.5;
    margin-bottom: 8px;
    font-weight: 600px;
    
}


.left-content {
    flex: 1; /* Fill remaining space */
}

.table-container {
    padding: 20px;
    display: flex;
    justify-content: center; /* Centers the table-container horizontally */
    margin-left: 60px; 
    width: 2000px;
    
}


        .input-group-text.btn {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff; 
            border-radius: 0;
            width: 40px;
            height: 20;
            border-radius: 5px;
        }

        .input-group-text.btn:hover {
            background-color: #0056b3; 
            border-color: #0056b3; 
            color: #fff; 

        }
        .cardBox {
            display: block; /* Change display to block */

        }


    </style>
</head>
<body>
<?php
// Include the configuration file
include '../../config.php'; 

// Check if the input is set
if(isset($_POST['input'])){
    $input = $_POST['input'];
    // Prepare the SQL query using placeholders to prevent SQL injection
    $query = "SELECT * FROM activity WHERE 
              nom_activity LIKE :input OR 
              date LIKE :input OR 
              description LIKE :input OR 
              id_category LIKE :input";
    
    // Prepare the statement
    $stmt = $con->prepare($query);
    
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