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
    <nav class="navbar navbar-expand navbar-dark topnav">
        <div class="container-fluid">
            <a class="active"><img src="logo.png" width="45"></a>
            <div class="collapse navbar-collapse ms-2">
                <form action="search.php" method="POST">
                    <input class="form-control" type="text" name="identifiant_profil" placeholder="Search" aria-label="Search">
                </form>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Acceuil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Stages">Stages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Souhaits">Souhaits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Gestion_offre.php">Gestion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Notifications">Notifications</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#Profil">Profil</a>
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
    <img src="logo.png" width="400px">
    </div>
</body>

</html>