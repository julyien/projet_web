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
        WHERE identifiant_profil = ? AND password_profil = ?",
        array($Pseudo, $mdp));
        $row = $req->fetch();
        
        if (is_null($row['id_profil'])){
            $valid = false;
            $er_pseudo = "Le mail ou le mot de passe est incorrecte";
       }
        
        
        
        
        if ($valid){
            $_SESSION['id_profil'] = $row['id_profil']; // id de l'utilisateur unique pour les requêtes futures
            $_SESSION['nom_profil'] = $row['nom_profil'];
            $_SESSION['prenom_profil'] = $row['prenom_profil'];
            $_SESSION['identifiant_profil'] = $row['identifiant_profil'];
            $_SESSION['password_profil'] = $row['password_profil'];
            $_SESSION['promotion_profil'] = $row['promotion_profil'];
            $_SESSION['id_centre'] = $row['id_centre'];
            $_SESSION['nom_centre'] = $row['nom_centre'];
            $_SESSION['id_role'] = $row['id_role'];
            
            header('Location: acceuil.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Connexion</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="projet.css" rel="Stylesheet" type="text/css"/>
</head>
<body>
<div class="bg"></div>
<div class="d"> <h2>Bienvenue sur JVPN veuillez vous connecter.</h2></div>
<div class="container">
<div class="row">
<div class="col-7">
<div class="mt-4">
<div class=a>
<br>
<h3 class="d">Identification</h3>
<form method = "post">
<pre>
<?php
if (isset($er_pseudo)){
    ?>
    <div><?= $er_pseudo ?></div>
    <?php
}
?>
Nom d'utilisateur: <input type="text" placeholder="identifiant" name="identifiant_profil" value="<?php if(isset($Pseudo)){ echo $Pseudo; }?>" required>
<?php
if (isset($er_mdp)){
    ?>
    <div><?= $er_mdp ?></div>
    <?php
}
?>
Mot de passe: <input type="password" placeholder="mot de passe" name="password_profil" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
<input type="submit" name="connexion">
</pre>
<br>
</form>
<a id="btn" href="mentions_legales.html">Mentions Légales</a>
</div>
</div>
</div>
<div class="col-5">
    <div class="d">
<br><br>
<img src="logo.png" alt="logo" width="260"/>
</div>
</div>
</div>
</div>


<script>
$(document).ready(function(){
    $("#btn").click(function(){
        $("#div1").fadeIn("slow");
    });
});
</script>
</body>
</html>