<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Cars</title>
    <link rel="stylesheet" href="backoffice/assets/css/style.css">
    <style>
        /* CSS to control the size of the car image */
        .car-img {
            max-width: 200px; /* Set the maximum width of the image */
            height: auto; /* Maintain aspect ratio */
        }
       /* Style for the main container */
.main {
    text-align:start ;
    padding: 10px;
}

/* Style for the heading */
.main h1 {
    font-size: 2.5rem;
    margin-bottom: 150px;
}

/* Style for the paragraph */
.main p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

/* Style for the list */
.main ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* Style for the list items */
.main ul li {
    display: inline-block;
    margin-right: 20px;
}

/* Style for the links */
.main ul li a {
    text-decoration: none;
    padding: 10px 20px;
    background-color: var(--blue); /* Assuming --blue is defined earlier */
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

/* Hover effect for the links */
.main ul li a:hover {
    background-color: #1c1a6e; /* Darker shade of blue */
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
                    <a href="../../integration/view/back.php"  onclick="showOffre()" >
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
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
                    <a href="../../integration/view/back.php"  onclick="showActivities()">
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
    
  <!-- ========================= partie search ==================== -->
  <br><br>
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." oninput="handleSearchInput()">
                </label>
                <div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
</div>
<div id="search-results"></div>


            <div class="logo">
            <img src="backoffice/img/xplore.png" alt="">
            </div>
        </div>

         <!-- ========================= partie search ==================== -->
<!-- ======================= Cars ==================  -->


<div class="main">
        <p>Please choose an option:</p>
        <ul>
            <li><a href="showcar.php" class="btn btn-primary">CARS</a></li>
            <li><a href="showreservation.php" class="btn btn-primary">RESERVATIONS</a></li>
        </ul>
    </div>  
    <!-- =========== Scripts =========  -->
    <script src="backoffice/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
