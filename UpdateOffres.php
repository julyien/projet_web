<?php

$id_offre = null;
if ( !empty($_GET['id_offre'])) {
    $id_offre = $_POST['id_offre'];
}



if ( !empty($_POST)) {
    // keep track validation errors
    $IdError = null;
    $EntrepriseError = null;
    $DureeError = null;
    $RemunError = null;
    $DateError= null;
    $PlaceError = null;
    $IdentifiantError = null;
    
    // keep track post values
    $id_offre = $_POST['id_offre'];
    $entreprise_offre = $_POST['entreprise_offre'];
    $duree_offre = $_POST['duree_offre'];
    $base_remuneration_offre = $_POST['base_remuneration_offre'];
    $date_offre = $_POST['date_offre'];
    $nombre_place_offre = $_POST['nombre_place_offre'];
    $id_entreprise = $_POST['id_entreprise'];
    
    // validate input
    $valid = true;
    
    if (empty($id_offre)) {
        $IdError = "Donner l'ID de l'offre";
        $valid = false;
    }
    
    if (empty($entreprise_offre)) {
        $EntrepriseError = "Donner le nom de l'entreprise";
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
    
    if (empty($id_entreprise)) {
        $IdentifiantError = "Donner l'id de l'entreprise";
        $valid = false;
    }
    
    // update data
    if ($valid) {
        $sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "UPDATE `offre` SET entreprise_offre =  ?, duree_offre = ?, base_remuneration_offre = ?, date_offre = ?, nombre_place_offre = ?, id_entreprise = ? WHERE id_offre = ?";
        $q = $sql->prepare($dbh);   
        $q->execute(array( $entreprise_offre,$duree_offre,$base_remuneration_offre, $date_offre, $nombre_place_offre, $id_entreprise,$id_offre )); 
        header('Location: Gestion_offre.php');
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
<h3>Modifier une offre</h3>
</div>
<form class="form-horizontal" action="UpdateOffres.php?id_profil=<?php echo $id_offre?>" method="post">
<div class="control-group <?php echo !empty($IdError)?'error':'';?>">
<label class="control-label">ID Offre</label>
<div class="controls">
<input name="id_offre" type="int"  placeholder="id_offre" value="<?php echo !empty($id_offre)?$id_offre:'';?>">
<?php if (!empty($IdError)): ?>
    <span class="help-inline"><?php echo $IdError;?></span>
    <?php endif; ?>
    </div>
    <div class="control-group <?php echo !empty($EntrepriseError)?'error':'';?>">
    <label class="control-label">Entreprise Offre</label>
    <div class="controls">
    <input name="entreprise_offre" type="text"  placeholder="entreprise_offre" value="<?php echo !empty($entreprise_offre)?$entreprise_offre:'';?>">
    <?php if (!empty($EntrepriseError)): ?>
        <span class="help-inline"><?php echo $EntrepriseError;?></span>
        <?php endif; ?>
        </div>
        </div>
        <div class="control-group <?php echo !empty($DureeError)?'error':'';?>">
        <label class="control-label">Duree Offre</label>
        <div class="controls">
        <input name="duree_offre" type="int" placeholder="duree_offre" value="<?php echo !empty($duree_offre)?$duree_offre:'';?>">
        <?php if (!empty($DureeError)): ?>
            <span class="help-inline"><?php echo $DureeError;?></span>
            <?php endif;?>
            </div>
            </div>
            <div class="control-group <?php echo !empty($RemunError)?'error':'';?>">
            <label class="control-label">Remuneration Offre</label>
            <div class="controls">
            <input name="base_remuneration_offre" type="float"  placeholder="base_remuneration_offre" value="<?php echo !empty($base_remuneration_offre)?$base_remuneration_offre:'';?>">
            <?php if (!empty($RemunError)): ?>
                <span class="help-inline"><?php echo $RemunError;?></span>
                <?php endif;?>
                </div>
                </div>
                <div class="control-group <?php echo !empty($DateError)?'error':'';?>">
                <label class="control-label">Date Offre</label>
                <div class="controls">
                <input name="date_offre" type="date"  placeholder="date_offre" value="<?php echo !empty($date_offre)?$date_offre:'';?>">
                <?php if (!empty($DateError)): ?>
                    <span class="help-inline"><?php echo $DateError;?></span>
                    <?php endif;?>
                    </div>
                    </div>
                    <div class="control-group <?php echo !empty($PlaceError)?'error':'';?>">
                    <label class="control-label">Nombre de places de l'offre</label>
                    <div class="controls">
                    <input name="nombre_place_offre" type="int"  placeholder="nombre_place_offre" value="<?php echo !empty($nombre_place_offre)?$nombre_place_offre:'';?>">
                    <?php if (!empty($PlaceError)): ?>
                        <span class="help-inline"><?php echo $PlaceError;?></span>
                        <?php endif;?>
                        </div>
                        </div>
                        <div class="control-group <?php echo !empty($IdentifiantError)?'error':'';?>">
                        <label class="control-label">Entreprise</label>
                        <div class="controls">
                        <input name="id_entreprise" type="int"  placeholder="id_entreprise" value="<?php echo !empty($id_entreprise)?$id_entreprise:'';?>">
                        <?php if (!empty($IdentifiantError)): ?>
                            <span class="help-inline"><?php echo $IdentifiantError;?></span>
                            <?php endif;?>
                            </div>
                            </div>
                            <div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a class="btn" href="Gestion.php">Back</a>
                            </div>
                            </form>
                            </div>
                            </div> 
                            </body>
                            </html>