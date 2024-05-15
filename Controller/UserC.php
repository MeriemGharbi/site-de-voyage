<?php
 require_once '../config.php';
 require_once '../Model/User.php';
class UserC 
{  
    function afficherUser ()
    {
        $conn = config::getConnexion();
  try {
    $query = $conn->prepare("SELECT * from tab_user where rol=:rol ");
    $rol = 'client';
    $query->bindParam(':rol', $rol);
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
    $requette = $conn->prepare("INSERT INTO tab_user(cin,nom,prenom,d_n,email,phone,pwd,rol,ban) VALUES (:cin,:nom,:prenom,:d_n,:email,:phone,:pwd,:rol,:ban)");
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
    $ban='0'; 
    $requette->bindParam(':rol', $rol);
    $requette->bindParam(':ban', $ban);
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
        echo $query->rowCount() . '';
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
    function banUser($id_User){
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("UPDATE tab_user SET ban=:ban where id_user=:id_user");
        $query->bindParam(':id_user', $id_User);
        $ban='1';
        $query->bindParam(':ban',  $ban);
        $query->execute();
        echo $query->rowCount() . '';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
		
    }
    function unbanUser($id_User){
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("UPDATE tab_user SET ban=:ban where id_user=:id_user");
        $query->bindParam(':id_user', $id_User);
        $ban='0';
        $query->bindParam(':ban',  $ban);
        $query->execute();
        echo $query->rowCount() . '';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
		
    }
    function rechercherUser($Cin_User)
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
    function afficherUserPagination($start_from, $records_per_page) {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM tab_user WHERE rol = :rol LIMIT :start_from, :records_per_page");
            $rol = 'client';
            $query->bindParam(':rol', $rol);
            $query->bindParam(':start_from', $start_from, PDO::PARAM_INT);
            $query->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo 'echec de connexion:' . $e->getMessage();
        }
    }
    function trierUser($start_from, $records_per_page) {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * FROM tab_user WHERE rol = :rol ORDER BY d_n LIMIT :start_from, :records_per_page ");
            $rol = 'client';
            $query->bindParam(':rol', $rol);
            $query->bindParam(':start_from', $start_from, PDO::PARAM_INT);
            $query->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
    }
    

    
    
    
    
    
	
   
}

?>