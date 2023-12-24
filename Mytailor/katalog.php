<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_katalog
     LEFT JOIN tb_kategori_katalog ON tb_kategori_katalog.id_kat_katalog = tb_katalog.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kat_katalog = mysqli_query($conn, "SELECT id_kat_katalog,kategori_katalog FROM tb_kategori_katalog ")
    ?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Katalog Desain
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah
                        Desain</button>
                </div>
            </div>

            <!-- Modal Tambah Katalog -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Model Desain </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_katalog.php"
                                method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadfoto"
                                                placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadfoto">Upload Foto Desain</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto Desain
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Nama Desain" name="nama_desain" required>
                                            <label for="floatingInput">Nama Desain</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Desain.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example"
                                                name="kat_katalog" required>
                                                <option selected hidden value="">Pilih Kategori Desain</option>
                                                <?php
                                                foreach ($select_kat_katalog as $value) {
                                                    echo "<option value =" . $value['id_kat_katalog'] . ">$value[kategori_katalog]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Desain</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Desain.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Harga" name="harga" required
                                                value="<?php echo $row['harga'] ?>">
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_katalog_validate"
                                        value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Katalog End -->

            <?php
            if (empty($result)) {
                echo "Data Katalog Desain tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- Modal View -->
                    <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Desain</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_katalog.php"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        value="<?php echo $row['nama_desain'] ?>">
                                                    <label for="floatingInput">Nama Desain</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Desain.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example">
                                                        <option selected hidden value="">Pilih Kategori Desain</option>
                                                        <?php
                                                        foreach ($select_kat_katalog as $value) {
                                                            if ($row['kategori'] == $value['id_kat_katalog']) {
                                                                echo "<option selected value =" . $value['id_kat_katalig'] . ">$value[kategori_katalog]</option>";
                                                            } else {
                                                                echo "<option value =" . $value['id_kat_katalog'] . ">$value[kategori_katalog]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Kategori Desain</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kategori Desain.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        placeholder="Harga" name="harga" required
                                                        value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning" name="input_katalog_validate"
                                                value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal View End -->

                    <!-- Modal Edit -->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Desain</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_katalog.php"
                                        method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control py-3" id="uploadfoto"
                                                        placeholder="foto" name="foto" required>
                                                    <label class="input-group-text" for="uploadfoto">Upload Foto Desain</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan File Foto Desain
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Nama Desain" name="nama_desain" required
                                                        value="<?php echo $row['nama_desain'] ?>">
                                                    <label for="floatingInput">Nama Desain</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Desain.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Keterangan" name="keterangan"
                                                        value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="kat_katalog">
                                                        <option selected hidden value="">Pilih Kategori Desain</option>
                                                        <?php
                                                        foreach ($select_kat_katalog as $value) {
                                                            if ($row['kategori'] == $value['id_kat_katalog']) {
                                                                echo "<option selected value =" . $value['id_kat_katalog'] . ">$value[kategori_katalog]</option>";
                                                            } else {
                                                                echo "<option value =" . $value['id_kat_katalog'] . ">$value[kategori_katalog]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Kategori Desain</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kategori Desain.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Harga"
                                                    name="harga" required value="<?php echo $row['harga'] ?>">
                                                <label for="floatingInput">Harga</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Harga.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning" name="edit_katalog_validate"
                                                value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit End -->

                    <!-- Modal Delete -->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_katalog.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                        <div class="modal-footer">
                                            <div class="col-lg-12">
                                                Apakah anda ingin menghapus Desain <b>
                                                    <?php echo $row['nama_desain'] ?>
                                                </b>
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="input_katalog_validate"
                                                value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete End -->

                    <?php
                }
                ?>
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Foto Desain</th>
                                <th scope="col">Nama Desain</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
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
                                        <div style="width: 100px;">
                                            <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_desain'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['jenis_katalog'] == 1) ? "Gamis" : "Atasan" ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kategori_katalog'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harga']) ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalView<?php echo $row['id'] ?>"><i
                                                    class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i
                                                    class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

