<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$jeniskatalog = (isset($_POST['jeniskatalog'])) ? htmlentities($_POST['jeniskatalog']) : "";
$katdesain = (isset($_POST['kat'])) ? htmlentities($_POST['katdesain']) : "";


if (!empty($_POST['edit_katdesain_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_katalog FROM tb_kategori_katalog WHERE kategori_katalog = '$katdesain'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori Desain yang dimasukkan telah ada");
                    window.location="../katdesain"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_kategori_katalog SET jenis_katalog='$jenisdesain', kategori_katalog='$katdesain' Where id_kat_katalog='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate");
                 window.location="../katdesain"</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate");
                    window.location="../katdesain"</script>';
        }
    }
}
echo $message;
?>