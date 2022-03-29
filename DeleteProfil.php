<?php
$sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

if ( !empty($_POST)) {
    // keep track validation errors
    
    $IdError = null;
    
    // keep track post values
    
    $id_profil = $_POST['id_profil'];
    
    // validate input
    $valid = true;
    
    
    if (empty($id_profil)) {
        $IdError = "Donner l'ID du profil";
        $valid = false;
    }
    
    
    
    
    // insert data
    if ($valid) {
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "DELETE FROM appartient WHERE id_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_profil));
        $dbh = "DELETE FROM permission WHERE id_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_profil));
        $dbh = "DELETE FROM candidate WHERE id_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_profil));
        $dbh = "DELETE FROM wishlist WHERE id_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_profil));
        $dbh = "DELETE FROM profil WHERE id_profil = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_profil));
        header('Location: Gestion_etudiants.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link   href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div>

<div>
<div>
<h3>Supprimer un profil</h3>
</div>

<form class="form-horizontal" method="post">
<div class="control-group <?php echo !empty($IdError)?'error':'';?>">
<label class="control-label">Id Profil</label>
<div class="controls">
<input name="id_profil" type="int"  placeholder="id_profil" value="<?php echo !empty($id_profil)?$id_profil:'';?>">
<?php if (!empty($IdError)): ?>
    <span class="help-inline"><?php echo $IdError;?></span>
    <?php endif; ?>
    </div>
    </div>
    <div class="form-actions">
    <button type="submit" class="btn btn-success">Supprimer</button>
    <a class="btn" href="Gestion_etudiants.php">Back</a>
    </div>
    </form>
    </div>
    
    </div>
    </body>
    </html>
