<?php
  
$id_entreprise = $_REQUEST['id_entreprise'];
  
$con = mysqli_connect("localhost", "root", "", "projetweb");
  
if ($id_entreprise !== "") {
      
 
    $query = mysqli_query($con, "SELECT nom_entreprise, 
    centre_activite_entreprise,nombre_stagiaireCESI_entreprise FROM entreprise WHERE id_entreprise='$id_entreprise'");
  
    $row = mysqli_fetch_array($query);

    $nom_entreprise = $row["nom_entreprise"];
    $centre_activite_entreprise = $row["centre_activite_entreprise"];
    $nombre_stagiaireCESI_entreprise = $row["nombre_stagiaireCESI_entreprise"];
}
  
$result = array("$nom_entreprise", "$centre_activite_entreprise","$nombre_stagiaireCESI_entreprise");
  
$myJSON = json_encode($result);
echo $myJSON;
?>