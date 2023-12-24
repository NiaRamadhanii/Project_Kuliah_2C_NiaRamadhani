<?php
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";

if (!empty($_POST['delete_pesanan_validate'])) {
   $select = mysqli_query($conn, "SELECT kode_order FROM tb_list_order WHERE kode_order = '$kode_order' ");
   if (mysqli_num_rows($select) > 0) {
      $message = '<script>alert("Order telah memiliki item order, data Order ini tidak dapat dihapus ");
        window.location="../pesanan";</script>';
   } else {
      $query = mysqli_query($conn, "DELETE FROM tb_pesanan WHERE id_order='$kode_order'");
      if ($query) {
         $message = '<script>alert("Data berhasil dihapus");
        window.location="../pesanan";</script>';
      } else {
         $message = '<script>alert("Data gagal dihapus")
      window.location="../pesanan";</script>';
      }
   }
}
echo $message;
?>