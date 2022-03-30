<?php
$sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

if ( !empty($_POST)) {
    // keep track validation errors
    
    $IdError = null;
    
    // keep track post values
    
    $id_offre = $_POST['id_offre'];
    
    // validate input
    $valid = true;
    
    
    if (empty($id_offre)) {
        $IdError = "Donner l'ID de l'offre";
        $valid = false;
    }
    
    
    
    
    // insert data
    if ($valid) {
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "DELETE FROM se_situe WHERE id_offre = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_offre));
        $dbh = "DELETE FROM candidate WHERE id_offre = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_offre));
        $dbh = "DELETE FROM wishlist WHERE id_offre = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_offre));
        $dbh = "DELETE FROM offre WHERE id_offre = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($id_offre));
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
<div>

<div>
<div>
<h3>Delete une Offre</h3>
</div>

<form class="form-horizontal" method="post">
<div class="control-group <?php echo !empty($IdError)?'error':'';?>">
<label class="control-label">Id Offre</label>
<div class="controls">
<input name="id_offre" type="int"  placeholder="id_offre" value="<?php echo !empty($id_offre)?$id_offre:'';?>">
<?php if (!empty($IdError)): ?>
    <span class="help-inline"><?php echo $IdError;?></span>
    <?php endif; ?>
    </div>
    </div>
    <div class="form-actions">
    <button type="submit" class="btn btn-success">Supprimer</button>
    <a class="btn" href="GestionOffre.php">Back</a>
    </div>
    </form>
    </div>
    
    </div>
    </body>
    </html>
