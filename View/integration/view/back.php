
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
                        <span class="icon" onclick="showUser()">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#"  onclick="showOffre()" >
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Offres</span>
                    </a>
                </li>

                <li>
                    <a href="../../view-forum/indexAdmin2.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Forum</span>
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
                    <a href="#"  onclick="showActivities()">
                        <span class="icon">
                            <ion-icon name="walk-outline"></ion-icon>
                        </span>
                        <span class="title">activités</span>
                    </a>
                </li>

                <li>
                    <a href="../../back.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="../../transport/view/showcarreservation.php">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Transport</span>
                    </a>
                </li>
                <li>
                    <a href="../../logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">déconnection </span>
                    </a>
                </li>
            </ul>

            </ul>
        </div>
     <!-- =============== Navigation end ================ -->

<!-- OFFREEEEEEEEEEEEEEEEEEEEEEEEEEEEEE-->

<div id="offerContent" >
<?php
include 'offreWork.php';
?>
</div>


<div id="activityContent" style="display: none;">
<?php
include 'backoffice/back.php';
?>
</div>
<!-- style="display: none;" -->

<div id="userContent" style="display: none;"> >
<?php
include '../xplore/View/back.php';
?>
</div>

<script>
    function showOffre() {
        document.getElementById("ButtonsAffichageSection").style.display = "block";
        document.getElementById("offerContent").style.display = "block";
        document.getElementById("offresSection").style.display = "block ";
        document.getElementById('activityContent').style.display = 'none';
        document.getElementById('userContent').style.display = 'none';

    }

    function showActivities() {
        document.getElementById("offerContent").style.display = "none";
        document.getElementById('activityContent').style.display = 'block';
        document.getElementById('userContent').style.display = 'none';

    }

    function showUser() {
        document.getElementById('userContent').style.display = 'block';
        document.getElementById("offerContent").style.display = "none";
        document.getElementById('activityContent').style.display = 'none';
    }
</script>


<!-- OFFREEEEEEEEEEEEEEEEEEEEEEEEEEEEEE ENDDDD-->


</div>
</div>

</body>
</html>





    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


 