<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Activity</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/style.css">
   
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
      <br><br>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search for activities">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="logo">
                <img src="../view/backoffice/img/xplore.png" alt="">
                </div>
            </div>
  <!-- ======================= Cards ================== 
  <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div> -->
            <!-- ================ Order Details List ================= -->
           <div class="table-container">    
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>ACTIVITIES</h2>
                        <a href="addActivity.php" class="btn btn-primary">Add activity</a>
               
                    </div>

                    <table class="table">
    <thead>
        <tr>
           
        </tr>
    </thead>
    <tbody>
    <?php
include_once "../config.php";
// Modifier la requête SQL pour inclure une jointure avec la table category
$pic = mysqli_query($con, "SELECT activity.*, category.nom_category AS category_name FROM `activity` LEFT JOIN `category` ON activity.id_category = category.id_category");
while ($row = mysqli_fetch_array($pic)) {
      // Extraire les deux premiers caractères de la durée pour afficher l'heure et les minutes
      $duration = substr($row['duration'], 0, 5);
      // Formater la date pour afficher uniquement la date sans l'heure
      $date_formattee = date_format(date_create($row['date']), 'Y-m-d');
  
      // Format the date_debut and date_fin to display only hours and minutes
      $date_debut = date_format(date_create($row['date_debut']), 'H:i');
      $date_fin = date_format(date_create($row['date_fin']), 'H:i');
  

    echo "
    <tr>
        <td>$row[id_act]</td>
        <td colspan='8'>
           
                <img src='$row[image]' class='activity-img'  style='float: right;'>
                <div class='activity-details'>
                    <div class='activity-name1'>Nom de l'activité : $row[nom_activity]</div>
                    <div class='activity-name'>Description : $row[description]</div>
                    <div class='activity-name'>Lieu : $row[lieu]</div>
                    <div class='activity-name'>Date : $date_formattee</div> <!-- Utilisation de la date formatée -->
                    <div class='activity-name'>Date debut : $date_debut</div> <!-- Afficher seulement les heures et les minutes -->
                    <div class='activity-name'>Date fin: $date_fin</div> <!-- Afficher seulement les heures et les minutes -->
                    <div class='activity-name'>Prix : $row[prix]</div>
                    <div class='activity-name'>Capacité maximale : $row[capacity_max]</div>
                    <div class='activity-name'>Durée : $duration</div> <!-- Afficher l'heure et les minutes -->
                    <div class='activity-name'>Nom de la catégorie : $row[category_name]</div> <!-- Afficher le nom de la catégorie -->
                </div>
            </div>
        </td>
        <td>
            <a href='deleteActivity.php?id_act=$row[id_act]' class='button' onclick='return confirmDelete();'>Delete</a> <br> <br> <br> <br>
            <a href='update.php?id_act=$row[id_act]' class='button'>Update</a>
        </td>
    </tr>
    ";
}
?>

</tbody>

</table>

    </div>
  <!-- ================= New Customers ================ -->
  <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>our best activity offers</h2>
                    </div>

                    <table>
                    <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/forest1.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Adventure Trek :<br><span>Explore the Wilderness</span></span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/kayak.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Sunset Kayaking:<br> <span> Paddle into the Twilight</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act3.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Yoga Retreat:<br> <span> Find Your Inner Peace</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act4.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Mountain Biking Excursion:<br> <span>Conquer the Trails </span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act6.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Wildlife Safari:<br> <span> Encounter the Wonders of Nature</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act9.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Team-Building Challenge:<br> <span> Strengthen Bonds Together</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act7.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>sahara tour <br> <span>explore the sahara of north africa</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act8.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Historical Walking Tour: <br> <span>Step Back in Time</span></h4>
                            </td>
                    <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/forest1.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Adventure Trek :<br><span>Explore the Wilderness</span></span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/kayak.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Sunset Kayaking:<br> <span> Paddle into the Twilight</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act3.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Yoga Retreat:<br> <span> Find Your Inner Peace</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act6.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Wildlife Safari:<br> <span> Encounter the Wonders of Nature</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act9.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Team-Building Challenge:<br> <span> Strengthen Bonds Together</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act7.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>sahara tour <br> <span>explore the sahara of north africa</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act8.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Historical Walking Tour: <br> <span>Step Back in Time</span></h4>
                            </td>
                    <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/forest1.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Adventure Trek :<br><span>Explore the Wilderness</span></span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/kayak.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Sunset Kayaking:<br> <span> Paddle into the Twilight</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act6.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Wildlife Safari:<br> <span> Encounter the Wonders of Nature</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act9.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Team-Building Challenge:<br> <span> Strengthen Bonds Together</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act7.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>sahara tour <br> <span>explore the sahara of north africa</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act8.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Historical Walking Tour: <br> <span>Step Back in Time</span></h4>
                            </td>
                    <tr>
                    <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act6.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Wildlife Safari:<br> <span> Encounter the Wonders of Nature</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act9.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Team-Building Challenge:<br> <span> Strengthen Bonds Together</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act7.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>sahara tour <br> <span>explore the sahara of north africa</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act8.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Historical Walking Tour: <br> <span>Step Back in Time</span></h4>
                            </td>
                    <tr>
                        
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/forest1.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Adventure Trek :<br><span>Explore the Wilderness</span></span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/kayak.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Sunset Kayaking:<br> <span> Paddle into the Twilight</span></h4>
                            </td>
                        </tr>
                        <tr>
                        
                        <td width="60px">
                            <div class="imgBx"><img src="../view/backoffice/img/forest1.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Adventure Trek :<br><span>Explore the Wilderness</span></span></h4>
                        </td>
                    </tr>
                    <tr>
                        
                        <td width="60px">
                            <div class="imgBx"><img src="../view/backoffice/img/forest1.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Adventure Trek :<br><span>Explore the Wilderness</span></span></h4>
                        </td>
                    </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act4.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Mountain Biking Excursion:<br> <span>Conquer the Trails </span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act6.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Wildlife Safari:<br> <span> Encounter the Wonders of Nature</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act9.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Team-Building Challenge:<br> <span> Strengthen Bonds Together</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act7.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>sahara tour <br> <span>explore the sahara of north africa</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act8.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Historical Walking Tour: <br> <span>Step Back in Time</span></h4>
                            </td>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/forest1.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Adventure Trek :<br><span>Explore the Wilderness</span></span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/kayak.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Sunset Kayaking:<br> <span> Paddle into the Twilight</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act3.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Yoga Retreat:<br> <span> Find Your Inner Peace</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act4.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Mountain Biking Excursion:<br> <span>Conquer the Trails </span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act6.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Wildlife Safari:<br> <span> Encounter the Wonders of Nature</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act9.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Team-Building Challenge:<br> <span> Strengthen Bonds Together</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act7.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>sahara tour <br> <span>explore the sahara of north africa</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../view/backoffice/img/act8.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Historical Walking Tour: <br> <span>Step Back in Time</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

             <!-- =========== Scripts =========  -->
    <script src="../view/backoffice/assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="activity2.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
