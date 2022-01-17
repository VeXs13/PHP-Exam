<?php
// require_once 'inc/header.php';
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar-acceuil.php';


if(!empty($_SESSION['ID_users'])){
  $user_id = (int) $_SESSION['ID_users']; 
  $req = $BDD->prepare("SELECT Username from users WHERE ID_users = ?");
  $req->execute(array($user_id));
  $show_user = $req->fetch();

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
