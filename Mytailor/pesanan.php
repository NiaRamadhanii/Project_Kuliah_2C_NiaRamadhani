
<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Order
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Order</button>
        </div>
      </div>
      <!-- Modal Tambah Order Baru-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Order Makanan dan Minuman</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_order.php " method="post">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="uploadfoto" name="kode_order"
                        value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                      <label for="uploadfoto">Kode Order</label>
                      <div class="invalid-feedback">
                        Masukkan Kode Order.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="meja" placeholder="Nomor Meja" name="meja" required>
                      <label for="meja">Meja</label>
                      <div class="invalid-feedback">
                        Masukkan Meja.
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
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_order_validate" value="12345">Buat
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
        echo "Data menu makanan atau minuman tidak ada tidak ada";
      } else {
        foreach ($result as $row) {
          ?>
          <!-- Modal Edit -->
          <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_order.php " method="post">
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
                      <div class="col-lg-2">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="meja" placeholder="Nomor Meja" name="meja" required
                            value="<?php echo $row['meja'] ?>">
                          <label for="meja">Meja</label>
                          <div class="invalid-feedback">
                            Masukkan Meja.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-7">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="pelanggan" placeholder="Nama pelanggan"
                            name="pelanggan" required value="<?php echo $row['pelanggan'] ?>">
                          <label for="pelanggan">Nama Pelanggan</label>
                          <div class="invalid-feedback">
                            Masukkan Nama Pelanggan.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="edit_order_validate" value="12345">Simpan</button>
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                    <div class="col-lg-12">
                      Apakah anda ingin menghapus Order atas nama<b>
                        <?php echo $row['pelanggan'] ?>
                      </b> dengan kode order <b>
                        <?php echo $row['id_order'] ?>
                      </b>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="delete_order_validate" value="12345">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal Delete-->

          <!-- Modal Reset Password-->
          <?php
        }
        foreach ($result as $row) {
          ?>
          <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="col-lg-12">
                      <?php
                      if ($row['username'] == $_SESSION['username_decafe']) {
                        echo "<div class='alert alert-danger'>Anda tidak dapat mereset password akun sendiri.</div>";
                      } else {
                        echo "Apakah anda yakin ingin mereset password user <b> $row[username]</b> menjadi password bawaan sistem yaitu <b>password</b> <b></b>";
                      }
                      ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_decafe']) ? 'disabled' : ''; ?>>Reset Password</button>
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
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">No</th>
                <th scope="col">Kode Order</th>
                <th scope="col">Foto</th>
                <th scope="col">Pelanggan</th>
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
                    <?php echo $row['meja'] ?>

                  </td>
                  <td>
                    <?php echo number_format((int) $row['harganya'], 0, ',', '.') ?>

                  </td>
                  <td>
                    <?php echo $row['nama'] ?>
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
                        href="./?x=orderitem&order=  <?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
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