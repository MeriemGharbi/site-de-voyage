<?php
include '../config.php';
function displayLogo($logoLink) //// fonction petites icones 3la jnab
{
    return '<img class="logo" style="width:20px;height:20px;" src="' . $logoLink  . '">';
}
$conn = config::getConnexion(); // Etablit la connexion
try {
    $query = $conn->query("SELECT * FROM hotels");
    $hotels = $query->fetchAll();

    if (count($hotels) > 0) {
        echo '<table>';
        foreach ($hotels as $hotel) {
            echo '<tr class="hotel-item" >'; // Ajout de la classe CSS hotel-item
        
            echo '<td>';
            echo '<strong>' .'Hotel '. $hotel['nomHotel'] . '</strong><br>';
            echo displayLogo("https://png.pngtree.com/png-vector/20190419/ourmid/pngtree-vector-location-icon-png-image_956422.jpg") . $hotel['adresse'] . ' <img id="editHotelIcon" class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditForm(\'' . $hotel['nomHotel'] . '\')"><br>';
            echo  $hotel['etoiles'] .' étoiles ' . ' <img id="editHotelIcon" class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditForm(\'' . $hotel['nomHotel'] . '\')"><br>';
            echo 'Info contact: ' . $hotel['infoContact'] . ' <img id="editHotelIcon" class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditForm(\'' . $hotel['nomHotel'] . '\')"><br>';
            echo '<form method="post" action="../controller/delete.php"><input type="hidden" name="deleteHotel" value="' . $hotel['nomHotel'] . '"><input type="submit" class="button"  style="margin-right: -70px;" value="Supprimer"></form>';
            echo '</td>';
        
            echo '<td><img src="' . $hotel['lienPhotoHotel'] . '" alt="Photo de l\'hôtel" style="width:200px;height:150px;" onclick="showEditForm(\'' . $hotel['nomHotel'] . '\')"></td>';
            
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucun hôtel trouvé.';
    }
} catch (PDOException $e) {
    echo 'Echec de connexion:' . $e->getMessage();
}
?>


