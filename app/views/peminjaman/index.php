<div class="container">
    <div class="card mt-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
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
                    <!-- <form action="<?= BASEURL; ?>/dataitem/cari" method="post">
                        <div class="input-group">
                            <input type="te xt" class="form-control" placeholder="cari barang.." name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                        </div>
                    </form> -->
                </div>
            </div>

            <?php
            if (isset($_SESSION['pesan'])) {
                $alertClass = strpos($_SESSION['pesan'], 'berhasil') !== false ? 'alert-success' : (strpos($_SESSION['pesan'], 'gagal') !== false ? 'alert-danger' : 'alert-warning');
                ?>
                <div class="alert <?= $alertClass ?> alert-dismissible fade show mb-3" role="alert" style="font-size: 14px;">
                    <?= $_SESSION['pesan'] ?>
                    <a href="<?= BASEURL; ?>/peminjaman" class="btn-close" aria-label="Close"></a>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Tgl Pinjam</th>
                            <th scope="col">Tgl Kembali</th>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['peminjaman'] as $peminjaman) : ?>
                            <tr>
                                <td><?= $peminjaman['nama']; ?></td>
                                <td><?= $peminjaman['status']; ?></td>
                                <td><?= $peminjaman['nama_barang']; ?></td>
                                <td><?= $peminjaman['qty']; ?></td>
                                <td><?= $peminjaman['tgl_pinjam']; ?></td>
                                <td><?= $peminjaman['tgl_kembali']; ?></td>
                                <td><?= $peminjaman['id_barang']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/peminjaman/edit/<?= $peminjaman['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= BASEURL; ?>/peminjaman/hapus/<?= $peminjaman['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Peminjaman JTI</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal style-form" action="<?= BASEURL; ?>/peminjaman/tambah" method="post">
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama " autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control" required>
                                <option value="dosen">Dosen</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
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
                            <input name="qty" type="text" id="qty" class="form-control" placeholder="Qty" autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="tgl_pinjam" class="col-sm-3 col-form-label">Tgl Pinjam</label>
                        <div class="col-sm-9">
                            <input name="tgl_pinjam" type="date" id="tgl_pinjam" class="form-control" placeholder="Tgl Peminjaman" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="tgl_kembali" class="col-sm-3 col-form-label">Tgl Kembali</label>
                        <div class="col-sm-9">
                            <input name="tgl_kembali" type="date" id="tgl_kembali" class="form-control" placeholder="Tgl Peminjaman" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="id" class="col-sm-3 col-form-label">Pilih Barang</label>
                        <div class="col-sm-9">
                            <select name="id" id="id" class="form-control" required>
                                <?php foreach ($data['barang'] as $barang) : ?>
                                    <option value="<?= $barang['id']; ?>"><?= $barang['id']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>