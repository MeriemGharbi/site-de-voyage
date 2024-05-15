<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Cars</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/style.css">
    <style>
        /* CSS to control the size of the car image */
        .car-img {
            max-width: 200px; /* Set the maximum width of the image */
            height: auto; /* Maintain aspect ratio */
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
                        <span class="icon" onclick="showUser()">
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
                    <a href="../../back.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="../../transport/view/showcarreservation.php">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Transport</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">déconnection </span>
                    </a>
                </li>
            </ul>

            </ul>
        </div>
     <!-- =============== Navigation end ================ -->
    
    
  <!-- ========================= partie search ==================== -->
  <br><br>
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." oninput="handleSearchInput()">
                </label>
                <div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</div>
<div id="search-results"></div>


            <div class="logo">
            <img src="../view/backoffice/img/xplore.png" alt="">
            </div>
        </div>

         <!-- ========================= partie search ==================== -->
<!-- ======================= Cars ==================  -->
<div class="table-container">    
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>RESERVATIONS</h2>
                    <a href="addreservation.php" class="btn btn-primary">Add reservation</a>
                   
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
                            $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");
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
                            <td class="image"><a href="../controller/updatereservation.php?id=<?= $row['id_reservation'] ?>"><img src="../view/backoffice/img/modifier.png"></a></td>
                            <td class="image"><a href="../controller/deletereservation.php?id=<?= $row['id_reservation'] ?>" onclick="return confirm('Are you sure you want to delete this reservation?');"><img src="../view/backoffice/img/trash.png"></a></td>
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
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../view/backoffice/assets/js/main.js"></script>
    <script src="search.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="reservation.js"></script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function showOffre() {
        document.getElementById("ButtonsAffichageSection").style.display = "block";
        document.getElementById("offerContent").style.display = "block";
        document.getElementById("offresSection").style.display = "block ";
        document.getElementById('activityContent').style.display = 'none';
        document.getElementById('userContent').style.display = 'none';

    }

    function showActivities() {
        document.getElementById("offerContent").style.display = "none";
        document.getElementById('activityContent').style.display = 'block';
        document.getElementById('userContent').style.display = 'none';

    }

    function showUser() {
        document.getElementById('userContent').style.display = 'block';
        document.getElementById("offerContent").style.display = "none";
        document.getElementById('activityContent').style.display = 'none';
    }
</script>
