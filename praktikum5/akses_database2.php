<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi database MySQL</title>
</head>
<body>
    <h1>Koneksi database dengan mysqli_fecth_assoc</h1>
    <?php
    $conn=mysqli_connect("localhost","root","", "dbsaya")
    or die ("koneksi gagal");
    $hasil = mysqli_query($conn,"SELECT * FROM liga");
        while ($row = mysqli_fetch_assoc($hasil)) {
        echo " liga " . $row["negara"];
        echo " mempunyai " . $row["champion"];
        echo " wakil di liga champion <br> ";
        }
    ?>
</body>
</html>