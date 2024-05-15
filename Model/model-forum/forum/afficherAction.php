<?php
require('config.php');

// Définir la requête SQL de base pour récupérer tous les commentaires
$sql = 'SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM commentaire';

// Vérifier si une recherche est effectuée
if(isset($_GET['search']) && !empty($_GET['search'])) {
    // Préparer la recherche en ajoutant un paramètre lié à la requête SQL
    $searchTerm = '%' . $_GET['search'] . '%'; // Ajouter des jokers % pour rechercher dans tous les mots
    $sql .= ' WHERE titre LIKE :searchTerm ORDER BY id DESC';

    // Préparer la requête avec un paramètre lié
    $getAllComment = $bdd->prepare($sql);
    $getAllComment->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
} else {
    // Si aucune recherche n'est effectuée, exécuter la requête SQL de base
    $sql .= ' ORDER BY id DESC LIMIT 0,5'; // Limiter à 5 commentaires par défaut
    $getAllComment = $bdd->query($sql);
}
?>

