<?php
    session_start();
    require_once 'inc\navbar_home.php';
    // require_once 'inc\header.php';
?>


<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ----------> 
</head>

<body>
    <?php
      if(isset($_SESSION['ID_users'])){
        echo "Bonjour" . $_SESSION['username'];
      }else{
    
    ?>
    <br> <br>
    <h1>hello word!</h1>

    <?php
      }
    ?>
</body>