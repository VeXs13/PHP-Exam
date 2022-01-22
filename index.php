<?php
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar_home.php';
require_once 'system\get_all_articles.php';


// if(!empty($_SESSION['ID_users'])){
//   $user_id = (int) $_SESSION['ID_users']; 
//   $req = $BDD->prepare("SELECT Username from users WHERE ID_users = ?");
//   $req->execute(array($user_id));
//   $show_user = $req->fetch();
// }
?>


<br>
<h3> 
<?php

  // if(isset($_SESSION['ID_users'])){
  //   echo "Bienvenue " . $show_user['Username'];
  //   $getarticles = $BDD->query('SELECT * FROM articles ORDER BY id DESC ');
  //   while($a = $getarticles->fetch()){ 

?>

<?php
        while($articles = $allArticles->fetch()){
            ?>
                <div class="container">
                    <div class="card">
                        <div class="card-title bg-info">
                            <a href="voir_article.php?id=<?php echo $articles['id']; ?>">
                                <?= $articles['titre']; ?>
                            </a>

                        </div>
                        <div class="card-header">
                            description : <?= $articles['description']; ?>
                        </div>
                        <div class="card-body">
                        <?= $articles['contenu']; ?>
                        </div>
                        <div class="card-footer">
                            Published by <a href="profil.php?ID=<?= $articles['id_auteur'];?>"><?= $articles['pseudo_auteur']; ?></a> at <?= $articles['date_publication']; ?>
                        </div>
                    </div>
                </div>
                <br>
            <?php
        }

    ?>



























