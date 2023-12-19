<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kategori_katalog");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Kategori Desain
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah
                        Kategori Desain</button>
                </div>
            </div>
            <!-- Modal Tambah Kategori Desain Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_katdesain.php "
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="jenisdesain" id="">
                                                <option value="1">Potongan</option>
                                                <option value="2">Gamis</option>
                                            </select>
                                            <label for="floatingInput">Jenis Desain</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Desain.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Kategori Desain" name="katdesain" required>
                                            <label for="floatingInput">kategori Desain</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kategori Desain.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_katdesain_validate"
                                        value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah Kategori Desain Baru-->

            <?php
            foreach ($result as $row) {
            ?>
            <!-- Modal Edit -->
            <div class="modal fade" id="ModalEditKatDesain<?php echo $row['id_kat_katalog'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Desaain</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_katdesain.php "
                                method="post">
                                <input type="hidden" value="<?php echo $row['id_kat_katalog'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select disabled class="form-select" aria-label="Default select example"
                                                required name="jeniskatalog" id="">
                                                <?php
                                                $data = array("Potongan", "Gamis");
                                                foreach ($data as $key => $value) {
                                                    if ($row['jenis_katalog'] == $key + 1) {
                                                        echo "<option selected value=".($key+1).">$value</option>";
                                                    } else {
                                                        echo "<option  value=".($key+1).">$value</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Jenis Desain</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Desain.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Kategori Desain" name="katdesain" required>
                                            <label for="floatingInput">kategori Desain</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kategori Desain.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_katdesain_validate"
                                        value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit-->

            <!-- Modal Delete -->
            <div class="modal fade" id="ModalDelete<?php echo $row['id_kat_katalog'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Desain</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_delete_katdesain.php"
                                method="POST">
                                <input type="hidden" value="<?php echo $row['id_kat_katalog'] ?>" name="id">
                                <div class="col-lg-12">
                                    Apakah Anda ingin menghapus Kategori <b><?php echo $row['kategori_katalog']?></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="hapus_kategori_validate"
                                        value="12345" >Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Delete-->

            <?php
            }
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {

                ?>
                <!--Tabel daftar Kategori Desain-->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Desain</th>
                                <th scope="col">Kategori Desain</th>
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
                                        <?php echo ($row['jenis_katalog'] == 1) ? "Potongan" : "Gamis" ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kategori_katalog'] ?>
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalEditKatDesain<?php echo $row['id_kat_katalog'] ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['id_kat_katalog'] ?>"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>

                                <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Akhir Tabel daftar Kategori Desain-->
                <?php
            } ?>
        </div>
    </div>
</div>