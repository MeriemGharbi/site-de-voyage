<?PHP
include "../Controller/UserC.php";
$UserC=new UserC();
if (isset($_GET['cin'])){
	$UserC->supprimerUser($_GET['cin']);
	header('Location: back.php');
}

?>