<?php
include '../../config.php';
$conn = config::getConnexion(); // Establish the connection
error_reporting(0);

try {
    // Assign POST data to variables
    $typeChambre = $_POST['typeChambre'];
    $prixChambre = $_POST['prixChambre'];
    //$idOffre = $_POST['idOffre'];

    // Prepare SQL statement
    $requette = $conn->prepare("INSERT INTO chambres (typeChambre, prixChambre) 
                            VALUES (:typeChambre, :prixChambre)");

    // Bind parameters
    $requette->bindParam(':typeChambre', $typeChambre);
    $requette->bindParam(':prixChambre', $prixChambre);

    // Execute the query
    $requette->execute();

    // Redirect after successful insertion
    header('Location: ../../view/display.php');
    exit(); // Stop execution after redirection
} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        echo "La chambre existe déjà dans la base de données.";
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
                <h2>Formulaire d'ajout chambres</h2>
                <table>
                    <tbody>
                   
                    <tr>
                        <td><label for="typeChambre">Type de la chambre :</label></td>
                        <td>
                            <select id="typeChambre" name="typeChambre">
                                <option value="single">Single</option>
                                <option value="double">Double</option>
                            </select>
                        </td>
                    </tr>
                        <tr>
                            <td><label for="prixChambre">Prix de la chambre:</label></td>
                            <td><input type="number" id="prixChambre" name="prixChambre"  ></td>
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


// JavaScript function to validate form inputs
function validateForm() {
    var prixChambre = document.getElementById("prixChambre").value.trim();
    var typeChambre = document.getElementById("typeChambre").value.trim();

    // Check if required fields are empty
    if (prixChambre === "" || typeChambre === "") {
        alert("Description et Prix sont obligatoires.");
        return false;
    }
    // Check if prixOffre is a positive number
    if (isNaN(prixChambre) || parseFloat(prixChambre) <= 0) {
        alert("Le prix de la chambre doit être un nombre positif.");
        return false;
    }
    // Success message
    alert("Formulaire soumis avec succès!");
    return true;
}
</script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
