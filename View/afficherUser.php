
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xplore</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
    table {
    border-collapse: collapse;
    color: #404040;
    position: absolute;
    left: 50%;
    top: 30%;
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
    font-weight: bold; /* Ajout de font-weight: bold; */
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
                        <span class="title"><img src="../imgs/logo.png" class ="logo"></span>
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">activité</span>
                    </a>
                </li>

                <li>
                    <a href="#">
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
                        <span class="title">déconnection </span>
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
                <a href="login.php" class="btn btn-primary rounded-pill py-2 px-4"style="margin-left: 10px;">log out</a>
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
                    <div class="cardHeader">
                       
                    </div>

                    <?PHP
include "../Controller/UserC.php";
$UserC=new UserC();
$listecommande=$UserC->afficherUser();
?>
<table border="1">
<tr>
<td>cin</td>
<td>nom</td>
<td>prenom</td>
<td>Date DE Naissance</td>
<td>Email</td>
<td>phone</td>
<td>Supprimer</td>
</tr>

<?PHP
foreach($listecommande as $row){
	?>
	<tr>
	<td><?PHP echo $row['cin']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['d_n']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
    <td><?PHP echo $row['phone']; ?></td>
    <td><a href="afficherUser.php?cin=<?PHP echo $row['cin']; ?>"  class="btn btn-danger">Supprimer</a></td>
	</tr>
	<?PHP
}
if(isset($_GET["cin"])){
    echo '<script>';
    echo '    var cin = "' . htmlspecialchars($_GET["cin"]) . '";';
    echo 'var result = confirm("Do you want to delete the user: "+cin+"?");';
    echo 'if (result) {';
    echo '    window.location.href = "supprimerUser.php?cin=' . $_GET["cin"] . '&confirmed=true";';
    echo '} else {';
    echo '    window.location.href = "afficherUser.php";';
    echo '}';
    echo '</script>';
}
?>
</table>

                </div>

                <!-- ================= New Customers ================ -->
              
    <!-- =========== Scripts =========  -->
    <script src="../User_js/main.js"></script>
    <script src="../User_js/modifierUser.js"></script>
   

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>


