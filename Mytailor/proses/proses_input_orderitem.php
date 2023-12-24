<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$desain = (isset($_POST['desain'])) ? htmlentities($_POST['desain']) : "";
$ukuran = (isset($_POST['ukuran'])) ? htmlentities($_POST['ukuran']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";

if (!empty($_POST['input_orderitem_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_order WHERE desain = '$desain' && kode_order='$kode_order'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Item yang dimasukkan telah ada");
        window.location="../?x=orderitem&order=' . $kode_order . '&pelanggan=' . $pelanggan . '"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_list_order (desain, kode_order, jumlah, ukuran, catatan)
    values ('$desain','$kode_order','$jumlah','$ukuran','$catatan')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../?x=orderitem&order=' . $kode_order .'&pelanggan=' . $pelanggan . '"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")
            window.location="../?x=orderitem&order=' . $kode_order .'&pelanggan=' . $pelanggan . '"</script>';
        }
    }
}
echo $message;
?>