<?php


$pseu = 'L';
if(preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseu)){
    echo 'ok';
    $valid = true;
}else{
    echo 'pas ok';
    $valid = false;
    $err_username ='Pseudo incorrecte';
}
?>


<p> login </p>
