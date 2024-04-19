<?PHP
include "../Controller/PartnershipC.php";
$PartnershipC=new PartnershipC();
if (isset($_GET['id'])){
	$PartnershipC->supprimerPartnership($_GET['id']);
	header('Location: afficherPartnership.php');
}

?>