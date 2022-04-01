<?php                                   // Cette page permet d'ajouter automatiquement les données des offres une fois que l'on a rentré l'id de l'offre
  
$id_offre = $_REQUEST['id_offre'];
  
$con = mysqli_connect("localhost", "root", "", "projetweb");
  
if ($id_offre !== "") {
      
 
    $query = mysqli_query($con, "SELECT nom_offre, 
    duree_offre,base_remuneration_offre,date_offre,nombre_place_offre,description_offre,id_entreprise FROM offre WHERE id_offre='$id_offre'");
  
    $row = mysqli_fetch_array($query);

    $nom_offre = $row["nom_offre"];
    $duree_offre = $row["duree_offre"];
    $remuneration_offre = $row["base_remuneration_offre"];
    $date_offre = $row["date_offre"];
    $nombreplace_offre = $row["nombre_place_offre"];
    $description_offre = $row["description_offre"];
    $identreprise_offre = $row["id_entreprise"];
}
  
$result = array("$nom_offre", "$duree_offre","$remuneration_offre","$date_offre","$nombreplace_offre","$description_offre","$identreprise_offre");
  
$myJSON = json_encode($result);
echo $myJSON;
?>