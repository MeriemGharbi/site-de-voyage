
  <!-- ========================= TODO:  Our activities ==================== -->
    <div class="activities text-center" >
    <h1 class="mb-4"><span class="text-primary" > Our activities</span></h1>
    </div>
    <div class="container-xxl py-5 destination">
    <div class="container">
    <div class="row row-cols-2 row-cols-md-3 g-4">
    <?php

try {
    $pdo = config::getConnexion();

    // Prepare the SQL query to retrieve activities
    $query = "SELECT activity.*, COALESCE(AVG(ratee.rate), 0) AS average_rating
              FROM `activity`
              LEFT JOIN `ratee` ON activity.id_act = ratee.id_act
              GROUP BY activity.id_act
              ORDER BY `date` DESC LIMIT 6";
    // Prepare the statement
    $stmt = $pdo->prepare($query);

    // Execute the statement
    $stmt->execute();

    // Fetch all activities
    $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the activities
    foreach ($activities as $activity) {
        ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?= $activity['image'] ?>" class="card-img-top" alt="<?= $activity['nom_activity'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><strong>Activity name:</strong> <?= $activity['nom_activity'] ?></h5>
                    <?php
                    // Check the length of the description
                    if (strlen($activity['description']) > 100) {
                        // If the description is too long, display an excerpt followed by "View more"
                        $short_description = substr($activity['description'], 0, 100) . '...';
                        echo "<p class='card-text'><strong>Description:</strong> $short_description <a href='integration/controller/activite/showActivityfront2.php?id_act={$activity['id_act']}'>View more</a></p>";
                    } else {
                        // If the description is short enough, display it completely
                        echo "<p class='card-text'><strong>Description:</strong> {$activity['description']}</p>";
                    }
                    ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Place:</strong> <?= $activity['lieu'] ?></li>
                    <li class="list-group-item"><strong>Date:</strong> <?= date('Y-m-d', strtotime($activity['date'])) ?></li>
                    <li class="list-group-item"><strong>Price:</strong> <?= $activity['prix'] ?></li>
                    <li class="list-group-item"><strong><!DOCTYPE html>
<html>
<head>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
</head>
<body>

<h2>Average Rating</h2>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

</body>
</html>
:</strong> <?= $activity['average_rating'] != 0.0 ? number_format($activity['average_rating'], 1) : 'No ratings yet' ?></li>
               
                </ul>
                <div class="card-body">
                    <a href="integration/controller/activite/showActivityfront2.php?id_act=<?= $activity['id_act'] ?>" class="btn btn-primary">View more info</a>
                </div>
            </div>
        </div>
        <?php
    }
} catch (PDOException $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage();
}
?>
    </div>
</div>
        </div>
        <div class="card-body text-center">
                        <a href="integration/controller/activite/showActivityfront.php" class="btn btn-primary">View all activities</a>
                    </div>
    </div>
<!-- ========================= TODO:  end of activity part==================== -->
