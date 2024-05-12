<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    

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
    <link href="../../view/frontoffice/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../view/frontoffice/css/style.css" rel="stylesheet">
    <style> 
 
.activity-details{
    color:black;
    font-weight: 700;
    font-size: 20px;
}
.category-links {
    display: flex;
    align-items: center;
}

.select-category {
    margin-right: 10px; /* Adjust spacing between the select and search bar */
}

.select-category select {
    width: 150px; /* Adjust the width of the select dropdown */
}

.search {
    position: relative;
}

/* Style the search input */
.search input {
    width: 250px; /* Adjust the width of the search input */
    border-radius: 20px; /* Add some border-radius for rounded corners */
    padding: 10px; /* Add padding for better appearance */
    border: 1px solid #ccc; /* Add a border for clarity */
}
.container{
    width: 100%;
    padding: 70px;
}

    </style>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
            <img src="../view/frontoffice/img/xplore.png" class="logo">
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="showActivityfront.php" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">Offers</a>
                    <a href="package.html" class="nav-item nav-link">User</a>
                    <a href="package.html" class="nav-item nav-link">location</a>
                    <a href="package.html" class="nav-item nav-link">Payement</a>
                    <a href="package.html" class="nav-item nav-link">Feedbacks</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Activity</a>
                        <div class="dropdown-menu m-0">
                            <a href="showActivityfront.php" class="dropdown-item">Our activities </a>
                            <a href="showCategoryfront.php" class="dropdown-item">Category</a>
         
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
                        <p class="fs-4 text-white mb-4 animated slideInDown">Welcome to Xplore - Your Gateway to Unforgettable Adventures!
                          </p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                         
                    
                            <div class="category-links">
    <!-- Category Dropdown -->
    <div class="select-category">
        <select onchange="window.location.href=this.value" class="form-select">
            <option value="#" selected>Select a category</option>
            <?php
            // Include the database configuration file
            include '../../config.php'; 


            // Fetch categories from the database
            $sql = "SELECT * FROM category";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Display categories as options in the dropdown
            if (count($categories) > 0) {
                foreach ($categories as $row) {
                    echo "<option value='activitiesjoinback.php?category_id=" . $row['id_category'] . "'>" . $row['nom_category'] . "</option>";
                }
            } else {
                echo "<option disabled>No categories found</option>";
            }
            ?>
        </select>
    </div>

    <!-- Search Bar -->
    <div class="search">
        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search...">
        <div id="searchresult" class="cardBox"></div>
    </div>
</div>

    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input =$(this).val();
            if(input!=""){
                $.ajax({
                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},
                    success:function(data){
                        $("#searchresult").html(data);
                    }
                });
            } else {
                $("#searchresult").css("display","none");
            }
        });
    });
</script>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <?php
include '../../config.php'; 

try {
    // Check if the ID parameter is set in the URL
    if(isset($_GET['id_act'])) {
        // Get the activity ID from the URL parameter
        $activity_id = $_GET['id_act'];

        // Prepare the SQL query to retrieve the details of the specific activity along with its average rating
        $query = "SELECT activity.*, category.nom_category AS category_name, COALESCE(AVG(ratee.rate), 0) AS average_rating
                  FROM `activity` 
                  LEFT JOIN `category` ON activity.id_category = category.id_category
                  LEFT JOIN `ratee` ON activity.id_act = ratee.id_act
                  WHERE activity.id_act = :id_act";

        // Prepare the statement
        $stmt = $con->prepare($query);

        // Bind the parameter
        $stmt->bindParam(':id_act', $activity_id);

        // Execute the statement
        $stmt->execute();

        // Fetch the activity details
        $activity = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if activity exists
        if($activity) {
            // Output the activity details
?>
           <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="activity-details">
                <h3 class="activity-name"><?= $activity['nom_activity'] ?></h3>
                <p class="activity-label">Description:</p>
                <p class="activity-description"><?= $activity['description'] ?></p>
                <p class="activity-label">Place:</p>
                <p class="activity-place"><?= $activity['lieu'] ?></p>
                <p class="activity-label">Date:</p>
                <p class="activity-date"><?= date('Y-m-d', strtotime($activity['date'])) ?></p>
                <p class="activity-label">Start Time:</p>
                <p class="activity-time"><?= date('H:i', strtotime($activity['date_debut'])) ?></p>  
                <p class="activity-label">End Time:</p>
                <p class="activity-time"><?= date('H:i', strtotime($activity['date_fin'])) ?></p>
                <p class="activity-label">Price:</p>
                <p class="activity-price"><?= $activity['prix'] ?></p>
                <p class="activity-label">Max Capacity:</p>
                <p class="activity-max-capacity"><?= $activity['capacity_max'] ?></p>
                <p class="activity-label">Duration:</p>
                <p class="activity-duration"><?= date('H:i', strtotime($activity['duration'])) ?></p>
                <p class="activity-label">Category:</p>
                <p class="activity-category"><?= $activity['category_name'] ?></p>
                <p class="activity-label">Average Rating:</p>
                <p class="activity-average-rating"><?= $activity['average_rating'] != 0.0 ? number_format($activity['average_rating'], 1) : 'No ratings yet' ?></p>
                <p class="activity-map">
            <iframe width='1250' height='700' src='https://maps.google.com/maps?q=<?= $activity['map'] ?>&output=embed'></iframe>
        </p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="activity-image">
                <img src="<?= $activity['image'] ?>" alt="<?= $activity['nom_activity'] ?>"><br><br><br><br>
            </div>
        </div>
    </div>
</div>
<?php
        } else {
            echo "Activity not found.";
        }
    } else {
        echo "Activity ID not provided.";
    }
} catch (PDOException $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage();
}
?>


    <!-- JavaScript Libraries -->
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
