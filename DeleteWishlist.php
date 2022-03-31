<?php
        session_start();
        include('connexionDB.php'); 

        $getidprofil = intval($_SESSION['id_profil']);
        $getidoffre = intval($_SESSION['id_offre']);


        $req = $DB->query("DELETE FROM wishlist WHERE id_offre = ? AND id_profil = ?", array($getidoffre, $getidprofil));
 
        ?>



