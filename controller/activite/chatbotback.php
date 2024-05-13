<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="../../view/backoffice/assets/css/chatbotstyle.css">  
    <style>
.chatbot {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            width: 70%;
            margin-left: 270px;
            margin-right: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            height: 60%;
        }

        .form {
            margin-bottom: 20px;
        }

        .input {
            width: 60%;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: 300px;
            background-color: #fff;
            border-radius: 8px;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            margin-bottom: 0;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .actions button.update {
            background-color: #2a2185;
            color: #fff;
        }

        .actions button.delete {
            background-color: #2a2185;
            color: #fff;
        }
        .form {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}


    </style>
</head>
<body>                         
 <!-- =============== Navigation ================ -->
 <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                    <span class="title" style="font-size: 250%; right: -50px; ">Xplore</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#"  onclick="showOffre()" >
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Offres</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="card-outline"></ion-icon>
                        </span>
                        <span class="title">Paiement</span>
                    </a>
                </li>

                <li>
                    <a href="#"  onclick="showActivities()">
                        <span class="icon">
                            <ion-icon name="walk-outline"></ion-icon>
                        </span>
                        <span class="title">activités</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Transport</span>
                    </a>
                </li>
            </ul>
            <a href="../view/index1.html"><button type="button" class="btn1"><span></span>Return</button></a>

        </div>
     <!-- =============== Navigation end ================ -->

      <!-- ========================= search ==================== -->
      <br><br>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search for activities">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="logo">
                <img src="../view/backoffice/img/xplore.png" alt="">
                </div>
             </div>
             
                         <!--=========chatbot ==================-->
                         <div class="chatbot">
                            
    <?php
    // Database connection settings
    $host = 'localhost';
    $dbname = 'xplore';
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

// Function to insert new chatbot question, answer, and action
function insertChatbotData($pdo, $question, $answer, $action) {
    $query = "INSERT INTO question (question, answer, action) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$question, $answer, $action]);
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
    <?php include '../../config.php'; ?>

    <h2>Chatbot Questions and Answers</h2>
   <!-- Form to add new chatbot question and answer -->
<div class="add">
    <form method="post" class="form">
    <div class="form-group">
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" class="input" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer:</label>
            <input type="text" id="answer" name="answer" class="input" required>
        </div>
        <div class="form-group">
            <label for="action">Action:</label>
            <input type="text" id="action" name="action" class="input" required>
        </div>
        <button type="submit" name="add" class="button">Add Question</button><br><br>
        <div class="cardHeader">
                        
                        <a href="../../view/backoffice/back.php" class="btn btn-primary">Retun</a> 
                     
                    </div>
    </form>
</div>

   
    <!-- Display chatbot questions and answers -->
    <div class="list">
                <?php
                // Loop through each question and answer
                $chatbotData = getChatbotData($pdo);
                foreach ($chatbotData as $row) {
                    echo "<div class='card'>
                            <h3>{$row['question']}</h3>
                            <p>{$row['answer']}</p>
                            <p>{$row['action']}</p>
                            <div class='actions'>
                                <form method='post'>
                                    <button type='submit' name='update' value='{$row['id_quest']}' class='update'>Update</button>
                                </form>
                                <form method='post'>
                                    <button type='submit' name='delete' value='{$row['id_quest']}' class='delete'>Delete</button>
                                </form>
                            </div>
                        </div>";
                }
                ?>
            </div>
        </div>
        <?php
       // Handle form submission to add new question and answer
if (isset($_POST['add'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $action = $_POST['action']; // Get the value of the "action" field
    insertChatbotData($pdo, $question, $answer, $action); // Pass the action to the insert function
    // Refresh the page to display the newly added question
    header("Location: " . $_SERVER['PHP_SELF']);
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
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        ?>
       
    </div>
</div>
</body>
</html>
  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

