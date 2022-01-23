
<?php

    session_start();

    include_once('db\connexionDB.php');
    require_once 'inc\navbar_profil.php';
    require_once 'system\get_profil_articles.php';
    require_once 'system\get_all_articles.php';
    require_once 'system\photo_de_profil.php';


    if(!isset($_SESSION['ID_users'])){
        header('Location: /PHP-Exam');
        exit;
    }
    
    $user_id = (int) $_SESSION['ID_users']; 

    if(empty($user_id)){
        header('Location: /PHP-Exam');
        exit;
    }

    $req = $BDD->prepare("SELECT * from users WHERE ID_users = ?");
    $req->execute(array($user_id));
    $show_user = $req->fetch();

    //for delete article
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $getID = $_GET['id'];
        
        $check_article = $BDD->prepare("SELECT * FROM articles WHERE id = ?");
        $check_article->execute(array($getID));
    
        if($check_article->rowcount() > 0){
            $article_info = $check_article->fetch();
    
    
            if($article_info['id_auteur'] == $_SESSION['ID_users']){
                $delete = $BDD->prepare("DELETE FROM articles WHERE id = ?");
                $delete->execute(array($getID));
    
                header('Location: profil.php');
                exit;
    
    
            } else {
                $errorMsg = "<script>alert('Vous n'avez pas l'autorisation de supprimer cet article')</script>";
            }
        }else{
            $errorMsg = "<script>alert('l'article n'existe pas ! ')</script>";
        }
    }

?>
<body>
<a class="nav-link active " href="index.php">retour </a>

<title>Profil de <?= $show_user['Username'] ?> </title>
    
<h3> profil de : <?=$show_user['Username']?> </h3>
<br>

<h4> information : </h4>

<li> pseudo : <?= $show_user['Username'] ?> </li>
<li> email : <?= $show_user['mail'] ?> </li>
<br>
<?php
    if (!empty($show_user['avatar'])) {
?>
    <img src="system\pp_img/<?php echo $show_user['avatar'];?>" width="150" >
<?php
    } else {
?>
    <img src="system\pp_img\default.png" width="150" >
<?php
    }
?>

<a href="modifier-profil.php">
<button type="button" class="btn btn-secondary">Modifier le profile</button>
</a>
<br>
<br>

<?php
    while($articles = $OneArticle->fetch()){
        ?>
            <div class="card text-center">
            <div class="card-header">
                <h2><?= $articles['titre'] ?></h2>
            </div>
            <div class="card-body">
                <h4><p class="card-text">description : <?= $articles['description']; ?></p></h4>
                <a href="modifier_article.php?id=<?php echo $articles['id']; ?>" class="btn btn-outline-success btn-sm" >Modifier l'article</a>
                <a href="voir_article.php?id=<?php echo $articles['id']; ?>" class="btn btn-outline-primary btn-sm" >Voir l'article</a>
                <a href="profil.php?id=<?php echo $articles['id']; ?>" class="btn btn-outline-danger btn-sm" >supprimer l'article</a>
            </div>
            <div class="card-footer text-muted">
                <h7><?= $articles['date_publication'] ?> by <?= $articles['pseudo_auteur'] ?> </h7>
            </div>
            </div>
            <br><br>
        <?php
    }
    ?>
</body>





