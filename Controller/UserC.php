<?PHP
 require_once('../config.php');
 include '../Model/User.php';
class UserC 
{  
    function afficherUser ()
    {
        $conn = config::getConnexion();
  try {
    $query = $conn->prepare("SELECT * from tab_user");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }
        
	}
	
    function ajouterUser($User)
    {
        $conn = config::getConnexion();
try {
    $requette = $conn->prepare("INSERT INTO tab_user(cin,nom,prenom,d_n,email,phone,pwd,rol) VALUES (:cin,:nom,:prenom,:d_n,:email,:phone,:pwd,:rol)");
    $Cin_User=$User->getCin_User();
    $Nom_User=$User->getNom_User();
    $Prenom_User=$User->getPrenom_User();
    $D_N_User=$User->getD_N_User();
    $Email_User=$User->getEmail_User();
    $Phone_User=$User->getPhone_User();
    $Pwd_User=$User->getPwd_User();
    $requette->bindParam(':cin', $Cin_User);
    $requette->bindParam(':nom',  $Nom_User);
    $requette->bindParam(':prenom', $Prenom_User);
    $requette->bindParam(':d_n', $D_N_User);
    $requette->bindParam(':email', $Email_User);
    $requette->bindParam(':phone', $Phone_User);
    $requette->bindParam(':pwd', $Pwd_User);
    $rol = 'client'; 
    $requette->bindParam(':rol', $rol);
    $requette->execute();

    echo 'added with success';
} catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
}		
    }
    function supprimerUser($Cin_User)
    {
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("DELETE FROM tab_user where cin=:cin");
        $query->bindParam(':cin',$Cin_User);
        $query->execute();
        echo $query->rowCount() . 'records deleted successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
	function modifierUser($User,$Cin_User){
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("UPDATE tab_user SET nom=:nom,prenom=:prenom,d_n=:d_n,email=:email,phone=:phone where cin=:cin");
        $Nom_User=$User->getNom_User();
        $Prenom_User=$User->getPrenom_User();
        $D_N_User=$User->getD_N_User();
        $Email_User=$User->getEmail_User();
        $Phone_User=$User->getPhone_User();
        $Pwd_User=$User->getPwd_User();
        $query->bindParam(':cin', $Cin_User);
        $query->bindParam(':nom',  $Nom_User);
        $query->bindParam(':prenom', $Prenom_User);
        $query->bindParam(':d_n', $D_N_User);
        $query->bindParam(':email', $Email_User);
        $query->bindParam(':phone', $Phone_User);
        $query->execute();
        echo $query->rowCount() . 'records updated successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
		
    }
    function recupererUser($Cin_User)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * from tab_user where cin=$Cin_User");
            $query->execute();
            $result = $query->fetchAll();
            return $result;
            } catch (PDOException $e) {
            echo $e->getMessage();
            }
	}
    
    
    
    
    
    
	
   
}

?>