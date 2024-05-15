<?php
// Include the configuration file  
require_once '../config.php'    ;

?>
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
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .hotel {
            display: inline-block;
            width: calc(33.33% - 20px);
            /* Adjust width as needed */
            margin: 10px;
            vertical-align: top;
            background-color: #ffff;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }

        .hotel img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .form-container {
            width: 625px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input,
        textarea {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .booking-option {
            width: 100px;
            height: 100px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            border: none;
        }

        #option1 {
            background-image: url('person.png');
        }

        #option2 {
            background-image: url('2person.png');
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
                    
                    <div class="nav-item dropdown">
                        
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Destination</a>
                            <a href="booking.html" class="dropdown-item">Booking</a>
                            <a href="team.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
              
                </div>
                
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">

                </div>
            </div>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Booking</h6>
                <h1 class="mb-5">Please fill this form</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="package-item col-lg-6">

                <script>
                    
                        document.addEventListener('DOMContentLoaded', function() {
                            document.querySelectorAll('.booking-option').forEach(function(button) {
                                button.addEventListener('click', function(event) {
                                    var optionValue = event.target.value;
                                    console.log("Selected option value:", optionValue);
                                    document.getElementById('booking_details').value = optionValue;


                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'payement_final.php'); // Change the URL to the PHP script handling the request
                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                    xhr.onload = function() {
                                        if (xhr.status === 200) {
                                            // Handle success
                                            console.log('Number of rooms stored successfully!');
                                        } else {
                                            // Handle errors
                                            console.error('Error storing number of rooms:', xhr.statusText);
                                        }
                                    };
                                    xhr.send('numberOfRooms=' + encodeURIComponent(optionValue));
                                });
                            });
                       
                            
                            document.getElementById('submitBtn').addEventListener('click', function(event) {
                                var bookingDetails = document.getElementById('booking_details').value;
                                if (!bookingDetails) {
                                    alert('Please select a booking option.');
                                    event.preventDefault();
                                }
                                var nameFormat = /^[A-Za-z]+$/;
                                var firstName = document.getElementById("name").value;
                                var lastName = document.getElementById("lname").value;

                                if (!firstName.match(nameFormat) || !lastName.match(nameFormat)) {
                                    alert("Name must contain only characters");
                                    event.preventDefault();
                                }console.log("test");

                                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                var email = document.getElementById("email").value;

                                if (!email.match(emailPattern)) {
                                    alert("Invalid email address");
                                    event.preventDefault();
                                }


                                var phoneNumberInput = document.getElementById('cvv');
                                var phoneNumber = phoneNumberInput.value;
                                if (!(/^\d{10}$/.test(phoneNumber))) {

                                    alert("Invalid phone number");
                                    event.preventDefault();
                                }

                                var checkinDate = document.getElementById('checkin_date').value;
                                var checkoutDate = document.getElementById('checkout_date').value;
                                var nightsInput = document.getElementById('nights');
                                
                                var checkinDate1 = new Date(checkinDate);
                                console.log(checkinDate1);
                                var checkoutDate1 = new Date(checkoutDate);
                                console.log(checkoutDate1);
                                var timeDiff =Math.abs(checkoutDate1.getDate() - checkinDate1.getDate());
                                console.log(timeDiff);
                                
                               
                                document.getElementById('nights').value = timeDiff;
                                
                                
                                    
                                    
                                if (!checkinDate || !checkoutDate) {
                                    alert('Please select both check-in and check-out dates.');
                                    event.preventDefault();
                                    return;
                                }

                                var checkinDateObj = checkinDate;
                                var checkoutDateObj = checkoutDate;

                                if (checkinDateObj >= checkoutDateObj) {
                                    alert('Check-out date must be after the check-in date.');
                                    event.preventDefault();
                                    return;
                                }
                                    var selectedDate = new Date(this.value);
                                    var today = new Date();
                                    today.setHours(0, 0, 0, 0);

                                    if (selectedDate <= today) {
                                        alert('Check-in date must be after today.');
                                        this.value = '';
                                        event.preventDefault();
                                        return;
                                    }
                                    

                                    if (!checkinDate || !checkoutDate) {
                                        nightsInput.value = ''; // Reset the nights value if either date is not selected
                                    } 
                                        
                                 
                                
                                

                               

                                







                            });
                        });
                    </script>


                    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_SANDBOX ? PAYPAL_SANDBOX_CLIENT_ID : PAYPAL_PROD_CLIENT_ID; ?>
&currency=<?php echo $currency; ?>"></script>

                    <div class="form-container">

                        <?php
                        
                        $selectedHotel = $_GET['hotel'];



                        $conn = config::getConnexion();



                        try {
                            $query = $conn->query("SELECT offres.nomHotel, hotels.lienPhotoHotel, hotels.adresse, offres.descriptionOffre
                        FROM offres
                        INNER JOIN hotels ON offres.nomHotel = hotels.nomHotel
                        WHERE offres.nomHotel = '$selectedHotel'");

                            $offers = $query->fetchAll();
                           
                            $query = $conn->query("SELECT chambres.prixChambre FROM chambres WHERE chambres.nomHotel = '$selectedHotel'");
                            $prix = $query->fetch();


                            if (count($offers) > 0) {
                                foreach ($offers as $offer) {

                                    echo '<img class="img-fluid" src="' . $offer['lienPhotoHotel'] . '" alt="Photo de l\'hôtel">';

                                    echo '<h2 class="text-center">' . $offer['nomHotel'] . '</h2>';
                                    echo '<p class="text-center">' . $offer['adresse'] . '</p>';
                                }
                            } else {
                                echo 'Aucune offre trouvée.';
                            }
                        } catch (PDOException $e) {
                            echo 'Echec de connexion:' . $e->getMessage();
                        }



                        // Set your price variable
                        $pricePerRoom = floatval($prix['prixChambre']); // Price per room
                        $hname = $offer['nomHotel'];

                        $itemPrice = $pricePerRoom; // Change this to whatever your price is


                        // PayPal button parameters
                        $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
                        $business_email = 'jilaniLyouselou@business.example.com'; // Your PayPal business email
                        $currency = 'USD';


                        ?>



                        <form action="payement_final.php" method="post">

                            <input type="hidden" name="business" value="<?php echo $business_email; ?>">
                            <input type="hidden" name="hname" value="<?php echo $hname; ?>">
                            <input type="hidden" id="generatedID1" name="generated_id1" value="0">
                            <input type="hidden" id="generatedID2" name="generated_id2" value="0">
                            <input type="hidden" id="generatedID3" name="generated_id3" value="0">
                            <script>
                                function generateID1() {
                                    return Math.floor(Math.random() * (99999999 - 10000000 + 1)) + 10000000;
                                }


                                document.getElementById('generatedID1').value = generateID1();

                                function generateID2() {
                                    return Math.floor(Math.random() * (999 - 100 + 1)) + 100;
                                }


                                document.getElementById('generatedID2').value = generateID2();

                                function generateID3() {
                                    return Math.floor(Math.random() * (9999999999 - 1000000000 + 1)) + 1000000000;
                                }


                                document.getElementById('generatedID3').value = generateID3();
                            </script>

                            <!-- Specify a Buy Now button -->


                            <!-- Specify the amount -->
                            <input type="hidden" name="price" value="<?php echo $itemPrice; ?>"> <!-- Use the calculated total price here -->




                            <!-- Specify URLs -->
                            <input type="hidden" name="return" value="http://v2/view/display%20front.php">
                            <input type="hidden" name="cancel_return" value="http://v2/view/payment_form.php?hotel=Ksar+Dhiafa">
                            <label for="name">First Name:</label>
                            <input type="text" id="name" name="name"><br><br>

                            <label for="name">Last Name:</label>
                            <input type="text" id="lname" name="lname"><br><br>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email"><br><br>



                            <label for="checkin_date">Check-in Date:</label>
                            <input type="date" id="checkin_date" name="expiry_date" placeholder="DD/MM"><br><br>

                            <label for="checkout_date">Check-out Date:</label>
                            <input type="date" id="checkout_date" name="expiry_date" placeholder="DD/MM"><br><br>

                            <label for="phone number">Phone Number:</label>
                            <input type="text" id="cvv" name="phonenumber" maxlength="10"><br><br>

                            <input type="hidden" id="nights" name="nights">


                            <label for="numberofpersons">Number of Guests:</label><br>
                            <div class="btn-group" role="group" aria-label="Booking Options">
                                <button type="button" id="option1" class="btn booking-option" data-option="option1" value="1"></button>
                                <button type="button" id="option2" class="btn booking-option" data-option="option2" value="2"></button>
                                <input type="hidden" id="booking_details" name="booking_details">

                                <div>


                                </div>

                                <button type="submit" id="submitBtn" class="btn btn-primary mt-3">Pay Now</button>





</body>

</html>