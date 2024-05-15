<HTML>
    <head>
    <link rel="stylesheet" href="assets/css/style.css"> 
    </head>
    <style>
        .showpassword_box{
    display: flex;
    margin-top: 25px;
}
.showpassword_box p{
    margin-left: 10px;
    font-size: 18px;
}
.box input[type="checkbox"]{
    width: 16px;
}
    </style>
    <body>
    <form id="forgot_password_form"  class="formlogin" method="POST" action="" onsubmit="return verif_form();" >
    <p class="title">LOG IN </p>
                <label>
                    <input placeholder="" type="email" name="email_login" id="email" class="input">
                    <span>Email</span>
                    <div id="err_email"></div>

                </label>
                <label>
                    <input placeholder="" type="password" name="pwd_login" id="pwd" class="input" >
                    <span>Password</span>
                    <div id="err_pwd"></div>
                </label>
                <div class="signin">
                      <input type="checkbox" id="checkbox"><label for="checkbox">Show password</label>
                </div>
                <button type="submit" name="login" value="login" class="submit" >Log In</button>
                <p class="signin">Don't have an acount ? <a href="ajouterUser.php">Signup</a> </p>
                <span class="signin"><a href="EmailResetPassword.php" name="forgot_password" id="forgot_password_link"  >Forgot password?</a></span>
    </form>
    <script src="assets/User_js/login.js"></script>
    <script>
        var pwd = document.getElementById("pwd");
    var checkbox = document.getElementById("checkbox");
    checkbox.onclick = function(){
        if (checkbox.checked) {
            pwd.type = "text";
        }else{
            pwd.type = "password";
        }
    }
</script>

    </body>
<?PHP

include'../config.php';
$message = '';
if (isset($_POST['login']))
{
    try {
    $conn = config::getConnexion();
    $requette = $conn->prepare("SELECT * FROM tab_user where email=:email");
    $requette->bindParam(':email',$_POST["email_login"]);
    $requette->execute();
    $result =$requette->fetch();
    $count=$requette->rowCount();
    if($count>0)
    {  
            $password=$_POST['pwd_login'];
            $passwordHash= $result['pwd'] ;
            if(password_verify($password, $passwordHash))
            {
                $ban = $result['ban'];
                if($ban=="0")
                {
                    session_start();
                    $rol = $result['rol'];
                    $cin= $result['cin'];
                    $_SESSION['cin'] = $result['cin'];
                    $_SESSION['id_user'] = $result['id_user'];
                    $_SESSION['prenom'] = $result['prenom'];
                    if ($rol == "admin") {
                        header('Location:integration/view/back.php');
                        exit();
                    }
                    else if ($rol == "client") {
                    header("Location: back_User.php");
                    exit();
                    } 
                 }
                 else
                 {
                    $message = "tu as etait banni(e)!!";
                 }

            } 
            else
            {
                $message = "incorrect password!!";
            }   
    }
    else{
        $message = "incorrect email!!";
    }
} catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();}
}
?>
<?php if (!empty($message)): ?>
    <script>alert("<?php echo $message; ?>");</script>
<?php endif; ?>
</HTML>