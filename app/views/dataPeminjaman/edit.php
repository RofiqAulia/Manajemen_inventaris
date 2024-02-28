<div class="container">
    <div class="card mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mr-3">Edit Data Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">

                    <h3>ID Peminjaman : <?= $data['peminjaman']['id']; ?></h3>
                    <hr>
                    <form class="form-horizontal style-form" action="<?= BASEURL; ?>/dataPeminjaman/update" method="post">
                        <!-- coba -->
                        <input type="hidden" name="id" value="<?= $data['peminjaman']['id']; ?>">
                        <!--batas-->
                        <div class="form-group row mb-3">
                            <label for="konfirmasi" class="col-sm-3 col-form-label">Ubah Status</label>
                            <div class="col-sm-9">
                                <select name="konfirmasi" id="konfirmasi" class="form-control" required>
                                    <option value="belum dikembalikan" <?= ($data['peminjaman']['konfirmasi'] === 'belum dikembalikan') ? 'selected' : ''; ?>>Belum dikembalikan</option>
                                    <option value="sudah dikembalikan" <?= ($data['peminjaman']['konfirmasi'] === 'sudah dikembalikan') ? 'selected' : ''; ?>>Sudah dikembalikan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <a href="<?= BASEURL; ?>/dataPeminjaman/index" class="btn btn-sm btn-danger">Batal</a>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>




