<?php
    include_once('db\connexionDB.php');// rappel le fichier de connexion à la db
    require_once 'inc/header.php';

    print_r($_POST); //permet d'afficher une varible archi utile pour voir c requet post sous forme de tab.
    
    if(!empty($_POST)){
        extract($_POST); //permet d'extraire les valeurs de $_POST post du tableau.
        $valid = (boolean) true;

        if(isset($_POST['register'])){ // isset Détermine si une variable est considérée comme définie, c'est-à-dire si une variable est déclarée et est différente de null.
            // echo 'ok';
            $username = (String) trim($username);
            $email = (String) trim($email);
            $password = (String) trim($password);

            if(empty($username)){
                $valid = false;
                $err_username = "veuillez renseignez ce champs !";
            }

            if(empty($email)){
                $valid = false;
                $err_email = "veuillez renseignez ce champs !";
            }


            if(empty($password)){
                $valid = false;
                $err_password = "veuillez renseignez ce champs !";
            }

            if($valid){
                // $date_inscription = date("Y-m-d");

                $req = $BDD->prepare("INSERT INTO users (Username, Password, mail) VALUES (?, ?, ?)");
                
                $req->execute(array($username,$password, $email));
            }


        }
    }

?>

<header>
    <form method="post">
    <div class="mb-3">
        <?php
            if(isset($err_username)){
                echo $err_username;
            }
        ?>
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="mb-3">
        <?php
            if(isset($err_email)){
                echo $err_email;
            }
        ?>
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" >
    </div>
    <div class="mb-3">
     <?php
            if(isset($err_password)){
                echo $err_password;
            }
        ?>
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <!-- sert à rien pour le moment -->
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <input type="submit" name="register" value="s'inscrire" class="btn btn-primary"></input>
    </form>
</header>