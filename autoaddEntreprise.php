<?php
  
$nom_entreprise = $_REQUEST['nom_entreprise'];
  
$con = mysqli_connect("localhost", "root", "", "projetweb");
  
if ($nom_entreprise !== "") {
      
 
    $query = mysqli_query($con, "SELECT centre_activite_entreprise,nombre_stagiaireCESI_entreprise FROM entreprise WHERE nom_entreprise='$nom_entreprise'");
  
    $row = mysqli_fetch_array($query);

    $centre_activite_entreprise = $row["centre_activite_entreprise"];
    $nombre_stagiaireCESI_entreprise = $row["nombre_stagiaireCESI_entreprise"];
}
  
$result = array("$centre_activite_entreprise","$nombre_stagiaireCESI_entreprise");
  
$myJSON = json_encode($result);
echo $myJSON;
?>