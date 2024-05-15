
<HTML>
    <head>
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>
    <form class="formlogin" method="POST" name="inscription" id="formulaire" onsubmit="return verif_email_conf();">
    <p class="title">ENTER YOUR EMAIL</p>
                <label>
                    <input placeholder="" type="email" name="email_conf" id="email_conf" class="input">
                    <span>email</span>
                    <div id="err_email"></div>
                </label>
                <button type="submit" name="reset" value="reset" class="submit">Reset Password</button>
    </form>
       <script src="assets/User_js/EmailresetPasword.js"></script>
    </body>

</HTML>
<?php
include'../config.php';
if(isset($_POST['reset']))
{
    try {
        $conn = config::getConnexion();
        $requette = $conn->prepare("SELECT * FROM tab_user where email=:email");
        $requette->bindParam(':email',$_POST["email_conf"]);
        $requette->execute();
        $result =$requette->fetch();
        $count=$requette->rowCount();
        if($count>0)
        {
            session_start();
            $_SESSION['email'] = $_POST["email_conf"];
            header('Location:sendEmailToUser.php'); 
            exit();    
                
        }
        else{
            echo '<script>alert("Email Inexistant!!");</script>';
            header('Location:emailResetPassword.php'); 
            exit();
        }
    } catch (PDOException $e) {
        echo 'echec de connexion:' . $e->getMessage();}

}	
?>

