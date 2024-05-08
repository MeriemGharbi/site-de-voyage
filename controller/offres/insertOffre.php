<?php
include '../../config.php';
$conn = config::getConnexion(); // Establish the connection
error_reporting(0);

try {
    // Assign POST data to variables
    $lienOffre1 = $_POST['lienOffre1'];
    $lienOffre2 = $_POST['lienOffre2'];
    $lienOffre3 = $_POST['lienOffre3'];
    $descriptionOffre = $_POST['descriptionOffre'];
    //$prixOffre = $_POST['prixOffre'];
    $dateAjoutOffre = date('Y-m-d H:i:s'); // Current date and time
    $nomHotel = $_POST['nomHotel'];

    // Prepare SQL statement for inserting into offres table
    $requeteOffre = $conn->prepare("INSERT INTO offres (lienOffre1, lienOffre2, lienOffre3, descriptionOffre, dateAjoutOffre, nomHotel) 
                            VALUES (:lienOffre1, :lienOffre2, :lienOffre3, :descriptionOffre, :dateAjoutOffre, :nomHotel)");

    // Bind parameters for inserting into offres table
    $requeteOffre->bindParam(':lienOffre1', $lienOffre1);
    $requeteOffre->bindParam(':lienOffre2', $lienOffre2);
    $requeteOffre->bindParam(':lienOffre3', $lienOffre3);
    // $requeteOffre->bindParam(':prixOffre', $prixOffre);
    $requeteOffre->bindParam(':descriptionOffre', $descriptionOffre);
    $requeteOffre->bindParam(':dateAjoutOffre', $dateAjoutOffre);
    $requeteOffre->bindParam(':nomHotel', $nomHotel);

    // Execute the query to insert into offres table
    $requeteOffre->execute();

    // Retrieve the last inserted idOffre
    // $idOffre = $conn->lastInsertId();

    // $idChambre = $_POST['idChambre'];

    // // Prepare SQL statement for updating chambre table with idOffre
    // $requeteChambre = $conn->prepare("UPDATE chambres SET idOffre = :idOffre WHERE idChambre = :idChambre");

    // // Assuming you have $idChambre defined from $_POST['idChambre']
    

    // // Bind parameters for updating chambre table
    // $requeteChambre->bindParam(':idOffre', $idOffre);
    // $requeteChambre->bindParam(':idChambre', $idChambre);

    // // Execute the query to update chambre table
    // $requeteChambre->execute();

    // Redirect after successful insertion
    header('Location: ../../view/display.php');
    exit(); // Stop execution after redirection
} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        echo "L'offre existe déjà dans la base de données.";
    } else {
        //echo 'echec de connexion:' . $e->getMessage();
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
<link rel="stylesheet" href="../../view/assets/css/style.css">
<title>Liste des offres</title>
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
             </div>
                  <!-- =============== Main end ================ -->



    <form class="details" action="" method="post" onsubmit="return validateForm()" style="position: fixed; top: 40%; left: 70%; transform: translate(-50%, -50%);">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Formulaire d'ajout offre</h2>
                <table>
                    <tbody>
                        <tr>
                            <td><label for="nomHotel">Nom de l'hotel:</label></td>
                            <td>
                                <select id="nomHotel" name="nomHotel">
                                    <?php populateNomHotelOptions(); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="descriptionOffre">Description:</label></td>
                            <td><input type="text" id="descriptionOffre" name="descriptionOffre" ></td>
                        </tr>
                        <!-- <tr>
                            <td><label for="prixOffre">Prix:</label></td>
                            <td><input type="number" id="prixOffre" name="prixOffre"  ></td>
                        </tr> -->
<!-- 
                        <tr>
                            <td><label for="id chambre">id de la chambre:</label></td>
                            <td>
                                <select id="idChambre" name="idChambre">
                                    <?php //populateidChambreOptions(); ?>
                                </select>
                            </td>
                    </tr> -->


                        <tr>
                            <td><label for="lienOffre1">Lien Offre 1:</label></td>
                            <td><input type="text" id="lienOffre1" name="lienOffre1"></td>
                        </tr>
                        <tr>
                            <td><label for="lienOffre2">Lien Offre 2:</label></td>
                            <td><input type="text" id="lienOffre2" name="lienOffre2"></td>
                        </tr>
                        <tr>
                            <td><label for="lienOffre3">Lien Offre 3:</label></td>
                            <td><input type="text" id="lienOffre3" name="lienOffre3"></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn" value="Submit" style="position: fixed; top: 75%; left: 40%;">
            </div>
        </div>
    </form>
</div>

</body>
</html>

<script>

    <?php
    // Function to fetch hotel names from the database
    function populateNomHotelOptions() {
        try {
            // Establish connection
            $conn = config::getConnexion();
            // Prepare SQL statement to fetch hotel names
            $stmt = $conn->prepare("SELECT nomHotel FROM hotels");
            $stmt->execute();
            // Fetch hotel names
            $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Loop through hotels and output as options
            foreach ($hotels as $hotel) {
                echo '<option value="' . $hotel['nomHotel'] . '">' . $hotel['nomHotel'] . '</option>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // function populateidChambreOptions() {
    //     try {
    //         // Establish connection
    //         $conn = config::getConnexion();
    //         // Prepare SQL statement to fetch hotel names
    //         $stmt = $conn->prepare("SELECT idChambre FROM chambres");
    //         $stmt->execute();
    //         // Fetch hotel names
    //         $chambres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         // Loop through hotels and output as options
    //         foreach ($chambres as $chambre) {
    //             echo '<option value="' . $chambre['idChambre'] . '">' . $chambre['idChambre'] . '</option>';
    //         }
    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
    ?>


// JavaScript function to validate form inputs
function validateForm() {
    var descriptionOffre = document.getElementById("descriptionOffre").value.trim();
    var lienOffre1 = document.getElementById("lienOffre1").value.trim();
    var lienOffre2 = document.getElementById("lienOffre2").value.trim();
    var lienOffre3 = document.getElementById("lienOffre3").value.trim();

    // Check if required fields are empty
    if (descriptionOffre === "" || lienOffre1 === "" || lienOffre2 === "" || lienOffre3 === "") {
        alert("Description et photos obligatoires.");
        return false;
    }

    var lienPhotoHotelRegex = /^https?:\/\/.*\.(jpg|jpeg)$/i;
    if (!lienPhotoHotelRegex.test(lienOffre1)) {
        alert("Le lien de la photo doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
        return false;
    }
    if (!lienPhotoHotelRegex.test(lienOffre2)) {
        alert("Le lien de la photo doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
        return false;
    }
    if (!lienPhotoHotelRegex.test(lienOffre3)) {
        alert("Le lien de la photo doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
        return false;
    }

    /*
    // Check if prixOffre is a positive number
    if (isNaN(prixOffre) || parseFloat(prixOffre) <= 0) {
        alert("Le prix de l'offre doit être un nombre positif.");
        return false;
    }
    */

    // Success message
    alert("Formulaire soumis avec succès!");
    return true;
}

</script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
