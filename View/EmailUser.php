<HTML>
    <head>
    <link rel="stylesheet" href="../style.css"> 
    </head>
    <body>
    <form class="formlogin" method="POST" name="inscription" id="formulaire">
    <p class="title">Welcome </p>
                <label>
                    <input placeholder="" type="text" name="email_welcome" class="input">
                    <span>Email</span>
                    <div id="email_welcome"></div>
                </label>
                <button type="submit" name="login" value="login" class="submit">Log In</button>
                <span class="signin">Don't have an account? <a href="ajouterUser.php">Sign up</a></span>
    </form>
    </body>
    <?PHP
    if (isset($_POST['login'])){
       if($_POST["email_welcome"]==""){
       echo 'Aucun utilisateur trouvé avec cet identifiant.';}
        
    }
    ?>

</HTML>