<?php
$id_reservation = $_GET['id_reservation'];
if(isset($_POST['send'])) {
    include_once "../config.php";
    extract($_POST); // Extract all data
    $sql = "UPDATE reservation SET  id_reservation = '$id_reservation', id_voiture = '$id_voiture', date_debut = '$date_debut', date_fin = '$date_fin', statut = '$statut' WHERE id_reservation = $id_reservation";

    if(mysqli_query($con, $sql)) {
        header("location:showreservation.php");
    } else {
        header("location:showreservation.php?message=modifyFailed");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style2.css">
    <title>Modifier Réservation</title>
</head>
<body>
    <?php
    include_once "../config.php";
    // Get the information of the reservation to modify
    $sql = "SELECT * FROM reservation where id_reservation = $id_reservation";
    $result = mysqli_query($con , $sql);
    // Display the modification form with existing data
    while($row = mysqli_fetch_assoc($result)) {
    ?>

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
            <h1>Modify Reservation</h1>
        </div>
       
        <label for="id_user">User ID:</label>
        <input type="text" name="id_reservation" placeholder="reservation ID" value="<?php echo $row['id_reservation']; ?>">

        <label for="id_voiture">Car ID:</label>
        <input type="text" name="id_voiture" placeholder="Car ID" value="<?php echo $row['id_voiture']; ?>">

        <label for="date_debut">Start Date:</label>
        <input type="date" name="date_debut" value="<?php echo $row['date_debut']; ?>">

        <label for="date_fin">End Date:</label>
        <input type="date" name="date_fin" value="<?php echo $row['date_fin']; ?>">

        <label for="etat">Status:</label>
        <input type="text" name="statut" placeholder="Statut" value="<?php echo $row['statut']; ?>">

        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="showcar.php">Annuler</a>
    </form>

    <?php
    }
    ?>
    </div>
</div>
<script src="reservation.js"></script>
   <!-- =========== Scripts =========  -->
   <script src="assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
