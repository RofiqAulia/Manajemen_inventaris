<!-- ajukanPeminjaman/formPinjam.php -->

<div class="container">
    <div class="card mt-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Peminjaman</h6>
        </div>
        <div class="container">
            <form action="<?= BASEURL; ?>/prosesPeminjaman" method="post">
                <!-- Informasi atau detail anggota peminjam -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Peminjam:</label>
                    <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['nama']; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="id_anggota" class="form-label">NIM/NIP:</label>
                    <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?= $data['id_anggota']; ?>" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Mulai Pinjam:</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Sampai:</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                </div>

                <!-- Tampilkan informasi atau detail barang yang dipilih -->
                <div class="">
                    <label for="tanggal_selesai" class="form-label">Item yang dipinjam:</label>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Maintainer</th>
                                <th>Jumlah Pinjam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['barang'] as $barang) : ?>
                                <tr id="row_<?= $barang['id_barang']; ?>">
                                    <td><?= $barang['id_barang']; ?></td>
                                    <td><?= $barang['nama_barang']; ?></td>
                                    <td>
                                        <?php
                                        // Get maintainer data by ID
                                        $ajukanPeminjamanModel = $this->model('AjukanPeminjaman_model');
                                        $maintainer = $ajukanPeminjamanModel->getMaintainerById($barang['id_maintainer']);

                                        // Display maintainer name if found, otherwise show a message
                                        echo $maintainer ? $maintainer['nama'] : 'Maintainer Not Found';
                                        ?>
                                    </td>
                                    <td>
                                     <input type="number" name="selected_items[<?= $barang['id_barang']; ?>][qty]" id="qty_<?= $barang['id_barang']; ?>" placeholder="Berapa yang ingin Anda pinjam?">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-item-id="<?= $barang['id_barang']; ?>" onclick="removeItem(this)">X</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 ml-auto d-flex justify-content-end">
                <a href="<?= BASEURL;?>/ajukanPeminjaman" class="btn btn-primary ">Kembali</a>
                    <button type="submit" class="btn btn-success" name="submit_peminjaman">Ajukan Peminjaman</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function removeItem(button) {
        var itemId = button.getAttribute('data-item-id');
        var confirmation = confirm("Apakah Anda yakin ingin menghapus barang ini?");

        if (confirmation) {
            // Hapus baris tabel dengan menggunakan ID yang sesuai
            var row = document.getElementById('row_' + itemId);

            if (row) {
                row.remove();
            }
        }
    }
</script>
