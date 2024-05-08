
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
                <div class="search" >
                    <label>
                    <input type="text" id="searchInput" placeholder="Rechercher par nom d'hôtel, adresse, description, étoiles, prix, ou info contact...">

                        <ion-icon name="search-outline"></ion-icon>
                        </div>
    <div id="searchResults"></div>
    </label>


                <div class="user">
                    <img src="assets/imgs/logo.png" alt="">
                </div>
            </div>
            
     <!-- =============== Main end ================ -->


 <div class="details" id="contentSection">
    <div class="recentOrders">
        <div style="text-align: center; margin-bottom: 20px;"> <!-- New container for "Liste des hôtels" and "Ajouter" -->
            <h2>Liste des hôtels</h2>
            <div class="cardHeader">
            <a href="../controller/insert.php" class="btn" style="margin-right: 20px;">Ajouter</a>
            </div>
        </div>
        <div class="toggle-buttons" style="text-align: center;">
            <button onclick="showMore()" id="showMoreHotels" class="button" >Plus</button>
            <button onclick="showLess()" id="showLessHotels" class="button">Moins</button>
        </div>
        <?php include '../controller/main_table.php'; ?> 
    </div>
</div>



<div class="details" id="offerSection">
    <div class="recentOrders">
        <div style="text-align: center; margin-bottom: 20px;"> <!-- New container for "Liste des offres" and "Ajouter" -->
            <h2>Liste des offres</h2>
            <div class="cardHeader">
                <a href="../controller/offres/insertOffre.php" class="btn" style="margin-right: 20px;">Ajouter</a>
            </div>
        </div>
        <div class="toggle-buttons" style="text-align: center;">
            <button onclick="showMore()" id="showMoreOffers" class="button">Plus</button>
            <button onclick="showLess()" id="showLessOffers" class="button">Moins</button>
        </div>
        <?php include '../controller/offres/affichageOffre.php'; ?> <!-- Table content -->

    </div>
</div>

<div class="details" id="chambreSection">
    <div class="recentOrders">
        <div style="text-align: center;"> <!-- New container for "Liste des offres" and "Ajouter" -->
            <h2>Liste des chambres</h2>
            <div class="cardHeader">
                <a href="../controller/chambres/insertChambre.php" class="btn" style="margin-right: 20px;">Ajouter</a>
            </div>
        </div>
        
        <?php include '../controller/chambres/affichageChambre.php'; ?> <!-- Table content -->

    </div>
</div>



<script>
    // Function to toggle visibility of elements
    function toggleElements(elements, visible) {
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = visible ? 'table-row' : 'none';
        }
    }

    // Function to hide extra elements
    function hideExtraElements(elements, batchSize) {
        for (var i = batchSize; i < elements.length; i++) {
            elements[i].style.display = 'none';
        }
    }

    // Function to show all elements
    function showAllElements(elements) {
        toggleElements(elements, true);
    }

    // Function to initialize
    document.addEventListener('DOMContentLoaded', function() {
        var hotelList = document.querySelectorAll('.hotel-item');
        var offerList = document.querySelectorAll('.offer-item'); // Adjust the class name here

        var batchSize = 2;

        // Hide all extra hotels and offers initially
        hideExtraElements(hotelList, batchSize);
        hideExtraElements(offerList, batchSize);

        // Show more hotels
        document.getElementById('showMoreHotels').addEventListener('click', function() {
            showAllElements(hotelList);
        });

        // Show more offers
        document.getElementById('showMoreOffers').addEventListener('click', function() {
            showAllElements(offerList);
        });

        // Show less hotels
        document.getElementById('showLessHotels').addEventListener('click', function() {
            hideExtraElements(hotelList, batchSize);
        });

        // Show less offers
        document.getElementById('showLessOffers').addEventListener('click', function() {
            hideExtraElements(offerList, batchSize);
        });
    });
</script>

<?php
//include '../controller/main_table.php';
//include '../controller/offres/affichageOffre.php';
include '../controller/search.php';
include '../controller/modification_form.php';
include '../controller/offres/modification_form_offre.php';
//include '../controller/chambres/affichageChambre.php';


?>



</div>
</div>

</body>
</html>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script>
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("edit-icon")) {
        var iconId = event.target.id;
        if (iconId.startsWith("editOfferIcon")) {
            toggleModificationForm('offre');
        } else if (iconId.startsWith("editHotelIcon")) {
            toggleModificationForm('hotel');
        }
    }
});

function toggleModificationForm(formType) {
    var offreForm = document.getElementById("editFormOffre");
    var hotelForm = document.getElementById("editForm");

    // Toggle display based on form type
    if (formType === 'offre') {
        hotelForm.style.display = "none";  // Hide hotel modification form
        offreForm.style.display = "block"; // Show offer modification form
    } else if (formType === 'hotel') {
        offreForm.style.display = "none";  // Hide offer modification form
        hotelForm.style.display = "block"; // Show hotel modification form
    }
}
</script>