<?php
include '../config.php';
error_reporting(0);
$conn = config::getConnexion(); //etablit la connexion

try {
$NomHotel = $_POST['NomHotel'];
$adresse = $_POST['adresse'];
$description = $_POST['description'];
$etoiles = $_POST['etoiles'];
$lienPhotoHotel = $_POST['lienPhotoHotel'];
$infoContact = $_POST['infoContact'];

$requette = $conn->prepare("INSERT INTO hotels(NomHotel, adresse, description, etoiles, lienPhotoHotel, infoContact) 
VALUES (:NomHotel, :adresse, :description, :etoiles, :lienPhotoHotel, :infoContact)");

$requette->bindParam(':NomHotel', $NomHotel);
$requette->bindParam(':adresse', $adresse);
$requette->bindParam(':description', $description);
$requette->bindParam(':etoiles', $etoiles);
$requette->bindParam(':lienPhotoHotel', $lienPhotoHotel);
$requette->bindParam(':infoContact', $infoContact);

$requette->execute();




////////////////////////////////////////////// CHAMBRES
//$nomHotel = $conn->lastInsertId();

$idChambre = $_POST['idChambre'];

// Prepare SQL statement for updating chambre table with idOffre
$requeteChambre = $conn->prepare("UPDATE chambres SET nomHotel = :NomHotel WHERE idChambre = :idChambre");

// Assuming you have $idChambre defined from $_POST['idChambre']


// Bind parameters for updating chambre table
$requeteChambre->bindParam(':NomHotel', $NomHotel); 
$requeteChambre->bindParam(':idChambre', $idChambre);

// Execute the query to update chambre table
$requeteChambre->execute();
////////////////////////////////////////////////////


header('Location: ../view/display.php');
exit(); // Stop execution after redirection

} catch (PDOException $e) {
if ($e->errorInfo[1] == 1062) {
    echo "L'hôtel existe déjà dans la base de données.";
} else {
   // echo 'echec de connexion:' . $e->getMessage();
}
}

function populateidChambreOptions() {
    try {
        // Establish connection
        $conn = config::getConnexion();
        // Prepare SQL statement to fetch hotel names
        $stmt = $conn->prepare("SELECT idChambre FROM chambres");
        $stmt->execute();
        // Fetch hotel names
        $chambres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Loop through hotels and output as options
        foreach ($chambres as $chambre) {
            echo '<option value="' . $chambre['idChambre'] . '">' . $chambre['idChambre'] . '</option>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
<link rel="stylesheet" href="../view/assets/css/style.css">

    <title>Liste des hôtels</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
     <!-- =============== Navigation ================ -->
     <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                    <span class="title" style="font-size: 250%; right: -50px; ">Xplore</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#"  onclick="showOffres()" >
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Offres</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="card-outline"></ion-icon>
                        </span>
                        <span class="title">Paiement</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="telescope-outline"></ion-icon>
                        </span>
                        <span class="title">activités</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Transport</span>
                    </a>
                </li>
            </ul>
        </div>
     <!-- =============== Navigation end ================ -->
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


     <!-- =============== Main end ================ -->
<div class="main" >

<form class="details" action="" method="post" onsubmit="return validateForm()" style="position: fixed; top: 40%; left: 70%; transform: translate(-50%, -50%);" >
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Formulaire d'ajout hotel</h2>

                   

                    <table>
                        <tbody>
                            <tr>
                                <td><label for="NomHotel">Nom de l'hotel:</label></td>
                                <td><input type="text" id="NomHotel" name="NomHotel"></td>
                            </tr>
                            <tr>
                                <td><label for="adresse">Adresse:</label></td>
                                <td><input type="text" id="adresse" name="adresse"></td>
                            </tr>
                            <tr>
                                <td><label for="description">Description:</label></td>
                                <td><input type="text" id="description" name="description"></td>
                            </tr>
                            <tr>
                                <td><label for="etoiles">Etoiles:</label></td>
                                <td><input type="number" id="etoiles" name="etoiles"></td>
                            </tr>
                            <tr>
                                <td><label for="lienPhotoHotel">Lien Photo de l'hotel:</label></td>
                                <td><input type="text" id="lienPhotoHotel" name="lienPhotoHotel"></td>
                            </tr>
                            <tr>
                                <td><label for="infoContact">Informations de contact:</label></td>
                                <td><input type="text" id="infoContact" name="infoContact"></td>
                            </tr>


                            <tr>
                            <td><label for="id chambre">id de la chambre:</label></td>
                            <td>
                                <select id="idChambre" name="idChambre">
                                    <?php populateidChambreOptions(); ?>
                                </select>
                            </td>
                            </tr>




                        </tbody>
                    </table>

                    <input type="submit" class="btn" value="Submit" style="position: fixed; top: 75%; left: 40%; ">
                </div>
                </div>
            </form>
    </div>
   
    <script>
        function validateForm() {
            var nomHotel = document.getElementById("NomHotel").value.trim();
            var adresse = document.getElementById("adresse").value.trim();
            var description = document.getElementById("description").value.trim();
            var etoiles = document.getElementById("etoiles").value.trim();
            //var prixHotel = document.getElementById("prixHotel").value.trim();
            var lienPhotoHotel = document.getElementById("lienPhotoHotel").value.trim();
            var infoContact = document.getElementById("infoContact").value.trim();

            if (nomHotel === "" || adresse === "" || description === "" || etoiles === ""  || lienPhotoHotel === "" || infoContact === "") {
                alert("Tous les champs sont obligatoires.");
                return false; 
            }

            var nomHotelRegex = /^[a-zA-Z\s]+$/;
            if (!nomHotelRegex.test(nomHotel)) {
                alert("Le nom de l'hôtel ne peut contenir que des lettres et des espaces.");
                return false;
            }

            if (isNaN(etoiles) || etoiles < 1 || etoiles > 5) {
                alert("Le nombre d'étoiles doit être un nombre entre 1 et 5.");
                return false;
            }

            var lienPhotoHotelRegex = /^https?:\/\/.*\.(jpg|jpeg)$/i;
            if (!lienPhotoHotelRegex.test(lienPhotoHotel)) {
                alert("Le lien de la photo de l'hôtel doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
                return false;
            }

            var infoContactRegex = /^\d{8}$/;
            if (!infoContactRegex.test(infoContact)) {
                alert("Les informations de contact doivent contenir exactement 8 chiffres.");
                return false;
            }


            return true; 
        }
    </script>

    <?php
      
    ?>



    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>