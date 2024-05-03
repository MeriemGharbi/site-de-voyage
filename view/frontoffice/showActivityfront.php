<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Activity</title>
    <link rel="stylesheet" href="../view/frontoffice/travel website design 12/travel website design 12/travel 21/css/style.css">
    <link rel="stylesheet" href="../view/frontoffice/travel website design 12/travel website design 12/travel 21/css/bootstrap.min.css">
    <style>
              .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .activity {
            display: flex;
            width: 100%;
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
        }

        .activity-image {
            flex: 0 0 40%;
        }

        .activity-image img {
            width: 100%;
            height: auto;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .activity-details {
            flex: 0 0 60%;
            padding: 20px;
        }

        .activity-label {
            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }
        .activity-name{
            text-align: center;
        }

        .activity-description,
        .activity-place,
        .activity-date,
        .activity-price,
        .activity-max-capacity,
        .activity-duration,
        .activity-category {
            font-family: "Roboto", sans-serif;
            font-size: 1rem;
            color: #666;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .activity-category {
            font-style: italic;
        }

        .activity-link {
            font-family: "Montserrat", sans-serif;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .activity-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">

            <a href="" class="navbar-brand p-0">
            <img src="../view/frontoffice/travel website design 12/travel website design 12/travel 21/img/xplore.png" class="logo">
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Activity</a>
                        <div class="dropdown-menu m-0">
                            <a href="../controller/showActivity.php" class="dropdown-item">Activities</a>
                            <a href="../controller/showCategory.php" class="dropdown-item">Categories</a>
                        </div>
                    </div>
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
                        <p class="fs-4 text-white mb-4 animated slideInDown">Embark on a Journey of Discovery with Explore Travel Agency</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Exemple: France">
                            <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    
<body>
<div class="container">
        <div class="activity-list">
            <div class="activities text-center">
                <h1 class="mb-4"><span class="text-primary">Our Activities</span></h1>
            </div>
            <?php
            include_once "../config.php";
            $activities = mysqli_query($con, "SELECT * FROM `activity`");
            while ($activity = mysqli_fetch_assoc($activities)) {
                ?>
                <div class="activity">
                    <div class="activity-details">
                        <h3 class="activity-name"><?= $activity['nom_activity'] ?></h3>
                        <p class="activity-label">Description:</p>
                        <p class="activity-description"><?= $activity['description'] ?></p>
                        <p class="activity-label">Place:</p>
                        <p class="activity-place"><?= $activity['lieu'] ?></p>
                        <p class="activity-label">Date:</p>
                        <p class="activity-date"><?= $activity['date'] ?></p>
                        <p class="activity-label">Price:</p>
                        <p class="activity-price"><?= $activity['prix'] ?></p>
                        <p class="activity-label">Max Capacity:</p>
                        <p class="activity-max-capacity"><?= $activity['capacity_max'] ?></p>
                        <p class="activity-label">Duration:</p>
                        <p class="activity-duration"><?= $activity['duration'] ?></p>
                        <p class="activity-label">Category:</p>
                        <p class="activity-category"><?= $activity['id_category'] ?></p>
                    </div>
                    <div class="activity-image">
                        <img src="<?= $activity['image'] ?>" alt="<?= $activity['nom_activity'] ?>">
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
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
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Ariana ,Tunis</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+216 90616305</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Xplore@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Feedback</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="../view/img/testimonial-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="../view/img/testimonial-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="../view/img/testimonial-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="../view/img/testimonial-4.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="../view/img/team-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="../view/img/team-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Sign Up</h4>
                    <p>join Us and sign up now</p>
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


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


</body>
</html>
