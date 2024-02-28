    <div class="container">
        <div class="card mt-4 mb-6">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
            </div>

        <div class="container">
            <div class="mb-3 mt-3">
                <div class="col-lg-6">
                    <div class="col-3 mt-3 mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Data
                        </button>
        </div>
                <form action="<?= BASEURL; ?>/akun/cari" method="post" class="d-flex">
                        <input type="text" class="form-control me-3" placeholder="Cari Anggota.." name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                </form>
            </div>
        </div>

        <?php if (isset($_SESSION['pesan'])) : ?>
                <?php
                $alertClass = strpos($_SESSION['pesan'], 'berhasil') !== false ? 'alert-success' : (strpos($_SESSION['pesan'], 'gagal') !== false ? 'alert-danger' : 'alert-warning');
                ?>
                <div class="alert <?= $alertClass ?> alert-dismissible fade show mb-3" role="alert" style="font-size: 14px;">
                    <?= $_SESSION['pesan'] ?>
                    <a href="<?= BASEURL; ?>/akun" class="btn-close" aria-label="Close"></a>
                </div>
                <?php
                // Hapus pesan dari session agar tidak tampil lagi
                unset($_SESSION['pesan']);
                ?>
            <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>NIM/NIP</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $number = 1 ?>
                <?php foreach ($data['anggota'] as $anggota) : ?>
                    <tr>
                        <td><?php echo $number;
                            $number++ ?></td>
                        <td><?php echo $anggota['nama']; ?></td>
                        <td><?php echo $anggota['no_telp']; ?></td>
                        <td><?php echo $anggota['id_anggota']; ?></td>
                        <td><?php echo $anggota['status']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/akun/edit/<?= $anggota['id_anggota']; ?>"
                               class="btn btn-warning" data-id_anggota="<?= $anggota['id_anggota'] ?>">Ubah</a>
                            <a href="<?= BASEURL; ?>/akun/hapus/<?= $anggota['id_anggota']; ?>"
                               class="btn btn-danger"
                               onclick="return confirm('Yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your modal content here  -->
                <form class="form-horizontal style-form" action="<?= BASEURL; ?>/akun/tambah" method="post">
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_telp" class="form-control" id="no_telp" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label id="label_id" for="id" class="col-sm-3 col-form-label">NIM/NIP</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_anggota" class="form-control" id="id_anggota" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" name="password" class="form-control" id="password" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control" required>
                            <option value="" disabled selected>Pilih Status</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
