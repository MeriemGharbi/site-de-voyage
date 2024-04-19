<?PHP
 include'../config.php';
 include '../Model/Partnership.php';
class PartnershipC 
{  
    function afficherPartnership()
    {
        $conn = config::getConnexion();
  try {
    $query = $conn->prepare("SELECT * from partnership_tab");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
  } catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();
  }
        
	}
	
    function ajouterPartnership($Partnership)
{
    $conn = config::getConnexion();
    try {
        $requette = $conn->prepare("INSERT INTO partnership_tab(id,nom,adresse,email,phone,startdate,enddate,Pstatus,typevehicles) VALUES (:id,:nom,:adresse,:email,:phone,:startdate,:enddate,:pstatus,:typevehicles)");

        $Agency_ID = $Partnership->getAgency_ID();
        $Agency_Name = $Partnership->getAgency_Name();
        $address = $Partnership->getaddress();
        $Partnership_Start_Date = $Partnership->getPartnership_Start_Date();
        $Partnership_End_Date = $Partnership->getPartnership_End_Date();
        $Agency_Email = $Partnership->getAgency_Email();
        $Agency_phone = $Partnership->getAgency_phone();
        $Partnership_Status = $Partnership->getPartnership_Status();
        $Type_Vehicles_Available = $Partnership->getType_Vehicles_Available();

        $requette->bindParam(':id', $Agency_ID);
        $requette->bindParam(':nom', $Agency_Name);
        $requette->bindParam(':adresse', $address);
        $requette->bindParam(':email', $Agency_Email);
        $requette->bindParam(':phone', $Agency_phone);
        $requette->bindParam(':startdate', $Partnership_Start_Date);
        $requette->bindParam(':enddate', $Partnership_End_Date);
        $requette->bindParam(':pstatus', $Partnership_Status); 
        $requette->bindParam(':typevehicles', $Type_Vehicles_Available);

        $requette->execute();

        echo 'added with success';
    } catch (PDOException $e) {
        echo 'echec de connexion:' . $e->getMessage();
    }		
}

    function supprimerPartnership($Agency_ID)
    {
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("DELETE FROM partnership_tab where id=:id");
        $query->bindParam(':id',$Agency_ID);
        $query->execute();
        echo $query->rowCount() . 'records deleted successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }
	function modifierPartnership($Partnership,$Agency_ID){
        $conn = config::getConnexion();
    try {

        $query = $conn->prepare("UPDATE partnership_tab SET id=:id,nom=:nom,adresse=:adresse,email=:email,phone=:phone,startdate=:startdate,enddate=:enddate,pstatus=:pstatus,typevehicles=:typevehicles where id=:id");
        $Agency_ID=$Partnership->getAgency_ID();
        $Agency_Name=$Partnership->getAgency_Name();
        $address=$Partnership->getaddress();
        $Partnership_Start_Date=$Partnership->getPartnership_Start_Date();
        $Partnership_End_Date=$Partnership->getPartnership_End_Date();
        $Agency_Email=$Partnership->getAgency_Email();
        $Agency_phone=$Partnership->getAgency_phone();
        $Partnership_Status=$Partnership->getPartnership_Status();
        $Type_Vehicles_Available=$Partnership->getType_Vehicles_Available();
        $query->bindParam(':id',$Agency_ID);
        $query->bindParam(':nom',$Agency_Name);
        $query->bindParam(':adresse',$address);
        $query->bindParam(':email',$Agency_Email);
        $query->bindParam(':phone',$Agency_phone);
        $query->bindParam(':startdate',$Partnership_Start_Date);
        $query->bindParam(':enddate',$Partnership_End_Date);
        $query->bindParam(':pstatus',$Partnership_Status);
        $query->bindParam(':typevehicles',$Type_Vehicles_Available);
        $query->execute();
        echo $query->rowCount() . 'records updated successfully';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
		
    }
    function recupererPartnership($Agency_ID)
    {
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare("SELECT * from partnership_tab where id=$Agency_ID");
            $query->execute();
            $result = $query->fetchAll();
            return $result;
            } catch (PDOException $e) {
            echo $e->getMessage();
            }
	}
    
   
}

?>