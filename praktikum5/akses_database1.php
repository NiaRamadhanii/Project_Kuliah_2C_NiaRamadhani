<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database MySQL</title>
</head>
<body>
    <h1>Koneksi Database dengan mysqli_fecth_array</h1>
    <?php
    $conn = mysqli_connect ("localhost","root","", "dbsaya")
            or die ("koneksi gagal");
    $hasil = mysqli_query ($conn, "SELECT * FROM liga");
    while ($row = mysqli_fetch_array($hasil)) {
        echo "liga  " . $row["negara"]; //array asosiatif
        echo " mempunyai  " . $row[2]; //array numeris
        echo " wakil di liga champion <br>";
    }
    ?>
</body>
</html>