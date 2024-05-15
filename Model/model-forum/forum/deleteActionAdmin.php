<?php
session_start();
require('config.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idComment = $_GET['id'];
    $checkifCommentExist = $bdd->prepare('SELECT id_auteur FROM commentaire WHERE id=?');
    $checkifCommentExist->execute(array($idComment));

    if($checkifCommentExist->rowCount() > 0){
        $userInfo = $checkifCommentExist->fetch();
        //if($userInfo['id_auteur'] == $_SESSION['id']){
            if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes'){
                $deleteComment = $bdd->prepare('DELETE FROM commentaire WHERE id=?');
                $deleteComment->execute(array($idComment));
                header('Location: ../../../view/view-forum/indexAdmin2.php');
            } else {
                echo '<script>
                        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette question ?");
                        if(confirmation) {
                            window.location.href = "deleteActionAdmin.php?id='.$idComment.'&confirm=yes";
                        } else {
                            window.location.href = "../../../view/view-forum/indexAdmin2.php";
                        }
                      </script>';
            }
        /*} else {
            echo "C'est interdit";
        }*/
    } else {
        echo "Aucune questione n'a été trouvé";
    }
} else {
    echo "Aucune question n'a été trouvé";
}
?>