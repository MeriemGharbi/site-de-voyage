<?php
include_once "../config.php";
if(isset($_POST['text'])){
    $msg = $_POST['text'];
    // Prevent SQL injection using prepared statements
    $query = mysqli_prepare($con, "SELECT * FROM question WHERE question RLIKE ?");
    mysqli_stmt_bind_param($query, 's', $msg);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $count = mysqli_num_rows($result);
    
    if($count == 0){
        $data = "I am sorry, I can't help you.";
    } else {
        while($row = mysqli_fetch_array($result)){
            $data = $row['answer'];
        }
    }
    
    // Insert chat into database
    $server_time = date('Y-m-d H:i:s');
    $query4 = mysqli_prepare($con, "INSERT INTO chats(user, chatbot, date) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($query4, 'sss', $msg, $data, $server_time);
    mysqli_stmt_execute($query4);
}
?>
