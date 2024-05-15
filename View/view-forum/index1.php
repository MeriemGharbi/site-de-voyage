<?php
session_start();
require('../../model/model-forum/forum/afficherAction.php');
require('../../model/model-forum/forum/config.php');

$itemsPerPage = 4 ;
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Initialiser la requête SQL sans la clause WHERE
$sql = "SELECT * FROM commentaire";

// Initialiser la requête SQL avec la clause WHERE pour l'état
$sql = "SELECT * FROM commentaire WHERE etat = 1";

// Vérifier si une recherche est effectuée
if(isset($_GET['search']) && !empty($_GET['search'])) {
    // Si oui, ajouter la clause WHERE pour la recherche
    $searchTerm = '%' . $_GET['search'] . '%';
    $sql .= " AND titre LIKE :searchTerm"; // Ajoutez d'autres colonnes si nécessaire
}

// Ajouter la clause LIMIT pour la pagination
$sql .= " LIMIT $itemsPerPage OFFSET $offset";

// Préparer et exécuter la requête SQL
$stmt = $bdd->prepare($sql);

// Si une recherche est effectuée, associez le paramètre lié
if(isset($searchTerm)) {
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
}

$stmt->execute();


// Calculer le nombre total d'éléments correspondant à la recherche
$totalCount = 0;
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $countSql = "SELECT COUNT(*) AS total FROM commentaire WHERE titre LIKE :searchTerm ";
    $countStmt = $bdd->prepare($countSql);
    $countStmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $countStmt->execute();
    $totalCount = $countStmt->fetchColumn();
} else {
    // Si aucune recherche n'est effectuée, comptez simplement tous les éléments
    $countSql = "SELECT COUNT(*) AS total FROM commentaire WHERE etat = 1";
    $totalCount = $bdd->query($countSql)->fetchColumn();
}

// Calculer le nombre total de pages
$totalPages = ceil($totalCount / $itemsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../controller/head.php'; ?>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .card-header {
            background-color:#00CED1; /* Vert foncé */
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
            color: #240750; /* Jaune */
            text-decoration: none;
            margin-right: 10px;
            font-weight: bold; /* Texte en gras */
        }
        .pagination a.active {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include '../../controller/navbar.php'; ?>
    <div class="container">
          <!-- Formulaire de recherche et de tri -->      
    <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control" placeholder="Rechercher...">
                </div>
                <div class="col-2">
                    <!-- Ajouter le bouton de tri -->
                    <select class="form-control" name="sort">
                        <option value="">Trier par</option>
                        <option value="date_asc">Date de publication (plus ancien en premier)</option>
                        <option value="date_desc">Date de publication (plus récent en premier)</option>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-success">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Affichage des résultats de la recherche paginés -->
        <?php
        // Construire la requête SQL initiale sans la clause ORDER BY
        $sql = "SELECT * FROM commentaire WHERE etat = 1";

        // Vérifier si une recherche est effectuée
        if(isset($_GET['search']) && !empty($_GET['search'])) {
            $searchTerm = '%' . $_GET['search'] . '%';
            $sql .= " AND titre LIKE :searchTerm";
        }

        // Vérifier s'il y a un tri sélectionné
        if(isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            switch($sort) {
                case 'date_asc':
                    $sql .= " ORDER BY date_publication ASC";
                    break;
                case 'date_desc':
                    $sql .= " ORDER BY date_publication DESC";
                    break;
                default:
                    // Par défaut, ne pas ajouter de clause ORDER BY
                    break;
            }
        }

        // Ajouter la clause LIMIT pour la pagination
        $sql .= " LIMIT $itemsPerPage OFFSET $offset";

        // Exécuter la requête SQL
        $stmt = $bdd->prepare($sql);

        // Si une recherche est effectuée, associez le paramètre lié
        if(isset($searchTerm)) {
            $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        }

        $stmt->execute();

        // Afficher les résultats
        while($comment = $stmt->fetch()) { ?>
        <!-- Affichage de chaque commentaire -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                <a href="afficheQuestion.php?id=<?php echo $comment['id'];?>"class="text-white">
                    <?php echo $comment['titre'];?>
                </a>
            </div>
            <div class="card-body"><?php echo $comment['description'];?></div>
            <div class="card-footer">
                Publié par <a href="profile.php?id=<?=$comment['id_auteur']; ?>"> <?php echo $comment['pseudo_auteur'];?></a> le <?php echo $comment['date_publication'];?>
            </div>
        </div>
        <?php } ?>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            // Afficher les liens de pagination avec le paramètre de recherche
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i === $currentPage) ? 'active' : '';
                // Ajoutez le terme de recherche dans les liens de pagination
                $searchParam = isset($_GET['search']) ? '&search=' . $_GET['search'] : '';
                echo "<a href='index1.php?page=$i$searchParam' class='$activeClass'>$i</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>


