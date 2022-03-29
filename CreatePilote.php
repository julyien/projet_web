<?php
 
 $sql = new PDO('mysql:host=localhost;dbname=ProjetWeb', 'root', '');

 if ( !empty($_POST)) {
     // keep track validation errors
   
     $NomError = null;
     $PrenomError = null;
     $PromoError = null;
     $IDError = null;
     $PswError= null;
     $CentreError = null;
     
      
     // keep track post values
    
     $nom_profil = $_POST['nom_profil'];
     $prenom_profil = $_POST['prenom_profil'];
     $promotion_profil = $_POST['promotion_profil'];
     $identifiant_profil = $_POST['identifiant_profil'];
     $password_profil = $_POST['password_profil'];
     $id_centre = $_POST['id_centre'];
     $id_role = 1;



     // validate input
     $valid = true;


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
        $IDError = "Donner l'idantifiant' du profil";
        $valid = false;
    }

    if (empty($password_profil)) {
        $PswError = "Donner le mot de passe du profil";
        $valid = false;
    }

    if (empty($id_centre)) {
        $CentreError = "Donner le centre du profil";
        $valid = false;
    }
      
     // insert data
     if ($valid) {
         $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $dbh = "INSERT INTO profil (nom_profil,prenom_profil,promotion_profil, identifiant_profil, password_profil, id_centre, id_role) values(?, ?, ?, ?, ?, ?, ?)";
         $q = $sql->prepare($dbh);
         $q->execute(array($nom_profil,$prenom_profil,$promotion_profil, $identifiant_profil, $password_profil, $id_centre, $id_role));
         header('Location: Gestion_etudiants.php');
     }
 }


?>

<div class="span10 offset1">
                    <div class="row">
                        <h3>Ajouter un profil</h3>
                    </div>             
                    <form class="form-horizontal" method="post">
                      <div class="control-group <?php echo !empty($NomError)?'error':'';?>">
                        <label class="control-label">Nom Profil</label>
                        <div class="controls">
                            <input name="nom_profil" type="text"  placeholder="nom_profil" value="<?php echo !empty($nom_profil)?$nom_profil:'';?>">
                            <?php if (!empty($NomError)): ?>
                                <span class="help-inline"><?php echo $NomError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PrenomProfilError)?'error':'';?>">
                        <label class="control-label">Prenom profil</label>
                        <div class="controls">
                            <input name="prenom_profil" type="text" placeholder="prenom_profil" value="<?php echo !empty($prenom_profil)?$prenom_profil:'';?>">
                            <?php if (!empty($PrenomError)): ?>
                                <span class="help-inline"><?php echo $PrenomError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PromoError)?'error':'';?>">
                        <label class="control-label">Promotion Profil</label>
                        <div class="controls">
                            <input name="promotion_profil" type="text"  placeholder="promotion_profil" value="<?php echo !empty($promotion_profil)?$promotion_profil:'';?>">
                            <?php if (!empty($PromoError)): ?>
                                <span class="help-inline"><?php echo $PromoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($IDError)?'error':'';?>">
                        <label class="control-label">Identifiant Profil</label>
                        <div class="controls">
                            <input name="identifiant_profil" type="text"  placeholder="identifiant_profil" value="<?php echo !empty($identifiant_profil)?$identifiant_profil:'';?>">
                            <?php if (!empty($IDError)): ?>
                                <span class="help-inline"><?php echo $IDError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PswError)?'error':'';?>">
                        <label class="control-label">Mot de passe</label>
                        <div class="controls">
                            <input name="password_profil" type="text"  placeholder="password_profil" value="<?php echo !empty($password_profil)?$password_profil:'';?>">
                            <?php if (!empty($PswError)): ?>
                                <span class="help-inline"><?php echo $PswError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($CentreError)?'error':'';?>">
                        <label class="control-label">Centre</label>
                        <div class="controls">
                            <input name="id_centre" type="int"  placeholder="id_centre" value="<?php echo !empty($id_centre)?$id_centre:'';?>">
                            <?php if (!empty($CentreError)): ?>
                                <span class="help-inline"><?php echo $CentreError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="Gestion_pilotes.php">Back</a>
                        </div>
                    </form>
                </div>