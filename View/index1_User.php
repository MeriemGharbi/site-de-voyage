
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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

    th {
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
    }

    img {
        height: 20px;
    }

    tr:nth-child(2n) {
        background-color: #f6f8f8;
    }

    tr:nth-child(2n) td {
        border-bottom: 1px solid #e0e0e0;
        border-top: 1px solid #e0e0e0;
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
            echo 'var prenom = "' . htmlspecialchars($_SESSION['cin']) . '";';
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
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
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
                 <img src="img/logo.png" class="logo" >
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="../index.html" class="nav-item nav-link active">Paiment</a>
                    <a href="../about.html" class="nav-item nav-link">Activité</a>
                    <a href="../service.html" class="nav-item nav-link">Transport</a>
                    <a href="../package.html" class="nav-item nav-link">Réclamation</a>
                    <a href="../package.html" class="nav-item nav-link">Réservation</a>
                    <a href="modifierUser.php" class="nav-item nav-link">Profile</a>
                    <label class="user_profile"><?php echo htmlspecialchars($_SESSION['prenom']); ?></label>
                    <?php
        include "../Controller/UserC.php";
        if(isset($_SESSION['cin'])){
            $UserC = new UserC();
            $search = $UserC->recupererUser(htmlspecialchars($_SESSION['cin']));
            foreach ($search as $row) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="user">';
            }
        } else {
            header("location: login.php");
            exit; 
        }
?>

                   
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"></h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown"></p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">

      <div> <p>                                </p>                            </div>
      <div> <p>                                             </p>                 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>