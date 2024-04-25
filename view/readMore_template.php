
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
                    <h6 class="section-title bg-white text-start text-primary pe-3">Hotel</h6>
                    <h1 class="mb-4">Bienvenue à <span class="text-primary"><?php echo $selectedHotel['nomHotel']; ?></span></h1>
                    <p class="mb-4" style="color: #333;"><?php echo $selectedHotel['description']; ?></p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: #333;"><strong>Adresse:</strong> <?php echo $selectedHotel['adresse']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: #333;"><strong>Étoiles:</strong> <?php echo $selectedHotel['etoiles']; ?> étoiles</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: #333;"><strong>Prix:</strong> <?php echo $selectedHotel['prixHotel']; ?> dt</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: #333;"><strong>Info contact:</strong> <?php echo $selectedHotel['infoContact']; ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Aucun hôtel trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>
