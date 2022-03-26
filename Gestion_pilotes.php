<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="projet.css" rel="Stylesheet" type="text/css"/>
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
        <a href="#Gestion">Gestion</a>
        <a href="#notification.php">Notifications</a>
        <a href="#Messagerie">Messagerie</a>
        <a href="profil.php">Profil</a>
    </div>
    <div class=a>
        <a href="logout.php">Se deconnecter</a>
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
            <pre>Créer un pilote       <a type="button" href="Create.php">Créer</a></pre>
            <pre>Supprimer un pilote   <a type="button" href="Delete.php">Supprimer</a></pre>
            <pre>Modifier un pilote    <a type="button" href="Update.php">Modifier</a></pre>
            <br>
        </div>
    </div>
    </div>
</body>
</html>