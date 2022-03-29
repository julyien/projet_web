<?php
  
$id_profil = $_REQUEST['id_profil'];
  
$con = mysqli_connect("localhost", "root", "", "projetweb");
  
if ($id_profil !== "") {
       
    $query = mysqli_query($con, "SELECT nom_profil, 
    prenom_profil,promotion_profil,identifiant_profil,password_profil,id_centre FROM profil WHERE id_profil='$id_profil'");
  
    $row = mysqli_fetch_array($query);

    $nom_profil = $row["nom_profil"];
    $prenom_profil = $row["prenom_profil"];
    $promotion_profil = $row["promotion_profil"];
    $identifiant_profil = $row["identifiant_profil"];
    $password_profil = $row["password_profil"];
    $id_centre = $row["id_centre"];
}
  
$result = array("$nom_profil", "$prenom_profil","$promotion_profil","$identifiant_profil","$password_profil","$id_centre",);
  
$myJSON = json_encode($result);
echo $myJSON;
?>