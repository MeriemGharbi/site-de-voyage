<HTML>
    <head>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>
    <form class="formlogin" method="POST" name="inscription" id="formulaire" onsubmit="return verif_pwd();">
    <p class="title">Update your Password</p>
                <label>
                    <input placeholder="" type="password" name="update_password" id="pwd" class="input">
                    <span>Password</span>
                    <i class="far fa-eye" id="togglePassword" style="margin-left: 260px; cursor: pointer;margin-top: -30px;"></i>
                    <div id="update_password"></div>
                </label>
                <label>
                    <input placeholder="" type="password" name="confirm_password" id="confirm_pwd" class="input">
                    <span>confirm_password</span>
                    <div id="confirm_password"></div>
                    <i class="far fa-eye" id="togglePassword1" style="margin-left: 260px; cursor: pointer;margin-top: -30px;"></i>
                </label>
                <button type="submit" name="update" value="update" class="submit">Update</button>
    </form>
    <script src="User_js/forgot_password.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword1 = document.querySelector('#togglePassword');
            const togglePassword2 = document.querySelector('#togglePassword1');
            const password1 = document.querySelector('#pwd');
            const password2 = document.querySelector('#confirm_pwd');
            
            if (togglePassword1 && password1 && togglePassword2 && password2) {
                togglePassword1.addEventListener('click', function (e) {
                    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
                    password1.setAttribute('type', type);
                    this.classList.toggle('fa-eye-slash');
                });
                
                togglePassword2.addEventListener('click', function (e) {
                    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                    password2.setAttribute('type', type);
                    this.classList.toggle('fa-eye-slash');
                });
            } 
        });
    </script>
    </body>

</HTML>
<?php
include'../config.php';
if (isset($_POST['update']))
{
    $update_password=$_POST["update_password"];
$confirm_password=$_POST["confirm_password"];
    session_start();
    if (isset($_SESSION['id_user'])){
    $id_user=$_SESSION['id_user'];
    if($update_password==$confirm_password)
    {
        $password=password_hash($update_password, PASSWORD_DEFAULT);
        $conn = config::getConnexion();
        try {
    
            $query = $conn->prepare("UPDATE tab_user SET pwd=:pwd where id_user=:id_user");
            $query->bindParam(':id_user', $id_user);
            $query->bindParam(':pwd',$password);
            $query->execute();
            echo $query->rowCount() . '';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        echo '<script>alert("update successfully!!");</script>';
        echo '<script>window.location.href = "login.php";</script>';
        exit();  
    }
    else{
        echo '<script>alert("vérifier les deux champs du password!!");</script>';
    }
    }
    else{
        echo '<script>window.location.href = "login.php";</script>';
    }
}
?>