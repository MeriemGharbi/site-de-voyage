<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/backoffice/assets/css/style.css">
    <title>liste des categories</title>
    <style>
   .activity {
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 60px;
    overflow: hidden;
    
    
}

.activity-details {
    padding: 20px;
    text-align: left;
    flex: 1; /* Fill remaining space */
    color: black;

}

.activity-img {
    width: 500px;
    height:700px;
}
.table td {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
}


.table th {
    font-weight: bold;
    font-size: 30px;
    line-height: 1.5;
    margin-bottom: 50px;
}
.activity-details {
    padding: 20px;
    text-align: left;
    flex: 1; /* Fill remaining space */
}

.left-content {
    flex: 1; /* Fill remaining space */
}

.activity-details h3 {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 60px;
    color: #2a2185;
    text-align:center;
}

.activity-details p {
    font-size: 20px;
    line-height: 1.5;
    margin-bottom: 8px;
    font-weight: 600px;
    
}


.left-content {
    flex: 1; /* Fill remaining space */
}

.table-container {
    padding: 20px;
    display: flex;
    justify-content: center; /* Centers the table-container horizontally */
    margin-left: 60px; 
    width: 115%;
    
}


        .input-group-text.btn {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff; 
            border-radius: 0;
            width: 40px;
            height: 20;
            border-radius: 5px;
        }

        .input-group-text.btn:hover {
            background-color: #0056b3; 
            border-color: #0056b3; 
            color: #fff; 

        }
        .category-links select {
    width: 200px; /* Adjust width as needed */
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    appearance: none; /* Remove default arrow icon */
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23555555" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>'); /* Custom arrow icon */
    background-repeat: no-repeat;
    background-position: right 10px center;
    
    position: relative; /* Ensure positioning relative to its container */
    top: -50px; /* Adjust top position */
    left: 980px; /* Adjust left position */
    padding: 10px;
}
/* Style for dropdown options */
.category-links select option {
    background-color: #fff;
    color: #333;
}

/* Hover effect for dropdown options */
.category-links select option:hover {
    background-color: #f0f0f0;
}
            </style>
</head>
<body>
    
<div class="container">
                     <!-- ===============navigation================ -->
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
                    <a href="#">
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
    <select onchange="window.location.href=this.value">
        <option value="#">Select a category</option>
        <?php
        // Include the database configuration file
        include '../../config.php'; 

        // Fetch available categories from the database
        $sql = "SELECT * FROM category";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display categories as options in the combobox
        if (count($categories) > 0) {
            foreach ($categories as $row) {
                // Output each category option with the same template as showcategory
                echo "<option value='activitiesjoinback.php?category_id=" . $row['id_category'] . "'>" . $row['nom_category'] . "</option>";
            }
        } else {
            // Display a message if no categories are found
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
                        <a href="../../controller/activite/showCategory.php" class="btn btn-primary">Return</a> <br>
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



