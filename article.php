<?php
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar_home.php';

if (!isset($_SESSION['ID_users'])){
    header('Location: index.php');
    exit;
}

if(isset($_POST['validate'])){
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        $valid = (boolean) true;
        $title = htmlspecialchars($_POST['title']);
        $descriptions = nl2br(htmlspecialchars($_POST['description']));
        $contenu = nl2br(htmlspecialchars($_POST['content']));
        $date = date("d/m/Y H:i");
        $id_user = $_SESSION["ID_users"];
        $pseudo = $_SESSION['Username'];

        $insertArticles = $BDD->prepare("INSERT INTO articles(titre, description, contenu, id_auteur, pseudo_auteur, date_publication)VALUES(?, ?, ?, ?, ?, ?)");
        $insertArticles->execute(array($title, $descriptions, $contenu, $id_user, $pseudo, $date));

        if($valid){
            $succes = "<script>alert('your article is now published !')</script>";
        }

    } else {
        $errorMsg = "<script>alert('Please complete all fields...')</script>";
    }


}

?>
<br>
<h1>Creation d'un article</h1> <br>
<form class="container" method="post">

<?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){ 
                echo '<p>'.$successMsg.'</p>'; 
            }
        ?>
        
<div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de l'article</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description de l'article</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de l'article</label>
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Publier l'article <?php if(isset($succes)){ echo $succes;} ?> </button>
</form>
<a class="nav-link active " href="index.php">retour </a>

<?php
require_once 'inc\footer.php';
?>