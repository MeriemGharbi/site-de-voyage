<?php
session_start();
require('config.php');

// Vérifier si le formulaire a été soumis
if(isset($_POST['validate2'])) {
    // Vérifier si l'ID du commentaire est présent dans la requête POST
    if(isset($_POST['comment_id'])) {
        // Récupérer l'ID du commentaire depuis la requête POST
        $comment_id = $_POST['comment_id'];

        // Préparer la requête SQL pour mettre à jour l'état du commentaire à 1
        $sql = "UPDATE commentaire SET etat = 1 WHERE id = :comment_id";

        // Préparer et exécuter la requête SQL
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        
        // Exécuter la requête
        if($stmt->execute()) {
            // Redirection vers la page précédente avec un message de succès
            header("Location: ../indexAdmin2.php");
            exit();
        } else {
            // En cas d'erreur lors de l'exécution de la requête SQL, afficher un message d'erreur
            echo "Une erreur est survenue lors de l'approbation du commentaire.";
        }
    } else {
        // Si l'ID du commentaire n'est pas présent dans la requête POST, afficher un message d'erreur
        echo "ID du commentaire non trouvé.";
    }
} else {
    // Si le formulaire n'a pas été soumis, rediriger vers une page appropriée
    header("Location: ../indexAdmin2.php");
    exit();
}
?>
