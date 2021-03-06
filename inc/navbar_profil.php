<?php

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  </head>
<body>

<!-- <title>Home</title> -->
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Forum | Ynov</a>
    <?php
        if(isset($_SESSION['ID_users'])){
    ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <?php
        }
    ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
            </li> 

            <?php
                if(isset($_SESSION['ID_users'])){
            ?>
                <li class="nav-item active" >
                    <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModal">Profil<span class="sr-only"></span></a>
                </li>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Options</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <li><a href="profil.php">Mon Profil</a></li>
                            <br>
                            <li><a href="modifier-profil.php">Editer mon profil</a></li>
                            <br>
                            <li><a href="logout.php">Log out</a></li>
                            </div>
                        </div>
                    </div>
                </div>

 

                <!-- cree un article -->
            <li class="nav-item active">
                <a class="nav-link" href="article.php">Cr??e un article <span class="sr-only"></span></a>
            </li>

                <!-- article Favorie -->
            <li class=" nav-item active ">
                <a class="nav-link" href="#">Article Favorie<span class="sr-only"></span></a>
            </li>
            <?php
                }else{
            ?>
                <!-- s'inscrire -->
                <li class="nav-item active">
                    <a class="nav-link" href="register.php">Sign Up <span class="sr-only"></span></a>
                </li>
                <!-- se connecter -->
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">login <span class="sr-only"></span></a>
                </li>                

            <?php 
                }
            ?>
            </ul>

        </div>
</nav>
<!-- <script src="https://kit.fontawesome.com/507d7f49f0.js" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>