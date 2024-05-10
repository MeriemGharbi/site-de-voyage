<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/backoffice/assets/css/style.css">
    <title>Liste des réservations</title>
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
                    <span class="title">Payment</span>
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
                <input type="text" placeholder="Search for reservation here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>
        <div class="logo">
            <img src="../view/img/xplore.png" alt="">
        </div>
    </div>
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h1 class="category">Reservations</h1>
                <a href="addReservation.php" class="btn btn-primary">Add Reservation</a>
            </div>
            <main>
                <div class="link_container">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Reservation ID</th>
                            <th>Client Name</th>
                            <th>Car ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>email</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "../config.php";

                        try {
                            $pdo = new PDO("mysql:host=localhost;dbname=2a41", "root", "");
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql = "SELECT * FROM reservation";
                            $stmt = $pdo->query($sql);

                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?= $row['id_reservation'] ?></td>
                            <td><?= $row['nom_client'] ?></td>
                            <td><?= $row['id_voiture'] ?></td>
                            <td><?= $row['date_debut'] ?></td>
                            <td><?= $row['date_fin'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['statut'] ?></td>
                            <td class="image"><a href="updateReservation.php?id=<?= $row['id_reservation'] ?>"><img src="../view/backoffice/img/modifier.png"></a></td>
                            <td class="image"><a href="deleteReservation.php?id=<?= $row['id_reservation'] ?>" onclick="return confirm('Are you sure you want to delete this reservation?');"><img src="../view/backoffice/img/trash.png"></a></td>
                        </tr>
                        <?php
                                }
                            } else {
                                echo "<tr><td colspan='9' class='message'>No reservations at the moment!</td></tr>";
                            }
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </main>  
        </div>
    </div>
</div>

    <!-- =========== Scripts =========  -->
    <script src="../view/backoffice/assets/js/main.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</div>
</body>
</html>
