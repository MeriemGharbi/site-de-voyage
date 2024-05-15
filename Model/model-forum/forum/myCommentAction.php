<?php
session_start();
require('config.php');

$getAllMyComment=$bdd->prepare('SELECT id,titre,description FROM commentaire WHERE id_auteur = ? ORDER BY id DESC  ');
$getAllMyComment->execute(array($_SESSION['id_user']));