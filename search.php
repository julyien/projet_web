<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "projetweb";

$conn = mysqli_connect($server,$username,$password,$dbname);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="projet.css" rel="stylesheet" type="text/css">
    <link rel="manifest" href="manifest.json">
    <script>
        //if browser support service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js');
        };
    </script>
</head>

<body>
<div class="bg"></div>

<br> 

<h1> <div class="d"> Page de recherche </div> </h1>

<br>
<br>
<br>

<div class="profil-container">
    <div class="c col-6 mx-auto">
        <div class="brd">
<?php
    if (isset($_POST['identifiant_profil'])){
        $search = mysqli_real_escape_string($conn,$_POST['identifiant_profil']);
        $sql = "SELECT * FROM profil WHERE nom_profil LIKE '%$search%' OR  identifiant_profil LIKE '%$search%' OR promotion_profil LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        echo "Il y a ".$queryResult." resultat";

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
    </div>
</div>

</body>