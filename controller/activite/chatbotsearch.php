<?php
// Include necessary files and configurations

// Define function for text preprocessing
function preprocessText($text) {
    // Preprocess the text (e.g., convert to lowercase, remove punctuation, etc.)
    return strtolower($text);
}

// Define function for calculating cosine similarity
function cosineSimilarity($text1, $text2) {
    // Tokenize the texts
    $tokens1 = explode(" ", $text1);
    $tokens2 = explode(" ", $text2);

    // Count the occurrences of each token in both texts
    $vector1 = array_count_values($tokens1);
    $vector2 = array_count_values($tokens2);

    // Calculate the dot product
    $dotProduct = 0;
    foreach ($vector1 as $token => $count) {
        if (isset($vector2[$token])) {
            $dotProduct += $count * $vector2[$token];
        }
    }

    // Calculate the magnitude of each vector
    $magnitude1 = sqrt(array_sum(array_map(function($x) { return $x * $x; }, $vector1)));
    $magnitude2 = sqrt(array_sum(array_map(function($x) { return $x * $x; }, $vector2)));

    // Calculate the cosine similarity
    if ($magnitude1 > 0 && $magnitude2 > 0) {
        return $dotProduct / ($magnitude1 * $magnitude2);
    } else {
        return 0;
    }
}

// Function to get chatbot response based on user's input question
function getChatbotResponse($pdo, $userQuestion) {
    $userQuestion = preprocessText($userQuestion);

    // Query the database to fetch chatbot questions and answers
    $query = "SELECT * FROM question";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $chatbotData = $statement->fetchAll(PDO::FETCH_ASSOC);

    $bestScore = -1;
    $bestResponse = "I'm sorry, I can't help you.";

    // Iterate through each stored question and calculate similarity
    foreach ($chatbotData as $row) {
        $storedQuestion = preprocessText($row['question']);
        $similarity = cosineSimilarity($userQuestion, $storedQuestion);
        if ($similarity > $bestScore) {
            $bestScore = $similarity;
            $bestResponse = $row['answer'];
        }
    }

    return $bestResponse;
}

// Handle form submission
if (isset($_POST['text'])) {
    $userQuestion = $_POST['text'];
    
    try {
        // Connect to the database using PDO
        $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get chatbot response based on user's input question
        $response = getChatbotResponse($pdo, $userQuestion);

        // Insert chat into database
        $server_time = date('Y-m-d H:i:s');
        $stmt_insert = $pdo->prepare("INSERT INTO chats (user, chatbot, date) VALUES (?, ?, ?)");
        $stmt_insert->execute([$userQuestion, $response, $server_time]);

        // Echo the response back to the user
        echo $response;
    } catch(PDOException $e) {
        // Handle any PDO exceptions
        echo "Error: " . $e->getMessage();
    }
}
?>
 