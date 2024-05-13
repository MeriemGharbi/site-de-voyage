
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Ratings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style>
        .activity-card {
            margin-bottom: 20px; /* Space between cards */
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .activity-card img {
            width: 100%;
            height: 200px; /* Fixed height for images */
            object-fit: cover;
        }
        .activity-card .card-body {
            flex: 1;
            padding: 20px;
        }
        .activity-card .card-footer {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .activity-card .rateyo {
            margin-bottom: 10px;
        }
        .activity-card .submit-rating {
            margin-top: auto;
        }
        .btn{ 
            
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
<?php
session_start(); // Start session to store rated activity IDs

$host = "localhost";
$username = "root";
$password = "";
$dbname = "xplore";

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to perform the join
    $sql = "SELECT 
                activity.id_act,
                activity.nom_activity,
                activity.description,
                activity.lieu,
                activity.date,
                activity.prix,
                activity.capacity_max,
                activity.image,
                activity.duration,
                activity.date_debut,
                activity.date_fin,
                activity.map,
                ratee.rate
            FROM 
                activity
            LEFT JOIN 
                ratee ON activity.id_act = ratee.id_act";

    // Prepare the statement
    $stmt = $con->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Fetch all the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get the rated activity IDs from session
    $rated_activities = isset($_SESSION['rated_activities']) ? $_SESSION['rated_activities'] : [];

    // Loop through the results and display them
    foreach ($results as $result) {
        // Skip displaying if the activity has been rated
        if (in_array($result['id_act'], $rated_activities)) {
            continue;
        }

        echo "<div class='col-md-4'>";
        echo "<div class='activity-card'>";
        echo "<img class='card-img-top' src='" . $result['image'] . "' alt='Activity Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $result['nom_activity'] . "</h5>";
        echo "<p class='card-text'>" . $result['description'] . "</p>";
        echo "<ul class='list-group list-group-flush'>";
        echo "<li class='list-group-item'>Location: " . $result['lieu'] . "</li>";
        echo "<li class='list-group-item'>Date: " . $result['date'] . "</li>";
        echo "<li class='list-group-item'>Price: " . $result['prix'] . "</li>";
        echo "<li class='list-group-item'>Capacity: " . $result['capacity_max'] . "</li>";
        echo "<li class='list-group-item'>Duration: " . $result['duration'] . "</li>";
        echo "<li class='list-group-item'>Start Date: " . $result['date_debut'] . "</li>";
        echo "<li class='list-group-item'>End Date: " . $result['date_fin'] . "</li>";
        echo "</ul>";
        echo "</div>";
        echo "<div class='card-footer'>";
        echo "<div class='rateyo' data-rateyo-rating='" . ($result['rate'] !== null ? $result['rate'] : '0') . "' data-rateyo-num-stars='5'></div>";
        echo "<!-- Form to submit rate -->";
        echo "<form class='submit-rating' onsubmit='return submitRating(this)' method='post'>";
        echo "<input type='hidden' name='id_act' value='" . $result['id_act'] . "'>";
        echo "<input type='hidden' name='rating'>";
        echo "<button type='submit' name='submit_rating' class='btn btn-primary'>Submit Rating</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Store rated activity IDs in session
// Store rated activity IDs in session
if (isset($_POST['submit_rating'])) {
    // Add the rated activity ID to the session
    $rated_activities[] = $_POST['id_act'];
    // Remove duplicates and update the session variable
    $_SESSION['rated_activities'] = array_unique($rated_activities);
}

?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

    // Function to handle form submission with AJAX
    function submitRating(form) {
        var formData = $(form).serialize();
        $.ajax({
            type: "POST",
            url: "rate.php",
            data: formData,
            success: function(data) {
                // Display a notification
                alert("Thank you for your rating. We appreciate it!");
                // Redirect to showActivityfront1.php
                window.location.href = "../../view/index.php";
            },
            error: function(xhr, status, error) {
                // Handle errors if any
                console.error(xhr.responseText);
                alert("Failed to add rate. Please try again.");
            }
        });
        // Prevent the default form submission
        return false;
    }
</script>
<a href="showActivityfront1.php" class="btn btn-primary">Return</a>
                     
</html>
