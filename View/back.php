
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xplore</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
    table {
    border-collapse: collapse;
    color: #404040;
    position: absolute;
    left: 50%;
    top: 40%;
    transform: translate(-50%, -50%);
    font-size: 14px;
    margin-top: -10mm; 
    margin-bottom: -10mm; 
    width: calc(100% - 20mm); 
}

th {
    font-size: 10px; 
    border-bottom: 2px solid #ffcb61; 
    padding: 8px 16px; 
    font-weight: bold; /* Ajout de font-weight: bold; */
    width: 120px; 
}

td {
    padding: 4px 16px;
    font-size: 11px; 
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
    margin-bottom:20px;
    background-color: #1a2bc6;
    padding: 5px 20px;
    color: #fff;
    display: flex;
    align-items: center;
    text-align: 0;
    border-radius: 6px;
    text-decoration: 0;
	position: absolute;
            left: 8%;
            top: 8%;
            transform: translate(-15%, -15%);
}
.pagination {
    position: absolute;
    top: -220px;
    left: 370px;; 
    list-style: none;
    padding: 0;
    
}
.pagination li a:hover {
    background-color: #f0f0f0;
    color: #007bff; 
}
    #table tr:hover {
        background-color: #1f0cce; /* Bleu clair */
    }
    .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .chart-container {
            width: 100%; 
            height: 100%; 
        }
        .card {
            position: relative;
            top: -10px; 
            left: 20px;
        }
        .recentOrders {
            position: relative;
            top: -580px; 
            left: -28px;
        }
    </style>
    <?php
        session_start();
        if(isset($_SESSION['prenom'])){
            echo '<script>';
            echo 'var prenom = "' . htmlspecialchars($_SESSION['prenom']) . '";';
            echo 'var elements = document.getElementsByClassName("username");';
            echo 'for (var i = 0; i < elements.length; i++) {';
            echo '    elements[i].innerHTML = prenom;';
            echo '}';
            echo '</script>';
        }
        else{
            header("location: login.php");
            exit; 
        }
    ?> 
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
                    <a href="integration/view/back.php"  >
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Offres</span>
                    </a>
                </li>

                <li>
                    <a href="view-forum/indexAdmin2.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Forum</span>
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
                    <a href="integration/view/back.php"  >
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
                    <a href="transport/view/showcarreservation.php">
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
        </div>
     <!-- =============== Navigation end ================ -->
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <form method="post" action="">
                        <button name="trier" class="btn btn-primary" type="submit">Trier</button>
                </form>
                <div class="search">
                    <label>
                        <input type="search" id="search" name="search" placeholder="recherche" oninput="searchTable()">
                        <script>
                            function searchTable() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("search");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("table");
                                tr = table.getElementsByTagName("tr");
                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td");
                                    for (var j = 0; j < td.length; j++) {
                                        var cell = td[j];
                                        if (cell) {
                                            txtValue = cell.textContent || cell.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].style.display = "";
                                                break;
                                            } else {
                                                tr[i].style.display = "none";
                                            }
                                        }
                                    }
                                }
                            }

                    </script>
                    </label>
                </div>
                <div class="icon_search">
               
                </div>
                <div class="user_profile">
                    <label class="username"><?php echo htmlspecialchars($_SESSION['prenom']); ?> </label>
                    <div class="user">
                        <img src="assets/imgs/customer01.jpg" alt="">
                    </div>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <div class="container">
        <div class="chart-container">
            <canvas id="chartBig1"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="chartRoles"></canvas>
        </div>
    </div>
    <div class="cardBox">
        <div class="card">
            <h3>Utilisateurs Bannis</h3>
            <div style="width: 210px; height: 210px;">
                <canvas id="chartBannedCanvas"></canvas> 
            </div>
        </div>

        <div class="card">
            <h3>Utilisateurs par Date of Birth</h3>
            <div style="width: 240px; height: 240px;">
                <canvas id="chartByAgeCanvas"></canvas> 
            </div>
        </div>
    </div>

    <?php
    require_once '../config.php'; 
    $conn = config::getConnexion();
    $sqlBanned = "SELECT COUNT(*) AS banned_users FROM tab_user WHERE ban = 1";
    $resultBanned = $conn->prepare($sqlBanned);
    $resultBanned->execute();

    $banned_users_row = $resultBanned->fetch(PDO::FETCH_ASSOC);
    $banned_users = $banned_users_row['banned_users'];
    $sqlAgeGroups = "SELECT 
                        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, d_n, CURDATE()) < 18 THEN 1 ELSE 0 END) AS less_than_18,
                        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, d_n, CURDATE()) BETWEEN 18 AND 30 THEN 1 ELSE 0 END) AS between_18_and_30,
                        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, d_n, CURDATE()) BETWEEN 31 AND 50 THEN 1 ELSE 0 END) AS between_31_and_50,
                        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, d_n, CURDATE()) > 50 THEN 1 ELSE 0 END) AS above_50
                    FROM tab_user";
    $resultAgeGroups = $conn->prepare($sqlAgeGroups);
    $resultAgeGroups->execute();

    $age_groups_data = $resultAgeGroups->fetch(PDO::FETCH_ASSOC);

    $conn = null;
    ?>

    <script>
        var ctxBanned = document.getElementById('chartBannedCanvas').getContext('2d');
        var chartBanned = new Chart(ctxBanned, {
            type: 'doughnut',
            data: {
                labels: ['Banned Users', 'Non-Banned Users'],
                datasets: [{
                    label: 'Number of Users',
                    backgroundColor: ['#007bff', '#1f0cce'],
                    data: [<?php echo $banned_users; ?>, <?php echo array_sum($age_groups_data); ?> - <?php echo $banned_users; ?>]
                }]
            },
            options: {
                animation: {
                    animateRotate: true,
                    animateScale: true
                },
                legend: {
                    display: true,
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Banned Users'
                },
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            return (value * 100 / context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0)).toFixed(2) + '%';
                        },
                        color: '#007bff', 
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            }
        });

        var ctxAgeGroups = document.getElementById('chartByAgeCanvas').getContext('2d');
        var chartAgeGroups = new Chart(ctxAgeGroups, {
            type: 'doughnut',
            data: {
                labels: ['Less than 18', 'Between 18 and 30', 'Between 31 and 50', 'Above 50'],
                datasets: [{
                    label: 'Number of Users by Age Group',
                    backgroundColor: [
                        '#007bff',
                        '#1f0cce',
                        '#FF5733',
                        '#FFA07A'
                    ],
                    data: [<?php echo $age_groups_data['less_than_18']; ?>, <?php echo $age_groups_data['between_18_and_30']; ?>, <?php echo $age_groups_data['between_31_and_50']; ?>, <?php echo $age_groups_data['above_50']; ?>]
                }]
            },
            options: {
                animation: {
                    animateRotate: true,
                    animateScale: true
                },
                legend: {
                    display: true,
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Users by Age Group'
                },
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            return (value * 100 / context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0)).toFixed(2) + '%';
                        },
                        color: '#007bff',
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            }
        });
    </script>

            <!-- ================ table ================= -->
            <div class="details">
                <div class="recentOrders" >
                    <div class="cardHeader">
                       
                    </div>

                    <?php
