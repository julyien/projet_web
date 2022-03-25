<?php

session_start();
$dbh = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');


$afficher_profil = $dbh->query("SELECT * 
    FROM profil
    WHERE id_profil = 10", 
  array($_SESSION['id_profil']));
  
  $afficher_profil = $afficher_profil->fetch(); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="profil.css" rel="Stylesheet" type="text/css"/>
    <script src="https://kit.fontawesome.com/d37d50e548.js" crossorigin="anonymous"></script>
    <title>Mon Profil</title>
</head>
<body>
    <div class="topnav">
        <a class="active"><img src="logo.png" width="45px"/></a>
        <a>
            <input type="text" name="text" class="search" placeholder="Recherchez ici!">
            <input type="submit" name="submit" class="submit" value="Search">
        </a>
        <a href="acceuil.php">Accueil</a>
        <a href="#Stages">Stages</a>
        <a href="ListeDeSouhait.php">Souhaits</a>
        <a href="Gestion_entreprise.php">Gestion</a>
        <a href="notification.php">Notifications</a>
        <a href="#Messagerie">Messagerie</a>
        <a href="#Profil">Profil</a>
    </div>
    <div class=a>
        <a href="logout.php">Se deconnecter</a>
    </div>
    <br>
    <br>
    <div class="d col-4">
    <i class="fa-solid fa-circle-user"></i>Bienvenue <?php echo $_SESSION['identifiant_profil']; ?> !
    <br>
    <br>
    </div>
    <div class="row">
        <div class="col-4 mx-auto">
            <pre><i class="fa-solid fa-location-dot"></i>  Centre</pre>
            <pre><i class="fa-solid fa-graduation-cap"></i> Promotion</pre>
            <pre><i class="fa-solid fa-percent"></i>  Statistique</pre>
        </div>
        <div class="col-7 mx-auto">
            <pre><i class="fa-solid fa-file-pdf"></i><input type="file" accept="application/pdf,application/vnd.ms-excel">  Ajouter un cv</td></pre>
            <pre><i class="fa-solid fa-file-pdf"></i><input type="file" accept="application/pdf,application/vnd.ms-excel">  Ajouter une lettre de motivation</td></pre>
        </div>
    </div>
</body>
</html>