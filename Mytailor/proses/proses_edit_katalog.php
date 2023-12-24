<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";
$nama_desain = (isset($_POST['nama_desain'])) ? htmlentities($_POST['nama_desain']) : " ";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : " ";
$kategori_katalog = (isset($_POST['kategori_katalog'])) ? htmlentities($_POST['kategori_katalog']) : " ";


$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../assets/img/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['edit_katalog_validate'])) {
    // Cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, File Yang Dimasukkan Telah Ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ', Gambar tidak dapat diupload")
        window.location="../katalog"</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM tb_katalog WHERE nama_desain = '$nama_desain'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Nama Desain yang dimasukkan telah ada ")
            window.location="../katalog"</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "UPDATE tb_katalog SET foto='" . $kode_rand . $_FILES['foto']['name'] . "', nama_desain ='$nama_desain',keterangan='$keterangan', kategori='$kategori_katalog' WHERE id='$id'");
                if ($query) {
                    $message = '<script>alert("Data Berhasil Dimasukkan")
            window.location="../katalog"</script>';
                } else {
                    $message = '<script>alert("Data Gagal Dimasukkan")
            window.location="../katalog"</script>';
                }
            } else {
                $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload")
            window.location="../katalog"</script>';
            }
        }
    }
}
echo $message;
?>