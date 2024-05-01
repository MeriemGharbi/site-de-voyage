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

// Function to insert new chatbot question and answer
function insertChatbotData($pdo, $question, $answer) {
    $query = "INSERT INTO question (question, answer) VALUES (?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$question, $answer]);
}

// Function to update chatbot question and answer
function updateChatbotData($pdo, $id, $question, $answer) {
    $query = "UPDATE question SET question=?, answer=? WHERE id_quest=?";
    $statement = $pdo->prepare($query);
    $statement->execute([$question, $answer, $id]);
}

// Function to delete chatbot question and answer
function deleteChatbotData($pdo, $id) {
    $query = "DELETE FROM question WHERE id_quest=?";
    $statement = $pdo->prepare($query);
    $statement->execute([$id]);
}

?>
<?php include_once "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, stylesheets, and scripts here -->
    <title>Chatbot</title>
</head>
<body>
    <div class="container">
        <h2>Chatbot Questions and Answers</h2>
        <!-- Display chatbot questions and answers -->
        <ul>
            <?php
            $chatbotData = getChatbotData($pdo);
            foreach ($chatbotData as $row) {
                echo "<li>{$row['question']}: {$row['answer']} 
                      <form method='post' style='display: inline;'>
                          <button type='submit' name='update' value='{$row['id_quest']}'>Update</button>
                      </form>
                      <form method='post' style='display: inline;'>
                          <button type='submit' name='delete' value='{$row['id_quest']}'>Delete</button>
                      </form>
                      </li>";
            }
            ?>
        </ul>
        
        <!-- Form to add new chatbot question and answer -->
        <form method="post">
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>
            <label for="answer">Answer:</label>
            <input type="text" id="answer" name="answer" required>
            <button type="submit" name="add">Add Question</button>
        </form>
    </div>
    <?php
    // Handle form submission to add new question and answer
    if (isset($_POST['add'])) {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        insertChatbotData($pdo, $question, $answer);
        // Refresh the page to display the newly added question
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

    // Handle form submission to update question and answer
    if (isset($_POST['update'])) {
        $id = $_POST['update'];
        // Redirect to the update page with the selected ID
        header("Location: update_page.php?id=$id");
        exit();
    }

    // Handle form submission to delete question and answer
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        deleteChatbotData($pdo, $id);
        // Refresh the page to reflect the deletion
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    ?>

</body>
</html>
