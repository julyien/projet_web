<?php                                                                                                //Ce script permet d'ajouter une offre a la liste de souhait
session_start();

if(!isset($_SESSION['id_profil'])){ 
    header('Location: Authentification.php'); 
    exit; 
  }

include('connexionDB.php'); 

$getidprofil = intval($_SESSION['id_profil']);
$getidoffre = intval($_SESSION['id_offre']);

$req = $DB->query("INSERT INTO wishlist (id_offre, id_profil) values($getidoffre, $getidprofil)"); //Requete SQL qui ajoute a id_profil et id_offre les valeurs de getidoffre getidprofil 
header('Location: stage_etudiant.php');

?>