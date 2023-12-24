<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_pesanan.*, tb_bayar.*, nama, SUM(harga*jumlah) AS harganya FROM tb_pesanan
 LEFT JOIN tb_user ON tb_user.id = tb_pesanan.pelayan
 LEFT JOIN tb_list_order ON tb_list_order.kode_order=tb_pesanan.id_order
 LEFT JOIN tb_katalog ON tb_katalog.id = tb_list_order.desain
 LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_pesanan.id_order
 GROUP BY id_order ORDER BY waktu_order DESC ");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>
<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Order
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah
            Pesanan</button>
        </div>
      </div>
      <!-- Modal Tambah Order Baru-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pesanan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_pesanan.php " method="post">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="kode_order" name="kode_order"
                        value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                      <label for="uploadfoto">Kode Order</label>
                      <div class="invalid-feedback">
                        Masukkan Kode Order.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="pelanggan" placeholder="Nama pelanggan"
                        name="pelanggan" required>
                      <label for="pelanggan">Nama Pelanggan</label>
                      <div class="invalid-feedback">
                        Masukkan Nama Pelanggan.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxx" name="nohp">
                      <label for="floatingInput">No Hp</label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning" name="input_pesanan_validate" value="12345">Buat
                    Order</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- Akhir Modal Tambah Order Baru-->
      <?php
      if (empty($result)) {
        echo "Data Pesanan  tidak ada";
      } else {
        foreach ($result as $row) {
          ?>
          <!-- Modal Edit -->
          <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pesanan </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_pesanan.php " method="post">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="uploadfoto" name="kode_order"
                            value="<?php echo $row['id_order'] ?>" readonly>
                          <label for="uploadfoto">Kode Order</label>
                          <div class="invalid-feedback">
                            Masukkan Kode Order.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-7">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan"
                            name="pelanggan" required value="<?php echo $row['pelanggan'] ?>">
                          <label for="pelanggan">Nama Pelanggan</label>
                          <div class="invalid-feedback">
                            Masukkan Nama Pelanggan.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxx" name="nohp">
                          <label for="floatingInput">No Hp</label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-warning" name="edit_pesanan_validate"
                        value="12345">Simpan</button>
                    </div>
                  </form>

                </div>

              </div>
            </div>
          </div>

          <!-- End Modal Edit-->

          <!-- Modal Delete -->
          <?php
        }
        foreach ($result as $row) {
          ?>
          <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Pesanan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_pesanan.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                    <div class="col-lg-12">
                      Apakah anda ingin menghapus Pesanan atas nama<b>
                        <?php echo $row['pelanggan'] ?>
                      </b> dengan kode order <b>
                        <?php echo $row['id_order'] ?>
                      </b>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="delete_pesanan_validate"
                        value="12345">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal Delete-->
          <?php
        }
        ?>
        <div class="table-responsive mt-2">
          <table class="table table-hover" id="example">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">No</th>
                <th scope="col">Kode Order</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">No Hp</th>
                <th scope="col">Pelayan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Waktu Order</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($result as $row) {
                ?>
                <tr>
                  <th scope="row">
                    <?php echo $no++ ?>
                  </th>
                  <td>
                    <?php echo $row['id_order'] ?>
                  </td>
                  <td>
                    <?php echo $row['pelanggan'] ?>
                  </td>
                  <td>
                    <?php echo $row['nohp'] ?>
                  </td>
                  <td>
                    <?php echo $row['nama'] ?>
                  </td>
                  <td>
                    <?php echo $row['harganya'] ?>
                  </td>
                  <td>
                    <?php echo (!empty($row['id_bayar'])) ?
                      "<span class='badge text-bg-success'>dibayar</span>" : "<span class='badge text-bg-danger'>belum bayar</span>"; ?>
                  </td>
                  <td>
                    <?php echo $row['waktu_order'] ?>
                  </td>
                  <td>
                    <div class="d-flex">
                      <a class="btn btn-info btn-sm me-1"
                        href="./?x=orderitem&order=  <?php echo $row['id_order'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                          class="bi bi-eye"></i></a>
                      <button
                        class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>"
                        data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i
                          class="bi bi-pencil-square"></i></button>

                      <button
                        class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>"
                        data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i
                          class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <?php
              } ?>
            </tbody>
          </table>
        </div>
        <?php
      } ?>
    </div>
  </div>
</div>