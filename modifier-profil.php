<a class="nav-link active " href="index.php">retour </a>
<?php
    session_start()
    ;

    include_once('db\connexionDB.php');
 
    if (!isset($_SESSION['ID_users'])){
        header('Location: index.php');
        exit;
    }
 
    // On récupère les informations de l'utilisateur connecté
    $afficher_profil = $BDD->prepare("SELECT * FROM users WHERE ID_users = ?");
    $afficher_profil->execute(array($_SESSION['ID_users']));
    $afficher_profil = $afficher_profil->fetch();

    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['modification'])){
            $pseudo = htmlentities(trim($pseudo));
            $mail = htmlentities(strtolower(trim($mail)));
            $password = htmlentities(trim($password));
 
            if(empty($pseudo)){
                $valid = false;
                $err_pseudo = "Il faut mettre un pseudo";
            }else{
                $req_pseudo = $BDD->prepare("SELECT Username FROM users WHERE Username = ?");
                $req_pseudo->execute(array($pseudo));
                $req_pseudo = $req_pseudo->fetch();
 
                if ($req_pseudo['Username'] <> "" && $_SESSION['Username'] != $req_pseudo['Username']){
                    $valid = false;
                    $err_pseudo = "Ce pseudo existe déjà";
                }
            }

            if(empty($mail)){
                $valid = false;
                $er_mail = "Il faut mettre un mail";
 
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                $valid = false;
                $er_mail = "Le mail n'est pas valide";
 
            }else{
                $req_mail = $BDD->prepare("SELECT mail FROM users WHERE mail = ?");
                $req_mail->execute(array($mail));
                $req_mail = $req_mail->fetch();
 
                if ($req_mail['mail'] <> "" && $_SESSION['mail'] != $req_mail['mail']){
                    $valid = false;
                    $er_mail = "Ce mail existe déjà";
                }
            }

            if(empty($password)){
                $valid = false;
                $err_password = "Veuillez comfirmer votre mot de passe !";
            }

            if($_POST['password'] != $_POST['check_password'] ){
                $valid = false;
                $err_password = "les mots de passe ne correspondes pas";
            }


 
            if ($valid){

                $hash = password_hash($password, PASSWORD_BCRYPT);
 
                $req = $BDD->prepare("UPDATE users SET username = ?, mail = ?, Password = ? WHERE ID_users = ?");
                $req->execute(array($pseudo,$mail, $hash, $_SESSION['ID_users']));

                $_SESSION['username'] = $pseudo;
                $_SESSION['mail'] = $mail;
                $_SESSION['Password'] = $hash;
 
                header('Location:  profil.php');
                exit;
            }   
        }
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modifier votre profil</title>
    </head>
    <body>      
        <h1>Modifier son profil</h1>
        <form method="post">
            <?php
                if(isset($err_pseudo)){
                    echo $err_pseudo;
                }
            ?>
            <br>
            <input type="text" placeholder="Votre pseudo" name="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; }else{ echo $afficher_profil['Username'];}?>">
            <?php
                if(isset($er_mail)){
                    echo $er_mail;
                }
            ?>   
            <br>
            <input type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }else{ echo $afficher_profil['mail'];}?>">

            <?php
                if(isset($err_password)){
                    echo $err_password;
                }
            ?>   
            <br>
            <input type="password" placeholder="password" name="password" value="">
            <input type="password" placeholder="confirm_password" name="check_password" value="">


            <button type="submit" name="modification">Modifier</button>
        </form>
    </body>
</html>


