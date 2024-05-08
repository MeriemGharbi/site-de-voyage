<!DOCTYPE html>
<html>
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
        .no-op {
    /* This CSS rule does nothing */
}

        
    </style>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
            <div style="display: flex; align-items: center;">
    <img src="assets/assetsFront/img/logoo.png" style="margin-right: 10px;" alt="Logo">
    <h1 class="text-primary m-0" style="margin-left: auto;">Xplore</h1>
</div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="package.html" class="nav-item nav-link">Packages</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Destination</a>
                            <a href="booking.html" class="dropdown-item">Booking</a>
                            <a href="team.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Tempor erat elitr rebum at clita diam amet diam et eos erat ipsum lorem sit</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Thailand">
                            <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                        </div>
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
                        <img class="img-fluid position-absolute w-100 h-100" src="assets/assetsFront/img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary">Xplore</span></h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
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
                    <a  class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Hotels</h6>
                <h1 class="mb-5">Awesome offers</h1>
            </div>
            <div class="row g-4 justify-content-center">
            <div class="package-item">



            <div class="position-relative w-75 mx-auto animated slideInDown">
        <form action="searchResultsOffre.php" method="GET">
            <input name="search" class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Thailand">
            <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
        </form>
    </div>

<div class="no-op">

<?php
include('../controller/phpqrcode/qrlib.php'); // etape 1

function displayLogo($logoLink) {
    return '<img class="logo" style="width:20px;height:20px;" src="' . $logoLink  . '">';
}
function generateQRCode($text, $filename)
{
    QRcode::png($text, $filename);
}

include '../config.php';

$conn = config::getConnexion(); // Establish the connection

try {
    $query = $conn->query("SELECT offres.idOffre, offres.nomHotel, hotels.lienPhotoHotel, hotels.adresse, offres.descriptionOffre, chambres.typeChambre
                            FROM offres
                            LEFT JOIN hotels ON offres.nomHotel = hotels.nomHotel
                            LEFT JOIN chambres ON hotels.nomHotel = chambres.nomHotel");
    $offers = $query->fetchAll();


    if (count($offers) > 0) {
        foreach ($offers as $offer) {


            $qrCodeFilename = 'temp_qr_code_' . $offer['idOffre'] . '.png';
            $lien = 'https://xplore1.000webhostapp.com/controller/readMore.php?hotel=' . urlencode($offer['nomHotel']);

            // Generate the QR code image for the offer
            generateQRCode($lien, $qrCodeFilename);




        echo '<div class="hotel">';
            echo '<img class="img-fluid" src="' . $offer['lienPhotoHotel'] . '" alt="Photo de l\'hôtel">';

            echo '<h2 class="text-center">' . $offer['nomHotel'] . '</h2>'; // font big
            echo '<p class="text-center">' . $offer['adresse'] . ' - Chambre: ' . $offer['typeChambre']  . '</p>';

            // Display star rating
            echo '<div class="mb-3 text-center">';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '</div>';

            // Display description
            echo '<p class="text-center">' . $offer['descriptionOffre'] . '</p>';

            echo '<div class="d-flex justify-content-center mb-2">';
            
            echo '<a href="../controller/readMore.php?hotel=' . urlencode($offer['nomHotel']) . '" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>';
            echo '<a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>';
           
            echo '</div>';


            //like dislike buttons work
            $formId = 'likeDislikeForm_' . $offer['idOffre'];

            echo '<form id="' . $formId . '" method="post" target="hidden_iframe" action="../controller/likeDislike.php">';
            echo '<input type="hidden" name="offer_id" value="' . $offer['idOffre'] . '">';
            echo '<input type="hidden" name="reaction" id="reactionInput_' . $offer['idOffre'] . '" value="">'; // Unique hidden input for reaction
            
            echo '<button type="button" class="btn btn-sm btn-primary px-2" style="border-radius: 30px; padding: 5px;" onclick="likeDislike(\'like\', ' . $offer['idOffre'] . ')">';
            echo '<img src="assets/assetsFront/img/like.png" alt="Like" style="width: 20px; height: 20px;">';
            echo '</button>';
            
            echo '<button type="button" class="btn btn-sm btn-primary px-2" style="border-radius: 30px; padding: 5px;" onclick="likeDislike(\'dislike\', ' . $offer['idOffre'] . ')">';
            echo '<img src="assets/assetsFront/img/dislike.png" alt="Dislike" style="width: 20px; height: 20px;">';
            echo '</button>';
echo'&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

            echo '<img src="' . $qrCodeFilename . '" alt="QR Code"  style="width: 90px; height: 90px; ">'; 
            echo '</form>';



            
            echo '</div>';

        }
    }
    else {
        echo 'Aucune offre trouvée.';
    }
} catch (PDOException $e) {
    echo 'Echec de connexion:' . $e->getMessage();
}

?>
</div>

<iframe id="hidden_iframe" name="hidden_iframe" style="display:none;"></iframe>


<script>
    function likeDislike(reaction, offerId) {
        var reactionInputId = 'reactionInput_' + offerId;
        document.getElementById(reactionInputId).value = reaction;
        document.getElementById('likeDislikeForm_' + offerId).submit();
    }
</script>


<script>
    const searchInputOffre = document.getElementById('searchInputOffre');

    searchInputOffre.addEventListener('input', function(event) {
        const searchQuery = event.target.value.trim();
        console.log('Search query:', searchQuery);

        // Call the function to perform AJAX search
        searchOffres(searchQuery);
    });

    function searchOffres(searchQuery) {
    const url = '../controller/searchFront.php?search=' + encodeURIComponent(searchQuery);
    console.log('Fetching URL:', url);

    // Perform AJAX call to the PHP script
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Handle the response data (e.g., update the UI)
            console.log('Search results:', data);
            // Implement logic to update UI with search results
        })
        .catch(error => console.error('Error:', error));
}

</script>


 </div>
 </div>
 </div>
 </div>

 


</body>
</html>
