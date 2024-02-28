<div class="container">
    <div class="card mt-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Histori Peminjaman Anda</h6>
        </div>

        <div class="container">
            <div class="mb-3 mt-3">
                <div class="col-lg-6">
                    <form action="<?= BASEURL; ?>/dataPeminjaman/cari" method="post" class="d-flex">
                            <input type="text" class="form-control me-3" placeholder="Cari.." name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 text-right">
                <form action="<?= BASEURL; ?>/histori/filter" method="post" class="d-flex">
                        <select class="form-select me-3" name="filter">
                            <option value="semua">Semua</option>
                            <option value="belum_dikembalikan">Belum dikembalikan</option>
                            <option value="sudah_dikembalikan">Sudah dikembalikan</option>
                            <option value="hari_ini">Hari ini</option>
                            <option value="7_hari_terakhir">7 hari terakhir</option>
                            <option value="1_bulan_terakhir">1 bulan terakhir</option>
                        </select>
                        <button class="btn btn-secondary" type="submit">Filter</button>
                </form>
            </div>

            <br>
            <?php
            if (isset($_SESSION['pesan'])) {
                $alertClass = strpos($_SESSION['pesan'], 'berhasil') !== false ? 'alert-success' : (strpos($_SESSION['pesan'], 'gagal') !== false ? 'alert-danger' : 'alert-warning');
                ?>
                <div class="alert <?= $alertClass ?> alert-dismissible fade show mb-3" role="alert" style="font-size: 14px;">
                    <?= $_SESSION['pesan'] ?>
                    <a href="<?= BASEURL; ?>/dataitem" class="btn-close" aria-label="Close"></a>
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
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">qty</th>
                        <th scope="col">Tanggal pinjam</th>
                        <th scope="col">Tanggal kembali</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['peminjaman'] as $peminjaman) : ?>
                        <tr>
                            <td><?= $peminjaman['id']; ?></td>
                            <td><?= $peminjaman['id_barang']; ?></td>
                            <td><?= $peminjaman['nama_barang']; ?></td>
                            <td><?= $peminjaman['qty']; ?></td>
                            <td><?= $peminjaman['tgl_pinjam']; ?></td>
                            <td><?= $peminjaman['tgl_kembali']; ?></td>
                            <td><?= $peminjaman['konfirmasi']; ?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


