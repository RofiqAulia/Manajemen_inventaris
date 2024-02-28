<div class="container">
    <div class="card mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mr-3">Edit Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-horizontal style-form" action="<?= BASEURL; ?>/dataitem/update" method="post">
                        <!-- Hidden input untuk menyimpan ID Barang -->
                        <input type="hidden" name="id_barang" value="<?= $data['barang']['id_barang']; ?>">

                        <div class="form-group row mb-3">
                            <label for="id_barang" class="col-sm-3 col-form-label">ID Barang</label>
                            <div class="col-sm-9">
                                <input name="id_barang" type="text" id="id_barang" class="form-control" placeholder="Kode Barang" autocomplete="off" value="<?= $data['barang']['id_barang']; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                            <div class="col-sm-9">
                                <input name="nama_barang" type="text" id="nama_barang" class="form-control" placeholder="Nama Barang" autocomplete="off" value="<?= $data['barang']['nama_barang']; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                            <div class="col-sm-9">
                                <input name="qty" type="number" id="qty" class="form-control" placeholder="Qty" autocomplete="off" value="<?= $data['barang']['qty']; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="asal" class="col-sm-3 col-form-label">Asal</label>
                            <div class="col-sm-9">
                                <select name="asal" id="asal" class="form-control" required>
                                    <option value="hibah" <?= ($data['barang']['asal'] === 'hibah') ? 'selected' : ''; ?>>Hibah</option>
                                    <option value="pinjam" <?= ($data['barang']['asal'] === 'pinjam') ? 'selected' : ''; ?>>Pinjam</option>
                                    <option value="beli" <?= ($data['barang']['asal'] === 'beli') ? 'selected' : ''; ?>>Beli</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" autocomplete="off" required><?= $data['barang']['keterangan']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="id_maintainer" class="col-sm-3 col-form-label">Maintainer</label>
                            <div class="col-sm-9">
                                <select name="id_maintainer" id="id_maintainer" class="form-control" required>
                                    <option></option>
                                    <?php foreach ($data['maintainer'] as $maintainer) : ?>
                                        <option value="<?= $maintainer['id_maintainer']; ?>" <?= ($maintainer['id_maintainer'] === $data['barang']['id_maintainer']) ? 'selected' : ''; ?>>
                                            <?= $maintainer['id_maintainer']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
