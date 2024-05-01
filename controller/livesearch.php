<?php
// Include the configuration file
include_once "../config.php";

// Check if the input is set
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM activity WHERE 
              nom_activity LIKE '{$input}%' OR 
              date LIKE '{$input}%' OR 
              description LIKE '%{$input}%' OR 
              id_category LIKE '{$input}%'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){ ?>
        <div class="cardBox">
            <?php
            while($row = mysqli_fetch_assoc($result)){
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