include "../Controller/UserC.php";
$records_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$UserC = new UserC();
$start_from = ($current_page - 1) * $records_per_page;
if (isset($_POST['trier'])) {
    $listecommande = $UserC->trierUser($start_from, $records_per_page);}
else {
    $listecommande = $UserC->afficherUserPagination($start_from, $records_per_page);}
?>
<table border="1" id="table" >
    <tr>
        <td>cin</td>
        <td>nom</td>
        <td>prenom</td>
        <td>Date DE Naissance</td>
        <td>Email</td>
        <td>phone</td>
        <td>ban</td>
        <td>ban</td>
        <td>Supprimer</td>
    </tr>

    <?php foreach ($listecommande as $row) { ?>
        <tr>
            <td><?php echo $row['cin']; ?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prenom']; ?></td>
            <td><?php echo $row['d_n']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['ban']; ?></td>
            <td>
                <?php if ($row['ban'] == 0) { ?>
                    <a href="back.php?id_user=<?php echo $row['id_user']; ?>" class="btn btn-warning">Ban</a>
                <?php } else { ?>
                    <a href="back.php?id_user=<?php echo $row['id_user']; ?>" class="btn btn-warning">Unban</a>
                <?php } ?>
            </td>
            <td><a href="back.php?cin=<?php echo $row['cin']; ?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php } ?>
</table>
<?php
$total_pages = ceil(count($UserC->afficherUser()) / $records_per_page);

echo "<ul class='pagination'>";
if ($current_page > 1) {
    echo "<li><a href='back.php?page=" . ($current_page - 1) . "'>&laquo;</a></li>";
}
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li><a href='back.php?page=$i'>$i</a></li>";
}
if ($current_page < $total_pages) {
    echo "<li><a href='back.php?page=" . ($current_page + 1) . "'>&raquo;</a></li>";
}
echo "</ul>";
?>

	<?PHP
if(isset($_GET["cin"])){
    echo '<script>';
    echo '    var cin = "' . htmlspecialchars($_GET["cin"]) . '";';
    echo 'var result = confirm("Do you want to delete the user: "+cin+"?");';
    echo 'if (result) {';
    echo '    window.location.href = "supprimerUser.php?cin=' . $_GET["cin"] . '&confirmed=true";';
    echo '} else {';
    echo '    window.location.href = "back.php";';
    echo '}';
    echo '</script>';
}
if(isset($_GET["id_user"])) {
    $id_user = $_GET["id_user"];
    $user = null;
    foreach ($listecommande as $row) {
        if ($row['id_user'] == $id_user) {
            $user = $row;
            break;
        }
    }
    if ($user) {
        $ban_value = $user['ban'];
        echo '<script>';
        echo '    var id_user = "' . htmlspecialchars($id_user) . '";';
        echo '    var result;';
        echo '    if (' . $ban_value . ' == 0) {';
        echo '        result = confirm("Do you want to ban the user: " + id_user + "?");';
        echo '        if (result) {';
        echo '            window.location.href = "banUser.php?id_user=' . $id_user . '&confirmed=true";';
        echo '        } else {';
        echo '            window.location.href = "back.php";';
        echo '        }';
        echo '    } else {';
        echo '        result = confirm("Do you want to unban the user: " + id_user + "?");';
        echo '        if (result) {';
        echo '            window.location.href = "unbanUser.php?id_user=' . $id_user . '&confirmed=true";';
        echo '        } else {';
        echo '            window.location.href = "back.php";';
        echo '        }';
        echo '    }';
        echo '</script>';
    }
}



?>
</table>
                </div>
                <!-- ================= New Customers ================ -->
              
    <!-- =========== Scripts =========  -->
    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#table tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script src="assets/User_js/main.js"></script>
    <script src="assets/User_js/modifierUser.js"></script>
   
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>


