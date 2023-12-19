<style>.nav-link.active {
background-color: #F4A460 !important;
color: white !important;
}</style>
<div class="col-lg-3">
  <nav class="navbar navbar-expand-lg bg-body-tertiary rounded border mt-2">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel"
        style="widht:250px">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
            <li class="nav-item">
              <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                aria-current="page" href="home"><i class="bi bi-house-door"></i>
                Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'katalog') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                href="katalog"><i class="bi bi-person-standing-dress"></i> Katalog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'katdesain') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                href="katdesain"><i class="bi bi-tags"></i> Kategori Desain</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'pesanan') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                href="pesanan"><i class="bi bi-cart4"></i> Pesanan</a>
            </li>
            <?php if ($hasil['level'] == 1) { ?>
              <li class="nav-item">
                <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'pelanggan') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                  href="pelanggan"><i class="bi bi-receipt-cutoff"></i> Pelanggan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'user') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                  href="user"><i class="bi bi-receipt-cutoff"></i> User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'laporan') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                  href="laporan"><i class="bi bi-journals"></i> Laporan</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>