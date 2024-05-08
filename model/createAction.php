<?php
require('model/config.php');


if(isset($_POST['validate'])){

    if(!empty($_POST['title']) AND !empty($_POST['description']) AND empty($_POST['contenu'])){

        $commentaire_title=htmlspecialchars($_POST['title']);
        $commentaire_description=nl2br(htmlspecialchars($_POST['description']));
        $commentaire_content=nl2br(htmlspecialchars($_POST['content']));
        $question_date= date('d/m/Y');
        $question_id_author= $_SESSION['id'];
        $question_pseudo_author= $_SESSION['pseudo'];

        $insertCommentaire=$bdd->prepare('INSERT INTO commentaire(titre,description,contenu,id_auteur,pseudo_auteur,date_publication)VALUES(?,?,?,?,?,?) ');
        $insertCommentaire->execute(
            array(
                $commentaire_title,
                $commentaire_description,
                $commentaire_content,
                $question_id_author,
                $question_pseudo_author,
                $question_date
            )
        );

        $successMsg="Votre question a bien été publiées sur le site";
    }else{
        $errorMsg = "Veuillez completer tous les champs";
    }

}
