<HTML>
<head>
<link rel="stylesheet" href="../style.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .form {
        border: 2px solid blue;
        padding: 20px;
        border-radius: 10px;
        max-width: 700px; 
        margin: auto; 
        margin-top: 20px; 
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
</head>
<body>
<?PHP
include "../Controller/UserC.php";

if (isset($_GET['cin']))
{
	$UserC=new UserC();
    $result=$UserC->recupererUser($_GET['cin']);
    foreach($result as $row)
    {
		$Cin_User=$row['cin'];
		$Nom_User=$row['nom'];
		$Prenom_User=$row['prenom'];
		$D_N_User=$row['d_n'];
        $Email_User=$row['email'];
        $Phone_User=$row['phone'];
        $Pwd_User=$row['pwd'];
        
?>
<form class="form" method="POST" name="inscription" id="formulaire">
<p class="title">Modify Profile </p>
<div class="flex">
<label>
<input placeholder="" type="number" name="cin" id="cin" value="<?PHP echo $Cin_User ?>" class="input" readonly>
<span>Cin User</span>
<div id="cin"></div>
</label>
<label>
<input placeholder="" type="text" name="nom" id="nom" value="<?PHP echo $Nom_User ?>" class="input" readonly>
<span>Nom User</span>
<div id="nom"></div>
</label>
</div>
<div class="flex">
<label>
<input placeholder="" type="text" name="prenom" id="prenom" value="<?PHP echo $Prenom_User ?>" class="input" readonly >
<span>Prenom User</span>
<div id="prenom"></div>
</label>
<label>
<input placeholder="" type="date" name="d_n" id="d_n" value="<?PHP echo $D_N_User ?>" class="input" readonly >
<span>Date De Naissance</span>
<div id="d_n"></div>
</label>
</div>
<div class="flex">
<label>
<input placeholder="" type="email" name="email"  value="<?PHP echo $Email_User ?>" class="input"  >
<span>Email User</span>
<div id="email"></div>
</label>
<label>
<input placeholder="" type="number" name="phone" value="<?PHP echo $Phone_User ?>" class="input"  >
<span>Phone Number</span>
<div id="phone"></div>
</label>
</div>
<label>
<button type="submit" name="modifier" value="modifier" class="submit">Update</button>
<button type="submit" name="back" value="back" class="submit">Back</button>
</label>
<script src="../User_js/modifierUser.js"></script>
</form>

</body>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	require_once('../config.php');
	$User=new User($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['d_n'],$_POST['email'],$_POST['phone'],$Pwd_User);
	$UserC->modifierUser($User,$_POST['cin']);
    $conn = config::getConnexion();
try {
    $requette = $conn->prepare("SELECT * FROM tab_user where email=:email");
    $requette->bindParam(':email',$_POST["email"]);
    $requette->execute();
    $count1=$requette->rowCount();
    $query2= $conn->prepare("SELECT * FROM tab_user where phone=:phone");
    $query2->bindParam(':phone',$_POST["phone"]);
    $query2->execute();
    $count2=$query2->rowCount();
    if($count1>1)
    {
        echo '<script>alert("Email existe deja!!");</script>';}
    else if($count2>1)
    {
        echo '<script>alert("phone Number existe deja!!");</script>';}
        else {
            echo '<script>';
            echo 'var cin = "' . htmlspecialchars($_POST["cin"]) . '";';
            echo 'var result = confirm("Do you want to Modify: " + cin + "?");';
            echo 'if (result) {';
            echo '    window.location.href = "ModifyUser.php?cin=' . $_POST["cin"] . '";'; 
            echo '} else {';
            echo '    window.location.href = "modifierUser.php?cin=' . $_POST["cin"] . '";';
            echo '}';
            echo '</script>';
        }
} catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();}       

	
}
if (isset($_POST['back'])){
    header("Location:index1_User.php?cin={$_POST['cin']}");

}
?>

</HTMl>