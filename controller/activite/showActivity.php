<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>.chatbot-response {
    display: flex;
    align-items: flex-start;
    margin-bottom: 10px;
}

.chatbot-avatar {
    flex: 0 0 auto;
    margin-right: 10px;
    /* Add styles for the avatar */
}

.chatbot-message {
    flex: 1 1 auto;
    background-color: #f3f3f3;
    padding: 10px;
    border-radius: 8px;
}

.chatbot-question {
    font-size: 22px;
    font-weight: bold;
    margin-top: 10px;
    color:  #2a2185;
}
.title{
    font-size: 20px;
}
.title1 {
    font-size: 34px; 
    text-align: center;
    display: flex;
}

.chatbot-answer {
    font-size: 20px; 
}
.button-container {
    margin-bottom: 10px; /* Adjust the spacing between the buttons vertically */
}

.button-container .btn {
    margin-right: 15px; /* Adjust the spacing between the buttons horizontally */
    font-size: 18px; /* Adjust the font size */
    padding: 12px 15px; /* Adjust the padding */

}

</style>
</body>
</html>
 <!-- ========================= TODO: buttons==================== -->
           <div class="table-container">    
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>ACTIVITIES</h2>
                        <div class="button-container">
                    <a href="../../controller/activite/addActivity.php" class="btn btn-primary">Add activity</a>
                    <a href="../../controller/activite/searchactivity.php" class="btn btn-primary">Search activity</a>
                    <a href="../../controller/activite/showCategory.php" class="btn btn-primary">Check category</a>
                </div>
                    </div>
                    <table class="table">
 <!-- ========================= TODO:  display ==================== -->
<tbody>
<?php
include '../../config.php'; 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");
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
        <h2 class="title1">Chatbot Questions and Answers</h2>
        <div class="cardHeader">
            <a href="../../controller/activite/chatbotback.php" class="btn btn-primary">Chatbot Q/A</a>
        </div>
    </div>
    <div class="chatbot-container">
        <?php
        $host = 'localhost';
        $dbname = 'xplore';
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

        $chatbotData = getChatbotData($pdo);
        ?>
        <ul class="chatbot-questions">
            <?php
            foreach ($chatbotData as $row) {
                echo "<li class='chatbot-question'>{$row['question']}</li>";
                echo "<li class='chatbot-answer'>{$row['answer']}</li>";
            } 
            ?>
        </ul>
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
