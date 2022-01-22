<?php
// require_once 'inc/header.php';
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



<h3> 
<?php

  if(isset($_SESSION['ID_users'])){
    echo "Bienvenue " . $show_user['Username'];
  }else{

?>
</h3>

<div class="container">
  <h3>voici notre forum</h3>
  <p>foncez vous connecter pour le tester !!!</p>
</div>

<?php
  }
?>

<?php
    while($a = $getarticles->fetch()){ 
?>

<div class="card text-center">
  <div class="card-header">
    <?= $a['pseudo_auteur'] ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $a['titre'] ?></h5>
    <p class="card-text"><?= $a['description'] ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
      <?= $a['date_publication'] ?>
  </div>
</div>

<?php
    }
?>




<?php
?>
