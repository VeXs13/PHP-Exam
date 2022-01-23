<?php
include_once('db\connexionDB.php');

    $OneArticle = $BDD->prepare('SELECT * FROM articles WHERE id_auteur = ? ORDER BY id DESC');
    $OneArticle->execute(array($_SESSION['ID_users']));

    
?>