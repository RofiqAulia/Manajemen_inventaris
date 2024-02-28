<?php

class prosesPeminjaman extends Controller
{
    public function __construct()
    {
        // Tambahkan logika konstruktor jika diperlukan
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data yang diperlukan dari formulir
            $id_anggota = $_POST['id_anggota'];
            $tanggal_mulai = $_POST['tanggal_mulai'];
            $tanggal_selesai = $_POST['tanggal_selesai'];
            $selectedItems = $_POST['selected_items'];
            
            $ajukanPeminjamanModel = $this->model('AjukanPeminjaman_model');
            $result = $ajukanPeminjamanModel->simpanPeminjaman( $id_anggota, $tanggal_mulai, $tanggal_selesai);

            foreach ($selectedItems as $id_barang => $item) {
                $qty = $item['qty'];
                $ajukanPeminjamanModel->detailPeminjaman($result, $id_barang, $qty);
            }

            // Set pesan sesuai hasil operasi
            if ($result) {
                $_SESSION['pesan'] = 'Peminjaman berhasil diajukan.';
            } else {
                $_SESSION['pesan'] = 'Gagal mengajukan peminjaman. Silakan coba lagi.';
            }

            // Redirect ke halaman tertentu setelah proses peminjaman selesai
            header('Location: ' . BASEURL . '/ajukanPeminjaman/index');
            exit;
        } else {
            // Handle jika metode request bukan POST
            header('Location: ' . BASEURL);
            exit;
        }
    }
}
