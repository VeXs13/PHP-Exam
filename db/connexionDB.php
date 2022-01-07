<?php
    //-> methode de connexion plus simple
    // $BDD = new PDO("mysql:dbname=php_exam_db; host=localhost", "root", "");
    
    // création d'une class
    class connexionDB {
        private $host   = 'localhost'; //nom de l'host
        private $name   = 'php_exam_db'; //nom de la bdd
        private $user   = 'root'; //users  
        private $pass   = ''; //mdp
        private $connexion;

        //constructeur qui test de se connecter à la bdd
        function __construct($host = null, $name = null, $user = null, $pass = null){
            if($host != null){
                $this->host = $host;
                $this->name = $name;
                $this->user = $user;
                $this->pass = $pass;
            }
            try {
                $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
                $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8MB4',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            }catch (PDOException $e){
                echo 'Erreur : impossible de se connecter à la BDD ! ';
                die();
            }
        }

        //fonction qui charge la connection du constructeur 
        public function connexion(){
            return $this->connexion; //renvoi le lien vers la connexion permet de faire les requets sql.
        }

    }

    $DB = new connexionDB; // var general qui peut appele plusieurs méthode.
    $BDD = $DB->connexion(); // var de connection à la bdd.
?>