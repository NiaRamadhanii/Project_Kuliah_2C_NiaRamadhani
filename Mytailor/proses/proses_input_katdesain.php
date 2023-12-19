<?php
include "connect.php";
$jenisdesain = (isset($_POST['jenisdesain'])) ? htmlentities($_POST['jenisdesain']) : "";
$katdesain = (isset($_POST['katdesain'])) ? htmlentities($_POST['katdesain']) : "";

if (!empty($_POST['input_katdesain_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_katalog FROM tb_kategori_katalog WHERE kategori_katalog = '$katdesain'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori yang dimasukkan telah ada");
                    window.location="../katdesain"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_kategori_katalog (jenis_katalog, kategori_katalog) values ('$jenisdesain','$katdesain')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan")
                    window.location="../katdesain"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan")
                        window.location="../katdesain"</script>';
        }
    }
}
echo $message;
?>