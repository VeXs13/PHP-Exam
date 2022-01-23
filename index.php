<?php
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar_home.php';
require_once 'system\get_all_articles.php';

?>

<?php
if (isset($_SESSION['ID_users'])){

?>
<h1> Bienvenue <?=$_SESSION['Username']; ?></h1>
<br>
<?php
    while($articles = $allArticles->fetch()){
?>
    <div class="card text-center">
    <div class="card-header">
        <h2><?= $articles['titre'] ?></h2>
    </div>
    <div class="card-body">
        <h4><p class="card-text">description : <?= $articles['description']; ?></p></h4>
        <a href="voir_article.php?id=<?php echo $articles['id']; ?>" class="btn btn-outline-primary btn-sm" >Voir l'article</a>
    </div>
    <div class="card-footer text-muted">
        <h7><?= $articles['date_publication'] ?> by <?= $articles['pseudo_auteur'] ?> </h7>
    </div>
    </div>
    <br><br>

<?php
    }}else{
?>
    <div class="container">
        <h3>voici notre forum</h3>
        <p>foncez vous connecter pour le tester !!!</p> 
    </div>

<?php
    }
?>





























