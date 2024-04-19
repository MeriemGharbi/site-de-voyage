<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xplore</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            border-collapse: collapse;
            color: #404040;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 14px;
            margin-top: -10mm;
            margin-bottom: -10mm;
            width: calc(100% - 20mm);
        }

        th {
            font-size: 14px;
            border-bottom: 2px solid #ffcb61;
            padding: 8px 16px;
            font-weight: 500;
            width: 130px;
        }

        td {
            padding: 4px 16px;
            font-size: 12px;
            font-weight: 400;
            text-align: center;
        }

        img {
            height: 20px;
        }

        tr:nth-child(2n) {
            background-color: #f6f8f8;
        }

        tr:nth-child(2n) td {
            border-bottom: 1px solid #e0e0e0;
            border-top: 1px solid #e0e0e0;
        }

        .Btn_add {
            width: fit-content;
            margin-bottom: 20px;
            background-color: #1a2bc6;
            padding: 5px 20px;
            color: #fff;
            display: flex;
            align-items: center;
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
            position: absolute;
            left: 15%;
            top: 15%;
            transform: translate(-15%, -15%);
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
                        <span class="icon">
                            <ion-icon name="airplane-outline"></ion-icon>
                        </span>
                        <span class="title">Xplore</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">utilisateur</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">réservation hotel</span>
                    </a>
                </li>

                <li>
                    <a href="afficherPartnership.php">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">activité</span>
                    </a>
                </li>

                <li>
                    <a href="afficherPartnership.php">
                        <span class="icon">
                            <ion-icon name="car-outline"></ion-icon>
                        </span>
                        <span class="title">transport</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">réclamation</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span class="title">paiement</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">paramétre</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="recherche">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="../imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Vues </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">ventes</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">commentaires</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Revenus</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ table ================= -->
            <div class="details">
                <div class="recentOrders">
               
                    <?php
                    include "../Controller/PartnershipC.php";
                    $PartnershipC = new PartnershipC();
                    $listecommande = $PartnershipC->afficherPartnership();
                    ?>
                    <a href="ajouterPartnership.php" class="Btn_add">Add</a>
                    <table border="1">
                        <tr>
                            <td>Agency ID</td>
                            <td>Agency Name</td>
                            <td>Address</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Partnership Start Date</td>
                            <td>Partnership End Date</td>
                            <td>Partnership Status</td>
                            <td>Type Vehicles Available</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        
                        <?php
                        foreach ($listecommande as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nom']; ?></td>
                                <td><?php echo $row['adresse']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['startdate']; ?></td>
                                <td><?php echo $row['enddate']; ?></td>
                                <td><?php echo $row['Pstatus']; ?></td>
                                <td><?php echo $row['typevehicles']; ?></td>
                                <td><a href="modifierPartnership.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="supprimerPartnership.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                         <a href="ajouterPartnership.php" class="Btn_add">Add</a>
                    </table>
                </div>
            </div>

            <!-- ================= New Customers ================ -->
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../Partnership_js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
