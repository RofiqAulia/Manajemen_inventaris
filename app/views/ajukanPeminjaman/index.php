<div class="container">




    <div class="card mt-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Inventaris JTI</h6>
        </div>
        <div class="container">
            <div class="mb-3 mt-3">
                <div class="col-lg-6">
                    <form action="<?= BASEURL; ?>/dataitem/cari" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="cari barang.." name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if (isset($_SESSION['pesan'])) : ?>
                <?php
                $alertClass = strpos($_SESSION['pesan'], 'berhasil') !== false ? 'alert-success' : (strpos($_SESSION['pesan'], 'gagal') !== false ? 'alert-danger' : 'alert-warning');
                ?>
                <div class="alert <?= $alertClass ?> alert-dismissible fade show mb-3" role="alert" style="font-size: 14px;">
                    <?= $_SESSION['pesan'] ?>
                    <a href="<?= BASEURL; ?>/ajukanPeminjaman" class="btn-close" aria-label="Close"></a>
                </div>
                <?php
                // Hapus pesan dari session agar tidak tampil lagi
                unset($_SESSION['pesan']);
                ?>
            <?php endif; ?>

            <form action="<?= BASEURL; ?>/AjukanPeminjaman/selectedBarang" method="post">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Asal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Maintainer</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['barang'] as $barang) : ?>
                            <tr>
                                <td><?= $barang['id_barang']; ?></td>
                                <td><?= $barang['nama_barang']; ?></td>
                                <td><?= $barang['qty_available']; ?>/<?= $barang['qty']; ?></td>
                                <td><?= $barang['asal']; ?></td>
                                <td><?= $barang['keterangan']; ?></td>
                                <td>
                                    <?php
                                    // Instantiate AjukanPeminjaman_model
                                    $ajukanPeminjamanModel = new AjukanPeminjaman_model();

                                    // Find the corresponding maintainer
                                    $maintainer = $ajukanPeminjamanModel->findMaintainerById($barang['id_maintainer'], $data['maintainer']);

                                    // Check if maintainer is found
                                    echo $maintainer ? $maintainer['nama'] : 'Maintainer Not Found';
                                    ?>
                                </td>
                                <td>
                                    <input type="checkbox" name="selected_items[]" value="<?= $barang['id_barang']; ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 ml-auto d-flex justify-content-end">
                    <button type="submit" class="btn btn-success" name="submit">Selanjutnya</button>
                </div>

                <?php
                if (isset($_POST['submit']) && empty($_SESSION['pesan_selected_items'])) {
                    $_SESSION['pesan_selected_items'] = 'Pilih setidaknya satu barang!';
                }

                if (empty($_SESSION['selected_items']) && isset($_SESSION['pesan_selected_items'])) : ?>
                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        <?= $_SESSION['pesan_selected_items']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>


            </form>
        </div>


        <br>
    </div>
</div>
