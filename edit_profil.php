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

    if(!empty($_POST)){
        extract($_POST); //allows to extract the values ​​of $ _POST post from the array
        $valid = (boolean) true;

        if(isset($_POST['register'])){ // isset Determines whether a variable is considered defined, that is, whether a variable is declared and is other than null.
            $username = (String) htmlspecialchars(trim($username));
            $email = (String) htmlspecialchars(strtolower(trim($email)));

            //username form verification
            if(empty($username)){
                $valid = false;
                $err_username = "veuillez renseignez ce champs !";
            }else{
                //unique nickname verification
                $req = $BDD->prepare("SELECT ID_users from users WHERE Username = ? AND ID_users <> ?");
                $req->execute(array($username, $_SESSION['ID_users']));
                $verif_user = $req->fetch(); //fetch() method which allows a sequential reading of the result

                if(isset($verif_user['ID_users'])){
                    $valid = false;
                    $err_username = "Ce pseudo existe déjà ! ";
                }
  
            }

            //email form verification
            if(empty($email)){
                $valid = false;
                $err_email = "veuillez renseignez ce champs !";
            }else{
                //unique mail verification
                $req = $BDD->prepare("SELECT ID_users from users WHERE mail =? AND ID_users <> ?");
                $req->execute(array($email, $_SESSION['ID_users']));
                $verif_user = $req->fetch(); //fetch() method which allows a sequential reading of the result

                if(isset($verif_user['ID_users'])){
                    $valid = false;
                    $err_email = "Ce mail est déjà utilisé !";
                }

                //valid email address verification
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $valid = true;
                } else {
                    $err_email = "Veuillez rentrer une adresse mail valide";
                    $valid =false;
                }             
            }

            if($valid){

                $req = $BDD->prepare("UPDATE users SET Username = ?, mail = ? WHERE ID_users = ?"); //inject form in DB
                $req->execute(array($username,$email,$_SESSION['ID_users']));

                header('Location: /PHP-Exam/profil.php'); //redirection after registration
                exit;
  
            }


        }
    }

    
    

     





    
?>
<title>Editer mon Profil</title>

<h3> profil de : <?=$show_user['Username']?> </h3>

<form method="post">

    <div>
        <?php

            if(isset($err_username)){
                echo $err_username;
            }

            if(!isset($username)){
                $username = $show_user['Username'];

            }
        ?>
        <label> Pseudo : </label>
        <input type="text" name="username" value="<?= $username ?>">
    </div>

    <div>
        <?php
            if(isset($err_username)){
                echo $err_email;
            }

            if(!isset($email)){
               $email = $show_user['mail'];

            }
        ?>
        <label> email : </label>
        <input type="text" name="email" value="<?= $email ?>">
    </div>

    <input type="submit" name="modifier" value="modifier">

</form>

