<div class="container">
    <div class="card mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mr-3">Edit Data Anggota</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-horizontal style-form" action="<?= BASEURL; ?>/akun/update" method="post">
                        <!-- Hidden input untuk menyimpan ID Anggota dan ID User -->
                        <input type="hidden" name="id_anggota" value="<?= $data['anggota']['id_anggota']; ?>">
                        <input type="hidden" name="id_user" value="<?= $data['anggota']['id_user']; ?>">

                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama" autocomplete="off" value="<?= $data['anggota']['nama']; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input name="no_telp" type="text" id="no_telp" class="form-control" placeholder="No. Telepon" autocomplete="off" value="<?= $data['anggota']['no_telp']; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="text" name="password" class="form-control" id="password" required>
                                <small class="text"></small>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="Mahasiswa" <?= ($data['anggota']['status'] === 'Mahasiswa') ? 'selected' : ''; ?>>Mahasiswa</option>
                                    <option value="Dosen" <?= ($data['anggota']['status'] === 'Dosen') ? 'selected' : ''; ?>>Dosen</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tambahkan field lainnya sesuai kebutuhan -->

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
