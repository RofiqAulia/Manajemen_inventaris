$(function(){
    $('.tombolTambahDataItem').on('click', function(e){
        e.preventDefault();
        $('#formModalLabel').html('Tambah Data Barang');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        // Bersihkan nilai input pada form saat menambah data baru
        $('.modal-body form')[0].reset();
    });

    $('.tampilModalUbah').on('click', function (){
        let judul = $(this).data('judul');
        $('#formModalLabel').html('Ubah Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/rofiq/public/DataItem/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/rofiq/public/DataItem/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama_barang').val(data.nama_barang);
                $('#qty').val(data.qty);
                $('#asal').val(data.asal);
                $('#keterangan').val(data.keterangan);
                $('#id_maintainer').val(data.id_maintainer);
                $('#id_barang').val(data.id_barang);
            }
        });

        // Bersihkan nilai input pada form saat mengubah data
        $('#formModal form')[0].reset();
    });

    // Menangani penutupan modal
    $('#formModal').on('hidden.bs.modal', function (e) {
        // Bersihkan nilai input pada form saat modal ditutup
        $('#formModal form')[0].reset();
    });
});
