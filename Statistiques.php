<?php
  session_start(); 
  include('connexionDB.php'); 

    $getid = $_GET['id_entreprise'];


    $req = $DB->query("SELECT * FROM offre INNER JOIN entreprise ON offre.id_entreprise = entreprise.id_entreprise WHERE id_profil = ? ", array($getid));
    $row = $req->fetch();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="projet.css" rel="Stylesheet" type="text/css" />
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
    <div class="center">
        <h2> Statistiques : </h2>
    </div>
    <br>
    <br>
    <br>
    <br>
    
 <?php // A modifier quand bouton de stag config

include('connexionDB.php');
require_once('connexionDB.php');

foreach ($DB->query('SELECT * FROM offre') as $row) {
echo '<br>';
echo '<div class="c col-6 mx-auto"  >';
echo '<div class="brd">';
echo '<div class="a"><button type="button">Favoris</button></div>';
echo ' <pre>Offre de Stages :</pre>';
echo '<pre>Nom entreprise :</pre> <option value="' . $row['entreprise_offre'] . '">' . $row['entreprise_offre'] . '</option>';
echo '<pre>Nom du poste :</pre> <option value="' . $row['nom_offre'] . '">' . $row['nom_offre'] . '</option>';
echo '<pre>Rémunération :</pre> <option value="' . $row['base_remuneration_offre'] . '">' . $row['base_remuneration_offre'] . '</option>';
echo '<pre>Date :</pre> <option value="' . $row['date_offre'] . '">' . $row['date_offre'] . '</option>';
echo '<div class="a">';
echo '<a><button type="button">Postuler</button></a> <a type="button" href=Statistiques.php>En savoir plus</a>';
echo ' </div>';
echo '</div>';
echo '</div>';
echo '<br>';
                        }
?>
        
        
        <div class="c col-md-5 offset-md-1">
            
                <div class="a"><button type="button">Favoris</button></div>
                <pre>Titre du poste</pre>
                <pre>Description du poste</pre>
            
            <div class="b">
                <br>
                Evaluer l'entreprise : <button type="button">Like</button> <button type="button">Dislike</button>
            </div>
            <div class="a">
                <br>
                <button type="button">Détails</button> <button type="button">Postuler</button>
            </div>
        </div>
    </div>

<br><br><br>
<div class="c col-md-5 offset-md-4">
    <div class="brd">
        <pre>Statistiques du poste :</pre>
        <br><br>
        <pre>Compétences</pre>
        <pre>Localités</pre>
        <pre>Entreprise</pre>
        <pre>Type de promotion concernées</pre>
        <pre>Durée du stage</pre>
        <pre>Base de rémunération</pre>
        <pre>Date de l'offre</pre>
        <pre>Nombre de place offertes aux étudiants</pre>
        
        
    </div>
</div>






</body>

</html>