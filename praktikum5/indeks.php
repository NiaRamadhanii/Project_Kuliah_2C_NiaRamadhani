<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liga </title>
</head>
<body>
    <?php 
        $koneksi = mysqli_connect("localhost", "root", "", "dbsaya") or die ("koneksi gagal");
        $query = mysqli_query ($koneksi, "SELECT * FROM liga");
        // $row = mysqli_fetch_array($query);
       // echo $row["champion"];
        while ($row = mysqli_fetch_assoc($query)){
            echo $row["negara"]."<br>";
        }
    ?>
</body>
</html>