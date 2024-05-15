<?php
require('config.php');


$getAllComment2=$bdd->query('SELECT id,id_auteur,titre,description,pseudo_auteur,date_publication FROM commentaire ORDER BY id DESC LIMIT 0,5');

/*if(isset($_GET['search']) AND !empty($_GET['search'])){
    $userSearch=$_GET['search'];
    $getAllComment=$bdd->query('SELECT id,id_auteur,titre,description,pseudo_auteur,date_publication FROM commentaire WHERE titre LIKE "%'.$userSearch.'%"ORDER BY id DESC');
}*/