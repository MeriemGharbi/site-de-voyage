<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
                            <div class="user">
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
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

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
                    <img src="../view/backoffice/img/xplore.png" alt="">
                </div>
            </div>
            <br><br>

            <!-- ========================= partie form==================== -->


            <div class="form">
                <form action="insertcar.php" id="carForm" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Add Car form</h1><br><br><br><br>
                    <div class="attributs">
                        <label for="marque">Marque</label>
                        <input type="text" name="marque" id="marque" class="input">
                        <span id="error-marque" class="error-message" style="color: red; visibility: hidden;">Please fill out this field</span><br>
                        <span id="valid-marque" class="valid-message" style="color: green; visibility: hidden;">Marque is valid</span><br>
                    </div>

                    <div class="attributs">
                        <label for="modele">Modèle</label>
                        <input type="text" name="modele" id="modele" class="input">
                        <span id="error-modele" class="error-message" style="color: red; visibility: hidden;">Please fill out this field</span><br>
                        <span id="valid-modele" class="valid-message" style="color: green; visibility: hidden;">Modèle is valid</span><br>
                    </div>

                    <div class="attributs">
                        <label for="annee">Année</label>
                        <input type="text" name="annee" id="annee" class="input">
                        <span id="error-annee" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ</span><br>
                        <span id="valid-annee" class="valid-message" style="color: green; visibility: hidden;">Année valide</span><br>
                    </div>

                    <div class="attributs">
                        <label for="prix_journee">Prix par jour</label>
                        <input type="text" name="prix_journee" id="prix_journee" class="input">
                        <span id="error-prix-jour" class="error-message" style="color: red; visibility: hidden;">Veuillez remplir ce champ avec des chiffres</span><br>
                        <span id="valid-prix-jour" class="valid-message" style="color: green; visibility: hidden;">Prix par jour valide</span><br>
                    </div>

                    <div class="attributs">
                        <label for="couleur">Couleur</label>
                        <input type="text" name="couleur" id="couleur" class="input">
                    </div>

                    <div class="attributs">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" class="input">
                    </div>

                    <div class="attributs">
                        <label for="disponibilite">Disponibilité</label>
                        <input type="text" name="disponibilite" id="disponibilite" class="input">
                    </div>

                    <div class="attributs">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"><br>
                    </div>

                    <button type="submit" name="upload" class="btn btn-primary" id="uploadButton">Upload</button>
                    <a class="button" href="showcar.php">Annuler</a>
                </form>
                <script src="car.js"></script>
            </div>

        </div>

    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/backoffice/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
