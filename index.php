<?php
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar_home.php';


if(!empty($_SESSION['ID_users'])){
  $user_id = (int) $_SESSION['ID_users']; 
  $req = $BDD->prepare("SELECT Username from users WHERE ID_users = ?");
  $req->execute(array($user_id));
  $show_user = $req->fetch();


  $getarticles = $BDD->query('SELECT * FROM articles ORDER BY id DESC ');


}
?>


<br>
<h3> 
<?php

  if(isset($_SESSION['ID_users'])){
    echo "Bienvenue " . $show_user['Username'];
    $getarticles = $BDD->query('SELECT * FROM articles ORDER BY id DESC ');
    while($a = $getarticles->fetch()){ 

?>

<div class="card text-center">
  <div class="card-header">
  auteur : <?= $a['pseudo_auteur'] ?>
  </div>
  <div class="card-body">
    <h2 class="card-title"><?= $a['titre'] ?></h2>
    <h5><p class="card-text"><?= $a['description'] ?></p></h5>
    <a href="#" class="btn btn-outline-primary btn-sm">Voir l'article</a>
  </div>
  <div class="card-footer text-muted">
      <h6><?= $a['date_publication'] ?></h6>
  </div>
</div>

  <?php
  }}else{

?>
</h3>


<div class="container">
  <h3>voici notre forum</h3>
  <p>foncez vous connecter pour le tester !!!</p>
</div>

<?php
  }
?>