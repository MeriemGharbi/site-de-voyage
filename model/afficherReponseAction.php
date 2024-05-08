<?php

require('model/config.php');

$getAllAnswers=$bdd->prepare('SELECT id_auteur,pseudo_auteur,id_question,contenu FROM reponse WHERE id_question=? ORDER BY id DESC');
$getAllAnswers->execute(array($idOfTheQuestion));



