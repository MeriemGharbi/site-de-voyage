<?php
session_start();
require('../../model/model-forum/forum/getInfoModifier.php');
require('../../model/model-forum/forum/modifierAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../controller/head.php'; ?>
<body>
    <?php include '../../controller/navbar.php'; ?>
    <br><br>
    <div class="container">
        <?php
        if(isset($errorMsg)){
            echo'<p>'.$errorMsg.'</p>';
        }
        ?>
        <?php
        if(isset($comment_content)){
        ?>
            <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre question</label>
                    <input type="text" class="form-control" name="title" value="<?=$comment_title;?>" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description question</label>
                    <textarea  class="form-control" name="description" ><?=$comment_description;?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu question</label>
                    <textarea type="text" class="form-control" name="content"><?=$comment_content;?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="validate">Modifier</button>
            </form>
        <?php
        }
        
        ?>
    </div>
</body>
</html>

