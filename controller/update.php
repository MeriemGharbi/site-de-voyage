<?php
// Include your database configuration file
include_once "../config.php";

try {
    // Establish a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Assuming you're passing the ID of the activity through GET method
    $ID_ACT = $_GET['id_act'];

    // Using prepared statements to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM activity WHERE id_act = :id_act");
    $stmt->execute(['id_act' => $ID_ACT]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Handle PDO connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style1.css">
    <title>Document</title>
</head>
<body>
 <!-- =============== Navigation ================ -->
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
        </div>

        <a href="../view/index1.html"><button type="button"><span></span>return</button></a>
    
      <!-- ========================= partie search ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="logo">
                <img src="../view/img/xplore.png" alt="">
                </div>
            </div>
                <form action="update1.php" id="activityForm" method="POST" enctype="multipart/form-data">
                 <div class="form">
                 <h1 class="text-center">Update activity form</h1><br><br><br><br>
               <label for="nom_activity">nom de l'activité</label>
               <input type="text"  name="nom_activity" value="<?php echo $data['nom_activity'] ?>"id="nom_activity">
               <span id="error-nom-activity" class="error-message" style="color: red; visibility: hidden;">Please fill out this field</span><br>
               <span id="valid-nom-activity" class="valid-message" style="color: green; visibility: hidden;">Nom Activity is valid</span><br>
                       

               <label for="description">Description</label>
               <input type="text" name="description" value="<?php echo $data['description'] ?>" id="description">
               <span id="error-description" class="error-message" style="color: red; visibility: hidden;">Please fill out this field</span><br>
               <span id="valid-description" class="valid-message" style="color: green; visibility: hidden;">Description is valid</span><br>


               <label for="lieu">lieu</label>
               <input type="text"  name="lieu" value="<?php echo $data['lieu'] ?>" id="lieu">
               <span id="error-lieu" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
               <span id="valid-lieu" class="valid-message" style="color: green; visibility: hidden;">Lieu valide</span><br>


                <label for="date">date</label>
                <input type="date" name="date" value="<?php echo date('Y-m-d', strtotime($data['date'])); ?>" id="date">

                <div class="attributs">
                <label for="date">date debut</label>
                <input type="time" name="date_debut" value="<?php echo $data['date_debut'] ?>" id="date_debut" class="input">
                <span id="error-date" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                <span id="valid-date" class="valid-message" style="color: green; visibility: hidden;">Date valide</span><br>
                </div>
                            
                <div class="attributs">
                <label for="date_fin">date fin</label>
                <input type="time" name="date_fin" value="<?php echo $data['date_fin'] ?>" id="date_fin" class="input">
                <span id="error-date" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                <span id="valid-date" class="valid-message" style="color: green; visibility: hidden;">Date valide</span><br>
                </div>

               <span id="error-date" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
               <span id="valid-date" class="valid-message" style="color: green; visibility: hidden;">Date valide</span><br>

               <label for="prix">prix</label>
               <input type="text" name="prix" value="<?php echo $data['prix'] ?>" id="prix">
               <span id="error-prix" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ avec des chiffres</span><br>
               <span id="valid-prix" class="valid-message" style="color: green; visibility: hidden;">Prix valide</span><br>


               <label for="capacity_max">capacité maximale</label>
               <input type="int"  name="capacity_max" value="<?php echo $data['capacity_max'] ?>" id="capacity_max"><br>
               <span id="error-capacity-max" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                <span id="valid-capacity-max" class="valid-message" style="color: green; visibility: hidden;">Capacité maximale valide</span><br>
               <label for="image">image</label>
               <input type="file"  name="image" value="<?php echo $data['image'] ?>" id="image"><img src="<?php echo $data['image'] ?>" alt=""><br>

               <label for="id_category">id catégorie</label>
               <input type="number" name="id_category" value="<?php echo $data['id_category'] ?>" id="id_category">
               <span id="error-id-category" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
               <span id="valid-id-category" class="valid-message" style="color: green; visibility: hidden;">ID Category valide</span><br>

               <label for="duration">durée</label>
               <input type="time" name="duration"  value="<?php echo $data['duration'] ?>" placeholder="duration" id="duration">
               <span id="error-id-category" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
               <span id="valid-id-category" class="valid-message" style="color: green; visibility: hidden;">ID Category valide</span><br>

               <input type="hidden" name="id_act" value="<?php echo $data['id_act']?>">

       <button type="submit" name="update" class='btn btn-danger' id="uploadButton">update</button>
       <script src="Activity.js"></script>
</div>
   </form>
</div>
</body>
</html>