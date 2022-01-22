<?php
session_start();
include_once('db\connexionDB.php');
require_once 'inc\navbar_home.php';
require_once 'system\get_single_article.php';
require_once 'system\get_answer.php';
require_once 'system\show_content_answer.php';

if (!isset($_SESSION['ID_users'])){
    header('Location: index.php');
    exit;
}

?>
<body>
<div class="container">
        <?php
            if (isset($date)) {
                ?>

                <section class="show-content">
                    <h3>Title : <?= $titre;?></h3>
                    <hr>
                    <p>description : <?= $descript;?></p>
                    <hr>
                    <p>content : <?= $content;?></p>
                    <hr>
                    <small>username : <a href="profil.php?ID=<?= $id_users;?>"><?= $users;?></a>  <br> date Publication : <?= $date;?></small>
                </section>
                <br><br>
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
                                    <a href="profil.php?ID=<?= $response['users_ID'];?>"><?= $response['answer_username'];?></a>
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