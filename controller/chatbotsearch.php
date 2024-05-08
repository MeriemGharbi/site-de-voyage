<?php
include_once "../config.php";

if(isset($_POST['text'])){
    $msg = $_POST['text'];
    
    try {
        // Connect to the database using PDO
        $pdo = new PDO("mysql:host=localhost;dbname=travel_agency", "root", "");
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SELECT query
        $stmt = $pdo->prepare("SELECT * FROM question WHERE question RLIKE ?");
        $stmt->execute([$msg]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = count($result);

        if($count == 0){
            $data = "I am sorry, I can't help you.";
        } else {
            foreach($result as $row){
                $data = $row['answer'];
            }
        }

        // Insert chat into database
        $server_time = date('Y-m-d H:i:s');
        $stmt_insert = $pdo->prepare("INSERT INTO chats (user, chatbot, date) VALUES (?, ?, ?)");
        $stmt_insert->execute([$msg, $data, $server_time]);
    } catch(PDOException $e) {
        // Handle any PDO exceptions
        echo "Error: " . $e->getMessage();
    }
}
?>
