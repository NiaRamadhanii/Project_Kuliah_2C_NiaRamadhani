<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi database MySQL</title>
</head>
<body>
    <h1>Koneksi database dengan mysqli_fecth_row</h1>
    <?php
    $conn=mysqli_connect("localhost","root","", "dbsaya")
    or die ("koneksi gagal");
    $hasil = mysqli_query($conn,"select * from liga");
        while ($row = mysqli_fetch_row($hasil)) {
        echo " liga " . $row[1];
        echo " mempunyai " . $row[2];
        echo " wakil di liga champion <br> ";
        }
    ?>
</body>
</html>
