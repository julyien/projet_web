<?php
  
// Get the user id 
$id_offre = $_REQUEST['id_offre'];
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "projetweb");
  
if ($id_offre !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT entreprise_offre, 
    duree_offre,base_remuneration_offre,date_offre,nombre_place_offre,description_offre,id_entreprise FROM offre WHERE id_offre='$id_offre'");
  
    $row = mysqli_fetch_array($query);

    $entreprise_offre = $row["entreprise_offre"];
    $duree_offre = $row["duree_offre"];
    $remuneration_offre = $row["base_remuneration_offre"];
    $date_offre = $row["date_offre"];
    $nombreplace_offre = $row["nombre_place_offre"];
    $description_offre = $row["description_offre"];
    $identreprise_offre = $row["id_entreprise"];
}
  
// Store it in a array
$result = array("$entreprise_offre", "$duree_offre","$remuneration_offre","$date_offre","$nombreplace_offre","$description_offre","$identreprise_offre");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>