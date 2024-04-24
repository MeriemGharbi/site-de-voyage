<HTML>
    <head>
    <link rel="stylesheet" href="../style.css"> 
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
    <form class="formlogin" method="POST" action="login.php" >
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
                <span class="signin"><a href="#">Forgot password?</a>
    </form>
    <script src="../User_js/login.js"></script>
    </body>
</HTML>
<?PHP
include'../config.php';
if (isset($_POST['login']))
{
    try {
    $conn = config::getConnexion();
    $requette = $conn->prepare("SELECT * FROM tab_user where email=:email AND pwd=:pwd");
    $requette->bindParam(':email',$_POST["email_login"]);
    $requette->bindParam(':pwd',$_POST['pwd_login']);
    $requette->execute();
    $result = $requette->fetch();
    $count=$requette->rowCount();
    if($count>0)
    {       
            $rol = $result['rol'];
            $cin= $result['cin'];
            if ($rol == "admin") {
                header('Location:index_User.php');
                exit();
            }
            else if ($rol == "client") {
                header("Location: index1_User.php?cin=$cin");
                exit();
            }     
    }
    else{
        echo '<script>alert("incorrect email or password!!");</script>';}
} catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();}
}		



?>