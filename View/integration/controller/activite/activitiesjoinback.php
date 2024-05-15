
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for activities</title>
    <link rel="stylesheet" href="../../view/backoffice/assets/css/style.css">
 <style>
        .category-links {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 300px;
            margin-left: 90px;
        }

        .category-links select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1;
            margin-right: 10px;
            
        }
        .chart-container {
   
    border-radius: 10px;
    margin-bottom: 20px;
    width: 1500px;/* Adjust chart container width */
    max-width: 800px; /* Maximum width of the chart container */
    height: 800px; /* Adjust chart container height */
   margin-left: 250px;
   margin-top: 70px;
        }
        .search {
            flex: 1;
        }

        .search input[type="text"] {
            width: 300px;
            height: 45px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            margin-top: 40px;
        }

        .search button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .search button:hover {
            background-color: #0056b3;
        }
 

        .card-header {
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
            border-radius: 10px 10px 0 0;
            width:400px;
            margin-left: 100px;
           
        }

        .card-body {
            padding: 20px;
            margin-left: 100px;
        }

        .table {
            width: 90%;
            border-collapse: collapse;
            margin-left: 100px;
        }

        .table th,
        .table td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .table th {
            background-color: #f0f0f0;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #e0e0e0;
        }
    .button{
        margin-left: 650px;
        margin-top: 100px;
    }  
    .button-container {
    margin-bottom: 100px; /* Adjust the spacing between the buttons vertically */
    margin-top: -125px;
    margin-left: -20px;
}

.button-container .btn {
  /* Adjust the spacing between the buttons horizontally */
    font-size: 18px; /* Adjust the font size */
    padding: 12px 15px; /* Adjust the padding */

}
.button-container1 {
    margin-bottom: 100px; /* Adjust the spacing between the buttons vertically */
    margin-top: -47px;
    margin-left: 175px;
}

.button-container1 .btn {
  /* Adjust the spacing between the buttons horizontally */
    font-size: 18px; /* Adjust the font size */
    padding: 12px 15px; /* Adjust the padding */

}
    </style>
    </head>
 <!-- ========================= TODO: navigation ==================== -->
 <body>   
<div class="container">
<div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                           <!-- <ion-icon name="logo-apple"></ion-icon>-->
                        </span>
                        <span class="title">
                            <div class="official">
                            Xplore
                            </div>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="user">
                            <img src="../../view/backoffice/img/user.png">
                            </div>
                        </span>
                        <span class="title">User</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../../view/backoffice/img/sale.png">
                            </div>
                        </span>
                        <span class="title">offers</span>
                    </a>
                </li>

                <li>
                    <a href="../../view/backoffice/back.php">
                        <span class="icon">
                        <div class="user">
                            <img src="../../view/backoffice/img/activity.png">
                            </div>
                        </span>
                        <span class="title">activities</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../../view/backoffice/img/car.png">
                            </div>
                        </span>
                        <span class="title">Car rent</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                    <span class="icon">
                        <div class ="user">
                            <img src="../../view/backoffice/img/pay.png">
                            </div>
                        </span>
                        
                        <span class="title">Payement</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../../view/backoffice/img/comment.png">
                            </div>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../../view/backoffice/img/exit.png">
                            </div>
                        </span>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>       
                </li>
            </ul>
            <a href="../view/index1.html"><button type="button" class="btn1"><span></span>Return</button></a>
        </div>
        
      <!-- ========================= search ==================== -->
      <br><br>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
    <label>
    
        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." oninput="handleSearchInput()">
</label>
        <div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        // Function to handle search input changes
        function handleSearchInput() {
            var input = $("#live_search").val();
            // Store the search value in localStorage
            localStorage.setItem('searchValue', input);
        }

        // Attach the handleSearchInput function to the input element's input event
        $("#live_search").on('input', function() {
            handleSearchInput();

            var input = $(this).val();
            if(input != ""){
                $.ajax({
                    url:"categorysearch.php", // Change the URL to categorysearch.php
                    method : "POST",
                    data:{input:input},
                    success:function(data){
                        // Hide the existing activities container
                        $(".table-container").hide();
                        // Show the search results container
                        $("#searchresult").html(data).show();
                    }
                });
            } else {
                // If the input is empty, show all results again
                $.ajax({
                    url:"showactivity.php", // Change the URL to the PHP file that fetches all results
                    method : "POST",
                    success:function(data){
                        // Show the existing activities container
                        $(".table-container").show();
                        // Hide the search results container
                        $("#searchresult").html("").hide();
                    }
                });
            }
        });

        // Check if there is a stored search value
        var storedSearch = localStorage.getItem('searchValue');
        if (storedSearch) {
            // Populate the search input field with the stored value
            $("#live_search").val(storedSearch);
        }
    });
</script>
   <!-- ========================= select ==================== -->
