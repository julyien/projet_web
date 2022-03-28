<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "projetweb";

$conn = mysqli_connect($server,$username,$password,$dbname);

?>

<h1>Search page</h1>

<div class="profil-container">
<?php
    if (isset($_POST['identifiant_profil'])){
        $search = mysqli_real_escape_string($conn,$_POST['identifiant_profil']);
        $sql = "SELECT * FROM profil WHERE nom_profil LIKE '%$search%' OR  identifiant_profil LIKE '%$search%' OR promotion_profil LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        echo "Il y a ".$queryResult." resultats";

        if ($queryResult > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<a href='ProfilSearch.php?id_profil=" .$row['id_profil']."'><div class='profil-box'>
                <h3>".$row['identifiant_profil']."</h3>
                </div></a>";
            }
        } else {
            "No Result";
        }
    }

?>
</div>