<?php 
require('../../model/model-forum/forum/myCommentAction.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../controller/head.php'; ?>
<body>
    <?php include '../../controller/navbar.php'; ?>
    <br><br>
    <div class="container">
    <?php
        while($comment=$getAllMyComment->fetch()){
            ?>
            <div class="card">
            <div class="card-header">
                <a href="afficheQuestion.php?id=<?php echo $comment['id'];?>">
                    <?php echo $comment['titre'];?>
                </a>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $comment['description']; ?></p>
                <a href="afficheQuestion.php?id=<?=$comment['id'];?>" class="btn btn-info">Accéder à la question</a>
                <a href="modifierComment.php?id=<?=$comment['id']; ?>" class="btn btn-warning">Modifier la question</a>
                <a href="../../model/model-forum/forum/deleteAction.php?id=<?=$comment['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                
            </div>
            </div>
            <br>
            <?php



        }



    ?>

</body> 
</html>