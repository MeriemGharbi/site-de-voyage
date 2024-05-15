<?php

require('config.php');

if(isset($_SESSION['id_user']) AND !empty($_SESSION['id_user'])){
    $checkIfCommentExist =$bdd->prepare('SELECT * FROM commentaire WHERE id_auteur =?');
    $checkIfCommentExist->execute(array($_SESSION['id_user']));

    if($checkIfCommentExist->rowCount()>0){

        $commentInfo=$checkIfCommentExist->fetch();
        if($commentInfo['id_auteur']==$_SESSION['id_user']){

            $comment_title=$commentInfo['titre'];
            $comment_description=$commentInfo['description'];
            $comment_content=$commentInfo['contenu'];

            $comment_description=str_replace('<br />','',$comment_description);
            $comment_content=str_replace('<br />','',$comment_content);

        }else{
            $errorMsg="Vous n'étes pas l'auteur de cette question";
        }

    }else{
        $errorMsg="Aucune question n'a été trouvée";

    }



}else{
    $errorMsg="Aucune question n'a été trouvée";
}