
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
