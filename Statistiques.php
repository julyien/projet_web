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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <div class="center">
        <h2> Page Entreprise </h2>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    <?php

  include('connexionDB.php'); 

    $getid = $_GET['id_entreprise'];


    $req = $DB->query("SELECT * FROM offre INNER JOIN entreprise ON offre.id_entreprise = entreprise.id_entreprise WHERE offre.id_entreprise = ? ", array($getid));
    $row = $req->fetch();
                        
?>
    <div class="row">
        <div class="c col-md-3">
                <h3>Entreprise</h3>
                <pre>Nom entreprise : <?php echo $row['nom_entreprise'] ?> </pre> 
                <pre>Centre d'activité : <?php echo $row['centre_activite_entreprise'] ?> </pre>
                <pre>Evaluation des utilisateurs :</pre>
                <div class="c col-md-7 mx-auto">
                    <div class="brd">
                        Nombre d'étudiants ayant postulé chez cette entreprise : <?php echo $row['nombre_stagiaireCESI_entreprise'] ?>
                    </div>
            </div>
        </div>
        
<?php 

foreach ($DB->query('SELECT * FROM offre INNER JOIN se_situe ON offre.id_offre = se_situe.id_offre INNER JOIN localisation ON se_situe.id_localisation = localisation.id_localisation WHERE offre.id_entreprise=?', array($getid)) as $row) {
echo '<br>';
echo '<div class="c col-md-5 offset-md-1">';
echo '<div class="a"><button type="button">Favoris</button></div>';
echo '<h3>Offre</h3>';
echo '<pre>ID Offre :</pre> <option value="' . $row['id_offre'] . '">' . $row['id_offre'] . '</option>';
echo '<pre>Titre du poste :</pre> <option value="' . $row['nom_offre'] . '">' . $row['nom_offre'] . '</option>';
echo '<pre>ID Offre :</pre> <option value="' . $row['id_offre'] . '">' . $row['id_offre'] . '</option>';
echo ' <pre>Description du poste : </pre> <option value="' . $row['description_offre'] . '">' . $row['description_offre'] . '</option>';
echo '<div class="b">';
echo '<br>';
echo '<h3>Statistiques</h3>';
echo '<pre>Localités : </pre> <option value="' . $row['ville_localisation'] . '">' . $row['ville_localisation'] . '</option>';
echo '<pre>Durée du stage : </pre> <option value="' . $row['duree_offre'] . '">' . $row['duree_offre'] . '</option>';
echo '<pre>Base de rémunération : </pre> <option value="' . $row['base_remuneration_offre'] . '">' . $row['base_remuneration_offre'] . '</option>';
echo '<pre>Date offre : </pre> <option value="' . $row['date_offre'] . '">' . $row['date_offre'] . '</option>';
echo '<pre>Nombre de place offertes aux étudiants : </pre> <option value="' . $row['nombre_place_offre'] . '">' . $row['nombre_place_offre'] . '</option>';
echo '<br>';
echo '<button type="button">Like</button> <button type="button">Dislike</button>';
echo '</div>';
echo '<div class="a">';
echo '<br>';
echo '<button type="button">Postuler</button>';
echo ' </div>';
echo '</div>';
echo '</div>';
echo '<br>';
}
?>
</body>

</html>