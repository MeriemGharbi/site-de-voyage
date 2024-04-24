<?PHP
require_once "../Controller/UserC.php";
if (isset($_GET['cin'])){
    $UserC=new UserC();
    $listecommande=$UserC->recupererUser($_GET['cin']);
foreach($listecommande as $row){
}
$User = new User($row['cin'], $row['nom'], $row['prenom'], $row['d_n'], $row['email'], $row['phone'], $row['rol'],);
            $UserC->modifierUser($User, $_POST['cin']);
            header("Location:index1_User.php?cin={$row['cin']}");}
            
?>