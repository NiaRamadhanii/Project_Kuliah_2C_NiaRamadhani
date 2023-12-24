<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *FROM tb_list_order
LEFT JOIN tb_pesanan ON tb_pesanan.id_order=tb_list_order.kode_order
LEFT JOIN tb_katalog ON tb_katalog.id = tb_list_order.desain
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_pesanan.id_order
ORDER BY waktu_order ASC");


while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
$select_desain = mysqli_query($conn, "SELECT id, nama_desain FROM tb_katalog");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Jahit
        </div>
        <div class="card-body">
            <?php
            if (empty($result)) {
                echo "Data Desain tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>
                    <!-- Modal Terima Jahit-->
                    <div class="modal fade" id="terima<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Desain</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_terima_orderitem.php "
                                        method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="desain" id="">
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
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        placeholder="ukuran" name="ukuran" value="<?php echo $row['ukuran'] ?>">
                                                    <label for="floatingPassword">Ukuran</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        placeholder="Jumlah Porsi" name="jumlah" required
                                                        value="<?php echo $row['jumlah'] ?>">
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
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="catatan" name="catatan"
                                                        value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingPassword">Catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning" name="terima_orderitem_validate"
                                        value="12345">Save
                                        changes</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <!-- End Modal Terima jahit-->

                    <!-- Modal Selesai Jahit-->
                    <div class="modal fade" id="selesai<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Selesai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_selesai_orderitem.php "
                                        method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="desain" id="">
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
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        placeholder="ukuran" name="ukuran" value="<?php echo $row['ukuran'] ?>">
                                                    <label for="floatingPassword">Ukuran</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        placeholder="Jumlah Porsi" name="jumlah" required
                                                        value="<?php echo $row['jumlah'] ?>">
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
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="catatan" name="catatan"
                                                        value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingPassword">Catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning" name="selesai_orderitem_validate"
                                        value="12345">Save
                                        changes</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <!-- End Modal Selesai jahit-->

                    <?php
                }
                ?>
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Waktu Order</th>
                                <th scope="col">Desain</th>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                if ($row['status'] != 2) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row['kode_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['waktu_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama_desain'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ukuran'] ?>

                                        </td>
                                        <td>
                                            <?php echo $row['jumlah'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['catatan'] ?>
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
                                            <div class="d-flex">
                                                <button
                                                    class="<?php echo (!empty($row['status'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#terima<?php echo $row['id_list_order'] ?>">Terima</button>

                                                <button
                                                    class="<?php echo (empty($row['status']) || $row['status'] != 1) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-success btn-sm me-1 text-nowrap"; ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#selesai<?php echo $row['id_list_order'] ?>">Selesai</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>