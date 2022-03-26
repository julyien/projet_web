<?php

session_start();
$dbh = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');


if ( !empty($_POST)) {
   

$Pseudo= $_POST['identifiant_profil'];
$MDP= $_POST['password_profil'];
$x=0;



foreach($dbh->query('SELECT * from profil') as $row){

    if ($Pseudo == $row['identifiant_profil'] && $MDP == $row['password_profil']){
        $_SESSION['identifiant_profil'] = $Pseudo['identifiant_profil'];
         header('location:acceuil.php');
         exit;
    }

    else{
        echo 'Identifiant ou mot de passe incorrect.';
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
    <br>
    <div class=d>
        <h4>Bienvenue sur JVPN veuillez vous connecter.</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="mt-4">
                    <div class="a">
                        <br>
                        <h3 class="d">Identification</h3>
                        <br>
                        <form method = "post">
                            <pre>Nom d'utilisateur: <input type="int" placeholder="identifiant" name="identifiant_profil" value="<?php echo !empty($Pseudo)?$Pseudo:'';?>" required></pre>
                            <pre>Mot de passe: <input type="password" placeholder="mot de passe" name="password_profil" value="<?php echo !empty($MDP)?$MDP:'';?>" required></pre>
                            <input type="submit">
                        </form>
                    </div>
                    <br>
                    <div class="a">
                    <a href="https://www.mentionslegales.net">Mentions légales</a>
                    </div>
                </div>
                </div>
            <div class="col-5">
                <div class="mt-4">
                    <div class=d>
                        <br><br>
                    <img src="logo.png" width="260px"/>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>