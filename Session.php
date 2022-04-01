<?php

session_start();

if(!isset($_SESSION['id_profil'])){ 
    header('Location: Authentification.php'); 
    exit; 
  }

  ?>