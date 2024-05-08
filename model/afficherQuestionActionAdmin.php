<?php

require('model/config.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfTheQuestion=$_GET['id'];
    $checkIfQuestionExist=$bdd->prepare('SELECT * FROM commentaire WHERE id =?');
    $checkIfQuestionExist->execute(array($idOfTheQuestion));

    if($checkIfQuestionExist->rowCount()>0){
        $questionInfo=$checkIfQuestionExist->fetch();
        
        $question_title=$questionInfo['titre'];
        $question_content=$questionInfo['contenu'];
        $question_id_author=$questionInfo['id_auteur'];
        $question_pseudo_author=$questionInfo['pseudo_auteur'];
        $question_publication_date=$questionInfo['date_publication'];
    }else{
        $errorMsg="Aucune question n'a été trouvées";
    }
}else{
    $errorMsg="Aucune question n'a été trouvées";

}