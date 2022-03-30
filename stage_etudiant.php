<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stages étudiants</title>
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

<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

require_once('connexionDB.php');

// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS nb_articles FROM `offre`;';

// On prépare la requête
$req = $DB->query($sql);

// On récupère le nombre d'articles
$result = $req->fetch();

$nbArticles = (int) $result['nb_articles'];

// On détermine le nombre d'articles par page
$parPage = 4;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
$premier = (($currentPage-1) * $parPage);

$sql = 'SELECT * FROM `offre` ORDER BY `id_offre` DESC LIMIT '.$premier.', 4';

// On prépare la requête
$req = $DB->query($sql);


foreach ($req->fetchAll() as $row) {
echo '<br>';
echo '<div class="c col-6 mx-auto"  >';
echo '<div class="brd">';
echo '<div class="a"><button type="button">Favoris</button></div>';
echo '<pre>ID Offre :</pre> <option value="' . $row['id_offre'] . '">' . $row['id_offre'] . '</option>';
echo '<pre>Nom entreprise :</pre> <option value="' . $row['entreprise_offre'] . '">' . $row['entreprise_offre'] . '</option>';
echo '<pre>Nom du poste :</pre> <option value="' . $row['nom_offre'] . '">' . $row['nom_offre'] . '</option>';
echo '<pre>Rémunération :</pre> <option value="' . $row['base_remuneration_offre'] . '">' . $row['base_remuneration_offre'] . '</option>';
echo '<pre>Date :</pre> <option value="' . $row['date_offre'] . '">' . $row['date_offre'] . '</option>';
echo '<div class="a">';
echo '<a><button type="button">Postuler</button></a>';
echo "<a href='Statistiques.php?id_entreprise=" .$row['id_entreprise']."'>En savoir plus</a>";
echo ' </div>';
echo '</div>';
echo '</div>';
echo '<br>';
}
?>
<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
            <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
        </li>
        <?php endfor ?>
             <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
</body>
</html>