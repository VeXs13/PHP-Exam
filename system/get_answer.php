<?php

include_once('db\connexionDB.php');
    if (isset($_POST['validate'])) {
        if (!empty($_POST['answer'])) {
            $answer = nl2br(htmlspecialchars($_POST['answer'])); //nl2br compte les saut de ligne comme un br

            $insertToData = $BDD->prepare('INSERT INTO answer(users_ID, answer_username, articles_ID, answer_content)VALUES(?, ?, ?, ?)');
            $insertToData->execute(array($_SESSION['ID_users'], $_SESSION['Username'], $getId, $answer));
        }
    }



?>