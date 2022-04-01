<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="La page ou on retrouve des stages">
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

$sql = 'SELECT * FROM `offre` INNER JOIN entreprise ON offre.id_entreprise = entreprise.id_entreprise ORDER BY `id_offre` DESC LIMIT '.$premier.', 4';

// On prépare la requête
$req = $DB->query($sql);



foreach ($req->fetchAll() as $row) {
echo '<br>';
echo '<div class="c col-6 mx-auto"  >';
echo '<div class="brd">';
echo '<form action="AddWishlist.php" class="form-horizontal" method="post">';
echo '<div class="form-actions">';      
echo '<button type="submit" class="btn-success" >Favoris</button>';
echo '</div>';
echo '</form>';
echo '<pre><strong>ID Offre :</strong></pre> <option value="' . $row['id_offre'] . '">' . $row['id_offre'] . '</option>';
echo '<pre><strong>Nom entreprise :</strong></pre> <option value="' . $row['nom_entreprise'] . '">' . $row['nom_entreprise'] . '</option>';
echo '<pre><strong>Nom du poste :</strong></pre> <option value="' . $row['nom_offre'] . '">' . $row['nom_offre'] . '</option>';
echo '<pre><strong>Rémunération :</strong></pre> <option value="' . $row['base_remuneration_offre'] . '">' . $row['base_remuneration_offre'] . '</option>';
echo '<pre><strong>Date :</strong></pre> <option value="' . $row['date_offre'] . '">' . $row['date_offre'] . '</option>';
echo '<form action="Apply.php" class="form-horizontal" method="post">';
echo '<div class="a">';
echo '<div class="form-actions">';    
echo '<a><button type="submit" class="btn-success">Postuler</button></a>';
echo "<a href='Statistiques.php?id_entreprise=" .$row['id_entreprise']."'>En savoir plus</a>";
echo '</div>';    
echo ' </div>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '<br>';

$_SESSION['id_offre'] = $row['id_offre'];
}


?>
<nav>
    <div class="col-3 mx-auto">
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
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>