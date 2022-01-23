<?php
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar_profil.php';
require_once 'system\get_single_article.php';
require_once 'system\get_answer.php';
require_once 'system\show_content_answer.php';

if (!isset($_SESSION['ID_users'])){
    header('Location: index.php');
    exit;
}

?>
<body>
<a class="nav-link active " href="index.php">retour </a>
<div class="container">
        <?php
            if (isset($date)) {
                ?>
                <br>
                <div class="card text-center">
                    <div class="card-header">
                        <h3><?= $titre;?></h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><description : <?= $descript;?>></h5>
                        <p class="card-text"><?= $content;?></p>
                    </div>
                    <div class="card-footer text-muted">
                    <small>Posté par <?= $users;?> le <?= $date;?></small>
                    </div>
                </div>
                <br>
                <!-- text area -->
                <section class="show-answers">
                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Answer : </label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-success" type="submit" name="validate">Publish a Answer</button>
                        </div>
                    </form>
                    <?php
                        while($response = $getAnswers->fetch()){ //print the awnser
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                    <a><?= $response['answer_username'];?></a>
                                    </div>
                                    <div class="card-body">
                                        <?= $response['answer_content']; ?>
                                    </div>
                                </div>
                                <br>
                            <?php
                        }

                    ?>
                </section>
                <?php
            }
        ?>

    </div>
    
</body>