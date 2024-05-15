<?php
session_start();
require('../../model/model-forum/forum/afficherActionAdmin.php');

// Définition du nombre de commentaires par page
$commentairesParPage = 3;

// Récupération du numéro de page à afficher (par défaut : page 1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'indice de début et de fin des commentaires à afficher
$indiceDebut = ($page - 1) * $commentairesParPage;
$indiceFin = $indiceDebut + $commentairesParPage;

// Requête SQL pour récupérer les commentaires avec l'état 0
$requete = "SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM commentaire WHERE etat = 0 ORDER BY id DESC LIMIT $indiceDebut, $commentairesParPage";
$resultat = $bdd->query($requete);

// Calcul du nombre total de commentaires avec l'état 0
$requeteTotal = "SELECT COUNT(*) AS total FROM commentaire WHERE etat = 0";
$totalCommentaires = $bdd->query($requeteTotal)->fetchColumn();

// Calcul du nombre total de pages
$nombrePages = ceil($totalCommentaires / $commentairesParPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xplore</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .card-header {
            background-color: #00CED1; /* Vert foncé */
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 15px;
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 10px;
            border-top: 1px solid #ddd;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        input[type="search"] {
            border-radius: 5px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            color: #240750;
            text-decoration: none;
            margin-right: 5px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            border: 1px solid #240750;
        }

        .pagination a:hover {
            background-color: #240750;
            color: white;
        }

        .pagination a.active {
            background-color: #240750;
            color: white;
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
                    <a href="">
                        <span class="icon" onclick="showUser()">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../integration/view/back.php"  onclick="showOffre()" >
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
                    <a href="#"  onclick="showActivities()">
                        <span class="icon">
                            <ion-icon name="walk-outline"></ion-icon>
                        </span>
                        <span class="title">activités</span>
                    </a>
                </li>

                <li>
                    <a href="../back.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="../transport/view/showcarreservation.php">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Transport</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
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
                <!-- Ajoutez d'autres éléments de navigation si nécessaire -->
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                <label>
                        <input type="text" placeholder="recherche">
                    </label>
                </div>
                <div class="user">
                    <img src="../assets/imgs/customer01.jpg" alt="">
                </div>
            </div>
            <div class="container">
            <div class="row">
            <div class="col-md-10">
                <!-- Contenu principal ici -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Les nouveaux Forums ajoutés</h2>
                    </div>
                    <?php while($commentaire = $resultat->fetch()) { ?>
                        <div class="card">
                            <div class="card-header bg-dark ">
                                <a href="afficheQuestionAdmin.php?id=<?php echo $commentaire['id'];?> "class="text-white">
                                    <?php echo $commentaire['titre'];?>
                                </a>
                            </div>
                            <div class="card-body">
                                <?php echo $commentaire['description'];?>
                            </div>
                            <div class="card-footer">
                                Publié par <?php echo $commentaire['pseudo_auteur'];?> le <?php echo $commentaire['date_publication'];?>
                                <!-- Formulaire pour le bouton "Confirmer" -->
                                <form action="../../model/model-forum/forum/approuverCommentaire.php" method="POST">
                                    <a href="afficheQuestionAdmin.php?id=<?=$commentaire['id'];?>" class="btn btn-primary">Accéder à la question</a>
                                    <a href="../../model/model-forum/forum/deleteActionAdmin.php?id=<?=$commentaire['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                                    <!-- Champ caché pour envoyer l'ID du commentaire -->
                                    <input type="hidden" name="comment_id" value="<?php echo $commentaire['id']; ?>">
                                    <!-- Bouton "Confirmer" -->
                                    <button type="submit" class="btn btn-primary" name="validate2">Confirmer</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $nombrePages; $i++) { ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="indexAdmin2.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-md-4">
                <!-- Sidebar pour les commentaires -->
                <div class="recentOrders">
                    <!-- Contenu de la sidebar -->
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="view2/assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>



