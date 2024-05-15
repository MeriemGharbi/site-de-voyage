
<HTML>
    <head>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>
    <form class="formlogin" method="POST" name="inscription" id="formulaire" onsubmit="return verif_phone_conf();">
    <p class="title">ENTER YOUR PHONE</p>
                <label>
                    <input placeholder="" type="number" name="phone_conf" id="phone_conf" class="input">
                    <span>phone</span>
                    <div id="err_phone"></div>
                </label>
                <button type="submit" name="verif" value="verif" class="submit">Verif</button>
    </form>
       <script src="User_js/phoneResetPassword.js"></script>
    </body>

</HTML>
<?php
include'../config.php';
if(isset($_POST['verif']))
{
    try {
        $conn = config::getConnexion();
        $requette = $conn->prepare("SELECT * FROM tab_user where phone=:phone");
        $requette->bindParam(':phone',$_POST["phone_conf"]);
        $requette->execute();
        $result =$requette->fetch();
        $count=$requette->rowCount();
        if($count>0)
        {
            session_start();
            $_SESSION['phone'] = $_POST["phone_conf"];
            $_SESSION['cin']=$result['cin'];
            header('Location:codeDeConfirmation.php'); 
            exit();    
                
        }
        else{
            echo '<script>alert("Phone Inexistant!!");</script>';
            header('Location:phoneResetPassword.php'); 
            exit();
        }
    } catch (PDOException $e) {
        echo 'echec de connexion:' . $e->getMessage();}

}	
?>

