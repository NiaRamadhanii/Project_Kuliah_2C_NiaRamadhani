<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['hapus_kategori_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori FROM tb_katalog WHERE kategori = '$id'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori telah digunakan pada daftar Desain. Kategori tidak dapat dihapus");
                    window.location="../katdesain"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM tb_kategori_katalog WHERE id_kat_katalog = '$id'");
        if ($query) {

            $message = '<script>alert("Data berhasil dihapus");
                    window.location="../katdesain"</script>';
        } else {
            $message = '<script>alert("Data gagal dihapus")
                    window.location="../katdesain"</script>';
        }
    }
}
echo $message;
?>