<a class="nav-link active " href="index.php">retour </a>
<?php
    session_start();
    include_once('db\connexionDB.php');//recall the connection file to the db
    require_once 'inc/header.php';

    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        //on recupere les champs

        $email = (String) htmlspecialchars(strtolower(trim($_POST['email'])));
        $password = (String) htmlspecialchars(trim($_POST['password']));
        
        //on check si le username existe dans la database
        $checkUserExist = $BDD->prepare('SELECT * FROM users WHERE mail = ?');
        $checkUserExist->execute(array($email));

        //si le username existe on continue le programme sinon on renvoie une erreur disant que le username n'existe pas
        if($checkUserExist->rowCount() > 0){

            //on recup les infos du user 
            $verif_user = $checkUserExist->fetch();
            //on verifie si le mdp donner et mdp de la database sont pareil
            if(password_verify($password, $verif_user['Password'])) {
                //on transfert les infos dans une session
                $_SESSION['ID_users'] = $verif_user["ID_users"];
                $_SESSION['mail'] = $verif_user['mail'];
                //on redirige vers le home
                header('Location: /PHP-Exam');

            } else {
                $err_password = "Mot de Passe Incorrect";
            }

        } else {
            $err_email = "adresse mail incorrect";
        }
       
        
    } elseif (empty($_POST['email'])) {
        $err_email = "veuillez completer ce champs !";
    }elseif(empty($_POST['password'])){
        $err_password = "veuillez completer ce champs !";
    }
?>
<h1> Se connecter ! </h1>
<header>
    <form method="post">

    <!-- email form    -->
    <div class="mb-3">
        <?php
            if(isset($err_email)){
                echo $err_email;
            }
        ?>
        <input type="email" name="email" placeholder="email" class="form-control" id="exampleInputEmail1">
    </div>
    <!-- password form -->
    <div class="mb-3">
        <?php
        if(isset($err_password)){
            echo $err_password;
        }
        // if(isset($PW_verify)){
        //     echo $PW_verify;
        // }
        ?>
        <input type="password" name="password"  placeholder="password" class="form-control" id="exampleInputPassword1">
    </div>

    <!-- sert à rien pour le moment -->
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <input type="submit" name="login" value="se connecter" class="btn btn-primary"></input>
    </form>
</header>

