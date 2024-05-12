<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style.css">
    <title>liste des categories</title>
    <style>
        /* CSS for arranging the elements */
       
        .details table {
           width: 1300px;
          
        }
        #chartsContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #mobilityChart,
        #popularityChart {
            width: 600px;
            height: 600px;
            margin-bottom: 15px;  
        }
        
        .table thead th {
            background-color: #f0f0f0; /* Light gray background */
            color: #333; /* Dark text color */
            border: 1px solid #ccc; /* Border color */
        }

        /* Styling for alternating rows */
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Lighter background for even rows */
        }

        /* Hover effect for table rows */
        .table tbody tr:hover {
            background-color: #e0e0e0; /* Light gray background on hover */
        }

        /* Styling for the sort button */
        .input-group-text.btn {
            background-color: #007bff; /* Blue background */
            color: #fff; /* White text color */
            border-color: #007bff; /* Blue border color */
        }

        .input-group-text.btn:hover {
            background-color: #0056b3; 
            border-color: #0056b3;
        }


        .form-control {
            border-radius: 0;
        }

        .container {
            padding-top: 20px; 
        }

            .chart-container .google-visualization-chart-title {
                font-size: 300px; 
                color: #333;
            
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
        /* Style for the dropdown container */
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

.chart-container1 {
    margin-bottom: -800px; /* Adjust margin as needed */
    margin-top:50px;
    margin-left:-800px;
    width: 1900px; /* Set a fixed width for each chart */
    height: 300px;
    
}

#seasonChart {
    margin-right: -1000px; /* Add some margin between charts */
    margin-top:30px;
    width: 700px; /* Set a fixed width for each chart */
}

