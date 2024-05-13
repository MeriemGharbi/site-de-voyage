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
            echo '<form id="deleteForm' . $hotel['nomHotel'] . '" method="post" action="../controller/hotels/delete.php"><input type="hidden" name="deleteHotel" value="' . $hotel['nomHotel'] . '"><input type="submit" class="button"  style="margin-right: -70px;" value="Supprimer" onclick="confirmDeleteHotel(\'' . $hotel['nomHotel'] . '\')"></form>';
            echo '</td>';
        
            echo '<td><img src="' . $hotel['lienPhotoHotel'] . '" alt="Photo de l\'hôtel" style="width:200px;height:150px;" ></td>';
            
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


<script>
    // Function to toggle visibility of elements
    function toggleElements(elements, visible) {
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = visible ? 'table-row' : 'none';
        }
    }

    // Function to hide extra elements
    function hideExtraElements(elements, batchSize) {
        for (var i = batchSize; i < elements.length; i++) {
            elements[i].style.display = 'none';
        }
    }

    // Function to show all elements
    function showAllElements(elements) {
        toggleElements(elements, true);
    }

    // Function to initialize
    document.addEventListener('DOMContentLoaded', function() {
        var hotelList = document.querySelectorAll('.hotel-item');
        var offerList = document.querySelectorAll('.offer-item'); // Adjust the class name here

        var batchSize = 2;

        // Hide all extra hotels and offers initially
        hideExtraElements(hotelList, batchSize);
        hideExtraElements(offerList, batchSize);

        // Show more hotels
        document.getElementById('showMoreHotels').addEventListener('click', function() {
            showAllElements(hotelList);
        });

        // Show more offers
        document.getElementById('showMoreOffers').addEventListener('click', function() {
            showAllElements(offerList);
        });

        // Show less hotels
        document.getElementById('showLessHotels').addEventListener('click', function() {
            hideExtraElements(hotelList, batchSize);
        });

        // Show less offers
        document.getElementById('showLessOffers').addEventListener('click', function() {
            hideExtraElements(offerList, batchSize);
        });
    });
</script>







