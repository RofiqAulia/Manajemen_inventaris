<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Detail Peminjaman</h2>
                    <hr class="bold">
                    <h5 class="card-title"> Peminjam : <?= $data['peminjaman']['nama_anggota'];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">ID Anggota : <?= $data['peminjaman']['id_anggota'];?></h6>
                    <hr>
                    <p class="card-text">ID barang: <?= $data['peminjaman']['id_barang'];?></p>
                    <p class="card-text">Nama barang: <?= $data['peminjaman']['nama_barang'];?></p>
                    <p class="card-text">ID Peminjaman: <?= $data['peminjaman']['id_peminjaman'];?></p>
                    <p class="card-text">Jumlah: <?= $data['peminjaman']['qty'];?></p>
                    <p class="card-text">Tanggal pinjam: <?= $data['peminjaman']['tgl_pinjam'];?></p>
                    <p class="card-text">Tanggal kembali: <?= $data['peminjaman']['tgl_kembali'];?></p>
                    <p class="card-text">Maintainer: <?= $data['peminjaman']['nama_maintainer'];?></p>
                    <h5 class="card-text">Keterangan: <?= $data['peminjaman']['konfirmasi'];?></h5>
                    <a href="<?= BASEURL;?>/DataPeminjaman" class="btn btn-primary mt-3">KEMBALI</a>
                </div>
            </div>
        </div>
    </div>
</div>