#levelChart {
    width: 1000px; /* Set a fixed width for each chart */
    margin-top:120px;
    height: 400px;
    
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
                            <img src="../view/backoffice/img/user.png">
                            </div>
                        </span>
                        <span class="title">User</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/sale.png">
                            </div>
                        </span>
                        <span class="title">offers</span>
                    </a>
                </li>

                <li>
                    <a href="showActivity.php">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/activity.png">
                            </div>
                        </span>
                        <span class="title">activities</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/car.png">
                            </div>
                        </span>
                        <span class="title">Car rent</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                    <span class="icon">
                        <div class ="user">
                            <img src="../view/backoffice/img/pay.png">
                            </div>
                        </span>
                        
                        <span class="title">Payement</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/comment.png">
                            </div>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <div class="user">
                            <img src="../view/backoffice/img/exit.png">
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
        include_once "../config.php";

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
                 <!-- ========================= crud =================== -->
            <div class="details">
                <div class="recentOrders">
                <div class="cardHeader">
                       <h1 class="category">Category</h1>
                        <a href="addCategory.php" class="btn btn-primary">Add category</a>
                        <a href="showActivity.php" class="btn btn-primary">Check activity</a>
                    
                    </div>
                    <main>
    <div class="link_container">
    </div>
    <div class="details">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Id category</th>
                        <th>Category name</th>
                        <th>Level</th>
                        <th>Season</th>
                        <th>Popularity</th>
                        <th>Mobility</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "travel_agency";

                    try {
                        $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                        // Set PDO error mode to exception
                        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch(PDOException $e) {
                        die("Connection failed: " . $e->getMessage());
                    }

                    // Fetch category data
                    $sql = "SELECT * FROM category";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($result) > 0) {
                        // Display category data
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['id_category'] . "</td>";
                            echo "<td>" . $row['nom_category'] . "</td>";
                            echo "<td>" . $row['level'] . "</td>";
                            echo "<td>" . $row['season'] . "</td>";
                            echo "<td>" . $row['popularity'] . "</td>";
                            echo "<td>" . $row['mobility'] . "</td>";
                            echo "<td class='image' ><a href='updateCategory.php?id=" . $row['id_category'] . "'><img src='../view/backoffice/img/modifier.png' ></a></td>";
                            echo "<td class='image'><a href='deleteCategory.php?id=" . $row['id_category'] . "' onclick='return confirm(\"Are you sure you want to delete this category?\");'><img src='../view/backoffice/img/trash.png'  ></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='message'>0 categories pour le moment !</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
         <!-- ========================= statistics==================== -->
    <div id="chartsContainer">
        <?php
        try {
            // Fetch data for mobility chart
            $mobilityQuery = "SELECT mobility, COUNT(*) AS count FROM category GROUP BY mobility";
            $mobilityStmt = $con->prepare($mobilityQuery);
            $mobilityStmt->execute();
            $mobilityResult = $mobilityStmt->fetchAll(PDO::FETCH_ASSOC);

            // Prepare data for mobility chart
            $mobilityData = array();
            $mobilityData[] = ['Mobility', 'Count'];
            foreach ($mobilityResult as $row) {
                $mobility = $row['mobility'] == 'yes' ? 'Needs Mobility' : 'Doesn\'t Need Mobility';
                $mobilityCount = (int)$row['count'];
                $mobilityData[] = [$mobility, $mobilityCount];
            }

            // Fetch data for popularity chart
            $popularityQuery = "SELECT popularity, COUNT(*) AS count FROM category GROUP BY popularity";
            $popularityStmt = $con->prepare($popularityQuery);
            $popularityStmt->execute();
            $popularityResult = $popularityStmt->fetchAll(PDO::FETCH_ASSOC);

            // Prepare data for popularity chart
            $popularityData = array();
            $popularityData[] = ['Popularity', 'Count'];
            foreach ($popularityResult as $row) {
                $popularity = ucwords($row['popularity']);
                $popularityCount = (int)$row['count'];
                $popularityData[] = [$popularity, $popularityCount];
            }

            // Encode data as JSON for use in JavaScript
            $jsonDataMobility = json_encode($mobilityData);
            $jsonDataPopularity = json_encode($popularityData);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        
        <!-- Render the charts -->
        <div id="mobilityChart" class="chart-container"></div>
        <div id="popularityChart" class="chart-container"></div>
        <div id="seasonChart" class="chart-container"></div>
       

    </div>
</div>

<!-- Script tags for Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        // Draw Mobility Chart
        var jsonDataMobility = <?php echo $jsonDataMobility; ?>;
        var dataMobility = google.visualization.arrayToDataTable(jsonDataMobility);
        var optionsMobility = {
            title: 'Activities Requiring Mobility vs Activities Not Requiring Mobility'
        };
        var chartMobility = new google.visualization.PieChart(document.getElementById('mobilityChart'));
        chartMobility.draw(dataMobility, optionsMobility);

        // Draw Popularity Chart
        var jsonDataPopularity = <?php echo $jsonDataPopularity; ?>;
        var dataPopularity = google.visualization.arrayToDataTable(jsonDataPopularity);
        var optionsPopularity = {
            title: 'Activities by Popularity'
        };
        var chartPopularity = new google.visualization.PieChart(document.getElementById('popularityChart'));
        chartPopularity.draw(dataPopularity, optionsPopularity);
    }
    
</script>
<div id="chartsContainer">
 <!-- Level Chart -->
 <div id="levelChart" class="chart-container1">
<?php
try {
    // Fetch data for level chart
    $levelQuery = "SELECT level, COUNT(*) AS count FROM category GROUP BY level";
    $levelStmt = $con->prepare($levelQuery);
    $levelStmt->execute();
    $levelResult = $levelStmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare data for level chart
    $levelData = array();
    $levelData[] = ['Level', 'Count'];
    foreach ($levelResult as $row) {
        $level = ucfirst($row['level']); // Capitalize first letter
        $levelCount = (int)$row['count'];
        $levelData[] = [$level, $levelCount];
    }

    $jsonDataLevel = json_encode($levelData);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<html>
<head>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
   <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Draw Level Chart
            var jsonDataLevel = <?php echo $jsonDataLevel; ?>;
            var dataLevel = google.visualization.arrayToDataTable(jsonDataLevel);
            var optionsLevel = {
    title: 'Categories by Level',
    titleTextStyle: {
        fontSize: 18, // Adjust the font size as needed
        bold: true // Optionally make the title bold
    
        
    },
    chartArea: { width: '50%' },
    hAxis: {
        title: 'Count',
        titleTextStyle: {
            fontSize: 14, // Adjust the font size as needed
            bold: false // Optionally make the title bold
        },
        minValue: 0
    },
    vAxis: {
        title: 'Level',
        titleTextStyle: {
            fontSize: 14, // Adjust the font size as needed
            bold: false // Optionally make the title bold
        }
    }
};

            var chartLevel = new google.charts.Bar(document.getElementById('levelChart'));
            chartLevel.draw(dataLevel, google.charts.Bar.convertOptions(optionsLevel));
        }
        
    </script>
    
</head>
<body>
</div>
<div id="levelChart" style="width: 900px; height: 400px; margin: 0 auto;"></div>
  <!-- Categories by Season Chart -->
  <div id="seasonChart" class="chart-container">

<?php
// Include the database configuration file
include_once "../config.php";

// Fetch categories grouped by season
$sql = "SELECT season, COUNT(*) AS category_count FROM category GROUP BY season";
$stmt = $con->prepare($sql);
$stmt->execute();
$seasonCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare data points for the chart
$dataPoints = [];
foreach ($seasonCategories as $row) {
    $dataPoints[] = array("y" => intval($row['category_count']), "name" => $row['season'], "color" => "#".substr(md5(rand()), 0, 6));
}

// Convert data points to JSON for JavaScript usage
$dataPointsJSON = json_encode($dataPoints, JSON_NUMERIC_CHECK);
?>
<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function () {
            var dataPoints = <?php echo $dataPointsJSON; ?>;
            
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Categories by Season"
                },
                axisX: {
                    title: "Season",
                    interval: 1
                },
                axisY: {
                    title: "Number of Categories"
                },
                data: [{
                    type: "column",
                    dataPoints: dataPoints,
                    indexLabel: "{name}"
                }]
            });

            chart.render();
        }
    </script>
    <style>
      #backButton {
        border-radius: 4px;
        padding: 8px;
        border: none;
        font-size: 16px;
        background-color: #2eacd1;
        color: white;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
      }
      .invisible {
        display: none;
      }
    </style>
</head>
<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <button class="btn invisible" id="backButton">&lt; Back</button>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </div>
    </div>
</body>
</html>
<br>
 <!-- ========================= TODO:sort ==================== -->
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
 