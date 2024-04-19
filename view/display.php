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
  left: -450px;
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



     <div class="details">

                <div class="recentOrders">
                    <div class="cardHeader">
                    <h2>Liste des hôtels</h2>
                    <a href="../controller/insert.php" class="btn">Ajouter</a>
                    </div>

<?php
include '../controller/main_table.php';
include '../controller/search.php';
include '../controller/modification_form.php';
?>

</div>
</div>

</body>
</html>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



    