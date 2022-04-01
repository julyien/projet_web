<!DOCTYPE html>
<html lang="en">
<head>
    <title>Liste De Souhaits</title>
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

include('Session.php'); 

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
    <br>
    <div class="d" > <h2> Offres favorites : </h2> </div>
    <br>
    <br>
    <br>
    <?php 
    
    include('connexionDB.php'); 
    $getidprofil = intval($_SESSION['id_profil']);
    
    
    
    
    foreach ($DB->query('SELECT * FROM offre INNER JOIN se_situe ON offre.id_offre = se_situe.id_offre INNER JOIN localisation ON se_situe.id_localisation = localisation.id_localisation INNER JOIN wishlist ON offre.id_offre = wishlist.id_offre  WHERE  wishlist.id_profil = ? GROUP BY wishlist.id_offre', array($getidprofil)) as $row) {
        echo '<br>';
        echo '<div class="c col-md-5 offset-md-1">';
        echo '<form action="DeleteWishlist.php" class="form-horizontal" method="post">';
        echo '<div class="form-actions">';                
        echo '<button type="submit" class="btn-success">Favoris</button>';
        echo '</form>';
        echo '</div>';
        echo '<h3>Offre</h3>';
        echo '<pre>ID Offre :</pre> <option value="' . $row['id_offre'] . '">' . $row['id_offre'] . '</option>';
        echo '<pre>Titre du poste :</pre> <option value="' . $row['nom_offre'] . '">' . $row['nom_offre'] . '</option>';
        echo '<pre>ID Offre :</pre> <option value="' . $row['id_offre'] . '">' . $row['id_offre'] . '</option>';
        echo ' <pre>Description du poste : </pre> <option value="' . $row['description_offre'] . '">' . $row['description_offre'] . '</option>';
        echo '<div class="b">';
        echo '<br>';
        echo '<form action="Apply.php" class="form-horizontal" method="post">';
        echo '<div class="a">';
        echo '<div class="form-actions">';  
        echo '<a><button type="submit" class="btn-success">Postuler</button></a>';
        echo "<a href='Statistiques.php?id_entreprise=" .$row['id_entreprise']."'>En savoir plus</a>";
        echo ' </div>';
        echo ' </div>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        $_SESSION['id_offre'] = $row['id_offre'];
        
    }
        
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>