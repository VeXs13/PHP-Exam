<?php
// require_once 'inc/header.php';
  session_start();
  require_once 'inc\navbar-acceuil.php';
?>


<?php 
  if(isset($_SESSION['ID_users'])){
    echo "Bonjour " . $_SESSION['mail'];
  }else{
?>


<div class="container">
  <h3>voici notre forum</h3>
  <p>ceci est la page d'acceuil</p>
</div>

<?php
  }
?>


<?php 
  

  $pass = "test1234";
  $pass1 = "test1234";
  $pass2 = "test1234";

  $hash = password_hash($pass, PASSWORD_BCRYPT);
  $hash1 = password_hash($pass1, PASSWORD_BCRYPT);
  $hash2 = password_hash($pass2, PASSWORD_BCRYPT)
 ?>

 <br>

 <?php
  echo $hash;

 ?>
 <br>
 <?php 
  echo $hash1;
 ?>
 <br>
<?php

if (password_verify($pass, $hash1)){
  $PW_verify = "mot de passe correct";
  echo $PW_verify;
}else{
  $PW_verify = "mot de passe incorrect";
  echo $PW_verify;
}
?>
<br>
<?php

if (password_verify($pass1, $hash)){
  $PW_verify = "mot de passe correct";
  echo $PW_verify;
}else{
  $PW_verify = "mot de passe incorrect";
  echo $PW_verify;
}
?>
<br>
<?php

if($hash == $hash1){
  echo "ok";
}else{
  echo "pas ok";
}

?>

<?php

$t = 1;
if( $t==1 ){
    echo "ta mere";
}


?>
