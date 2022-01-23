<?php
include_once('db\connexionDB.php');

    $allArticles = $BDD->query('SELECT id, id_auteur, titre, description, contenu, pseudo_auteur, date_publication FROM articles ORDER BY id DESC LIMIT 0,5');

    if(isset($_GET['search']) AND !empty($_GET['search'])) {
        $searching = $_GET['search'];
        $allArticles = $BDD->query('SELECT id, id_auteur, titre, description, contenu, pseudo_auteur, date_publication FROM articles WHERE titre LIKE "%'.$searching.'%" ORDER BY id DESC');

    }


?>