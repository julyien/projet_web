<?php

function disconnect(){
    session_start();
    session_destroy();
    header('location:Authentification.php');
    exit;
}

disconnect();

?>
