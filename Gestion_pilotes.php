<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="projet.css" rel="Stylesheet" type="text/css"/>
    <link rel="manifest" href="manifest.json">
    <script>
        //if browser support service worker
        if('serviceWorker' in navigator) {
          navigator.serviceWorker.register('sw.js');
        };
      </script>
</head>
<body>
<?php


$server = "localhost";
$username = "root";
$password = "";
$dbname = "projetweb";
  
  $conn = mysqli_connect($server,$username,$password,$dbname);

            
        $sql = "SELECT * FROM profil";
        $result = mysqli_query($conn,$sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='profil-box'>
                </div>";
            }
        }
 

?>
    <nav class="navbar navbar-expand navbar-dark topnav">
        <div class="container-fluid">
            <a class="active"><img src="logo.png" width="45"></a>
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
                        <a class="nav-link" href="/Gestion_offre.php">Gestion</a>
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
    <div class="row">
    <div class="a col-3">
    <div class="couleur">
    <pre><button><a href="Gestion_entreprise.php"   style="text-decoration:none">Gestion des entreprises</a></button></pre>
    <pre><button><a href="Gestion_offre.php"        style="text-decoration:none">Gestion des offres     </a></button></pre>
    <pre><button><a href="Gestion_etudiants.php"    style="text-decoration:none">Gestion des étudiants  </a></button></pre>
    <pre><button><a href="Gestion_pilotes.php"      style="text-decoration:none">Gestion des pilotes    </a></button></pre>
    </div>
    </div>
    <div class="c col-6">
            <br>
            <pre>Créer un pilote       <a type="button" href="CreatePilote.php">Créer</a></pre>
            <pre>Supprimer un pilote   <a type="button" href="Delete.php">Supprimer</a></pre>
            <pre>Modifier un pilote    <a type="button" href="Update.php">Modifier</a></pre>
            <br>
        </div>
    </div>
    </div>
</body>
</html>