</div>
<div id="search-results"></div>


                <div class="logo">
                <img src="../view/backoffice/img/xplore.png" alt="">
                </div>
            </div>
            <div class="category-links">
            <select id="category-select">
    <option value="#">Select a category</option>
    <?php
    // Include the database configuration file
    include '../../config.php'; 
    $con=config::getConnexion();

    // Fetch categories from the database
    $sql = "SELECT * FROM category";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display categories as options in the dropdown
    if (count($categories) > 0) {
        foreach ($categories as $row) {
            echo "<option value='" . $row['id_category'] . "'>" . $row['nom_category'] . "</option>";
        }
    } else {
        echo "<option disabled>No categories found</option>";
    }
    ?>
</select>

</div>
        <!--====================================TODO:=================================-->
           <div class="table-container">    
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Activities available </h2>
                        <a href="../../controller/activite/searchactivity" class="btn btn-primary">Return</a> <br>
               
                    </div>

                    <table class="table">
   
<?php
// Inclure le fichier de configuration de la base de données
include '../../config.php'; 
// Vérifier si l'ID de la catégorie est défini dans l'URL
if(isset($_GET['category_id'])) {
    // Récupérer l'ID de la catégorie à partir de l'URL
    $category_id = $_GET['category_id'];

    try {
        // Préparer la requête SQL avec une jointure entre les tables activity et category
        $query_activities = "SELECT activity.*, category.nom_category
                             FROM activity
                             INNER JOIN category ON activity.id_category = category.id_category
                             WHERE activity.id_category = ?";
        
        // Préparer la déclaration SQL
        $stmt_activities = $con->prepare($query_activities);

        // Liaison des paramètres
        $stmt_activities->bindParam(1, $category_id, PDO::PARAM_INT);

        // Exécuter la requête
        $stmt_activities->execute();

        // Récupérer le résultat de la requête
        $result_activities = $stmt_activities->fetchAll(PDO::FETCH_ASSOC);

        // Afficher les activités liées à la catégorie spécifiée
        if(!empty($result_activities)) {
            foreach($result_activities as $row) {
                $duration = substr($row['duration'], 0, 5);
                $date_formattee = date_format(date_create($row['date']), 'Y-m-d');
                $date_debut = date_format(date_create($row['date_debut']), 'H:i');
                $date_fin = date_format(date_create($row['date_fin']), 'H:i');
            
                echo "<div class='table'>";
                echo "<div class='activity'>";
                echo "<div class='activity-details'>";
                echo "<div class='left-content'>";
                echo "<h3 class='table th'>Nom de l'activité : {$row['nom_activity']}</h3>";
                echo "<p class='table td'>Description : {$row['description']}</p>";
                echo "<p class='table td'>Lieu : {$row['lieu']}</p>";
                echo "<p class='table td'>Date : $date_formattee</p>";
                echo "<p class='table td'>Date début : $date_debut</p>";
                echo "<p class='table td'>Date fin : $date_fin</p>";
                echo "<p class='table td'>Prix : {$row['prix']}</p>";
                echo "<p class='table td'>Capacité maximale : {$row['capacity_max']}</p>";
                echo "<p class='table td'>Durée : $duration</p>";
                echo "<p class='table td'>Nom de la catégorie : {$row['nom_category']}</p>";
                echo "</div>"; // End of left-content
                echo "</div>"; // End of activity-details
                echo "<div class='activity-image'><img src='{$row['image']}' class='activity-img'></div>";
                echo "</div>"; // End of activity
                echo "</div>"; // End of table
            }
            
            
        } else {
            // Afficher un message si aucune activité nest trouvée pour cette catégorie
            echo "Aucune activité trouvée pour cette catégorie.";
        }
    } catch(PDOException $e) {
        // Gérer les erreurs PDO
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    echo "ID de la catégorie non spécifié.";
}

// Fermer la connexion à la base de données lorsque vous avez terminé de l'utiliser
$con = null;
?>

    </div>
<br>

 <!-- ========================= sort ==================== -->
<div class="container">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Sort</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <select id="sortOption" class="form-control">
                                    <option value="a-z">A-Z (Ascending Order)</option>
                                    <option value="z-a">Z-A (Descending Order)</option>
                                </select>
                                
                                <button type="button" class="input-group-text btn btn-primary" id="sortBtn">Sort</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    
                    <tr>
                        <th scope="col">Id category</th>
                        <th>Category name</th>
                        <th>Level</th>
                        <th>Season</th>
                        <th>Popularity</th>
                        <th>Mobility</th>
                    </tr>
        
                </thead>
                <tbody id="categoryTableBody">
                    <!-- Category table body will be populated dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function() {
    // Function to fetch sorted category data via AJAX
    function fetchSortedData(sortOrder) {
        $.ajax({
            url: 'fetch_sorted_data.php', // Update the URL to the PHP file that fetches sorted data
            type: 'GET',
            data: {
                sort_alphabet: sortOrder
            },
            success: function(response) {
                $('#categoryTableBody').html(response); // Update the table body with sorted data
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Event listener for the Sort button click
    $('#sortBtn').click(function() {
        var sortOrder = $('#sortOption').val(); // Get the selected sorting order
        fetchSortedData(sortOrder); // Fetch sorted data
    });

    // Initial load to display the table with default sorting
    fetchSortedData('a-z');
});
</script>
</body>
</html>

</script>
</body>
</html>



