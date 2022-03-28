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
    <div class="topnav">
        <a class="active"><img src="logo.png" width="45px"/></a>
        <form action="search.php" method="POST">
            <input type="text" name="identifiant_profil" class="search" placeholder="Recherchez ici!" value="<?php if(isset($Search)){ echo $Search; }?>">
            <input type="submit" name="submit-search" class="submit" value="Search">
        </form>
        <div class="profil-container">
        </div>
        <a href="acceuil.php">Accueil</a>
        <a href="#Stages">Stages</a>
        <a href="ListeDeSouhait.php">Souhaits</a>
        <a href="#Gestion">Gestion</a>
        <a href="notification.php">Notifications</a>
        <a href="#Messagerie">Messagerie</a>
        <a href="profil.php">Profil</a>
        <div class=a>
        <a href="logout.php">Se deconnecter</a>
    </div>
    </div>
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
            <pre>Créer une offre       <a type="button" href="CreateOffres.php">Créer</a></pre>
            <pre>Supprimer une offre   <a type="button" href="DeleteOffres.php">Supprimer</a></pre>
            <pre>Modifier une offre    <a type="button" href="UpdateOffres.php">Modifier</a></pre>
            <br>
        </div>
    </div>
    </div>
</body>
</html>