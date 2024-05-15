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

        .category-select {
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
 
   <!-- =============== Navigation ================ -->
 <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                    <span class="title" style="font-size: 250%; right: -50px; ">Xplore</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#"  onclick="showOffre()" >
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Offres</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="card-outline"></ion-icon>
                        </span>
                        <span class="title">Paiement</span>
                    </a>
                </li>

                <li>
                    <a href="../../view/back"  onclick="showActivities()">
                        <span class="icon">
                            <ion-icon name="walk-outline"></ion-icon>
                        </span>
                        <span class="title">activités</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Transport</span>
                    </a>
                </li>
            </ul>
            <a href="../view/index1.html"><button type="button" class="btn1"><span></span>Return</button></a>

        </div>
<!-- =========================TODO: topbar ==================== -->
              <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="logo">
                <img src="../view/img/xplore.png" alt="">
                </div>
            </div>
 <!-- =========================TODO: SELECT ==================== -->  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="category-select">
     <div class="category-links">
    
    
    <select onchange="window.location.href=this.value">
        <option value="#">Select a category</option>
        <?php
        // Include the database configuration file
        include '../../config.php'; 
        $con=config::getConnexion();
        // Fetch available categories from the database
        $sql = "SELECT * FROM category";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display categories as options in the combobox
        if (count($categories) > 0) {
            foreach ($categories as $row) {
                // Output each category option with the same template as showcategory
                echo "<option value='activityjoinback.php?category_id=" . $row['id_category'] . "'>" . $row['nom_category'] . "</option>";
            }
        } else {
            // Display a message if no categories are found
            echo "<option disabled>No categories found</option>";
        }
        ?>
    </select>
 </div>

<!-- =========================TODO: search ==================== -->
    <div class="search">
        <label>
            <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." oninput="handleSearchInput()">
        </label>
        <div id="searchresult" class="cardBox"></div> 
        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#live_search").on("input", function(){
        var input = $(this).val().trim(); // Trim leading and trailing whitespace
        if(input !== "") {
            $.ajax({
                url: "livesearch.php",
                method: "POST",
                data: { input: input },
                success: function(data) {
                    $("#searchresult").html(data);
                }
            });
        } else {
            // Clear the search result and reset the display
            $("#searchresult").html("");
        }
    });
});
</script>    
<!-- =========================TODO: TRI ==================== -->
<a href="activityrateback.php" class="button">
<div class="button-container">
    <button type="button" class="btn" >check the ratings</button> 

    </a>
    <div class="button-container1">
    <a href="../../view/backoffice/back.php" class="button">
    <button type="button" class="btn" >Return</button>   
    </div>
</div>
    </a>
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
    <option value="recent">Date (Most Recent to Oldest)</option>
    <option value="oldest">Date (Oldest to Most Recent)</option>
    <option value="price-high">Price (Higher to Lower)</option>
    <option value="price-low">Price (Lower to Higher)</option>
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
                        <th scope="col"></th>
                        <th>Activity name</th>
                        <th>Description</th>
                        <th>place</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>capacity</th>
                        <th>image</th>
                        <th>start hour</th>
                        <th>ending hour</th>
                        <th>duration</th>
                        <th>map</th>
                        <th>location in map</th>
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
    // Function to fetch sorted activity data via AJAX
    function fetchSortedData(sortOrder, sortType) {
        $.ajax({
            url: 'sortActivity.php',
            type: 'GET',
            data: {
                sort_alphabet: sortOrder,
                sort_date: sortType // Pass the sorting type parameter
            },
            success: function(response) {
                $('#categoryTableBody').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    $('#sortBtn').click(function() {
        var sortOrder = $('#sortOption').val();
        var sortType = $('#sortOption').val();  
        fetchSortedData(sortOrder, sortType);
    });
    $('#sortPriceOption').change(function() {
        var sortOrder = $(this).val();
        fetchSortedData('price', sortOrder);  
    });
    fetchSortedData('a-z', '');
});
</script>
<!-- =========================TODO: statistic ==================== -->
<div id="chartsContainer">
    <?php
        $con=config::getConnexion();

    try {
        // Fetch data for price ranges chart
        $priceRangesQuery = "SELECT 
            SUM(CASE WHEN prix >= 0 AND prix < 40 THEN 1 ELSE 0 END) AS range_0_40,
            SUM(CASE WHEN prix >= 40 AND prix < 90 THEN 1 ELSE 0 END) AS range_40_90,
            SUM(CASE WHEN prix >= 90 THEN 1 ELSE 0 END) AS range_90_plus
            FROM activity";
        $priceRangesStmt = $con->prepare($priceRangesQuery);
        $priceRangesStmt->execute();
        $priceRangesResult = $priceRangesStmt->fetch(PDO::FETCH_ASSOC);

        // Prepare data for price ranges chart
        $priceRangesData = array(
            ['Price Range', 'Number of Activities'],
            ['0 - 40', (int)$priceRangesResult['range_0_40']],
            ['40 - 90', (int)$priceRangesResult['range_40_90']],
            ['90+', (int)$priceRangesResult['range_90_plus']]
        );

        // Encode data as JSON for use in JavaScript
        $jsonDataPriceRanges = json_encode($priceRangesData);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    
    <!-- Render the price ranges chart -->
    <div id="priceRangesChart" class="chart-container"></div>
</div>

<!-- Script tags for Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawPriceRangesChart);

    function drawPriceRangesChart() {
        // Draw Price Ranges Chart
        var jsonDataPriceRanges = <?php echo $jsonDataPriceRanges; ?>;
        var dataPriceRanges = google.visualization.arrayToDataTable(jsonDataPriceRanges);
        var optionsPriceRanges = {
            title: 'Activities by Price Ranges'
        };
        var chartPriceRanges = new google.visualization.PieChart(document.getElementById('priceRangesChart'));
        chartPriceRanges.draw(dataPriceRanges, optionsPriceRanges);
    }
</script>
<div class="container">
        <!-- Add your charts container here -->
        <div id="averagePriceChart" class="chart-container"></div>
    </div>

    <!-- Add your JavaScript libraries and scripts here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawAveragePriceChart);

        function drawAveragePriceChart() {
            var jsonDataAveragePrice = <?php echo $jsonDataAveragePrice; ?>;
            var dataAveragePrice = google.visualization.arrayToDataTable(jsonDataAveragePrice);
            var optionsAveragePrice = {
                title: 'Average Price of Activities',
                legend: { position: 'none' },
                chartArea: { width: '50%' },
                vAxis: { title: 'Price ($)' }
            };
            var chartAveragePrice = new google.visualization.BarChart(document.getElementById('averagePriceChart'));
            chartAveragePrice.draw(dataAveragePrice, optionsAveragePrice);
        }
    </script>
<!-- =========================TODO: fin ==================== -->
 <!-- ====== ionicons ======= -->
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>