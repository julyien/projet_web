<?php
include('Session.php'); 
$sql = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

if ( !empty($_POST)) {
    // keep track validation errors
    $IdError = null;
    
    // keep track post values
    $nom_entreprise = $_POST['nom_entreprise'];
    
    // validate input
    $valid = true;
    
    
    if (empty($nom_entreprise)) {
        $IdError = "Donner le nom de l'entreprise";
        $valid = false;
    }
    
    // insert data
    if ($valid) {
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh = "SELECT id_entreprise FROM entreprise WHERE nom_entreprise = ? limit 1";
        $q = $sql->prepare($dbh);
        $q->execute(array($nom_entreprise));
        $nom_entreprise = $q->fetchColumn();

        if($nom_entreprise == false  ){
            header('Location: GestionEntreprise.php?error=delete');
            exit();
        }

        $dbh = "DELETE FROM entreprise WHERE id_entreprise = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($nom_entreprise));
        $dbh = "DELETE FROM evalue WHERE id_entreprise = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($nom_entreprise));
        $dbh = "DELETE FROM offre WHERE id_entreprise = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($nom_entreprise));
        $dbh = "DELETE FROM se_situe WHERE id_entreprise = ?";    
        $q = $sql->prepare($dbh);
        $q->execute(array($nom_entreprise));
 
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
                    <div>
                        <h3>Supprimer une entreprise</h3>
                    </div>

                    <form class="form-horizontal" method="post">
                        <div class="control-group <?php echo !empty($IdError)?'error':'';?>">
                            <label class="control-label">Nom Entreprise</label>
                            <div class="controls">
                                <input name="nom_entreprise" type="int"  placeholder="nom_entreprise" value="<?php echo !empty($nom_entreprise)?$nom_entreprise:'';?>">
                                <?php if (!empty($IdError)): ?>
                                <span class="help-inline"><?php echo $IdError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Supprimer</button>
                            <a class="btn" href="GestionEntreprise.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </body>
    </html>
