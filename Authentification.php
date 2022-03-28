<?php
session_start();
include('connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD
require_once('connexionDB.php');



if(!empty($_POST)){
    $Pseudo= $_POST['identifiant_profil'];
    $mdp= $_POST['password_profil'];
    extract($_POST);
    $valid = true;
    
    if (isset($_POST['connexion'])){
        $Pseudo = htmlentities(strtolower(trim($Pseudo)));
        $mdp = trim($mdp);
        
        if(empty($Pseudo)){ // Vérification qu'il y est bien un mail de renseigné
            $valid = false;
            $er_pseudo = "Il faut mettre un pseudo";
        }
        
        if(empty($mdp)){ // Vérification qu'il y est bien un mot de passe de renseigné
            $valid = false;
            $er_mdp = "Il faut mettre un mot de passe";
        }
        
        $req = $DB->query("SELECT *
        FROM profil
        INNER JOIN centre_formation ON profil.id_centre = centre_formation.id_centre
        WHERE identifiant_profil = ? AND password_profil = ?",
        array($Pseudo, $mdp));
        $req = $req->fetch();
        
        
        
        
        
        if ($valid){
            $_SESSION['id_profil'] = $req['id_profil']; // id de l'utilisateur unique pour les requêtes futures
            $_SESSION['nom_profil'] = $req['nom_profil'];
            $_SESSION['prenom_profil'] = $req['prenom_profil'];
            $_SESSION['identifiant_profil'] = $req['identifiant_profil'];
            $_SESSION['password_profil'] = $req['password_profil'];
            $_SESSION['promotion_profil'] = $req['promotion_profil'];
            $_SESSION['id_centre'] = $req['id_centre'];
            $_SESSION['nom_centre'] = $req['nom_centre'];
            
            header('Location: acceuil.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta charset="utf-8" />
<link href="projet.css" rel="Stylesheet" type="text/css"/>
<div class=a>
</div>
<title>Connexion</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-7">
<div class="mt-4">
<div class=a>
<h4>Bienvenue sur JVPN.</h4>
<h4>Veuillez vous connecter.</h4>
<pre></pre>
<h3 class="text-primary">Identification</h3>
<form method = "post">
<?php
if (isset($er_pseudo)){
    ?>
    <div><?= $er_pseudo ?></div>
    <?php
}
?>
Nom d'utilisateur: <input type="int" placeholder="identifiant" name="identifiant_profil" value="<?php if(isset($Pseudo)){ echo $Pseudo; }?>" required>
<?php
if (isset($er_mdp)){
    ?>
    <div><?= $er_mdp ?></div>
    <?php
}
?>
Mot de passe: <input type="password" placeholder="mot de passe" name="password_profil" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
<input type="submit" name="connexion">
</form>
<a href="https://www.mentionslegales.net">Mentions légales</a>
</div>
</div>
</div>
<div class="col-5">
<div class="mt-4">
<div class=c>
<img src="logo.png" width="300px"/>
</div>
</div>
</div>
</div>
</div>
</body>
</html>