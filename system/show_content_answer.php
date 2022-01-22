<?php
include_once('db\connexionDB.php');

    $getAnswers = $BDD->prepare('SELECT answer_ID, users_ID, answer_username, articles_ID, answer_content FROM answer WHERE articles_ID = ? ORDER BY answer_ID DESC');
    $getAnswers->execute(array($getId));


?>