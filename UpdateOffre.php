<?php

$id_offre = null;
if ( !empty($_GET['id_offre'])) {
    $id_offre = $_POST['id_offre'];
}



if ( !empty($_POST)) {
    // keep track validation errors
    $IdError = null;
    $NomError = null;
    $DureeError = null;
    $RemunError = null;
    $DateError= null;
    $PlaceError = null;
    $descriptionError = null;
    $NomEntrepriseError= null;
    
    // keep track post values
    $id_offre = $_POST['id_offre'];
    $nom_offre = $_POST['nom_offre'];
    $duree_offre = $_POST['duree_offre'];
    $base_remuneration_offre = $_POST['base_remuneration_offre'];
    $date_offre = $_POST['date_offre'];
    $nombre_place_offre = $_POST['nombre_place_offre'];
    $description_offre = $_POST['description_offre'];
    $nom_entreprise = $_POST['nom_entreprise'];
    
    // validate input
    $valid = true;

    if (empty($id_offre)) {
        $IdError = "Donner l'ID de l'offre";
        $valid = false;
    }
    
    if (empty($nom_offre)) {
        $NomError = "Donner le nom de l'entreprise";
        $valid = false;
    }
    
    if (empty($duree_offre)) {
        $DureeError = "Donner la duree de l'offre";
        $valid = false;
    }
    
    if (empty($base_remuneration_offre)) {
        $RemunError = "Donner la remuneration de l'offre";
        $valid = false;
    }
    
    if (empty($date_offre)) {
        $DateError = "Donner la date de l'offre";
        $valid = false;
    }
    
    if (empty($nombre_place_offre)) {
        $PlaceError = "Donner le nombre de places de l'offre";
        $valid = false;
    }

    if (empty($description_offre)) {
        $descriptionError = "yes";
        $valid = false;
    }
    
    if (empty($nom_entreprise)) {
        $NomEntrepriseError = "Donner l'id de l'entreprise";
        $valid = false;
    }
    

    
    // update data
    if ($valid) {
        $sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "SELECT id_entreprise FROM entreprise WHERE nom_entreprise = ? limit 1";
        $q = $sql->prepare($dbh);
        $q->execute(array($nom_entreprise));
        $nom_entreprise = $q->fetchColumn();
        $dbh = "UPDATE `offre` SET nom_offre =  ?, duree_offre = ?, base_remuneration_offre = ?, date_offre = ?, nombre_place_offre = ?,description_offre = ?, id_entreprise = ? WHERE id_offre = ?";
        $q = $sql->prepare($dbh);   
        $q->execute(array( $nom_offre,$duree_offre,$base_remuneration_offre, $date_offre, $nombre_place_offre, $description_offre, $nom_entreprise,$id_offre )); 
        header('Location: GestionOffre.php');
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
                    <h3>Modifier une offre</h3>
                </div>
                <form class="form-horizontal" action="UpdateOffre.php?id_profil=<?php echo $id_offre?>" method="post">
                    <div class="control-group <?php echo !empty($IdError)?'error':'';?>">
                    <label class="control-label">ID Offre</label>
                    <div class="controls">
                        <input type='text' name="id_offre" id='id_offre' class='form-control'
                        placeholder='Entrer id offre' onkeyup="GetDetail(this.value)" value="<?php echo !empty($id_offre)?$id_offre:'';?>">
                        <?php if (!empty($IdError)): ?>
                        <span class="help-inline"><?php echo $IdError;?></span>
                        <?php endif; ?>
                    </div>
                    <div class="control-group <?php echo !empty($NomError)?'error':'';?>">
                        <label class="control-label">Nom de l'Offre</label>
                        <div class="controls">
                            <input type="text" name="nom_offre" id="nom_offre" class="form-control"
                            placeholder='Nom offre' value="<?php echo !empty($nom_offre)?$nom_offre:'';?>">
                            <?php if (!empty($NomError)): ?>
                            <span class="help-inline"><?php echo $NomError;?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($DureeError)?'error':'';?>">
                        <label class="control-label">Duree Offre</label>
                        <div class="controls">
                            <input type="text" name="duree_offre" id="duree_offre" class="form-control"
                            placeholder='Duree offre' value="<?php echo !empty($duree_offre)?$duree_offre:'';?>">
                            <?php if (!empty($DureeError)): ?>
                            <span class="help-inline"><?php echo $DureeError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($RemunError)?'error':'';?>">
                        <label class="control-label">Remuneration Offre</label>
                        <div class="controls">
                            <input type="text" name="base_remuneration_offre" id="base_remuneration_offre" class="form-control"
                            placeholder='Base Remuneration' value="<?php echo !empty($base_remuneration_offre)?$base_remuneration_offre:'';?>">
                            <?php if (!empty($RemunError)): ?>
                            <span class="help-inline"><?php echo $RemunError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($DateError)?'error':'';?>">
                        <label class="control-label">Date Offre</label>
                        <div class="controls">
                            <input type="date" name="date_offre" id="date_offre" class="form-control"
                            placeholder='Date Offre' value="<?php echo !empty($date_offre)?$date_offre:'';?>">
                            <?php if (!empty($DateError)): ?>
                            <span class="help-inline"><?php echo $DateError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($PlaceError)?'error':'';?>">
                        <label class="control-label">Nombre de places de l'offre</label>
                        <div class="controls">
                            <input type="text" name="nombre_place_offre" id="nombre_place_offre" class="form-control"
                            placeholder='Nombre Place Offre' value="<?php echo !empty($nombre_place_offre)?$nombre_place_offre:'';?>">
                            <?php if (!empty($PlaceError)): ?>
                            <span class="help-inline"><?php echo $PlaceError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">Description de l'offre</label>
                        <div class="controls">
                            <input type="text" name="description_offre" id="description_offre" class="form-control"
                            placeholder='Description Offre' value="<?php echo !empty($description_offre)?$description_offre:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                            <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="control-group <?php echo !empty($NomEntrepriseError)?'error':'';?>">
                        <label class="control-label">Nom de l'Entreprise</label>
                        <div class="controls">
                            <input type="text" name="nom_entreprise" id="nom_entreprise" class="form-control"
                            placeholder='Nom entreprise' value="<?php echo !empty($nom_entreprise)?$nom_entreprise:'';?>">
                            <?php if (!empty($NomEntrepriseError)): ?>
                            <span class="help-inline"><?php echo $NomEntrepriseError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a class="btn" href="GestionOffre.php">Back</a>
                    </div>
                </form>
            </div>
            <script>
                function GetDetail(str) {
                    if (str.length == 0) {
                        document.getElementById("nom_offre").value = "";
                        document.getElementById("duree_offre").value = "";
                        document.getElementById("base_remuneration_offre").value = "";
                        document.getElementById("date_offre").value = "";
                        document.getElementById("nombre_place_offre").value = "";
                        document.getElementById("description_offre").value = "";
                        document.getElementById("nom_entreprise").value = "";
                        return;}
                    else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                var myObj = JSON.parse(this.responseText);  
                                document.getElementById
                                    ("nom_offre").value = myObj[0];
                                document.getElementById
                                    ("duree_offre").value = myObj[1];
                                document.getElementById
                                    ("base_remuneration_offre").value = myObj[2];
                                document.getElementById
                                    ("date_offre").value = myObj[3];
                                document.getElementById
                                    ("nombre_place_offre").value = myObj[4];
                                document.getElementById
                                    ("description_offre").value = myObj[5];
                                document.getElementById
                                    ("nom_entreprise").value = myObj[6];
                            }
                        };
                        xmlhttp.open("GET", "autoaddOffre.php?id_offre=" + str, true); 
                        xmlhttp.send();
                    }
                }
            </script>
        </body>
    </html>