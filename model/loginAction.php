<?php
session_start();
require('model/config.php');


//Validation formulaire
if(isset($_POST['validate'])){
    //Verifirer si l'user a bien completer tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['password'])){
       //Les donnees de l'user
        $user_pseudo=htmlspecialchars($_POST['pseudo']);
        $user_password=htmlspecialchars($_POST['password']);

        $checkIfUserExist=$bdd->prepare('SELECT * FROM users WHERE pseudo=?');
        $checkIfUserExist->execute(array($user_pseudo));

        if($checkIfUserExist->rowCount()>0){
            $userInfos=$checkIfUserExist->fetch();

            if(password_verify($user_password, $userInfos['mdp'])){
                //Authentifier l'utilisateur sur le site et recuperer ses donnees
                $_SESSION['auth']=true;
                $_SESSION['id']=$userInfos['id'];
                $_SESSION['lastname']=$userInfos['nom'];
                $_SESSION['firstname']=$userInfos['prenom'];
                $_SESSION['pseudo']=$userInfos['pseudo'];
                header('Location: index1.php');
            }
            else{
                $errorMsg="Votre mot de passe est incorrect...";
            }
        }
        else{
            $errorMsg="Votre pseudo est incorrect...";
        }
    }
else{
    $errorMsg="Veuillez completer tous les champs...";
}
}