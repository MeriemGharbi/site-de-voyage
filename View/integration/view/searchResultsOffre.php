<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="../view/assets/assetsFront/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../view/assets/assetsFront/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Highlight Style -->
    <style>
        .highlight {
            background-color: lightblue;
        }
        .result-item {
            border: 1px solid #dee2e6;
            padding: 10px;
            margin-bottom: 20px;
            width: 70%;
            margin: 0 auto;
            text-align: center;
        }
        .result-item p {
            margin-bottom: 5px;
        }
        .result-item p b {
            font-weight: bold;
        }
        .result-item img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
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

<div class="container mt-5">
    <h1 class="text-center">Search Results</h1>
    <?php
    include '../config.php';
    $conn = config::getConnexion();
    // Retrieve the search query from the URL parameter
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    try {
        // Construct the SQL query with a dynamic search condition
        $sql = "SELECT offres.nomHotel, hotels.lienPhotoHotel, hotels.adresse, hotels.description, offres.descriptionOffre, chambres.typeChambre, chambres.prixChambre
                FROM offres
                LEFT JOIN hotels ON offres.nomHotel = hotels.nomHotel
                LEFT JOIN chambres ON hotels.nomHotel = chambres.nomHotel
                WHERE 
                    LOWER(offres.nomHotel) LIKE LOWER(:searchQuery)
                    OR LOWER(hotels.lienPhotoHotel) LIKE LOWER(:searchQuery)
                    OR LOWER(hotels.adresse) LIKE LOWER(:searchQuery)
                    OR LOWER(hotels.description) LIKE LOWER(:searchQuery)
                    OR LOWER(offres.descriptionOffre) LIKE LOWER(:searchQuery)
                    OR LOWER(chambres.typeChambre) LIKE LOWER(:searchQuery)
                    OR LOWER(chambres.prixChambre) LIKE LOWER(:searchQuery)";
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        // Bind the search query parameter with wildcard
        $searchPattern = '%' . $searchQuery . '%';
        $stmt->bindParam(':searchQuery', $searchPattern, PDO::PARAM_STR);
        // Execute the query
        $stmt->execute();
        // Check if any results found
        if ($stmt->rowCount() > 0) {
            // Fetch and output data
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="result-item">';
                // Output each column value with highlighted search query
                foreach ($row as $key => $value) {
                    // Highlight the matching search query in blue
                    $highlightedValue = str_ireplace($searchQuery, '<span class="highlight">' . $searchQuery . '</span>', $value);
                    // Output the key (name) and value
                    if ($key === 'lienPhotoHotel') {
                        echo "<img src='" . $highlightedValue . "' alt='Photo'>";
                    } else {
                        echo "<p><b>" . ucfirst($key) . ":</b> " . $highlightedValue . "</p>";
                    }
                }
                echo "</div>"; // Close result-item div
            }
            
        } else {
            echo "<p class='text-center'>No results found for search query: " . $searchQuery . "</p>";
        }
    } catch (PDOException $e) {
        echo "<p class='text-center'>Connection failed: " . $e->getMessage() . "</p>";
    }
    ?>
</div>

</body>
</html>
