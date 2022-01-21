
<?php

    session_start();

    include_once('db\connexionDB.php');
    require_once 'inc\navbar-acceuil.php';

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

?>
<title>Profil de <?= $show_user['Username'] ?> </title>

<h3> profil de : <?=$show_user['Username']?> </h3>

<h4> information : </h4>

<li> pseudo : <?= $show_user['Username'] ?> </li>
<li> email : <?= $show_user['mail'] ?> </li>


<a class="nav-link active " href="index.php">retour </a>

