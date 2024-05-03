<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Cars</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/style.css">
</head>
<body>

<div class="container">
    <!-- ===============XPLORE================ -->
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
                <a href="#">
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
                    
                    <span class="title">Payment</span>
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
    
    
  <!-- ========================= partie search ==================== -->
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
                    url:"livesearch.php",
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
                    url:"showcar.php", // Change the URL to the PHP file that fetches all results
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
</div>
<div id="search-results"></div>


            <div class="logo">
            <img src="../view/backoffice/img/xplore.png" alt="">
            </div>
        </div>

         <!-- ========================= partie search ==================== -->
<!-- ======================= Cars ==================  -->
<div class="table-container">    
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>CARS</h2>
                    <a href="addcar.php" class="btn btn-primary">Add car</a>
                    <a href="searchdisplay.php" class="btn btn-primary">Search car</a>
                </div>

              
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Type</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "../config.php"; // Include the configuration file

                        try {
                            // Establish connection using PDO
                            $pdo = new PDO("mysql:host=localhost;dbname=2a41", "root", "");

                            // Set PDO to throw exceptions on error
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Modify SQL query to fetch data from the car table
                            $sql = "SELECT * FROM `car`";
                            $stmt = $pdo->query($sql);
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "
                                <tr>
                                    <td>$row[id_voiture]</td>
                                    <td><img src='$row[image]' class='car-img'></td>
                                    <td>$row[marque]</td>
                                    <td>$row[modele]</td>
                                    <td>$row[annee]</td>
                                    <td>$row[prix_journee]</td>
                                    <td>$row[couleur]</td>
                                    <td>$row[type]</td>
                                    <td>$row[disponibilite]</td>
                                    <td>
                                        <a href='deleteCar.php?id_voiture=$row[id_voiture]' class='button' onclick='return confirm(\"Are you sure you want to delete this car?\");'>Delete</a> <br> <br> <br> <br>
                                        <a href='updateCar.php?id_voiture=$row[id_voiture]' class='button'>Update</a>
                                    </td>
                                </tr>
                                ";
                            }
                        } catch(PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../view/backoffice/assets/js/main.js"></script>
    <script src="search.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="car2.js"></script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
