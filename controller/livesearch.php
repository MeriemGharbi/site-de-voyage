<?php

include_once "../config.php";


if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM car WHERE 
              marque LIKE '{$input}%' OR 
              modele LIKE '{$input}%' OR 
              annee LIKE '%{$input}%' OR 
              couleur LIKE '{$input}%' OR 
              type LIKE '{$input}%' OR 
              disponibilite LIKE '{$input}%'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result){ ?>
        <div class="cardBox">
            <?php
            foreach($result as $row){
              
                $id_voiture = $row['id_voiture'];
                $marque = $row['marque'];
                $modele = $row['modele'];
                $annee = $row['annee'];
                $couleur = $row['couleur'];
                $prix_journee = $row['prix_journee'];
                $type = $row['type'];
                $disponibilite = $row['disponibilite'];
                $image = $row['image'];
            ?>
            <div class="card">
                <div class="car-details">
                    <div class="car-name"><?php echo $marque; ?></div>
                    <div class="car-name"><?php echo $modele; ?></div>
                    <div class="car-name">Year: <?php echo $annee; ?></div>
                    <div class="car-name">Color: <?php echo $couleur; ?></div>
                    <div class="car-name">Price Per Day: <?php echo $prix_journee; ?></div>
                    <div class="car-name">Type: <?php echo $type; ?></div>
                    <div class="car-name">Availability: <?php echo $disponibilite; ?></div>
                </div>
                <div class="car-image">
                    <img src="<?php echo $image; ?>" alt="<?php echo $marque; ?>">
                </div>
            </div>
            <?php } ?>
        </div>
    <?php } else {
        echo "<h6>No data found</h6>";
    }
}
?>
