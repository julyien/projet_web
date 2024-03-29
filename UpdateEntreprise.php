<?php
include('Session.php'); 
$nomError = null;
if ( !empty($_GET['nom_entreprise'])) {
    $nom_entreprise = $_POST['nom_entreprise'];
}



if ( !empty($_POST)) {
    // keep track validation errors
    // $IdError = null;
    $NomError = null;
    $CentreError = null;
    $StagiaireError = null;
    
    
    // keep track post values
    $id_entreprise = $_POST['id_entreprise'];
    $nom_entreprise = $_POST['nom_entreprise'];
    $centre_activite_entreprise = $_POST['centre_activite_entreprise'];
    $nombre_stagiaireCESI_entreprise = $_POST['nombre_stagiaireCESI_entreprise'];
    
    // validate input
    $valid = true;
    
    //   if (empty($id_entreprise)) {
    //       $IdError = "Donner l'ID du Profil";
    //       $valid = false;
    //   }
    
    
    if (empty($nom_entreprise)) {
        $NomError = "Donner le nom de l'entreprise";
        $valid = false;
    }
    
    if (empty($centre_activite_entreprise)) {
        $CentreError = "Donner le centre d'activité de l'entreprise";
        $valid = false;
    }
    
    //  if (empty($nombre_stagiaireCESI_entreprise)) {
    //      $StagiaireError = "Donner le nombre de stagiaire de l'entreprise";
    //     $valid = false;
    //      }
    
    
    // update data
    if ($valid) {
        $sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "UPDATE `entreprise` SET centre_activite_entreprise = ?, nombre_stagiaireCESI_entreprise = ? WHERE nom_entreprise = ?";
        $q = $sql->prepare($dbh);   
        $q->execute(array($centre_activite_entreprise,$nombre_stagiaireCESI_entreprise, $nom_entreprise )); 
        header('Location: GestionEntreprise.php');
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
                    <h3>Modifier une entreprise</h3>
                </div>
                <form class="form-horizontal" action="UpdateEntreprise.php?id_entreprise=<?php echo $id_entreprise?>" method="post">
                    <div class="control-group <?php echo !empty($NomError)?'error':'';?>">
                        <label class="control-label">Nom Entreprise</label>
                        <div class="controls">
                        <input type="text" name="nom_entreprise" id="nom_entreprise" class="form-control"
                        placeholder='Nom entreprise' onkeyup="GetDetail(this.value)" value="<?php echo !empty($nom_entreprise)?$nom_entreprise:'';?>">
                        <?php if (!empty($NomError)): ?>
                        <span class="help-inline"><?php echo $NomError;?></span>
                        <?php endif; ?>
                    </div>
                    </div>
                    <div class="control-group <?php echo !empty($CentreError)?'error':'';?>">
                        <label class="control-label">Centre d'activité</label>
                        <div class="controls">
                            <input type="text" name="centre_activite_entreprise" id="centre_activite_entreprise" class="form-control"
                            placeholder='centre activite entreprise' value="<?php echo !empty($centre_activite_entreprise)?$centre_activite_entreprise:'';?>">
                            <?php if (!empty($CentreError)): ?>
                            <span class="help-inline"><?php echo $CentreError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($StagiaireError)?'error':'';?>">
                        <label class="control-label">Nombre de stagiaire</label>
                        <div class="controls">
                            <input type="text" name="nombre_stagiaireCESI_entreprise" id="nombre_stagiaireCESI_entreprise" class="form-control"
                            placeholder='nombre stagiaire CESI entreprise' value="<?php echo !empty($nombre_stagiaireCESI_entreprise)?$nombre_stagiaireCESI_entreprise:'';?>">
                            <?php if (!empty($StagiaireError)): ?>
                            <span class="help-inline"><?php echo $StagiaireError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a class="btn" href="GestionEntreprise.php">Back</a>
                    </div>
                </form>
            </div>
            <script>
                function GetDetail(str) {
                    if (str.length == 0) {
                        document.getElementById("centre_activite_entreprise").value = "";
                        document.getElementById("nombre_stagiaireCESI_entreprise").value = "";
                    return;}
                    else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                var myObj = JSON.parse(this.responseText);
                                document.getElementById
                                    ("centre_activite_entreprise").value = myObj[0];
                                document.getElementById
                                    ("nombre_stagiaireCESI_entreprise").value = myObj[1];
                            }
                        };
                        xmlhttp.open("GET", "autoaddEntreprise.php?nom_entreprise=" + str, true);  
                        xmlhttp.send();
                    }
                }
            </script>
        </body>
    </html>