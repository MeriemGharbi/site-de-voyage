<?php
//include '.././config.php';

$conn = config::getConnexion(); // Etablit la connexion

// if ($conn)
//     echo'bien';
// else
//     echo'shit';
try {
    $query = $conn->query("SELECT * FROM chambres");
    $chambres = $query->fetchAll();

   
     if (count($chambres) > 0) {
        echo '<table>';
        foreach ($chambres as $chambre) {
            echo '<td style="text-align: left;">'; // Apply left alignment to the table cell
            echo '<strong>' .'id chambre: '. $chambre['idChambre'] . '</strong><br>'; 
            echo 'type Chambre: '. $chambre['typeChambre'] .'<br>';
            echo 'Prix Chambre: '. $chambre['prixChambre'] .' <br>';
            echo '<strong>' .'hotel associé: '. $chambre['nomHotel'].'</strong><br>'; 
            
            echo '</td>';
           
        }
        echo '</table>';
    } else {
        echo 'Aucune chambre trouvée.';
    }
} catch (PDOException $e) {
    echo 'Echec de connexion:' . $e->getMessage();
}
?>


