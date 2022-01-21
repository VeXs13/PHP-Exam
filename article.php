
<?php
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar-acceuil.php';

if (!isset($_SESSION['ID_users'])){
    header('Location: index.php');
    exit;
}
?>

<form class="container" method="PO ST">

<?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){ 
                echo '<p>'.$successMsg.'</p>'; 
            }
        ?>
        
<div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description de la question</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
</form>
<a class="nav-link active " href="index.php">retour </a>

<?php

if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        
        //Les données de la question
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['ID_users'];

        //Insérer la question sur la question
        $insertQuestionOnWebsite = $BDD->prepare("INSERT INTO questions(titre, description, contenu, id_auteur, date_publication)VALUES(?, ?, ?, ?, ?)");
        $insertQuestionOnWebsite->execute(
            array(
                $question_title, 
                $question_description, 
                $question_content, 
                $question_id_author,
                $question_date
            )
        );
        
        $successMsg = "Votre question a bien été publiée sur le site";
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}








?>

<?php
require_once 'inc\footer.php';
?>