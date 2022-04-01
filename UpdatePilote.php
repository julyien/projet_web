<?php

$sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

$identifiant_profil = null;
if ( !empty($_GET['identifiant_profil'])) {
    $identifiant_profil = $_POST['identifiant_profil'];
}



if ( !empty($_POST)) {
    // keep track validation errors
    $NomError = null;
    $PrenomError = null;
    $PromoError = null;
    $IdError = null;
    $PswError= null;
    $CentreError = null;
    $IdentifiantError = null;
    
    // keep track post values
    //$id_profil = $_POST['id_profil'];
    $nom_profil = $_POST['nom_profil'];
    $prenom_profil = $_POST['prenom_profil'];
    $promotion_profil = $_POST['promotion_profil'];
    $identifiant_profil = $_POST['identifiant_profil'];
    $password_profil = $_POST['password_profil'];
    $nom_centre = $_POST['nom_centre'];
    
    // validate input
    $valid = true;
    
    // if (empty($id_profil)) {
    //     $IdError = "Donner l'ID du Profil";
    //     $valid = false;
    // }
    
    if (empty($nom_profil)) {
        $NomError = "Donner le nom du Profil";
        $valid = false;
    }
    
    if (empty($prenom_profil)) {
        $PrenomError = "Donner le prenom du profil";
        $valid = false;
    }
    
    if (empty($promotion_profil)) {
        $PromoError = "Donner la promo du profil";
        $valid = false;
    }
    
    if (empty($identifiant_profil)) {
        $IdentifiantError = "Donner l'identifiant du profil";
        $valid = false;
    }
    
    if (empty($password_profil)) {
        $PswError = "Donner le mot de passe du profil";
        $valid = false;
    }
    
    if (empty($nom_centre)) {
        $CentreError = "Donner le nom du centre du profil";
        $valid = false;
    }

    
    // update data
    if ($valid) {
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "SELECT id_centre FROM centre_formation WHERE nom_centre = ? limit 1";
        $q = $sql->prepare($dbh);
        $q->execute(array($nom_centre));
       $nom_centre = $q->fetchColumn();
        $dbh = "UPDATE `profil` SET nom_profil =  ?, prenom_profil = ?, promotion_profil = ?, password_profil = ?, id_centre = ? WHERE identifiant_profil = ? AND id_role = 1";
        $q = $sql->prepare($dbh);   
        $q->execute(array( $nom_profil,$prenom_profil,$promotion_profil, $password_profil, $nom_centre,$identifiant_profil )); 
        header('Location: GestionPilote.php');
    }
}
?>

<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <link   href="projet.css" rel="stylesheet">
            <link   href="css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        </head>

        <body>
            <div class="bg"></div>
                <div>
                    <h3>Modifier un Pilote</h3>
                </div>
                <form class="form-horizontal" action="UpdatePilote.php?id_profil=<?php echo $id_profil?>" method="post">
                    <div class="control-group <?php echo !empty($IdentifiantError)?'error':'';?>">
                    <label class="control-label">Identifiant Profil</label>
                    <div class="controls">
                        <input type='text' name="identifiant_profil" id='identifiant_profil' class='form-control'
                        placeholder='Entrer identifiant'onkeyup="GetDetail(this.value)" value="<?php echo !empty($identifiant_profil)?$identifiant_profil:'';?>">
                        <?php if (!empty($IdentifiantError)): ?>
                        <span class="help-inline"><?php echo $IdentifiantError;?></span>
                        <?php endif; ?>
                    </div>
                    <div class="control-group <?php echo !empty($NomError)?'error':'';?>">
                        <label class="control-label">Nom Profil</label> 
                        <div class="controls">
                            <input type="text" name="nom_profil" id="nom_profil" class="form-control"
                            placeholder='Nom du profil' value="<?php echo !empty($nom_profil)?$nom_profil:'';?>">
                            <?php if (!empty($NomError)): ?>
                            <span class="help-inline"><?php echo $NomError;?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($PrenomProfilError)?'error':'';?>">
                        <label class="control-label">Prenom profil</label>
                        <div class="controls">
                            <input type="text" name="prenom_profil" id="prenom_profil" class="form-control"
                            placeholder='Prenom du profil' value="<?php echo !empty($prenom_profil)?$prenom_profil:'';?>">
                            <?php if (!empty($PrenomError)): ?>
                            <span class="help-inline"><?php echo $PrenomError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($PromoError)?'error':'';?>">
                        <label class="control-label">Promotion Profil</label>
                        <div class="controls">
                            <input type="text" name="promotion_profil" id="promotion_profil" class="form-control"
                            placeholder='Promotion du profil' value="<?php echo !empty($promotion_profil)?$promotion_profil:'';?>">
                            <?php if (!empty($PromoError)): ?>
                            <span class="help-inline"><?php echo $PromoError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($PswError)?'error':'';?>">
                        <label class="control-label">Mot de passe</label>
                        <div class="controls">
                            <input type="password" name="password_profil" id="password_profil" class="form-control"
                            placeholder='Password du profil' value="<?php echo !empty($password_profil)?$password_profil:'';?>">
                            <?php if (!empty($PswError)): ?>
                            <span class="help-inline"><?php echo $PswError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($CentreError)?'error':'';?>">
                        <label class="control-label">Nom du Centre</label>
                        <div class="controls">
                            <input type="text" name="nom_centre" id="nom_centre" class="form-control"
                            placeholder='Nom du centre'  value="<?php echo !empty($nom_centre)?$nom_centre:'';?>">
                            <?php if (!empty($CentreError)): ?>
                            <span class="help-inline"><?php echo $CentreError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a class="btn" href="GestionPilote.php">Back</a>
                    </div>
                </form>
            </div>
            <script>
                    function GetDetail(str) {
                        if (str.length == 0) {
                            document.getElementById("nom_profil").value = "";
                            document.getElementById("prenom_profil").value = "";
                            document.getElementById("promotion_profil").value = "";
                            //document.getElementById("identifiant_profil").value = "";
                            document.getElementById("password_profil").value = "";
                            document.getElementById("nom_centre").value = "";
                        return;
                        }
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText); 
                                    document.getElementById
                                        ("nom_profil").value = myObj[0];
                                    document.getElementById
                                        ("prenom_profil").value = myObj[1];
                                    document.getElementById
                                         ("promotion_profil").value = myObj[2];
                                    // document.getElementById
                                        //("identifiant_profil").value = myObj[3];
                                    document.getElementById
                                        ("password_profil").value = myObj[3];
                                    document.getElementById
                                        ("nom_centre").value = myObj[4];
                                }
                            };
                        xmlhttp.open("GET", "autoaddPilote.php?identifiant_profil=" + str, true);
                        xmlhttp.send();
                    }
                }
            </script>
        </body>
    </html>