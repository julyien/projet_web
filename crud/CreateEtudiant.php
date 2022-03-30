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
     $nom_centre = $_POST['nom_centre'];
     $id_role = 2;



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
        $IDError = "Donner l'identifiant du profil";
        $valid = false;
    }

    if (empty($password_profil)) {
        $PswError = "Donner le mot de passe du profil";
        $valid = false;
    }

    if (empty($nom_centre)) {
        $CentreError = "Donner le centre du profil";
        $valid = false;
    }
      
     // insert data
     if ($valid) {
         $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $dbh = "SELECT id_centre FROM centre_formation WHERE nom_centre = ? limit 1";
         $q = $sql->prepare($dbh);
         $q->execute(array($nom_centre));
        $nom_centre = $q->fetchColumn();
         $dbh = "INSERT INTO profil (nom_profil,prenom_profil,promotion_profil, identifiant_profil, password_profil,id_centre, id_role) values(?, ?,?, ?, ?, ?, ?)  ";
         $q = $sql->prepare($dbh);
         $q->execute(array($nom_profil,$prenom_profil,$promotion_profil, $identifiant_profil, $password_profil,$nom_centre, $id_role));
         header('Location: GestionEtudiant.php');
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

<div class="span10 offset1">
                    <div class="row">
                        <h3>" Ajouter un Etudiant</h3>
                    </div>             
                    <form class="form-horizontal" method="post">
                      <div class="control-group <?php echo !empty($NomError)?'error':'';?>">
                        <label class="control-label">Nom Profil</label>
                        <div class="controls">
                        <input type="text" name="nom_profil" 
                        id="nom_profil" class="form-control"
                        placeholder='Nom du profil' value="<?php echo !empty($nom_profil)?$nom_profil:'';?>">
                            <?php if (!empty($NomError)): ?>
                                <span class="help-inline"><?php echo $NomError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PrenomProfilError)?'error':'';?>">
                        <label class="control-label">Prenom profil</label>
                        <div class="controls">
                        <input type="text" name="prenom_profil" 
                        id="prenom_profil" class="form-control"
                        placeholder='Prenom du profil' value="<?php echo !empty($prenom_profil)?$prenom_profil:'';?>">
                            <?php if (!empty($PrenomError)): ?>
                                <span class="help-inline"><?php echo $PrenomError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PromoError)?'error':'';?>">
                        <label class="control-label">Promotion Profil</label>
                        <div class="controls">
                        <input type="text" name="promotion_profil" 
                        id="promotion_profil" class="form-control"
                        placeholder='Promotion du profil' value="<?php echo !empty($promotion_profil)?$promotion_profil:'';?>">
                            <?php if (!empty($PromoError)): ?>
                                <span class="help-inline"><?php echo $PromoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($IDError)?'error':'';?>">
                        <label class="control-label">Identifiant Profil</label>
                        <div class="controls">
                        <input type="text" name="identifiant_profil" 
                        id="identifiant_profil" class="form-control"
                        placeholder='Identifiant du profil' value="<?php echo !empty($identifiant_profil)?$identifiant_profil:'';?>">
                            <?php if (!empty($IDError)): ?>
                                <span class="help-inline"><?php echo $IDError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PswError)?'error':'';?>">
                        <label class="control-label">Mot de passe</label>
                        <div class="controls">
                        <input type="password" name="password_profil" 
                        id="password_profil" class="form-control"
                        placeholder='Password du profil' value="<?php echo !empty($password_profil)?$password_profil:'';?>">
                            <?php if (!empty($PswError)): ?>
                                <span class="help-inline"><?php echo $PswError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($CentreError)?'error':'';?>">
                        <label class="control-label">Centre</label>
                        <div class="controls">
                        <input type="text" name="nom_centre" 
                        id="nom_centre" class="form-control"
                        placeholder='Nom du centre' value="<?php echo !empty($nom_centre)?$nom_centre:'';?>">
                            <?php if (!empty($CentreError)): ?>
                                <span class="help-inline"><?php echo $CentreError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="GestionEtudiant.php">Back</a>
                        </div>
                    </form>
                </div>
    </body>
</html>