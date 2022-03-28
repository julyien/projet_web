<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="topnav">
        <a class="active"><img src="logo.png" width="45px"/></a>
        <a>
            <input type="text" name="text" class="search" placeholder="Recherchez ici!">
            <input type="submit" name="submit" class="submit" value="Search">
        </a>
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
    <div class="center">
        <h2> Statistiques : </h2>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    <div class="row">
        <div class="c col-md-3">
                <pre>Nom entreprise</pre>
                <pre>Description de l'entreprise</pre>
                <pre>Evaluation des utilisateurs</pre>
                <div class="c col-md-7 mx-auto">
                    <div class="brd">
                        Nombre d'étudiants ayant postulé chez cette entreprise :
                    </div>
            </div>
            
        </div>
        
        
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
</div>






</body>

</html>