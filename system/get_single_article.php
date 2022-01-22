<?php
include_once('db\connexionDB.php');


    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getId = $_GET['id'];
        $checkArticles = $BDD->prepare('SELECT * FROM articles WHERE id = ?');
        $checkArticles->execute(array($getId));

        if ($checkArticles->rowCount() > 0 ) {
            $Infos = $checkArticles->fetch();

            $titre = $Infos['titre'];
            $descript = $Infos['description'];
            $content = $Infos['contenu'];
            $id_users = $Infos['id_auteur'];
            $users = $Infos['pseudo_auteur'];
            $date = $Infos['date_publication'];
            $id = $Infos['id'];

        } else {
            $errorMsg = "<script>alert('No article found...')</script>";
        }
    } else {
        $errorMsg = "<script>alert('No article found...')</script>";
    }

?>