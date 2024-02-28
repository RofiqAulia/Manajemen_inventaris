<div class="container">
    <div class="card mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Barang Admin</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-horizontal style-form" action="<?= BASEURL; ?>/Inventory/tambah" method="post">
                        <div class="form-group row mb-3">
                            <label for="nama_item" class="col-sm-3 col-form-label">Nama Item</label>
                            <div class="col-sm-9">
                                <input name="nama_barang" type="text" id="nama_barang" class="form-control" placeholder="Nama Item" autocomplete="off" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                            <div class="col-sm-9">
                                <input name="qty" type="text" id="qty" class="form-control" placeholder="Qty" autocomplete="off" required/>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="asal" class="col-sm-3 col-form-label">Asal</label>
                            <div class="col-sm-9">
                                <select name="asal" id="asal" class="form-control" required>
                                    <option value="Hibah">Hibah</option>
                                    <option value="Pinjam">Pinjam</option>
                                    <option value="Beli">Beli</option>
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
                            <label for="maintainer" class="col-sm-3 col-form-label">Maintainer</label>
                            <div class="col-sm-9">
                                <input name="maintainer" type="text" id="maintainer" class="form-control" placeholder="Maintainer" autocomplete="off" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />&nbsp;
                            </div>
                        </div>
                    </form>
                    <br>
                    <?php
                    if (isset($_SESSION['pesan'])) {
                        $alertClass = strpos($_SESSION['pesan'], 'berhasil') !== false ? 'alert-success' : (strpos($_SESSION['pesan'], 'gagal') !== false ? 'alert-danger' : 'alert-warning');
                    ?>
                        <div class="alert <?= $alertClass ?> alert-dismissible fade show mb-3" role="alert" style="font-size: 14px;">
                            <?= $_SESSION['pesan'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        // Hapus pesan dari session agar tidak tampil lagi
                        unset($_SESSION['pesan']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
