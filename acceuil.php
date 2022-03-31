<?php
  session_start(); 
  include('connexionDB.php'); 

  if (isset($_SESSION['id_profil'])) {
        $getid = intval($_SESSION['id_profil']);
        
        $req = $DB->query("SELECT * FROM profil INNER JOIN centre_formation ON profil.id_centre = centre_formation.id_centre WHERE id_profil = ? ", array($getid));
        $row = $req->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> JVPN </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="projet.css" rel="stylesheet" type="text/css">
    <link rel="manifest" href="manifest.json">
    <script>
        //if browser support service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js');
        };
    </script>
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
                    <input class="form-control" type="text" name="nom_offre" placeholder="Search Offre" aria-label="Search">
                </form>
                <form action="search.php" method="POST">
                    <input class="form-control" type="text" name="nom_entreprise" placeholder="Search Entreprise" aria-label="Search">
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
    <br><br><br><br>
    <div class="d">
        <h1>Bienvenue <?php echo $row['prenom_profil']; ?></h1>
    </div>
    <br><br><br>
    <div class="d">
    <img src="logo.png" alt="logo" width="400">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>