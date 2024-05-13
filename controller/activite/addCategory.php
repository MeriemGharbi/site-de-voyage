<?php

if(isset($_POST['send'])) {
    if(isset($_POST['id_category']) &&
        isset($_POST['nom_category'])&&
        isset($_POST['level'])&&
        isset($_POST['season'])&&
        isset($_POST['popularity'])&&
        isset($_POST['mobility'])&&

        $_POST['id_category'] !=  "" &&
        $_POST['nom_category'] != "" &&
        $_POST['level'] != "" &&
        $_POST['season'] != "" &&
        $_POST['popularity'] != "" &&
        $_POST['mobility'] != "" 
       
    ) {
        try {
            include '../../config.php'; 

            extract($_POST); // Extract all these data

            // Connect to database using PDO directly
            $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");
            // Set PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL statement
            $stmt = $pdo->prepare("INSERT INTO category (id_category, nom_category, level, season, popularity, mobility ) VALUES (?, ?, ?, ?, ?, ?)");
            
            // Bind parameters
            $stmt->bindParam(1, $id_category);
            $stmt->bindParam(2, $nom_category);
            $stmt->bindParam(3, $level);
            $stmt->bindParam(4, $season);
            $stmt->bindParam(5, $popularity);
            $stmt->bindParam(6, $mobility);

            // Execute statement
            $stmt->execute();

            // Redirect to showCategory.php
            header("Location: showCategory.php");
            exit(); // Make sure to exit after redirecting
        } catch(PDOException $e) {
            // If there was an error, redirect with a message
            header("Location: addCategory.php?message=AddFailed");
            exit();
        }
    } else {
        // If any field is empty, redirect with a message
        header("Location: addCategory.php?message=EmptyField");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../../view/backoffice/assets/css/style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
        </div>
       
     <!-- =============== Navigation end ================ -->
        <a href="../view/index1.html"><button type="button"><span></span>return</button></a>

 <!-- ========================= partie form==================== -->
   
 <form action="" method="post" id="category-form">
 <div class="form">
        <div class="text-center">
            <h1>Add Category</h1>
        </div>

        
        <div class="input">
            <label for="id_category">Category ID</label>
            <input type="text" name="id_category" id="id_category" placeholder="Enter category ID" >
            <small id="error-id-category" class="error-message"></small>
        </div>

        <div class="input">
            <label for="nom_category">Category Name</label>
            <input type="text" name="nom_category" id="nom_category" placeholder="Enter category name">
            <small id="error-nom-category" class="error-message"></small>
        </div>


        <div class="input">

        <label>Level</label><br>
        <input type="radio" id="easy" name="level" value="easy"><label for="easy">Easy</label>
        <input type="radio" id="medium" name="level" value="medium"><label for="medium">Medium</label>
        <input type="radio" id="hard" name="level" value="hard"><label for="hard">Hard</label><br>
        <small id="error-level" class="error-message"></small>
        
    </div>

     <div class="input">
            <label for="season">Season</label>
            <select name="season" id="season">
                <option value="">Select season</option>
                <option value="autumn">Autumn</option>
                <option value="winter">Winter</option>
                <option value="spring">Spring</option>
                <option value="summer">Summer</option>
            </select>
            <small id="error-season" class="error-message"></small>
        </div>

        <div class="input">
            <label for="popularity">Popularity</label><br>
            <input type="radio" id="popular" name="popularity" value="popular"><label for="popular">Popular</label>
            <input type="radio" id="very-popular" name="popularity" value="very popular"><label for="very-popular">Very Popular</label>
            <input type="radio" id="trending" name="popularity" value="trending"><label for="trending">Trending</label><br>
            <small id="error-popularity" class="error-message"></small>
        </div>

        <div class="input">
            <label for="mobility">Mobility</label><br>
            <input type="radio" id="yes" name="mobility" value="yes"><label for="yes">Yes</label>
            <input type="radio" id="no" name="mobility" value="no"><label for="no">No</label><br>
            <small id="error-mobility" class="error-message"></small>
        </div>
   
        <div class="input">
            <input type="submit" value="Submit" name="send" class="button">
            <a class="button" href="showCategory.php" >Annuler</a>
        </div>
</div>
    </form>
</div>
<script src="Category.js"></script>
   <!-- =========== Scripts =========  -->
   <script src="assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

   
  
   
   
   