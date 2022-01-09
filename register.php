<?php
    include_once('db\connexionDB.php');//recall the connection file to the db
    require_once 'inc/header.php';

    print_r($_POST); //allows to display an archi variable useful to see this post request in tab form


    
    if(!empty($_POST)){
        extract($_POST); //allows to extract the values ​​of $ _POST post from the array
        $valid = (boolean) true;

        if(isset($_POST['register'])){ // isset Determines whether a variable is considered defined, that is, whether a variable is declared and is other than null.
            $username = (String) trim($username);
            $email = (String) strtolower(trim($email));
            $password = (String) trim($password);

            //username form verification
            if(empty($username)){
                $valid = false;
                $err_username = "veuillez renseignez ce champs !";
            }else{
                //unique nickname verification
                $req = $BDD->prepare("SELECT ID_users from users WHERE Username =?");
                $req->execute(array($username));
                $user = $req->fetch(); //fetch() method which allows a sequential reading of the result

                if(isset($user['ID_users'])){
                    $valid = false;
                    $err_username = "Ce pseudo existe déjà ! ";
                }

                // //valid pseudo address verification
                // if(preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $_POST['username'])){
                //     echo 'ok';
                //     $valid = false;
                // }else{
                //     $valid = false;
                //     echo 'pas ok';
                //     $err_username ='Pseudo incorrecte';
                // }
  
            }

            //email form verification
            if(empty($email)){
                $valid = false;
                $err_email = "veuillez renseignez ce champs !";
            }else{
                //unique mail verification
                $req = $BDD->prepare("SELECT ID_users from users WHERE mail =?");
                $req->execute(array($email));
                $user = $req->fetch(); //fetch() method which allows a sequential reading of the result

                if(isset($user['ID_users'])){
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

            if($valid){
                $date_inscription = date("Y-m-d"); //get the registration date, servira pour plus tard

                //B_crypt use
                $hash = password_hash($password, PASSWORD_BCRYPT);

                //password check
                if (password_verify($password, $hash)){
                    $PW_verify = "mot de passe correct";
                }else{
                    $PW_verify = "mot de passe incorrect";
                }

                $req = $BDD->prepare("INSERT INTO users (Username, Password, mail) VALUES (?, ?, ?)"); //inject form in DB
                
                $req->execute(array($username,$hash,$email));

                header('Location: /PHP-Exam/'); //redirection after registration
                exit;
            }


        }
    }

?>

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
    <input type="submit" name="register" value="s'inscrire" class="btn btn-primary"></input>
    </form>
</header>









