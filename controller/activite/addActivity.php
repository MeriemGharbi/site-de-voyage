<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../view/backoffice/assets/css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Transport</span>
                    </a>
                </li>
            </ul>
        </div>
     <!-- =============== Navigation end ================ -->



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
                    <img src="../../view/backoffice/img/xplore.png" alt="">
                </div>
            </div>
        <br><br>
    
 <!-- ========================= partie form==================== -->
                    
                        <div class="form">
                             <form action="insert.php" id="activityForm" method="POST" enctype="multipart/form-data">
                             <h1 class="text-center">Add activity form</h1><br><br><br><br>
                           
                             <div class="attributs">
                            <label for="nom_activity">nom de l'activité</label>
                            <input type="text"  name="nom_activity" id="nom_activity" class="input">
                            <span id="error-nom-activity" class="error-message" style="color: red; visibility: hidden;">Please fill out this field</span><br>
                            <span id="valid-nom-activity" class="valid-message" style="color: green; visibility: hidden;">Nom Activity is valid</span><br>
                            </div>
                        
                            <div class="attributs">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="input">
                            <span id="error-description" class="error-message" style="color: red; visibility: hidden;">Please fill out this field</span><br>
                            <span id="valid-description" class="valid-message" style="color: green; visibility: hidden;">Description is valid</span><br>
                            </div>
                        
                            <div class="attributs">
                            <label for="lieu">lieu</label>
                            <input type="text"  name="lieu" id="lieu" class="input">
                            <span id="error-lieu" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                            <span id="valid-lieu" class="valid-message" style="color: green; visibility: hidden;">Lieu valide</span><br>
                            </div>
                            
                            <div class="attributs">
                            <label for="date">date</label>
                            <input type="date" name="date" id="date" class="input">
                            <span id="error-date" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                            <span id="valid-date" class="valid-message" style="color: green; visibility: hidden;">Date valide</span><br>
                            </div>

                                                <div class="attributs">
                        <label for="date">date debut</label>
                        <input type="time" name="date_debut" id="date_debut" class="input">
                        <span id="error-date-debut" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                        <span id="valid-date-debut" class="valid-message" style="color: green; visibility: hidden;">Date valide</span><br>
                    </div>

                    <div class="attributs">
                        <label for="date_fin">date fin</label>
                        <input type="time" name="date_fin" id="date_fin" class="input">
                        <span id="error-date-fin" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                        <span id="valid-date-fin" class="valid-message" style="color: green; visibility: hidden;">Date valide</span><br>
                    </div>


                            

                            <div class="attributs">
                            <label for="prix">prix</label>
                            <input type="text" name="prix" id="prix" class="input">
                            <span id="error-prix" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ avec des chiffres</span><br>
                            <span id="valid-prix" class="valid-message" style="color: green; visibility: hidden;">Prix valide</span><br>
                            </div>
                            
                        
                            <div class="attributs">
                            <label for="capacity_max">capacité maximale</label>
                            <input type="number"  name="capacity_max" id="capacity_max" class="input">
                            <span id="error-capacity-max" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                            <span id="valid-capacity-max" class="valid-message" style="color: green; visibility: hidden;">Capacité maximale valide</span><br>
                            </div>

                            <div class="attributs">
                            <label for="image">image</label>
                            <input type="file"  name="image" id="image"><br>
                            </div>

                            <div class="attributs">
                            <label for="id_category">id catégorie</label>
                            <input type="number" name="id_category" id="id_category" class="input">
                            <span id="error-id-category" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                            <span id="valid-id-category" class="valid-message" style="color: green; visibility: hidden;">ID Category valide</span><br>
                            </div>

                            <div class="attributs">
                            <label for="duration">duration</label>
                            <input type="time" name="duration" placeholder="duration" class="input">
                            <span id="error-duration" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                            <span id="valid-duration" class="valid-message" style="color: green; visibility: hidden;">Durée valide</span><br>
                            </div>

    
                        <input type="text" name="map" placeholder="enter address">
                        <input type="submit" name="submit_map">
                        <br>
                            <button type="submit" name="upload" class="btn btn-primary" id="uploadButton">upload</button>
                            <a href="../../controller/activite/showActivity.php" class="button">
                            <button type="button" class="btn" >Return</button>   
                            </a>
                            <script src="Activity.js"></script>
                   </div>
              </form>   
    </div>
</div>

<!-- =========== Scripts =========  -->
  <script src="assets/backoffice/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>