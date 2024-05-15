<HTML>
<head>
<link rel="stylesheet" href="../style.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
<a href = "afficherUser.php" class="btn btn-primary">Back</a>
<form class="form" method="POST">
<p class="title">Update User </p>
<div class="flex">
<label>
<input placeholder="" type="number" name="cin" value="<?PHP echo $Cin_User ?>" class="input" >
<span>Cin User</span>
</label>
<label>
<input placeholder="" type="text" name="nom" value="<?PHP echo $Nom_User ?>" class="input">
<span>Nom User</span>
</label>
</div>
<div class="flex">
<label>
<input placeholder="" type="text" name="prenom" value="<?PHP echo $Prenom_User ?>" class="input">
<span>Prenom User</span>
</label>
<label>
<input placeholder="" type="date" name="d_n" value="<?PHP echo $D_N_User ?>" class="input" >
<span>Date De Naissance</span>
</label>
</div>
<div class="flex">
<label>
<input placeholder="" type="email" name="email" value="<?PHP echo $Email_User ?>" class="input">
<span>Email User</span>
</label>
<label>
<input placeholder="" type="number" name="phone" value="<?PHP echo $Phone_User ?>" class="input">
<span>Phone Number</span>
</label>
</div>
<label>
<button type="submit" name="modifier" value="modifier" class="submit">Update</button>
</label>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$User=new User($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['d_n'],$_POST['email'],$_POST['phone'],$Pwd_User);
	$UserC->modifierUser($User,$_POST['cin']);
	header('Location: afficherUser.php');
}
?>
</body>
</HTMl>