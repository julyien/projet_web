<?php

session_start();
$dbh = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');


if ( !empty($_POST)) {
   

$Pseudo= $_POST['identifiant_profil'];
$MDP= $_POST['password_profil'];
$x=0;



foreach($dbh->query('SELECT * from profil') as $row){

    if ($Pseudo == $row['identifiant_profil'] && $MDP == $row['password_profil']){
        $_SESSION['identifiant_profil'] = $Pseudo['identifiant_profil'];
         header('location:acceuil.php');
         exit;
    }

    else{
        echo 'Identifiant ou mot de passe incorrect.';
    }
        
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="projet.css" rel="Stylesheet" type="text/css"/>
</head>
<body>
    <div class="topnav">
        <a><img src="logo.png" width="45px"/></a>
        <a>
            <input type="text" name="text" class="search" placeholder="Recherchez ici!">
            <input type="submit" name="submit" class="submit" value="Search">
        </a>
        <a href="#Acceuil">Accueil</a>
        <a href="#Stages">Stages</a>
        <a href="ListeDeSouhait.php">Souhaits</a>
        <a href="Gestion_entreprise.php">Gestion</a>
        <a href="notification.php">Notifications</a>
        <a href="#Messagerie">Messagerie</a>
        <a href="profil.php">Profil</a>
        <div class=a>
        <a href="logout.php">Se deconnecter</a>
    </div>
    </div>
    <br>
    <div class="d">
        <h2>Bienvenue</h2>
    </div>
    <br>
    <div class="c col-6 mx-auto">
        <div class="brd">
            <div class="a"><button type="button">Favoris</button></div>
            <pre>Offre de Stages :</pre>
            <pre>Nom entreprise</pre>
            <pre>Nom du poste</pre>
            <pre>Localisation</pre>
            <div class="a">
                <button type="button">Postuler</button> <button type="button">En savoir plus</button>
            </div>
        </div>
    </div>
    <br>
    <div class="c col-6 mx-auto">
        <div class="brd">
            <div class="a"><button type="button">Favoris</button></div>
            <pre>Offre de Stages :</pre>
            <pre>Nom entreprise</pre>
            <pre>Nom du poste</pre>
            <pre>Localisation</pre>
            <div class="a">
                <button type="button">Postuler</button> <button type="button">En savoir plus</button>
            </div>
        </div>
    </div>
</body>
</html>