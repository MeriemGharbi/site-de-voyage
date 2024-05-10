<?php
include_once "../config.php";
if(isset($_POST['send'])) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=2a41", "root", "");       
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        extract($_POST);
        $sql = "UPDATE reservation SET nom_client = ?, id_voiture = ?, date_debut = ?, date_fin = ?, email = ?, statut = ? WHERE id_reservation = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $nom_client);
        $stmt->bindParam(2, $id_voiture);
        $stmt->bindParam(3, $date_debut);
        $stmt->bindParam(4, $date_fin);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $statut);
        $stmt->bindParam(7, $id_reservation);
        
        if($stmt->execute()) {
            header("location:showReservation.php");
        } else {
            header("location:showReservation.php?message=modifyFailed");
        }
       // $stmt->close();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=2a41", "root", "");   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM reservation WHERE id_reservation = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style1.css">
    <title>update reservation</title>
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
        
      <!-- ========================= Search Section ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search for reservation here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="logo">
                <img src="../view/img/xplore.png" alt="">
                </div>
            </div>
    
 <!-- ========================= Form Section ==================== -->

 <form action="" method="post">
            <div class="form">
                <div class="text-center">
                    <h1>Update Reservation</h1>
                </div>
                <label for="nom_client">Client Name:</label>
                <input type="text" name="nom_client" placeholder="Client Name" value="<?php echo $row['nom_client']; ?>">
   
                <label for="id_voiture">Car ID:</label>
                <input type="text" name="id_voiture" placeholder="Car ID" value="<?php echo $row['id_voiture']; ?>">

                <label for="date_debut">Start Date:</label>
                <input type="text" name="date_debut" placeholder="Start Date" value="<?php echo $row['date_debut']; ?>">

                <label for="date_fin">End Date:</label>
                <input type="text" name="date_fin" placeholder="End Date" value="<?php echo $row['date_fin']; ?>">

                <label for="prix_total">email:</label>
                <input type="text" name="email" placeholder="email" value="<?php echo $row['email']; ?>">

                <label for="statut">Status:</label>
                <input type="text" name="statut" placeholder="Status" value="<?php echo $row['statut']; ?>">

                <input type="hidden" name="id_reservation" value="<?php echo $row['id_reservation']; ?>">
                <input type="submit" value="Update" name="send">
                <a class="link back" href="showReservation.php">Cancel</a>
            </div>
        </form>


    </div>
</div>
<script src="reservation.js"></script>
<script src="../view/backoffice/assets/js/main.js"></script>
   <!-- =========== Scripts =========  -->

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>


