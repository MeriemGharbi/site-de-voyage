<?php
$id_category = $_GET['id'];
if(isset($_POST['send'])) {
    include_once "../config.php";
    // Extracting all data
    extract($_POST);

    // Prepare the SQL statement using placeholders
    $sql = "UPDATE category SET nom_category = ?, level = ?, season = ?, popularity = ?, mobility = ? WHERE id_category = ?";

    // Prepare the statement
    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssssi", $nom_category, $level, $season, $popularity, $mobility, $id_category);

    // Execute the statement
    if($stmt->execute()) {
        header("location:showCategory.php");
    } else {
        header("location:showCategory.php?message=modifyFailed");
    }
    // Close the statement
    $stmt->close();
}

// Fetch category information for modification
include_once "../config.php";
$sql = "SELECT * FROM category WHERE id_category = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id_category);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style2.css">
    <title>Modifier Activité</title>
</head>
<body>
<div class="container">
   <!-- ===============XPLORE================ -->
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
        
      <!-- ========================= partie search ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search for category here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="logo">
                <img src="../view/img/xplore.png" alt="">
                </div>
            </div>
    
 <!-- ========================= partie form==================== -->

    <form action="" method="post">
    <div class="form">
        <div class="text-center">
            <h1>Modify Category</h1>
        </div>
       
        <label for="nom_category">Nom Category:</label>
        <input type="text" name="nom_category" placeholder="nom_category" value="<?php echo $row['nom_category']; ?>">

        <label for="level">Level:</label>
        <input type="radio" name="level" value="easy" <?php if($row['level'] == 'easy') echo 'checked'; ?>>Easy
        <input type="radio" name="level" value="medium" <?php if($row['level'] == 'medium') echo 'checked'; ?>>Medium
        <input type="radio" name="level" value="hard" <?php if($row['level'] == 'hard') echo 'checked'; ?>>Hard <br>

        <label for="season">Season:</label>
        <select name="season" id="season">
            <option value="autumn" <?php if($row['season'] == 'autumn') echo 'selected'; ?>>Autumn</option>
            <option value="winter" <?php if($row['season'] == 'winter') echo 'selected'; ?>>Winter</option>
            <option value="spring" <?php if($row['season'] == 'spring') echo 'selected'; ?>>Spring</option>
            <option value="summer" <?php if($row['season'] == 'summer') echo 'selected'; ?>>Summer</option>
        </select>

        <label for="popularity">Popularity:</label>
        <input type="radio" name="popularity" value="popular" <?php if($row['popularity'] == 'popular') echo 'checked'; ?>>Popular
        <input type="radio" name="popularity" value="very popular" <?php if($row['popularity'] == 'very popular') echo 'checked'; ?>>Very Popular
        <input type="radio" name="popularity" value="trending" <?php if($row['popularity'] == 'trending') echo 'checked'; ?>>Trending <br>

        <label for="mobility">Mobility:</label>
        <input type="radio" name="mobility" value="yes" <?php if($row['mobility'] == 'yes') echo 'checked'; ?>>Yes
        <input type="radio" name="mobility" value="no" <?php if($row['mobility'] == 'no') echo 'checked'; ?>>No <br>

        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="showActivity.php">Annuler</a>
    </form>

    <?php
    }
    ?>
    </div>
</div>
<script src="Category.js"></script>
   <!-- =========== Scripts =========  -->
   <script src="assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>