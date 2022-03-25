<?php
 
 $sql = new PDO('mysql:host=localhost;dbname=ProjetWeb', 'root', '');

 if ( !empty($_POST)) {
     // keep track validation errors
   
     $NomError = null;
     $CentreError = null;
     $StagiaireError = null;

     
      
     // keep track post values
    
     $nom_entreprise = $_POST['nom_entreprise'];
     $centre_activite_entreprise = $_POST['centre_activite_entreprise'];
     $nombre_stagiaireCESI_entreprise = $_POST['nombre_stagiaireCESI_entreprise'];
  



     // validate input
     $valid = true;


     if (empty($nom_entreprise)) {
         $NomError = "Donner le nom de l'entreprise";
         $valid = false;
     }
      
     if (empty($centre_activite_entreprise)) {
         $CentreError = "Donner le centre d'activité de l'entreprise";
         $valid = false;
     }
      
     if (empty($nombre_stagiaireCESI_entreprise)) {
         $StagiaireError = "Donner le nombre de stagiaire de l'entreprise";
         $valid = false;
     }



      
     // insert data
     if ($valid) {
         $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $dbh = "INSERT INTO entreprise (nom_entreprise,centre_activite_entreprise,nombre_stagiaireCESI_entreprise) values(?, ?, ?)";
         $q = $sql->prepare($dbh);
         $q->execute(array($nom_entreprise,$centre_activite_entreprise,$nombre_stagiaireCESI_entreprise));
         header('Location: Gestion_entreprise.php');
     }
 
    }

?>

<div class="span10 offset1">
                    <div class="row">
                        <h3>Ajouter une entreprise</h3>
                    </div>             
                    <form class="form-horizontal" method="post">
                      <div class="control-group <?php echo !empty($NomError)?'error':'';?>">
                        <label class="control-label">Nom Entreprise</label>
                        <div class="controls">
                            <input name="nom_entreprise" type="text"  placeholder="nom_entreprise" value="<?php echo !empty($nom_entreprise)?$nom_entreprise:'';?>">
                            <?php if (!empty($NomError)): ?>
                                <span class="help-inline"><?php echo $NomError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($CentreError)?'error':'';?>">
                        <label class="control-label">Centre d'activité</label>
                        <div class="controls">
                            <input name="centre_activite_entreprise" type="text" placeholder="centre_activite_entreprise" value="<?php echo !empty($centre_activite_entreprise)?$centre_activite_entreprise:'';?>">
                            <?php if (!empty($CentreError)): ?>
                                <span class="help-inline"><?php echo $CentreError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($StagiaireError)?'error':'';?>">
                        <label class="control-label">Nombre de stagiaire</label>
                        <div class="controls">
                            <input name="nombre_stagiaireCESI_entreprise" type="text"  placeholder="nombre_stagiaireCESI_entreprise" value="<?php echo !empty($nombre_stagiaireCESI_entreprise)?$nombre_stagiaireCESI_entreprise:'';?>">
                            <?php if (!empty($StagiaireError)): ?>
                                <span class="help-inline"><?php echo $StagiaireError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="Gestion.php">Back</a>
                        </div>
                    </form>
                </div>