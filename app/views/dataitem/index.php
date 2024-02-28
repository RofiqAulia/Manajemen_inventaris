<div class="container">
    <div class="card mt-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Inventaris JTI</h6>
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
                    <form action="<?= BASEURL; ?>/dataitem/cari" method="post" class="d-flex">
                            <input type="text" class="form-control me-3" placeholder="cari barang.." name="keyword" id="keyword" autocomplete="off">
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
                    <a href="<?= BASEURL; ?>/dataitem" class="btn-close" aria-label="Close"></a>
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
                            <!-- <th scope="col">ID</th> -->
                            <th scope="col">ID Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Asal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">ID Maintainer</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['barang'] as $barang) : ?>
                            <tr>
                                <td><?= $barang['id_barang']; ?></td>
                                <td><?= $barang['nama_barang']; ?></td>
                                <td><?= $barang['qty']; ?></td>
                                <td><?= $barang['asal']; ?></td>
                                <td><?= $barang['keterangan']; ?></td>
                                <td><?= $barang['id_maintainer']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/dataitem/edit/<?= $barang['id_barang']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="<?= BASEURL; ?>/dataitem/hapus" method="post" class="d-inline-block">
                                        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Inventaris JTI</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal style-form" action="<?= BASEURL; ?>/dataitem/tambah" method="post">
                    <div class="form-group row mb-3">
                        <label for="id_barang" class="col-sm-3 col-form-label">ID Barang</label>
                        <div class="col-sm-9">
                            <input name="id_barang" type="text" id="id_barang" class="form-control" placeholder="ID Barang" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input name="nama_barang" type="text" id="nama_barang" class="form-control" placeholder="Nama Barang" autocomplete="off" required />
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                        <div class="col-sm-9">
                            <input name="qty" type="number" id="qty" class="form-control" placeholder="Qty" autocomplete="off" required />
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="asal" class="col-sm-3 col-form-label">Asal</label>
                        <div class="col-sm-9">
                            <select name="asal" id="asal" class="form-control" required>
                                <option value="hibah">Hibah</option>
                                <option value="pinjam">Pinjam</option>
                                <option value="beli">Beli</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="id_maintainer" class="col-sm-3 col-form-label">Maintainer</label>
                        <div class="col-sm-9">
                            <select name="id_maintainer" id="id_maintainer" class="form-control" required>
                            <option value="" disabled selected>Pilih Maintaner</option>
                                <?php foreach ($data['maintainer'] as $maintainer) : ?>
                                    <option value="<?= $maintainer['id_maintainer']; ?>"><?= $maintainer['id_maintainer']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

