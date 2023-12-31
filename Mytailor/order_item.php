<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya, tb_pesanan.waktu_order FROM tb_list_order
LEFT JOIN tb_pesanan ON tb_pesanan.id_order=tb_list_order.kode_order
LEFT JOIN tb_katalog ON tb_katalog.id = tb_list_order.desain
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_pesanan.id_order
GROUP BY id_list_order
HAVING tb_list_order.kode_order = $_GET[order]");




$kode = $_GET['order'];
$pelanggan = $_GET['pelanggan'];

while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
  // $kode = $record['id_order'];
  // $meja = $record['meja'];
  // $pelanggan = $record['pelanggan'];
}
$select_desain = mysqli_query($conn, "SELECT id, nama_desain FROM tb_katalog");
?>
<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Order Item
    </div>
    <div class="card-body">
      <a href="pesanan" class="btn btn-warning mb-3"><i class="bi bi-arrow-left"></i></a>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode; ?>">
            <label for="uploadfoto">Kode Order</label>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="pelanggan" value="<?php echo $pelanggan; ?>">
            <label for="uploadfoto">Pelanggan</label>
          </div>
        </div>
      </div>
      <!-- Modal Tambah Item Baru-->
      <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php " method="post">
                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                <input type="hidden" name="order" value="<?php echo $order ?>">
                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" name="desain" id="">
                        <option selected hidden value="">Pilih Desain</option>
                        <?php
                        foreach ($select_desain as $value) {
                          echo "<option value=$value[id]>$value[nama_desain]</option>";
                        }

                        ?>
                      </select>
                      <label for="Desain">Katalog Desain</label>
                      <div class="invalid-feedback">
                        Pilih Desain.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="ukuran" name="ukuran"
                        required>
                      <label for="floatingInput">Ukuran</label>
                      <div class="invalid-feedback">
                        Masukkan Ukuran.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi"
                        name="jumlah" required>
                      <label for="floatingInput">Jumlah </label>
                      <div class="invalid-feedback">
                        Masukkan Jumlah.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan">
                      <label for="floatingPassword">Catatan</label>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning" name="input_orderitem_validate" value="12345">Save
                changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Akhir Modal Tambah Item Baru-->
      <?php
      if (empty($result)) {
        echo "Data Desain tidak ada";
      } else {
        foreach ($result as $row) {
          ?>
          <!-- Modal Edit -->
          <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Desain</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_orderitem.php " method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                    <input type="hidden" name="order" value="<?php echo $kode ?>">
                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-floating mb-3">
                          <select class="form-select" name="desain" id="">
                            <option selected hidden value="">Pilih Desain</option>
                            <?php
                            foreach ($select_desain as $value) {
                              if ($row['desain'] == $value['id']) {
                                echo "<option selected value=$value[id]>$value[nama_desain]</option>";
                              } else {
                                echo "<option value=$value[id]>$value[nama_desain]</option>";
                              }
                            }

                            ?>
                          </select>
                          <label for="desain">Desain</label>
                          <div class="invalid-feedback">
                            Pilih Desain.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="ukuran" name="ukuran"
                            value="<?php echo $row['ukuran'] ?>">
                          <label for="floatingPassword">Ukuran</label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="Ukuran" name="ukuran"
                            required value="<?php echo $row['jumlah'] ?>">
                          <label for="floatingInput">Ukuran</label>
                          <div class="invalid-feedback">
                            Masukkan Ukuran.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi"
                            name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                          <label for="floatingInput">Jumlah </label>
                          <div class="invalid-feedback">
                            Masukkan Jumlah.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan"
                            value="<?php echo $row['catatan'] ?>">
                          <label for="floatingPassword">Catatan</label>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="edit_orderitem_validate" value="12345">Save
                    changes</button>
                </div>
                </form>
              </div>

            </div>
          </div>

          <!-- End Modal Edit-->

          <!-- Modal Delete -->
          <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_orderitem.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                    <div class="col-lg-12">
                      Apakah anda ingin menghapus menu <b>
                        <?php echo $row['nama_menu'] ?>
                      </b>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="delete_orderitem_validate"
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
        <!-- Modal Bayar-->
        <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr class="text-nowrap">
                        <th scope="col">Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Status</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $total = 0;
                      foreach ($result as $row) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $row['nama_desain'] ?>
                          </td>
                          <td>
                            <?php echo number_format($row['harga'], 0, ',', '.') ?>
                          </td>
                          <td>
                            <?php echo $row['ukuran'] ?>

                          </td>
                          <td>
                            <?php echo $row['jumlah'] ?>

                          </td>
                          <td>
                            <?php
                            if ($row['status'] == 1) {
                              echo "<span class='badge text-bg-info'>Masuk ke Jahit</span>";
                            } elseif ($row['status'] == 2) {
                              echo "<span class='badge text-bg-warning'>Selesai</span>";
                            }
                            ?>

                          </td>
                          <td>
                            <?php echo $row['catatan'] ?>

                          </td>
                          <td>
                            <?php echo number_format($row['harganya'], 0, ',', '.') ?>

                          </td>

                        </tr>

                        <?php
                        $total += $row['harganya'];
                      } ?>
                      <tr>
                        <td colspan="6" class="fw-bold">
                          Total harga
                        </td>
                        <td class="fw-bold">
                          <?php echo number_format($total, 0, ',', '.') ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <span class="text-danger fs=5 fw-semibold">Apakah anda yakin ingin Melakukan Pembayaran?</span>
                <form class="needs-validation" novalidate action="proses/proses_bayar.php " method="post">
                  <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                  <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                  <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                  <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                  <input type="hidden" name="total" value="<?php echo $total ?>">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Nominal uang"
                          name="uang" required>
                        <label for="floatingInput">Nominal Uang</label>
                        <div class="invalid-feedback">
                          Masukkan Nominal uang.
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning" name="bayar_validate" value="12345">Bayar</button>
              </div>
              </form>
            </div>

          </div>
        </div>
        <!-- Akhir Bayar-->
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">Desain</th>
                <th scope="col">Harga</th>
                <th scope="col">Ukuran</th>
                <th scope="col">Qty</th>
                <th scope="col">Status</th>
                <th scope="col">Catatan</th>
                <th scope="col">Total</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total = 0;
              foreach ($result as $row) {
                ?>
                <tr>
                  <td>
                    <?php echo $row['nama_desain'] ?>
                  </td>
                  <td>
                    <?php echo number_format($row['harga'], 0, ',', '.') ?>
                  </td>
                  <td>
                    <?php echo $row['ukuran'] ?>

                  </td>
                  <td>
                    <?php echo $row['jumlah'] ?>
                  </td>
                  <td>
                    <?php
                    if ($row['status'] == 1) {
                      echo "<span class='badge text-bg-info'>Masuk ke Jahit</span>";
                    } elseif ($row['status'] == 2) {
                      echo "<span class='badge text-bg-warning'>Selesai</span>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php echo $row['catatan'] ?>

                  </td>
                  <td>
                    <?php echo number_format($row['harganya'], 0, ',', '.') ?>

                  </td>
                  <td>
                    <div class="d-flex">
                      <button
                        class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>"
                        data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i
                          class="bi bi-pencil-square"></i></button>

                      <button
                        class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>"
                        data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i
                          class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>

                <?php
                $total += $row['harganya'];
              } ?>
            </tbody>
            <tr>
              <td colspan="6" class="fw-bold">
                Total harga
              </td>
              <td class="fw-bold">
                <?php echo number_format($total, 0, ',', '.') ?>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <?php
      } ?>
      <div>
        <button class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary disabled" : "btn btn-success"; ?>"
          data-bs-toggle="modal" data-bs-target="#tambahItem"><i class="bi bi-plus-circle-fill"></i> Item</button>
        <button class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary disabled" : "btn btn-warning"; ?>"
          data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i>
          Bayar</button>
        <button onclick="printStruk()" class="btn btn-info"> Cetak Struk</button>
      </div>
    </div>
  </div>
</div>

<div id="strukContent" class="d-none">
  <style>
    #struk {
      font-family: "Arial", sans-serif;
      font-size: 12px;
      max-width: 100%;
      border : 1px solid #ccc;
      padding : 10px;
      widht : 80mm;
    }
    #struk h2{
      text-align :center;
      color :goldenrod;
    }
    #struk p{
      margin : 5px 0;
    }
    #struk table{
      font-size: 17px;
      border-collapse: collapse;
      margin-top : 10px;
      widht: 100%
    }
    #struk th, #struk td{
    border : 1px solid #ddd;
    padding: 8px;
    text-align : left;
    }
    #struk .total{
      font-weight: bold;
    }
  </style>
  <div id="struk">
    <h2>Struk Pembayaran My Taylor</h2>
    <p>Kode Order:
      <?php echo $kode ?>
    </p>
    <p>Pelanggan:
      <?php echo $pelanggan ?>
    </p>
    <p>waktu Order:
      <?php echo date('d/m/Y/ H:i:s', strtotime($result[0]['waktu_order'])) ?>
    </p>

    <table>
      <thead>
        <tr>
          <th>Desain</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        foreach ($result as $row) { ?>
          <tr>
            <td>
              <?php echo $row['nama_desain'] ?>
            </td>
            <td>
              <?php echo number_format($row['harga'], 0, ',', '.') ?>
            </td>
            <td>
              <?php echo $row['jumlah'] ?>
            </td>
            <td>
              <?php echo number_format($row['harganya'], 0, ',', '.') ?>
            </td>
          </tr>
          <?php
          $total = $row['harganya'];
        } ?>
        <tr class="total">
          <td colspan="3">Total Harga</td>
          <td>
            <?php echo number_format($total, 0, ',', '.') ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<script>
  function printStruk() {
    var strukContent = document.getElementById("strukContent").innerHTML;

    var printFrame = document.createElement("iframe");
    printFrame.style.display = 'none';
    document.body.appendChild(printFrame);
    printFrame.contentDocument.write(strukContent);
    printFrame.contentWindow.print();
    document.body.removeChild(printFrame);
  }
</script>