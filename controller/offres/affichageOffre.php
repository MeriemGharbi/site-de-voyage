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
            echo '<strong>' .'Hotel: '. $offre['nomHotel'] .'</strong>  <img class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditFormOffre(\'' .  $offre['idOffre'] . '\')"><br>';
            echo 'Prix: ' . $offre['prixOffre'] . ' <img class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditFormOffre(\'' .  $offre['idOffre'] . '\')"><br>';
            echo 'date Ajout Offre: ' . $offre['dateAjoutOffre'] . ' <img class="edit-icon" src="https://cdn-icons-png.flaticon.com/512/84/84380.png" alt="Modifier" onclick="showEditFormOffre(\'' . $offre['idOffre'] . '\')"><br>';
            echo '<form method="post" action=""><input type="hidden" name="deleteOffre" value="' . $offre['idOffre'] . '"><input type="submit" class="button"  " value="Supprimer"></form>';
            echo '</td>';
            echo '<td><img src="' . $offre['lienOffre1'] . '" alt="Photo de l\'offre" style="width:200px;height:150px;" onclick="showEditForm(\'' . $offre['idOffre'] . '\')"></td>';
            echo '<td><img src="' . $offre['lienOffre2'] . '" alt="Photo de l\'offre" style="width:200px;height:150px;" onclick="showEditForm(\'' . $offre['idOffre'] . '\')"></td>';
            echo '<td><img src="' . $offre['lienOffre3'] . '" alt="Photo de l\'offre" style="width:200px;height:150px;" onclick="showEditForm(\'' . $offre['idOffre'] . '\')"></td>';
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
