<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Activity</title>
    <link rel="stylesheet" href="../../view/backoffice/assets/css/style.css">
</head>
<body>
<div class="container">
<!-- ========================= TODO: navigation ==================== -->
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
            <a href="../../view/index1.html"><button type="button" class="btn1"><span></span>Return</button></a>
        </div>
 <!-- ========================= TODO: recherche ==================== -->
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
 <!-- ========================= TODO: logo ==================== -->
                <div class="logo">
                <img src="../../view/backoffice/img/xplore.png" alt="">
                </div>
            </div>
 <!-- ========================= TODO: buttons==================== -->
           <div class="table-container">    
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>ACTIVITIES</h2>
                        <a href="../../controller/activite/addActivity.php" class="btn btn-primary">Add activity</a>
                        <a href="../../controller/activite/searchactivity.php" class="btn btn-primary">Search activity</a>
                        <a href="../../controller/activite/showCategory.php" class="btn btn-primary"> Check category</a>
                    </div>
                    <table class="table">
 <!-- ========================= TODO:  display ==================== -->
<tbody>
<?php
include '../../config.php'; 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=travel_agency", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT activity.*, category.nom_category AS category_name FROM `activity` LEFT JOIN `category` ON activity.id_category = category.id_category";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $duration = substr($row['duration'], 0, 5);
        $date_formattee = date("Y-m-d", strtotime($row['date']));
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
                    <div class='activity-name'>Heure debut : $date_debut</div>
                    <div class='activity-name'>Heure fin: $date_fin</div>
                    <div class='activity-name'>Durée : $duration</div>
                    <div class='activity-name'>Prix : $row[prix]</div>
                    <div class='activity-name'>Capacité maximale : $row[capacity_max]</div>
                    <div class='activity-name'>Nom de la catégorie : $row[category_name]</div>
                    <!-- Display map here -->
                                    <iframe width='100%' height='300' src='https://maps.google.com/maps?q=$row[map]&output=embed'></iframe>
                </div>
            </td>
            <td>
            <a href='../../controller/activite/deleteActivity.php?id_act=$row[id_act]' class='button' onclick='return confirmDelete();'>Delete</a>
            <br><br><br><br>
            <a href='../../controller/activite/update.php?id_act=$row[id_act]' class='button'>Update</a> 
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
 <!-- ========================= TODO: chatbot ==================== -->
  <div class="recentCustomers">
                    <div class="cardHeader">
                    <h2>Chatbot Questions and Answers<div class="cardHeader">
          <a href="../../controller/activite/chatbotback.php" class="btn btn-primary"> Chatbot Q/A</a>
      </div></h2>
</div>
<?php
$host = 'localhost';
$dbname = 'travel_agency';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

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
    <title>Chatbot</title>
</head>
<body>
    <div class="container">   
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
            </div>
         </div>
    </div>
</div>
   <!-- ===========TODO: Scripts =========  -->
<script src="../view/backoffice/assets/js/main.js"></script>
<script src="search.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="activity2.js"></script>
</div>
</div>
</div>
</div>
<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cette activité ?");
    }
</script>
</body>
</html>
