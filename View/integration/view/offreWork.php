
<!DOCTYPE html>
<html>
<head>

<style>
.details .edit-icon {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .highlight {
            background-color: #AFD198;
            font-weight: bold;
        }
        .button {
  position: relative;
  padding: 5px 10px;
  background: var(--blue);
  text-decoration: none;
  color: var(--white);
  border-radius: 6px;
  left: 0;
}
</style>



<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
<link rel="stylesheet" href="assets/css/style.css">

    
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
            <!-- ========================= Main ==================== -->
            <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search" >
                    <label>
                    <input type="text" id="searchInput" placeholder="Search...">

                        <ion-icon name="search-outline"></ion-icon>
                        </div>
    <div id="searchResults"></div>
    </label>
                <div class="user">
                    <!-- <img src="assets/imgs/logo.png" alt=""> -->
                </div>
            </div>
            
     <!-- =============== Main end ================ -->


<!-- OFFREEEEEEEEEEEEEEEEEEEEEEEEEEEEEE-->



<div id="ButtonsAffichageSection" style="display: none;" >
        <button class="button" style="margin-left: 30px;" onclick="toggleHotels()">Afficher les Hôtels</button>
        <button class="button" style="margin-left: 30px;" onclick="toggleOffres()">Afficher les Offres</button>
        <button class="button" style="margin-left: 30px;" onclick="toggleChambres()">Afficher les Chambres</button>
    </div>

    <div class="details" id="hotelsSection" style="display: none;">
        <div class="recentOrders">
            <div style="text-align: center; margin-bottom: 20px;"> 
                <h2>Liste des hôtels</h2>
                <div class="cardHeader">
                    <a href="../controller/hotels/insert.php" class="btn" style="margin-right: 20px;">Ajouter</a>
                </div>
            </div>
            <div class="toggle-buttons" style="text-align: center;">
                <button onclick="showMore()" id="showMoreHotels" class="button" >Plus</button>
                <button onclick="showLess()" id="showLessHotels" class="button">Moins</button>
            </div>
            <?php include '../controller/hotels/main_table.php'; ?> 
        </div>
    </div>

    <div class="details" id="offresSection" style="display: none;">

        <div class="recentOrders">
            <div style="text-align: center; margin-bottom: 20px;"> 
                <h2>Liste des offres</h2>
                <div class="cardHeader">
                    <a href="../controller/offres/insertOffre.php" class="btn" style="margin-right: 20px;">Ajouter</a>
                </div>
            </div>
            <div class="toggle-buttons" style="text-align: center;">
                <button onclick="showMore()" id="showMoreOffers" class="button">Plus</button>
                <button onclick="showLess()" id="showLessOffers" class="button">Moins</button>
            </div>
            <?php include '../controller/offres/affichageOffre.php'; ?> 
        </div>
    </div>

    <div class="details" id="chambresSection" style="display: none;">

        <div class="recentOrders">
            <div style="text-align: center;"> 
                <h2>Liste des chambres</h2>
                <div class="cardHeader">
                    <a href="../controller/chambres/insertChambre.php" class="btn" style="margin-right: 20px;">Ajouter</a>
                </div>
            </div>
            <?php include '../controller/chambres/affichageChambre.php'; ?> 
        </div>
    </div>




<script>
    function showButtons(){
        document.getElementById("ButtonsAffichageSection").style.display = "block";
        document.getElementById("hotelsSection").style.display = "none";
        document.getElementById("offresSection").style.display = "none";
        document.getElementById("chambresSection").style.display = "none";

    }
    function toggleHotels() {
        document.getElementById("ButtonsAffichageSection").style.display = "block";

        document.getElementById("hotelsSection").style.display = "block";
        document.getElementById("offresSection").style.display = "none";
        document.getElementById("chambresSection").style.display = "none";
    }

    function toggleOffres() {
        document.getElementById("ButtonsAffichageSection").style.display = "block";

        document.getElementById("hotelsSection").style.display = "none";
        document.getElementById("offresSection").style.display = "block";
        document.getElementById("chambresSection").style.display = "none";
    }

    function toggleChambres() {

        document.getElementById("hotelsSection").style.display = "none";
        document.getElementById("offresSection").style.display = "none";
        document.getElementById("chambresSection").style.display = "block";
    }
</script>




<?php

include '../controller/hotels/search.php';
include '../controller/hotels/modification_form.php';
include '../controller/offres/modification_form_offre.php';


?>



<!-- OFFREEEEEEEEEEEEEEEEEEEEEEEEEEEEEE ENDDDD-->


</div>
</div>

</body>
</html>





    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


 