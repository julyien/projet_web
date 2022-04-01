<?php                                                                       // Cette page permet d'ajouter automatiquement les données des étudiants une fois que l'on a rentré l'indentifiant  
  
$identifiant_profil = $_REQUEST['identifiant_profil'];
  
$con = mysqli_connect("localhost", "root", "", "projetweb");


if ($identifiant_profil !== "") {

    $query = mysqli_query($con, "SELECT nom_profil, 
    prenom_profil,promotion_profil,password_profil,id_centre FROM profil WHERE identifiant_profil='$identifiant_profil' AND id_role = 2");
  
    $row = mysqli_fetch_array($query);
    $nom_profil = $row["nom_profil"];
    $prenom_profil = $row["prenom_profil"];
    $promotion_profil = $row["promotion_profil"];
    $password_profil = $row["password_profil"];
    $id_centre = $row["id_centre"];
}
  
$result = array("$nom_profil", "$prenom_profil","$promotion_profil","$password_profil","$id_centre",);
  
$myJSON = json_encode($result);
echo $myJSON;
?>