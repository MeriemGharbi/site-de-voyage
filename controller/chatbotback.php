<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/chatbotstyle.css">  
</head>
<body>                         
<div class="container">
   
     <!-- ===============navigation================ -->
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
        
                <h2>Chatbot Questions and Answers</h2>
                <!-- Form to add new chatbot question and answer -->
                <form method="post">
                    <label for="question" >Question:</label>
                    <input type="text" id="question" name="question"  class="label" required>
                    <label for="answer">Answer:</label>
                    <input type="text" id="answer" name="answer" class="label" required>
                    <button type="submit" name="add" class="button">Add Question</button>
                </form>
                <!-- Display chatbot questions and answers -->
                <ul>
                    
                    <?php
                    $chatbotData = getChatbotData($pdo);
                    foreach ($chatbotData as $row) {
                    echo "<li>{$row['question']}: {$row['answer']} 
                    <form method='post' style='display: inline;'>
                    <button type='submit' name='update' value='{$row['id_quest']}' class='button'>Update</button>
                    </form>
                    <form method='post' style='display: inline;'>
                    <button type='submit' name='delete' value='{$row['id_quest']}' class='button'>Delete</button>
                    </form>
                    </li>";}
                    ?>
                </ul>
                
            
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
    </div>
</div>
</body>
</html>
