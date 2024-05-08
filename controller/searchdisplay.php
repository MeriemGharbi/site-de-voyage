<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for activities</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/style.css">
    <style>

    </style>
</head>
<body>
    
<div class="container">
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
              <!-- ========================= sort ==================== -->
              <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="logo">
                <img src="../view/img/xplore.png" alt="">
                </div>
            </div>
             
            <div class="category-links">
    <select onchange="window.location.href=this.value">
        <option value="#">Select a category</option>
        <?php
        // Inclure le fichier de configuration de la base de données
        include_once "../config.php";

        // Récupérer les catégories disponibles dans la base de données
        $sql = "SELECT * FROM category";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Afficher les catégories sous forme d'options dans le combobox
        if (count($categories) > 0) {
            foreach ($categories as $row) {
                echo "<option value='activitiesjoinback.php?category_id=" . $row['id_category'] . "'>" . $row['nom_category'] . "</option>";
            }
        } else {
            echo "<option disabled>No categories found</option>";
        }
        ?>
 
</select>

    <!-- ========================= search ==================== -->
        
    <div class="search">
        <label>
            <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." oninput="handleSearchInput()">
        </label>
        <div id="searchresult" class="cardBox"></div> 
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input =$(this).val();
            if(input!=""){
                $.ajax({
                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},
                    success:function(data){
                        $("#searchresult").html(data);
                    }
                });
            } else {
                $("#searchresult").css("display","none");
            }
        });
    });
</script>

</body>
</html>
