<?php

session_start();

//destroys all the variables of the current session.
unset($_SESSION['ID_users']);
unset($_SESSION["mail"]);

session_destroy();//close the session

header('Location: /PHP-Exam/');
exit;

?>