
<html>
<head>

<link href="../view/assets/assetsFront/css/style.css" rel="stylesheet">
<link href="../view/assets/assetsFront/css/bootstrap.min.css" rel="stylesheet">


    <!-- Favicon -->
    <link href="assets/assetsFront/img/favicon.ico" rel="icon">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/assetsFront/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/assetsFront/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/assetsFront/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


<style>
    /* Additional Styles */
    .container-frame {
            border: 1px solid var(--dark);
            padding: 20px;
            margin-bottom: 20px;
        }

        .hotel-container {
            border: 1px solid var(--secondary);
            padding: 20px;
            margin-bottom: 20px;
        }

        .hotel-title {
            color: var(--primary);
            margin-bottom: 20px;
        }

        .hotel-details {
            color: #333;
            margin-bottom: 20px;
        }

        .offer-container {
            border: 1px solid var(--secondary);
            padding: 20px;
            margin-bottom: 20px;
        }

        .offer-title {
            background-color: var(--light);
            color: var(--primary);
            padding: 10px 20px;
            border-radius: 5px;
            text-align: left;
            margin-bottom: 20px;
        }

        .offer-description {
            color: #333;
            text-align: justify;
            margin-bottom: 20px;
        }

        .offer-price {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Center images */
        .offer-images {
            text-align: center;
        }

        .offer-images img {
            max-width: 100%;
            display: block;
            margin: 0 auto;
            margin-bottom: 10px;
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
    
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <?php if(isset($selectedHotel)): ?>
                            <img class="img-fluid position-absolute w-100 h-100" src="<?php echo $selectedHotel['lienPhotoHotel']; ?>" alt="<?php echo $selectedHotel['nomHotel']; ?>" style="object-fit: cover;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <?php if(isset($selectedHotel)): ?>
                        <div class="hotel-container">
                            <h6 class="section-title bg-white text-start text-primary pe-3 hotel-title">Hotel</h6>
                            <h1 class="mb-4">Bienvenue à <span class="text-primary"><?php echo $selectedHotel['nomHotel']; ?></span></h1>
                            <p class="mb-4 hotel-details"><?php echo $selectedHotel['description']; ?></p>
                            <div class="row gy-2 gx-4 mb-4">
                                <div class="col-sm-6">
                                    <p class="mb-0 hotel-details"><strong>Adresse:</strong> <?php echo $selectedHotel['adresse']; ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0 hotel-details"><strong>Étoiles:</strong> <?php echo $selectedHotel['etoiles']; ?> étoiles</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0 hotel-details"><strong>Info contact:</strong> <?php echo $selectedHotel['infoContact']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>Aucun hôtel trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex flex-column h-100 justify-content-center">
                        <?php if(isset($selectedHotel)): ?>
                            <div class="mb-3">
                                <img class="img-fluid" src="<?php echo $selectedHotel['lienOffre3']; ?>" alt="<?php echo $selectedHotel['nomHotel']; ?>" style="object-fit: cover;">
                                <img class="img-fluid mb-3" src="<?php echo $selectedHotel['lienOffre1']; ?>" alt="<?php echo $selectedHotel['nomHotel']; ?>" style="object-fit: cover;">
                                <img class="img-fluid mb-3" src="<?php echo $selectedHotel['lienOffre2']; ?>" alt="<?php echo $selectedHotel['nomHotel']; ?>" style="object-fit: cover;">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <?php if(isset($selectedHotel)): ?>
                        <div class="offer-container">
                            <h6 class="section-title bg-white text-start text-primary pe-3 offer-title">Offre</h6>
                            <p class="mb-4 offer-description" style="color: #333;"><?php echo $selectedHotel['descriptionOffre']; ?></p>
                            <!-- Here, we'll access the price from the 'offres' table -->
                            <p class="mb-4 offer-price" style="color: #333;">Type : <span><?php echo $selectedHotel['typeChambre']; ?> </span></p>
                            <p class="mb-4 offer-price" style="color: #333;">Prix de la chambre: <span><?php echo $selectedHotel['prixChambre']; ?> dt</span></p>

                        </div>
                    <?php else: ?>
                        <p class="text-center">Aucune offre trouvée.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    



</body>
</html>
