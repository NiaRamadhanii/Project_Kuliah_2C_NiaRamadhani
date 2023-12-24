<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$nohp =  (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "" ;

if (!empty($_POST['input_pesanan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE id_order = '$kode_order'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Order yang dimasukkan telah ada");
                    window.location="../pesanan"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_pesanan (id_order, pelanggan, nohp, pelayan) VALUES ('$kode_order', '$pelanggan', '$nohp', '$_SESSION[id_mytaylor]' )");
        if ($query) {
            $message = '<script> alert("Order berhasil dimasukkan");
                    window.location="../?x=orderitem&order='.$kode_order.'&pelanggan='.$pelanggan.'"</script>';
        } else {
            $message = '<script> alert("Order Gagal Dimasukkan")</script>';
        }
    }
}
echo $message;
?>