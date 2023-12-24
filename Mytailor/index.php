<style>.nav-link.active {
background-color: #F4A460 !important;
color: white !important;
}</style>
<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
  $page = "home.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'katalog') {
  $page = "katalog.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pesanan') {
  $page = "pesanan.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
  //if ($_SESSION['level_mytaylor'] == 1) {
  //   $page = "laporan.php";
  //   include "main.php";
  // } else {
  $page = "user.php";
  include "main.php";
  
} elseif (isset($_GET['x']) && $_GET['x'] == 'laporan') {
  // if ($_SESSION['level_mytaylor'] == 1) {
  //   $page = "laporan.php";
  //   include "main.php";
  // } else {
    $page = "laporan.php";
    include "main.php";
//  }
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
  include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
  include "proses/proses_logout.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'katdesain') {
  $page = "katdesain.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'orderitem') {
  $page = "order_item.php";
  include "main.php";
} else {
  $page = "home.php";
  include "main.php";
}
?>