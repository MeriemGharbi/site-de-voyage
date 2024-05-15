<?PHP
include "../Controller/UserC.php";
$UserC=new UserC();
if (isset($_GET['id_user'])){
	$UserC->banUser($_GET['id_user']);
	header('Location: back.php');
}

?>