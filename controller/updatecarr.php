<?php
// Include your database configuration file
include_once "../config.php";

try {
    // Establish a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if id_voiture is set in the URL
    $id_voiture = isset($_GET['id_voiture']) ? $_GET['id_voiture'] : null;

    if($id_voiture !== null) {
        // Using prepared statements to prevent SQL injection
        $stmt = $pdo->prepare("SELECT * FROM car WHERE id_voiture = :id_voiture");
        $stmt->execute(['id_voiture' => $id_voiture]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle the case where id_voiture is not set
        echo "Car ID not provided.";
    }
} catch(PDOException $e) {
    // Handle PDO connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style1.css">
    <title>Update Car</title>
</head>
<body>
<div class="container">
    <div class="navigation">
        <ul>
            <!-- Navigation items -->
        </ul>
    </div>
    <a href="../view/index1.html"><button type="button"><span></span>Return</button></a>
    <div class="main">
        <div class="topbar">
            <!-- Topbar content -->
        </div>
        <form action="updatecar.php" id="carForm" method="POST" enctype="multipart/form-data">
            <div class="form">
                <h1 class="text-center">Update Car Form</h1>
                <?php if($id_voiture !== null): ?>
                <!-- Display form fields only if id_voiture is set -->
                <label for="marque">Marque</label>
                <input type="text" name="marque" value="<?php echo $data['marque'] ?>" id="marque">
                <label for="modele">Modele</label>
                <input type="text" name="modele" value="<?php echo $data['modele'] ?>" id="modele">
                <label for="annee">Annee</label>
                <input type="text" name="annee" value="<?php echo $data['annee'] ?>" id="annee">
                <label for="couleur">Couleur</label>
                <input type="text" name="couleur" value="<?php echo $data['couleur'] ?>" id="couleur">
                <label for="prix_journee">Prix Journee</label>
                <input type="text" name="prix_journee" value="<?php echo $data['prix_journee'] ?>" id="prix_journee">
                <label for="type">Type</label>
                <input type="text" name="type" value="<?php echo $data['type'] ?>" id="type">
                <label for="disponibilite">Disponibilite</label>
                <input type="text" name="disponibilite" value="<?php echo $data['disponibilite'] ?>" id="disponibilite">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
                <input type="hidden" name="id_voiture" value="<?php echo $data['id_voiture'] ?>">
                <button type="submit" name="update" class="btn btn-danger">Update</button>
                <?php endif; ?>
                <script src="Car.js"></script>
            </div>
        </form>
    </div>
</div>
</body>
</html>
