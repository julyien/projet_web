<?php
   include('Session.php'); 
  include('connexionDB.php'); 
 

    $getid = $_GET['id_profil'];


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
    <title>Mon Profil</title>
</head>
<body>
<div class="bg"></div>
<nav class="navbar navbar-expand-md navbar-dark topnav">
        <div class="container-fluid">
            <a class="active" href="/acceuil.php"><img src="logo.png" alt="logo" width="70"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <form action="search.php" method="POST">
                    <input class="form-control" type="text" name="identifiant_profil" placeholder="Search Profil" aria-label="Search">
                </form>
                <form action="search.php" method="POST">
                    <input class="form-control" type="text" name="nom_offre" placeholder="Search Offers" aria-label="Search">
                </form>
                <form action="search.php" method="POST">
                    <input class="form-control" type="text" name="nom_entreprise" placeholder="Search Compagnies" aria-label="Search">
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
    <div class="brd">
    <div class="d col-12">
    <i class="fa-solid fa-circle-user"></i><?php echo $row['prenom_profil']; ?> !
    <br>
    <br>
    </div>
    <div class="row">
        <div class="col-4 mx-auto">
            <pre><i class="fa-solid fa-location-dot"></i>  Centre <?php echo $row['nom_centre']; ?></pre>
            <pre><i class="fa-solid fa-graduation-cap"></i> Promotion <?php echo $row['promotion_profil']; ?></pre>
            <pre><i class="fa-solid fa-percent"></i>  Statistique </pre>
        </div>
        <div class="col-7 mx-auto">
            <pre><i class="fa-solid fa-file-pdf"></i><input type="file" accept="application/pdf,application/vnd.ms-excel">  Ajouter un cv</pre>
            <pre><i class="fa-solid fa-file-pdf"></i><input type="file" accept="application/pdf,application/vnd.ms-excel">  Ajouter une lettre de motivation</pre>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>