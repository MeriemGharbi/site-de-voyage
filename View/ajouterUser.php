<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Inscription</title>
</head>
    <body>
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
    <a href = "afficherUser.php" class="btn btn-primary">Back</a>
    <form class="form" method="POST" name="inscription" id="formulaire">
            <div class="flex">
                <label>
                <input placeholder="" type="number" name="cin" class="input" >
                    <span>Cin User</span>
                    <div id="cin"></div>
                </label>
                <label>
                    <input placeholder="" type="text" name="nom" class="input" >
                    <span>Nom User</span>
                    <div id="nom"></div>
                </label>
            </div>
            <div class="flex">
                <label>
                    <input placeholder="" type="text" name="prenom" class="input">
                    <span>Prenom User</span>
                    <div id="prenom"></div>
                </label>
                <label>
                    <input placeholder="" type="date" name="d_n" class="input" >
                    <span>Date De Naissance</span>
                    <div id="d_n"></div>
                </label>
            </div>
            <div class="flex">
                <label>
                    <input placeholder="" type="email" name="email" class="input">
                    <span>Email User</span>
                    <div id="email"></div>
                </label>
                <label>
                    <input placeholder="" type="number" name="phone" class="input">
                    <span>Phone User</span>
                    <div id="phone"></div>
                </label>
            </div>
                <label>
                    <input placeholder="" type="password" name="pwd" class="input" >
                    <span>Password User</span>
                    <div id="password"></div>
                </label>
                <button type="submit" name="ajouter" value="ajouter" class="submit">Submit</button>
                <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
    </form>
    </body>
</HTML>

<?PHP
if (isset($_POST['ajouter']))
{
    include "../Controller/UserC.php";
            
    $User= new User($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['d_n'],$_POST['email'],$_POST['phone'],$_POST['pwd']);
    $UserC=new UserC();
    $UserC->ajouterUser($User);
    header('Location: afficherUser.php');

}

?>