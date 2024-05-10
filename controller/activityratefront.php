<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>
</body>
</html>
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency";

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

    // Loop through the results and display them
    foreach ($results as $result) {
        echo "<p>Activity ID: " . $result['id_act'] . "</p>";
        echo "<p>Name: " . $result['nom_activity'] . "</p>";
        echo "<p>Description: " . $result['description'] . "</p>";
        echo "<p>Location: " . $result['lieu'] . "</p>";
        echo "<p>Date: " . $result['date'] . "</p>";
        echo "<p>Price: " . $result['prix'] . "</p>";
        echo "<p>Capacity: " . $result['capacity_max'] . "</p>";
        echo "<p>Image: <img src='" . $result['image'] . "' width='100' height='100'></p>"; // Display image
        echo "<p>Duration: " . $result['duration'] . "</p>";
        echo "<p>Start Date: " . $result['date_debut'] . "</p>";
        echo "<p>End Date: " . $result['date_fin'] . "</p>";
        echo "<p>Map: <iframe width='100%' height='500' src='https://maps.google.com/maps?q=" . $result['map'] . "&output=embed'></iframe></p>"; // Display map
        echo "<p>Rate: " . $result['rate'] . "</p>";

        // Display stars based on the rate
        if ($result['rate'] !== null) {
            echo "<div class='rateyo' data-rateyo-rating='" . $result['rate'] . "' data-rateyo-num-stars='5'></div>";
        } else {
            echo "<div class='rateyo' data-rateyo-rating='0' data-rateyo-num-stars='5'></div>";
        }

     // Form to submit rate
echo "<form action='rate.php' method='post'>";
echo "<input type='hidden' name='id_act' value='" . $result['id_act'] . "'>";
echo "<input type='hidden' name='rating'>";
echo "<button type='submit' name='submit_rating'>Submit Rating</button>";
echo "</form>";


        echo "<hr>";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
