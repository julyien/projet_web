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
            
            header('Location: acceuil.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<div class="d"> <h2>Bienvenue sur JVPN veuillez vous connecter.</h2></div>
<div class="container">
<div class="row">
<div class="col-7">
<div class="mt-4">
<div class=a>
<br>
<h3 class="d">Identification</h3>
<pre>
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
</pre>
<br><a id="btn">Mentions Légales</a></br>
</div>
</div>
</div>
<div class="col-5">
    <div class="d">
<br><br>
<img src="logo.png" width="260px"/>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<footer>

<script language = "javascript">
$(document).ready(function(){
    $("#btn").click(function(){
        $("#div1").fadeIn("slow");
    });
});
</script>

<div id="div1" style="display:none">
<p>Identité

Nom du site web : JVPN
Adresse : http://localhost/home
Propriétaire : A2 Info de Lille
Responsable de publication : A2 Info de Lille

Conception et réalisation : < Julien Hedin, Vincent Leleu, Paul Bosacki, Nicolas Journel >
Hébergement : < hébergeur >

Exercice’ – Aucune Précise’ au capital de 0 euros – RCS 11037 – ‘’
0791783502 notresite@viacesi.fr
Conndition d'Utilisation 

L’utilisation du présent site implique l’acceptation pleine et entière des conditions générales d’utilisation décrites ci-après. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment.
Informations

Les informations et documents du site sont présentés à titre indicatif, n’ont pas de caractère exhaustif, et ne peuvent engager la responsabilité du propriétaire du site.

Le propriétaire du site ne peut être tenu responsable des dommages directs et indirects consécutifs à l’accès au site.
Interactivité

Les utilisateurs du site peuvent y déposer du contenu, apparaissant sur le site dans des espaces dédiés (notamment via les commentaires). Le contenu déposé reste sous la responsabilité de leurs auteurs, qui en assument pleinement l’entière responsabilité juridique.

Le propriétaire du site se réserve néanmoins le droit de retirer sans préavis et sans justification tout contenu déposé par les utilisateurs qui ne satisferait pas à la charte déontologique du site ou à la législation en vigueur.
Propriété intellectuelle

Sauf mention contraire, tous les éléments accessibles sur le site (textes, images, graphismes, logo, icônes, sons, logiciels, etc.) restent la propriété exclusive de leurs auteurs, en ce qui concerne les droits de propriété intellectuelle ou les droits d’usage. 1

Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de l’auteur.23

Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient est considérée comme constitutive d’une contrefaçon et passible de poursuites. 4

Les marques et logos reproduits sur le site sont déposés par les sociétés qui en sont propriétaires.
Liens

Liens sortants
Le propriétaire du site décline toute responsabilité et n’est pas engagé par le référencement via des liens hypertextes, de ressources tierces présentes sur le réseau Internet, tant en ce qui concerne leur contenu que leur pertinence.

Liens entrants
Le propriétaire du site autorise les liens hypertextes vers l’une des pages de ce site, à condition que ceux-ci ouvrent une nouvelle fenêtre et soient présentés de manière non équivoque afin d’éviter :

tout risque de confusion entre le site citant et le propriétaire du site ainsi que toute présentation tendancieuse, ou contraire aux lois en vigueur.

Le propriétaire du site se réserve le droit de demander la suppression d’un lien s’il estime que le site source ne respecte pas les règles ainsi définies.
Confidentialité

Tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une preuve d’identité. 5678

Le site ne recueille pas d’informations personnelles, et n’est pas assujetti à déclaration à la CNIL. 9
Crédits


Mentions légales fournies par WebExpress – Version 1.6 – Utilisation libre sous Licence Creative Commons CC BY-NC-ND 3.0 FR / creativecommons.org.

Articles L111-1 et suivants du Code de la Propriété Intellectuelle du 1er juillet 1992 ↩
Article 41 de la loi du 11 mars 1957 ↩
Article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995 ↩
Articles L.335-2 et suivants du Code de Propriété Intellectuelle ↩
Loi n° 78-87 du 6 janvier 1978, modifiée par la loi n° 2004-801 du 6 août 2004, relative à l’informatique, aux fichiers et aux libertés ↩
Articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés ↩
Loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données ↩
Loi n° 2004-801 du 6 août 2004 ↩
Article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique ↩</p>
</div>
</footer>
</html>