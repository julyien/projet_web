<?php
 
 $sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

 if ( !empty($_POST)) {
     // keep track validation errors
   
     $IDError = null;
     $dureeError = null;
     $remunerationError = null;
     $dateError = null;
     $nombreplaceError = null;
     $descriptionError = null;
     $entrepriseError = null;
     $nomError = null;

     
      
     // keep track post values
    
     //$id_offre = $_POST['id_offre'];
     $nom_offre= $_POST['nom_offre'];
     $duree_offre = $_POST['duree_offre'];
     $remuneration_offre = $_POST['base_remuneration_offre'];
     $date_offre = $_POST['date_offre'];
     $nombreplace_offre = $_POST['nombre_place_offre'];
     $description_offre = $_POST['description_offre'];
     $nom_entreprise = $_POST['nom_entreprise'];
     

      
     // validate input
     $valid = true;

     
    if (empty($nom_entreprise)) {
        $entrepriseError = "Donner le nom de l'entreprise";
        $valid = false;
    }
      
     if (empty($nom_offre)) {
        $nomError = "Donner le nom de l'offre";
        $valid = false;
    }

     if (empty($duree_offre)) {
         $dureeError = "Donner la duree de l'offre"; 
         $valid = false;
     }

     if (empty($remuneration_offre)) {
        $remunerationError = "Donner la remuneration de l'offre";
        $valid = false;
    }

    if (empty($date_offre)) {
        $dateError = "Donner la date de l'offre";
        $valid = false;
    }

    if (empty($nombreplace_offre)) {
        $nombreplaceError = "Donner le nombre de place de l'offre";
        $valid = false;
    }

    if (empty($description_offre)) {
        $descriptionError = "Donner la description de l'offre";
        $valid = false;
    }


      
     // insert data
     if ($valid) {
         $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $dbh = "SELECT id_entreprise FROM entreprise WHERE nom_entreprise = ? limit 1";
         $q = $sql->prepare($dbh);
         $q->execute(array($nom_entreprise));
         $nom_entreprise = $q->fetchColumn();
         $dbh = "INSERT INTO offre (nom_offre,duree_offre,base_remuneration_offre, date_offre ,nombre_place_offre,description_offre,id_entreprise) values(?,?,?, ?, ?, ?,?) ";
         $q = $sql->prepare($dbh);
         $q->execute(array($nom_offre,$duree_offre,$remuneration_offre, $date_offre, $nombreplace_offre,$description_offre,$nom_entreprise));
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
    <script src=
        "https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
  
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        type="text/javascript">
    </script>
      
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
</head>
<body>
<div class="bg"></div>
<div class="span10 offset1">
                    <div class="row">
                        <h3>Ajouter une offre</h3>
                    </div>         
                    <form class="form-horizontal" method="post">    
                    <div class="control-group <?php echo !empty($nom_entreprise)?'error':'';?>">
                        <label class="control-label">Nom de l'entreprise</label>
                        <div class="controls">
                        <input type="text" name="nom_entreprise" 
                        id="nom_entreprise" class="form-control"
                        placeholder='Nom entreprise' value="<?php echo !empty($nom_entreprise)?$nom_entreprise:'';?>">
                            <?php if (!empty($entrepriseError)): ?>
                                <span class="help-inline"><?php echo $entrepriseError;?></span>
                            <?php endif;?>
                        </div>
                    <div class="control-group <?php echo !empty($nom_offre)?'error':'';?>">
                        <label class="control-label">Nom de l'offre</label>
                        <div class="controls">
                        <input type="text" name="nom_offre" 
                        id="nom_offre" class="form-control"
                        placeholder='Nom Offre' value="<?php echo !empty($nom_offre)?$nom_offre:'';?>">
                            <?php if (!empty($nomError)): ?>
                                <span class="help-inline"><?php echo $nomError;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                      <div class="control-group <?php echo !empty($dureeError)?'error':'';?>">
                        <label class="control-label">Duree du stage</label>
                        <div class="controls">
                        <input type="text" name="duree_offre" 
                        id="duree_offre" class="form-control"
                        placeholder='Duree offre' value="<?php echo !empty($duree_offre)?$duree_offre:'';?>">
                            <?php if (!empty($dureeError)): ?>
                                <span class="help-inline"><?php echo $dureeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($remunerationError)?'error':'';?>">
                        <label class="control-label">Base de la remuneration</label>
                        <div class="controls">
                        <input type="text" name="base_remuneration_offre" 
                        id="base_remuneration_offre" class="form-control"
                        placeholder='Base Remuneration' value="<?php echo !empty($remuneration_offre)?$remuneration_offre:'';?>">
                            <?php if (!empty($remunerationError)): ?>
                                <span class="help-inline"><?php echo $remunerationError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Date du stage</label>
                        <div class="controls">
                        <input type="date" name="date_offre" 
                        id="date_offre" class="form-control"
                        placeholder='Date Offre' value="<?php echo !empty($date_offre)?$date_offre:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nombreplaceError)?'error':'';?>">
                        <label class="control-label">Nombre de place pour l'offre </label>
                        <div class="controls">
                        <input type="text" name="nombre_place_offre" 
                        id="nombre_place_offre" class="form-control"
                        placeholder='Nombre Place Offre'value="<?php echo !empty($nombreplace_offre)?$nombreplace_offre:'';?>">
                            <?php if (!empty($nombreplaceError)): ?>
                                <span class="help-inline"><?php echo $nombreplaceError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($description_offre)?'error':'';?>">
                        <label class="control-label">Description de l'offre</label>
                        <div class="controls">
                        <input type="text" name="description_offre" 
                        id="description_offre" class="form-control"
                        placeholder='Description Offre' value="<?php echo !empty($description_offre)?$description_offre:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="GestionOffre.php">Back</a>
                        </div>
                    </form>
                </div>
                            </body>
                            </html>
