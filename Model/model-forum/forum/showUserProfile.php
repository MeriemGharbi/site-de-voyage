<?php
require('config.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){


    $checkIfUserExists=$bdd->prepare('SELECT nom,prenom,email FROM tab_user WHERE id_user=?');
    $checkIfUserExists->execute(array($_GET['id']));
    if($checkIfUserExists->rowCount() >0){

        $usersInfos=$checkIfUserExists->fetch();
        $user_pseudo=$usersInfos['email'];
        $user_lastname=$usersInfos['prenom'];
        $user_firstname=$usersInfos['nom'];


        $getHisQuestion=$bdd->prepare('SELECT * FROM commentaire WHERE id_auteur=? ');
        $getHisQuestion->execute(array($_GET['id']));
    }else{
        $errorMsg="Aucune question trouvé";
    }

}else{
    $errorMsg="Aucun utilisateur trouvé";
}