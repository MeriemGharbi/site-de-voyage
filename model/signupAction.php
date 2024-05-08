<?php
session_start();
require('model/config.php');
 
//Validation formulaire
if(isset($_POST['validate'])){
    //Verifirer si l'user a bien completer tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){
       //Les donnees de l'user
        $user_pseudo=htmlspecialchars($_POST['pseudo']);
        $user_lastname=htmlspecialchars($_POST['lastname']);
        $user_firstname=htmlspecialchars($_POST['firstname']);
        $user_password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        //Verifier si l'utilisateur existe deja sur le site
        $checkIfUserExist=$bdd->prepare('SELECT pseudo FROM users WHERE pseudo =?');
        $checkIfUserExist->execute(array($user_pseudo));

        if($checkIfUserExist->rowCount() ==0){
            //inserer l'utilisateur dans la base
            $insertUser=$bdd->prepare('INSERT INTO users(pseudo,nom,prenom,mdp)VALUES(?,?,?,?)');
            $insertUser->execute(array($user_pseudo,$user_lastname,$user_firstname,$user_password));
            //recuperer les informations de l'utilisateur
            $getInfoOfThisUserReq=$bdd->prepare('SELECT id,pseudo,nom,prenom FROM users WHERE nom= ? AND prenom= ? AND pseudo= ? ');
            $getInfoOfThisUserReq->execute(array($user_lastname,$user_firstname,$user_pseudo));
            $usersInfo=$getInfoOfThisUserReq->fetch();
            //Authentifier l'utilisateur sur le site et recuperer ses donnees
            $_SESSION['auth']=true;
            $_SESSION['id']=$usersInfo['id'];
            $_SESSION['lastname']=$usersInfo['nom'];
            $_SESSION['firstname']=$usersInfo['prenom'];
            $_SESSION['pseudo']=$usersInfo['pseudo'];
            header('Location:index1.php');
        }
        else{
            $errorMsg="l'utilisateur existe deja sur le site";
        }
    }
else{
    $errorMsg="Veuillez completer tous les champs...";
}
}