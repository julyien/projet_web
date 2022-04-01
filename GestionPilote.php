<?php
include('Session.php'); 

$getid = intval($_SESSION['id_role']);

// do check
if ($_SESSION ["id_role"]!=3) {
    header("location: error.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des pilotes</title>
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
    <br>
    <br>
    <div class="row">
    <div class="a col-3">
    <div class="couleur">
    <pre><a class="CouleurLien"  href="GestionEntreprise.php"   style="text-decoration:none">Gestion des entreprises</a></pre>
    <pre><a class="CouleurLien"  href="GestionOffre.php"        style="text-decoration:none">    Gestion des offres    </a></pre>
    <pre><a class="CouleurLien"  href="GestionEtudiant.php"    style="text-decoration:none"> Gestion des étudiants <a></pre>
    <pre><a class="CouleurLien"  href="GestionPilote.php"      style="text-decoration:none">   Gestion des pilotes    </a></pre>
    </div>
    </div>
    <div class="c col-6">
            <br>
            <pre>Créer un pilote       <a  class="CouleurLien"  href="CreatePilote.php">   Créer     </a></pre>
            <pre>Supprimer un pilote   <a  class="CouleurLien"  href="DeletePilote.php"> Supprimer</a></pre>
            <pre>Modifier un pilote    <a  class="CouleurLien"  href="UpdatePilote.php"> Modifier  </a></pre>
        </div>
    </div>
    <?php 
    if (array_key_exists("error",$_GET)){ 
        switch ($_GET['error']){
            case 'update':
                echo '<div> <span class="text-danger">Impossible de modifier cet identifiant</span></div>';
                break;
            case 'delete':
                echo '<div> <span class="text-danger">Impossible de supprimer cet identifiant</span></div>';
                break;
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>