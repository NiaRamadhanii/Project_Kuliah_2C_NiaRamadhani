<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$order = (isset($_POST['order'])) ? htmlentities($_POST['order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$desain = (isset($_POST['desain'])) ? htmlentities($_POST['desain']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";

if (!empty($_POST['edit_orderitem_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_order WHERE desain = '$desain' && order='$order' && id_list_order !=$id");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Item yang dimasukkan telah ada");
        window.location="../?x=orderitem&order=' . $order . '&pelanggan=' . $pelanggan . '"</script>';

    } else {
        $query = mysqli_query($conn, "UPDATE tb_list_order SET desain='$desain',jumlah='$jumlah',catatan='$catatan'
        WHERE id_list_order='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../?x=orderitem&order=' . $kode_order . '&pelanggan=' . $pelanggan . '"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")
            window.location="../?x=orderitem&order=' . $kode_order . '&pelanggan=' . $pelanggan . '"</script>';
        }

    }
}
echo $message;
?>