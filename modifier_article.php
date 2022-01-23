<?php

session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar_profil.php';
require_once 'system\get_single_article.php';
require_once 'system\get_answer.php';
require_once 'system\show_content_answer.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $getID = $_GET['id'];
    
    $check_article = $BDD->prepare("SELECT * FROM articles WHERE id = ?");
    $check_article->execute(array($getID));

    //check in db if the article is here
    if($check_article->rowcount() > 0){
        $article_info = $check_article->fetch();

        //check if user can edit the post
        if($article_info['id_auteur'] == $_SESSION['ID_users']){

            $title = $article_info['titre'];
            $description = $article_info['description'];
            $date = $article_info['date_publication'];
            $contenu = $article_info['contenu'];

            //replace the br in bdd
            $description = str_replace('<br />', "", $description);
            $contenu = str_replace('<br />', "", $contenu);

        } else {
            $errorMsg = "<script>alert('Vous n'avez pas l'autorisation de supprimer cet article')</script>";
        }
    }else{
        $errorMsg = "<script>alert('l'article n'existe pas ! ')</script>";
    }
}

if(isset($_POST['modifier'])){

    if(!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['contenu'])){

        $titre = htmlspecialchars($_POST['titre']);
        $descri = nl2br(htmlspecialchars($_POST['description']));
        $content = nl2br(htmlspecialchars($_POST['contenu']));

        $update = $BDD->prepare("UPDATE articles SET titre = ?, description = ?, contenu = ? WHERE id = ? ");
        $update->execute(array($titre, $descri, $content, $getID));

        header('Location: profil.php');
        exit;
    }
}

?>
<?php 
    if(isset($errorMsg)){ 
        echo '<p>'.$errorMsg.'</p>'; 
    }elseif(isset($successMsg)){ 
        echo '<p>'.$successMsg.'</p>'; 
    }
?>

<?php
    if(isset($date)){
?>
    <form class="container" method="POST">  
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nouveau titre :</label>
            <input type="text" class="form-control" name="titre" value="<?= $title ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nouvelle description :</label>
            <input class="form-control" name="description" value="<?= $description ?>"></input>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nouveau contenu : </label>
            <textarea type="text" class="form-control" name="contenu" value=""> <?= $contenu ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="modifier">modifier article !</button>
    </form>
<?php
    }
?>
<a class="nav-link active " href="profil.php">retour </a>











