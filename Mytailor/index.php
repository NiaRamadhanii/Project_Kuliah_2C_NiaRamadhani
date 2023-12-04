<?php
if (isset($_GET['x']) && $_GET['x'] == 'home') {
  $page = "home.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'katalog') {
  $page = "katalog.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pesanan') {
  $page = "pesanan.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pelanggan') {
  $page = "pelanggan.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'laporan') {
  $page = "laporan.php";
  include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
  include "login.php";
} else {
  include "main.php";
}
?>