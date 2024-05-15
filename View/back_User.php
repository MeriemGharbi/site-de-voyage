
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/assetsFront/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/assetsFront/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/assetsFront/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/assetsFront/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/assetsFront/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/assetsFront/css/style.css" rel="stylesheet">
    <style>
    table {
        border-collapse: collapse;
        color: #404040;
        position: absolute;
        left: 50%;
        top: 45%;
        transform: translate(-50%, -50%);
        font-size: 14px;
        margin-top: -10mm;
        margin-bottom: -10mm;
        width: calc(100% - 20mm);
        background-color: white; /* Ajout de la couleur de fond blanche */
    }

    /* th {
        font-size: 14px;
        border-bottom: 2px solid #ffcb61;
        padding: 8px 16px;
        font-weight: 500;
        width: 130px;
    }

    td {
        padding: 4px 16px;
        font-size: 12px;
        font-weight: 400;
        text-align: center;
    } */


    tr:nth-child(2n) {
        background-color: #f6f8f8;
    }

    tr:nth-child(2n) td {
        border-bottom: 1px solid #e0e0e0;
        border-top: 1px solid #e0e0e0;
    }


    .highlight {
            background-color: lightblue;
        }
        .result-item {
            border: 1px solid #dee2e6;
            padding: 10px;
            margin-bottom: 20px;
            width: 70%;
            margin: 0 auto;
            text-align: center;
        }
        .result-item p {
            margin-bottom: 5px;
        }
        .result-item p b {
            font-weight: bold;
        }
        .result-item img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .hotel {
            display: inline-block;
            width: calc(33.33% - 20px); /* Adjust width as needed */
            margin: 10px;
            vertical-align: top;
            background-color: #ffff;
            padding: 15px;
            border-radius: 10px;
        }
        .hotel img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }   

        .hidden {
    display: none;
}


</style>
<?php
        session_start();
        if(isset($_SESSION['prenom'])){
            echo '<script>';
            echo 'var prenom = "' . htmlspecialchars($_SESSION['prenom']) . '";';
            echo 'var elements = document.getElementsByClassName("username");';
            echo 'for (var i = 0; i < elements.length; i++) {';
            echo '    elements[i].innerHTML = prenom;';
            echo '}';
            echo '</script>';
        }
        else{
            header("location: login.php");
            exit; 
        }
        session_start();
        if(isset($_SESSION['cin'])){
            echo '<script>';
            echo 'var cin = "' . htmlspecialchars($_SESSION['cin']) . '";';
            echo 'var elements = document.getElementsByClassName("username");';
            echo 'for (var i = 0; i < elements.length; i++) {';
            echo '    elements[i].innerHTML = cin;';
            echo '}';
            echo '</script>';
        }
        else{
            header("location: login.php");
            exit; 
        }
    ?> 

</head>

<body>
 


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Ariana , Tunis</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+21690616305</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>xplore@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    <a href="logout.php" class="btn btn-primary rounded-pill py-2 px-4"style="margin-left: 10px;">log out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">

        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                 <img src="assets/assetsFront/img/xplore.png" class="logo" >
                 
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="../index.html" class="nav-item nav-link">Paiement</a>
                    <a href="integration/controller/activite/showActivityfront.php" class="nav-item nav-link">Activité</a>
                    <a href="transport/view/showcarfront.php" class="nav-item nav-link">Transport</a>
                    <a href="view-forum/index1.php" class="nav-item nav-link">forum</a>
                    <a href="../package.html" class="nav-item nav-link">Réclamation</a>
                    <a href="modifierUser.php" class="nav-item nav-link">Profile</a>
                    <label class="user_profile"><?php echo htmlspecialchars($_SESSION['prenom']); ?></label>
                    <?php
                    include "../Controller/UserC.php";
                    if(isset($_SESSION['cin'])){
                        $UserC = new UserC();
                        $search = $UserC->recupererUser($_SESSION['cin']);
                        foreach ($search as $row) {
                            echo "<img src='{$row['img']}' class='user'>";
                        }
                    } 
                    ?>

                   
                </div>
            </div>
        </nav>


        <!-- <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"></h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown"></p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                    </div>
                </div>
            </div>
        </div>  -->
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Welcome to Xplore - Your Gateway to Unforgettable Adventures!</p>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Navbar & Hero End -->
    
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="assets/assetsFront/img/aboutt.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Explore <span style="color:black; text-align: center;">Travel Agency</span></h1>
                    <p class="mb-4">Welcome to Xplore - Your Gateway to Unforgettable Adventures!</p>
                    <p class="mb-4">At Xplore, we believe that the world is meant to be explored, experienced, and cherished. With a passion for travel and a commitment to exceptional service, we're here to turn your wanderlust dreams into reality.
</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Handpicked Hotels</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- About End -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/assetsFront/lib/wow/wow.min.js"></script>
    <script src="assets/assetsFront/lib/easing/easing.min.js"></script>
    <script src="assets/assetsFront/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/assetsFront/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/assetsFront/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/assetsFront/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/assetsFront/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/assetsFront/js/main.js"></script>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Hotels</h6>
                <h1 class="mb-5">Awesome offers</h1>
            </div>
            <div class="row g-4 justify-content-center">
            <div class="package-item">



    <div class="position-relative w-75 mx-auto animated slideInDown">
        <form action="integration/view/searchResultsOffre.php" method="GET">
            <input name="search" class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: four seasons">
            <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
        </form>
    </div>


    <select name="sort" id="sortSelect" class="form-select rounded-pill py-3 px-4 position-relative top-0 start-0 ms-2" style="margin-top: 50px;" onchange="sortOffers()">
        <option value="none">Non trié</option> 
        <option value="name">Tri alphabétique selon le nom de l'hotel</option>
        <option value="price">Tri alphabétique selon le prix de la chambre</option>
    </select>

<div id="hotelOffers" class="position-relative w-75 mx-auto animated slideInDown">  <!-- hedhi lezmetni -->


<?php
    include 'integration/controller/displayOffres.php';
    ?>

</div>
<iframe id="hidden_iframe" name="hidden_iframe" style="display:none;"></iframe> <!-- hedhi lezmetni -->


   <br><br> <br> 
    
    <?php
    include 'integration/controller/activite/showActivityfront1.php';
    ?>





    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Company</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Ariana , Tunis</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> +21690616305</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i> xplore@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/assetsFront/img/booking.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/assetsFront/img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/assetsFront/img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/assetsFront/img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/assetsFront/img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/assetsFront/img/booking.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Join Us.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                    
                        Designed By <a class="border-bottom" href="#">Coding Home</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</body>


            
                 