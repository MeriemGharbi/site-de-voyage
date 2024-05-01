<?php

$conn = config::getConnexion(); // Etablit la connexion

try {
    $query = $conn->query("SELECT * FROM offres");
    $offres = $query->fetchAll();

     if (count($offres) > 0) {
        echo '<table>';
        foreach ($offres as $offre) {
            echo '<tr class="offer-item">'; // Change the class to "offer-item"
            echo '<td style="text-align: left;">'; // Apply left alignment to the table cell
            echo '<strong>' .'id Offre: '. $offre['idOffre'] . '</strong><br>'; 
            echo '<strong>' .'Hotel: '. $offre['nomHotel'] .'</strong>  <img id="editOfferIcon" class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier"  onclick="showEditFormOffre(\'' .  $offre['idOffre'] . '\')"><br>';
            echo 'Prix: ' . $offre['prixOffre'] . ' dt <img id="editOfferIcon"class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditFormOffre(\'' .  $offre['idOffre'] . '\')"><br>';
            echo 'date Ajout Offre: ' . $offre['dateAjoutOffre'] . ' <img id="editOfferIcon" class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditFormOffre(\'' . $offre['idOffre'] . '\')"><br>';
            echo 'likes: ' . $offre['likes'] . ' dt <img id="editOfferIcon"class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditFormOffre(\'' .  $offre['idOffre'] . '\')"><br>';
            echo 'dislikes: ' . $offre['dislikes'] . ' dt <img id="editOfferIcon"class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditFormOffre(\'' .  $offre['idOffre'] . '\')"><br>';

            
            // Form for deletion
    echo '<form id="deleteForm' . $offre['idOffre'] . '" method="post" action="../controller/offres/deleteOffre.php">';
    echo '<input type="hidden" name="deleteOffre" value="' . $offre['idOffre'] . '">';
    echo '<input type="button" class="button" value="Supprimer" onclick="confirmDelete(' . $offre['idOffre'] . ')">';
    echo '</form>';
            
            echo '</td>';
            echo '<td><img src="' . $offre['lienOffre1'] . '" alt="Photo de l\'offre" style="width:200px;height:150px;" onclick="showEditFormOffre(\'' . $offre['idOffre'] . '\')"></td>';
            echo '<td><img src="' . $offre['lienOffre2'] . '" alt="Photo de l\'offre" style="width:200px;height:150px;" onclick="showEditFormOffre(\'' . $offre['idOffre'] . '\')"></td>';
            echo '<td><img src="' . $offre['lienOffre3'] . '" alt="Photo de l\'offre" style="width:200px;height:150px;" onclick="showEditFormOffre(\'' . $offre['idOffre'] . '\')"></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucune offre trouvée.';
    }
} catch (PDOException $e) {
    echo 'Echec de connexion:' . $e->getMessage();
}
?>

<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this offer?")) {
        console.log("ID to delete:", id);
        var form = document.getElementById("deleteForm" + id);
        if (form) {
            form.submit();
        } else {
            console.error("Form not found for ID:", id);
        }
    }
}
</script>

