<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['edit_pesanan_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_pesanan SET pelanggan='$pelanggan' WHERE id_order ='$kode_order'");
        if ($query) {
            $message = '<script>alert("username berhasil dimasukkan");
        window.location="../pesanan"</script>';
        } else {
            $message = '<script>alert("data gagal dimasukkan")
            window.location="../pesanaan"</script>';
        }
    
}
echo $message;
?>