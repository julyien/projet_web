<?php
  session_start(); 
  include('connexionDB.php'); 

    $getid = intval($_SESSION['id_profil']);


    $req = $DB->query("SELECT * FROM profil INNER JOIN centre_formation ON profil.id_centre = centre_formation.id_centre WHERE id_profil = ? ", array($getid));
    $row = $req->fetch();



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
    <script src="https://kit.fontawesome.com/d37d50e548.js"></script>
    <link rel="manifest" href="manifest.json">
    <script>
        //if browser support service worker
        if('serviceWorker' in navigator) {
          navigator.serviceWorker.register('sw.js');
        };
      </script>
    <title>Mon Profil</title>
</head>
<body>
<?php

            
        $sql = "SELECT * FROM profil";


?>
<div class="bg"></div>
    <nav class="navbar navbar-expand navbar-dark topnav">
        <div class="container-fluid">
            <a class="active" href="/acceuil.php"><img src="logo.png" alt="logo" width="70"></a>
            <div class="collapse navbar-collapse ms-2">
                <form action="search.php" method="POST">
                    <input class="form-control" type="text" name="identifiant_profil" placeholder="Search" aria-label="Search">
                </form>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/acceuil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stage_etudiant.php">Stages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ListeDeSouhait.php">Souhaits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/GestionOffre.php">Gestion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/notification.php">Notifications</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout.php">Se déconnecter</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="brd">
    <div class="d col-12">
        <h2>
    <i class="fa-solid fa-circle-user"></i> Bienvenue <?php echo $row['prenom_profil']; ?> !
        <h2>
    <br>
    <br>
    <br>
    <br>
    </div>
    <div class="row">
        <div class="col-4 mx-auto">
            <h3>
            <pre><i class="fa-solid fa-location-dot"></i>  Centre <?php echo $row['nom_centre']; ?></pre>
            <br>
            <pre><i class="fa-solid fa-graduation-cap"></i> Promotion <?php echo $row['promotion_profil']; ?></pre>
            <pre><i class="fa-solid fa-graduation-cap"></i> role <?php echo $row['id_role']; ?></pre>
            <br>
            <pre><i class="fa-solid fa-percent"></i>  Statistique </pre>
            </h3>
        </div>
        <div class="col-4 mx-auto">
            <h4>
            <pre><i class="fa-solid fa-file-pdf"> </i><input type="file" accept="application/pdf,application/vnd.ms-excel"> <br> Ajouter un cv</pre>
            <br>
            <br>
            <pre><i class="fa-solid fa-file-pdf"> </i><input type="file" accept="application/pdf,application/vnd.ms-excel"> <br> Ajouter une lettre de motivation</pre>
            </h4>
        </div>
    </div>
    </div>
</body>
</html>