<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Your CSS styles here */
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>

<?php
// Include the configuration file
include_once "../config.php";

// Check if the input is set
if(isset($_POST['input'])){
    $input = $_POST['input'];
    
    // Prepare the SQL query using placeholders to prevent SQL injection
    $query = "SELECT * FROM car WHERE 
              marque LIKE ? OR 
              modele LIKE ? OR 
              annee LIKE ? OR 
              prix_journee LIKE ? OR 
              couleur LIKE ? OR 
              type LIKE ? OR 
              disponibilite LIKE ?";
    
    // Prepare the statement
    $stmt = $con->prepare($query);

    // Bind parameters
    $param = "%$input%";
    $stmt->bind_param("sssssss", $param, $param, $param, $param, $param, $param, $param);

    // Execute the query
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){ ?>
        <div class="table-container">
            <div class="cardBox">
                <?php
                while($row = $result->fetch_assoc()){
                    // Assign values to variables from the row
                    $id_voiture = $row['id_voiture'];
                    $marque = $row['marque'];
                    $modele = $row['modele'];
                    $annee = $row['annee'];
                    $prix_journee = $row['prix_journee'];
                    $couleur = $row['couleur'];
                    $type = $row['type'];
                    $disponibilite = $row['disponibilite'];
                    $image = $row['image']; // Assuming 'image' is the column name for the image URL
                ?>
                <div class="card">
                    <div class="activity-details">
                        <div class="activity-name">ID: <?php echo $id_voiture; ?></div>
                        <div class="activity-name">Marque: <?php echo $marque; ?></div>
                        <div class="activity-name">Modèle: <?php echo $modele; ?></div>
                        <div class="activity-name">Année: <?php echo $annee; ?></div>
                        <div class="activity-name">Prix par Journée: <?php echo $prix_journee; ?></div>
                        <div class="activity-name">Couleur: <?php echo $couleur; ?></div>
                        <div class="activity-name">Type: <?php echo $type; ?></div>
                        <div class="activity-name">Disponibilité: <?php echo $disponibilite; ?></div>
                    </div>
                    <div class="activity-image">
                        <img src="<?php echo $image; ?>" alt="Car Image">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php } else {
        echo "<h6>No data found</h6>";
    }
}
?>

</body>
</html>

    </style>
</head>
<body>

<?php
// Include the configuration file
include_once "../config.php";

// Check if the input is set
if(isset($_POST['input'])){
    $input = $_POST['input'];
    
    // Prepare the SQL query using placeholders to prevent SQL injection
    $query = "SELECT * FROM car WHERE 
              marque LIKE ? OR 
              modele LIKE ? OR 
              annee LIKE ? OR 
              prix_journee LIKE ? OR 
              couleur LIKE ? OR 
              type LIKE ? OR 
              disponibilite LIKE ?";
    
    // Prepare the statement
    $stmt = $con->prepare($query);

    // Bind parameters
    $param = "%$input%";
    $stmt->bind_param("sssssss", $param, $param, $param, $param, $param, $param, $param);

    // Execute the query
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){ ?>
        <div class="table-container">
            <div class="cardBox">
                <?php
                while($row = $result->fetch_assoc()){
                    // Assign values to variables from the row
                    $id_voiture = $row['id_voiture'];
                    $marque = $row['marque'];
                    $modele = $row['modele'];
                    $annee = $row['annee'];
                    $prix_journee = $row['prix_journee'];
                    $couleur = $row['couleur'];
                    $type = $row['type'];
                    $disponibilite = $row['disponibilite'];
                    $image = $row['image']; // Assuming 'image' is the column name for the image URL
                ?>
                <div class="card">
                    <div class="activity-details">
                        <div class="activity-name">ID: <?php echo $id_voiture; ?></div>
                        <div class="activity-name">Marque: <?php echo $marque; ?></div>
                        <div class="activity-name">Modèle: <?php echo $modele; ?></div>
                        <div class="activity-name">Année: <?php echo $annee; ?></div>
                        <div class="activity-name">Prix par Journée: <?php echo $prix_journee; ?></div>
                        <div class="activity-name">Couleur: <?php echo $couleur; ?></div>
                        <div class="activity-name">Type: <?php echo $type; ?></div>
                        <div class="activity-name">Disponibilité: <?php echo $disponibilite; ?></div>
                    </div>
                    <div class="activity-image">
                        <img src="<?php echo $image; ?>" alt="Car Image">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php } else {
        echo "<h6>No data found</h6>";
    }
}
?>

</body>
</html>
