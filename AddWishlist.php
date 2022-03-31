<?php
session_start();

include('connexionDB.php'); 

$getidprofil = intval($_SESSION['id_profil']);
$getidoffre = intval($_SESSION['id_offre']);

$req = $DB->query("INSERT INTO wishlist (id_offre, id_profil) values($getidoffre, $getidprofil)");
header('Location:');

?>