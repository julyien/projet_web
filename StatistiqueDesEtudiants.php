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
        <a href="Gestion_entreprise.php">Gestion</a>
        <a href="notification.php">Notifications</a>
        <a href="#Messagerie">Messagerie</a>
        <a href="#Profil">Profil</a>
        <div class=a>
        <a href="logout.php">Se deconnecter</a>
    </div>
    </div>
    <br>
    <div class="center" > <h2> Statistique des étudiants : </h2> </div>
    <br>
    <br>
    <br>
    <br>

    <div class="c col-6 mx-auto"  >
        <div class="brd">
            <div class="a"><button type="button">Enlever des favoris</button></div>
            <pre>Offre de Stages :</pre>
            <pre>Nom entreprise</pre>
            <pre>Nom du poste</pre>
            <pre>Localisation</pre>
            <div class="a">
                <button type="button">Postuler</button> <button type="button">En savoir plus</button>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="c col-6 mx-auto">
        <div class="brd">
            <div class="a"><button type="button">Enlever des favoris</button></div>
            <pre>Offre de Stages :</pre>
            <pre>Nom entreprise</pre>
            <pre>Nom du poste</pre>
            <pre>Localisation</pre>
            <div class="a">
                <button type="button">Postuler</button> <button type="button">En savoir plus</button>
            </div>
        </div>
    </div>
</body>
</html>