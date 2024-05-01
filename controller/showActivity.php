<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Activity</title>
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
        
        
      <!-- ========================= DEBUT PARTIE RECHERCHE==================== -->
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
</div>
<div id="search-results"></div>


                <div class="logo">
                <img src="../view/backoffice/img/xplore.png" alt="">
                </div>
            </div>

             <!-- ========================= DEBUT PARTIE RECHERCHE==================== -->
  <!-- ======================= Cards ==================  -->
           <div class="table-container">    
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>ACTIVITIES</h2>
                        <a href="addActivity.php" class="btn btn-primary">Add activity</a>
                        <a href="searchdisplay.php" class="btn btn-primary">Search activity</a>
                    </div>

                    <table class="table">
    <thead>
        <tr>
           
        </tr>
    </thead>
    <tbody>
    <?php
include_once "../config.php"; // Include the configuration file

try {
    // Establish connection using PDO
    $pdo = new PDO("mysql:host=localhost;dbname=travel_agency", "root", "");

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Modify SQL query to include a join with the category table
    $sql = "SELECT activity.*, category.nom_category AS category_name FROM `activity` LEFT JOIN `category` ON activity.id_category = category.id_category";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Extract the first two characters of the duration to display hours and minutes
        $duration = substr($row['duration'], 0, 5);
        // Format the date to display only the date without the time
        $date_formattee = date_format(date_create($row['date']), 'Y-m-d');
        // Format the date_debut and date_fin to display only hours and minutes
        $date_debut = date_format(date_create($row['date_debut']), 'H:i');
        $date_fin = date_format(date_create($row['date_fin']), 'H:i');
        
        echo "
        <tr>
            <td>$row[id_act]</td>
            <td colspan='8'>
                <img src='$row[image]' class='activity-img' style='float: right;'>
                <div class='activity-details'>
                    <div class='activity-name1'>Nom de l'activité : $row[nom_activity]</div>
                    <div class='activity-name'>Description : $row[description]</div>
                    <div class='activity-name'>Lieu : $row[lieu]</div>
                    <div class='activity-name'>Date : $date_formattee</div>
                    <div class='activity-name'>Date debut : $date_debut</div>
                    <div class='activity-name'>Date fin: $date_fin</div>
                    <div class='activity-name'>Prix : $row[prix]</div>
                    <div class='activity-name'>Capacité maximale : $row[capacity_max]</div>
                    <div class='activity-name'>Durée : $duration</div>
                    <div class='activity-name'>Nom de la catégorie : $row[category_name]</div>
                </div>
            </td>
            <td>
                <a href='deleteActivity.php?id_act=$row[id_act]' class='button' onclick='return confirmDelete();'>Delete</a> <br> <br> <br> <br>
                <a href='update.php?id_act=$row[id_act]' class='button'>Update</a>
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

  <!-- ================= New Customers ================ -->
  <div class="recentCustomers">
                    <div class="cardHeader">
                    <h2>Chatbot Questions and Answers<div class="cardHeader">
          
          <a href="chatbotback.php" class="btn btn-primary"> Chatbot Q/A</a>
          
      </div></h2>
                    </div>
                    <?php
// Database connection settings
$host = 'localhost';
$dbname = 'travel_agency';
$username = 'root';
$password = '';

// Establish PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to fetch chatbot questions and answers
function getChatbotData($pdo) {
    $query = "SELECT * FROM question";
    $statement = $pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, stylesheets, and scripts here -->
    <title>Chatbot</title>
</head>
<body>
    <div class="container">
     
        
        <!-- Display chatbot questions and answers -->
        <ul>
            <?php
            $chatbotData = getChatbotData($pdo);
            foreach ($chatbotData as $row) {
                echo "<li>{$row['question']}: {$row['answer']}</li>";
            }
        
            
            ?>
        </ul>
    </div>
</body>
</html>


</body>
</html>
                </div>
            </div>
        </div>
        
    </div>

             <!-- =========== Scripts =========  -->
    <script src="../view/backoffice/assets/js/main.js"></script>
    <script src="search.js"></script>


<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="activity2.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
