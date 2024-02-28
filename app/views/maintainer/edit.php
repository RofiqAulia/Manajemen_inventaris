<div class="container">
    <div class="card mt-4">
<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mr-3">Edit Data Maintainer</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
    <form class="form-horizontal style-form" action="<?= BASEURL; ?>/maintainer/update" method="post">
        <!-- coba -->
        <input type="hidden" name="id_maintainer" value="<?= $data['maintainer']['id_maintainer']; ?>">
        <!--batas--> 

        <div class="form-group row mb-3">
            <label for="id_maintainer" class="col-sm-3 col-form-label">ID Maintainer</label>
            <div class="col-sm-9">
                <input name="id_maintainer" type="text" id="id_maintainer" class="form-control" placeholder="id maintainer" autocomplete="off" value="<?= $data['maintainer']['id_maintainer']; ?>" required />
            </div>
        </div>
        
        <div class="form-group row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama " autocomplete="off" value="<?= $data['maintainer']['nama']; ?>" required />
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
            <div class="col-sm-9">
                <input name="no_telp" type="text" id="no_telp" class="form-control" placeholder="no_telp" autocomplete="off" value="<?= $data['maintainer']['no_telp']; ?>" required />
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <textarea name="alamat" id="alamat" class="form-control" placeholder="alamat" autocomplete="off" required><?= $data['maintainer']['alamat']; ?> </textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                <!-- <a href="input-master.php" class="btn btn-sm btn-danger">Batal </a> -->
            </div>
            </div>
        </div>
        </div>    
        </div>
        </div>
  </form>
</div>
