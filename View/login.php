<HTML>
    <head>
    <link rel="stylesheet" href="../style.css"> 
    </head>
    <body>
    <form class="formlogin" method="POST" action="login.php">
    <p class="title">Enter your password </p>
                <label>
                    <input placeholder="" type="email" name="email_login" id="email_login" class="input">
                    <span>Email</span>
                </label>
                <label>
                    <input placeholder="" type="password" name="pwd_login" id="pwd_login" class="input" >
                    <span>Password</span>
                </label>
                <button type="submit" name="login" value="login" class="submit" >Log In</button>
                <span class="signin">Don't have an account?</span>
                <span class="signin"><a href="#">Forgot password?</a>
    </form>
    </body>
</HTML>
<?PHP
include'../config.php';
if (isset($_POST['login']))
{
    if (empty($_POST['email_login'])){
    echo '<script>alert("champ Email vide!!");</script>';}
    else if (empty($_POST['pwd_login'])){
    echo '<script>alert("champ Password vide!!");</script>';}
    else
    {
        $conn = config::getConnexion();
try {
    $requette = $conn->prepare("SELECT * FROM tab_user where email=:email AND pwd=:pwd");
    $requette->bindParam(':email',$_POST["email_login"]);
    $requette->bindParam(':pwd',$_POST['pwd_login']);
    $requette->execute();
    $count=$requette->rowCount();
    if($count>0)
    {
        $conn = config::getConnexion();
        try {
        $query = $conn->prepare("SELECT rol FROM tab_user where email=:email");
        $query->bindParam(':email',$_POST["email_login"]);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $rol = $result['rol'];
            if ($rol == "admin") {
                header('Location:index_User.php');
            }
            else if ($rol == "client") {
                header('Location:../index1_User.html');
            }
        }       
        } catch (PDOException $e) {
        echo 'echec de connexion:' . $e->getMessage();}
    }
    else{
        echo '<script>alert("incorrect email or password!!");</script>';}
} catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();}
}
}		



?>