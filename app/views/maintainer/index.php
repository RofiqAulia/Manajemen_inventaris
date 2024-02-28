<div class="container">
    <div class="card mt-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Maintainer JTI</h6>
        </div>         

        <div class="container">
            <div class="mb-3 mt-3">
                <div class="col-lg-6">
                    <div class="col-3 mt-3 mb-3">   
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_SESSION['pesan'])) {
                $alertClass = strpos($_SESSION['pesan'], 'berhasil') !== false ? 'alert-success' : (strpos($_SESSION['pesan'], 'gagal') !== false ? 'alert-danger' : 'alert-warning');
                ?>
                <div class="alert <?= $alertClass ?> alert-dismissible fade show mb-3" role="alert" style="font-size: 14px;">
                    <?= $_SESSION['pesan'] ?>
                    <a href="<?= BASEURL; ?>/maintainer" class="btn-close" aria-label="Close"></a>
                </div>
                <?php
                // Hapus pesan dari session agar tidak tampil lagi
                unset($_SESSION['pesan']);
            }
            ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Maintainer</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['maintainer'] as $maintainer) : ?>
                            <tr>
                                <td><?= $maintainer['id_maintainer']; ?></td>
                                <td><?= $maintainer['nama']; ?></td>
                                <td><?= $maintainer['no_telp']; ?></td>
                                <td><?= $maintainer['alamat']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/maintainer/edit/<?= $maintainer['id_maintainer']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= BASEURL; ?>/maintainer/hapus/<?= $maintainer['id_maintainer']; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Maintainer JTI</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal style-form" action="<?= BASEURL; ?>/maintainer/tambah" method="post">
                <div class="form-group row mb-3">
                        <label for="id_maintainer" class="col-sm-3 col-form-label">ID Maintainer</label>
                        <div class="col-sm-9">
                            <input name="id_maintainer" type="text" id="id_maintainer" class="form-control" placeholder="ID Maintainer" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama" autocomplete="off" required />
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
                        <div class="col-sm-9">
                            <input name="no_telp" type="text" id="no_telp" class="form-control" placeholder="No. Telepon" autocomplete="off" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required></textarea>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div></form>
        </div>
    </div>
</div>
