<?PHP
require_once "../Controller/UserC.php";
session_start();
        if(isset($_SESSION['cin'])){
    $UserC=new UserC();
    $listecommande=$UserC->recupererUser(htmlspecialchars($_SESSION['cin']));
foreach($listecommande as $row){
}
$User = new User($row['cin'], $row['nom'], $row['prenom'], $row['d_n'], $row['email'], $row['phone'], $row['rol'],);
            $UserC->modifierUser($User, $_POST['cin']);
            header("Location:index1_User.php?cin={$row['cin']}");}
            
?>