<?php 
session_start(); 
require('../../model/model-forum/forum/showUserProfile.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../controller/head.php'; ?>
<body>
    <?php include '../../controller/navbar.php'; ?>
    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php 
                if(isset($errorMsg)){echo $errorMsg;}
                if(isset($getHisQuestion)){
                ?>
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase mb-4"><?=$user_lastname.' ' . $user_firstname; ?></h4>
                            <p class="card-text text-center"><strong>Email:</strong> <?=$user_pseudo; ?></p>
                        </div>
                    </div>
                    <br>
                    <?php
                    while($question=$getHisQuestion->fetch()){
                    ?>
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-white">
                                <?=$question['titre']; ?>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?=$question['description']; ?></p>
                            </div>
                            <div class="card-footer bg-light text-muted"> 
                                Par <?=$question['pseudo_auteur']; ?> le <?=$question['date_publication']; ?>                     
                            </div>
                        </div>
                        <br>
                    <?php
                    }
                }
                ?>  
            </div> 
        </div>
    </div>
</body> 
</html>

