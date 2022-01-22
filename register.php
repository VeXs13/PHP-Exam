<a class="nav-link active " href="index.php">retour </a>

<?php
    session_start();
    include_once('db\connexionDB.php');//recall the connection file to the db
    require_once 'inc/header.php';

    // print_r($_POST); //allows to display an archi variable useful to see this post request in tab form


    
    if(!empty($_POST)){
        extract($_POST); //allows to extract the values ​​of $ _POST post from the array
        $valid = (boolean) true;

        if(isset($_POST['register'])){ // isset Determines whether a variable is considered defined, that is, whether a variable is declared and is other than null.
            $username = (String) htmlspecialchars(trim($username));
            $email = (String) htmlspecialchars(strtolower(trim($email)));
            $password = (String) htmlspecialchars(trim($password));

            //username form verification
            if(empty($username)){
                $valid = false;
                $err_username = "veuillez renseignez ce champs !";
            }else{
                //unique nickname verification
                $req = $BDD->prepare("SELECT ID_users from users WHERE Username = ?");
                $req->execute(array($username));
                $verif_user = $req->fetch(); //fetch() method which allows a sequential reading of the result

                if(isset($verif_user['ID_users'])){
                    $valid = false;
                    $err_username = "<script> alert('Ce pseudo existe déjà !') </script> ";
                }
  
            }

            //email form verification
            if(empty($email)){
                $valid = false;
                $err_email = "veuillez renseignez ce champs !";
            }else{
                //unique mail verification
                $req = $BDD->prepare("SELECT ID_users from users WHERE mail =?");
                $req->execute(array($email));
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

            if(empty($password)){
                $valid = false;
                $err_password = "veuillez renseignez ce champs !";
            }

            if($_POST['password'] != $_POST['check_password'] ){
                $valid = false;
                $err_password = "les mots de passe ne correspondes pas";
            }

            if($valid){
                //B_crypt use
                $hash = password_hash($password, PASSWORD_BCRYPT);

                $req = $BDD->prepare("INSERT INTO users (Username, Password, mail) VALUES (?, ?, ?)"); //inject form in DB
                $req->execute(array($username,$hash,$email));
                $userInfos = $req->fetch();
                $_SESSION['auth'] = true;
                $_SESSION['ID_users'] = $userInfos["ID_users"];
                $_SESSION['username'] = $userInfos["username"];
                $_SESSION['mail'] = $userInfos['mail'];

                header('Location: /PHP-Exam/'); //redirection after registration
                exit;
            }


        }
    }

?>

<h1>inscription</h1>

<header>
    <form method="post">

    <!-- username form -->
    <div class="mb-3">
        <?php
            if(isset($err_username)){
                echo $err_username;
            }
        ?>
        <input type="text" name="username" placeholder="pseudo" class="form-control" value="<?php if(isset($username)){echo $username; }?>">
    </div>
    <!-- email form    -->
    <div class="mb-3">
        <?php
            if(isset($err_email)){
                echo $err_email;
            }
        ?>
        <input type="email" name="email" placeholder="email" class="form-control" id="exampleInputEmail1" value="<?php if(isset($email)){echo $email;}?>">
    </div>
    <!-- password form -->
    <div class="mb-3">
        <?php
        if(isset($err_password)){
            echo $err_password;
        }
        ?>
        <input type="password" name="password"  placeholder="password" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="mb-3">
        <?php
        if(isset($err_password)){
            echo $err_password;
        }
        ?>
        <input type="password" name="check_password"  placeholder="confirm_password" class="form-control" id="exampleInputPassword1">
    </div>

    <input type="submit" name="register" value="s'inscrire" class="btn btn-primary"></input>
    </form>
</header>