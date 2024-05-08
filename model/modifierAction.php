<?php
require('model/config.php');
if(isset($_POST['validate'])){
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        $new_comment_title = htmlspecialchars($_POST['title']);
        $new_descriptin_title = nl2br(htmlspecialchars($_POST['description']));
        $new_descriptin_content = nl2br(htmlspecialchars($_POST['content']));

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $idComment = $_GET['id'];
            $editComment= $bdd->prepare('UPDATE commentaire SET titre = ? , description = ? , contenu = ? WHERE id = ? ');
            $editComment->execute(array($new_comment_title , $new_descriptin_title, $new_descriptin_content,$idComment));
            header('Location: myComment.php');
        }else{
            echo "Aucune question n'a été trouvée";
        }
    }else{
        $errorMsg="Veuillez completer tous les champs...";
    }
}


?>
