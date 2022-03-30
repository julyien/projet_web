<?php
$sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

if ( !empty($_POST)) {
    // keep track validation errors
    
    $IdError = null;
    
    // keep track post values
    
    $identifiant_profil = $_POST['identifiant_profil'];
    
    // validate input
    $valid = true;
    
    
    if (empty($identifiant_profil)) {
        $IdError = "Donner l'identifiant du pilote";
        $valid = false;
    }
    
    
    
    
    // insert data
    if ($valid) {
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "DELETE FROM permission WHERE identifiant_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($identifiant_profil));
        $dbh = "DELETE FROM candidate WHERE identifiant_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($identifiant_profil));
        $dbh = "DELETE FROM wishlist WHERE identifiant_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($identifiant_profil));
        $dbh = "DELETE FROM profil WHERE identifiant_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($identifiant_profil));
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
<div>

<div>
<div>
<h3>Supprimer un profil</h3>
</div>

<form class="form-horizontal" method="post">
<div class="control-group <?php echo !empty($IdError)?'error':'';?>">
<label class="control-label">Id Pilote</label>
<div class="controls">
<input name="identifiant_profil" type="int"  placeholder="identifiant_profil" value="<?php echo !empty($identifiant_profil)?$identifiant_profil:'';?>">
<?php if (!empty($IdError)): ?>
    <span class="help-inline"><?php echo $IdError;?></span>
    <?php endif; ?>
    </div>
    </div>
    <div class="form-actions">
    <button type="submit" class="btn btn-success">Supprimer</button>
    <a class="btn" href="GestionPilote.php">Back</a>
    </div>
    </form>
    </div>
    
    </div>
    </body>
    </html>
