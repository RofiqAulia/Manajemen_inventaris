<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Histori extends Controller {
    public function index()
    {
        // Ambil ID anggota dari sesi atau dari data pengguna yang sudah login
        $id_anggota = $_SESSION['username'];

        // Panggil model dan fungsi untuk mendapatkan data peminjaman detail
        $historiModel = $this->model('Histori_model');
        $dataPeminjamanDetail = $historiModel->getHistoriPeminjamanByUserId($id_anggota);
    
        // Load view dan kirim data peminjaman detail
        $data['judul'] = 'Histori Peminjaman Anda';
        $data['peminjaman'] = $dataPeminjamanDetail;
        $this->view('templates/user/header', $data);
        $this->view('templates/user/headerNav', $data);
        $this->view('templates/user/sidebar');
        $this->view('histori/index', $data);
        $this->view('templates/user/footer');
    }
    

    public function cari()
    {
        $data['judul'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->model('Histori_model')->cariDataPeminjaman();
        $this->view('templates/user/header', $data);
        $this->view('templates/user/headerNav', $data);
        $this->view('templates/user/sidebar', $data);
        $this->view('histori/index', $data);
        $this->view('templates/user/footer');
    }


    public function filter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filter_model = $this->model('Histori_model');
            $filter = $_POST['filter'];

            switch ($filter) {
                case 'semua':
                    $data['judul'] = 'Data Peminjaman';
                    $data['peminjaman'] = $filter_model->filterSemua();
                    break;

                case 'belum_dikembalikan':
                    $data['judul'] = 'Data Peminjaman Belum Dikembalikan';
                    $data['peminjaman'] = $filter_model->filterBelumDikembalikan();
                    break;

                case 'sudah_dikembalikan':
                    $data['judul'] = 'Data Peminjaman Sudah Dikembalikan';
                    $data['peminjaman'] = $filter_model->filterSudahDikembalikan();
                    break;

                case 'hari_ini':
                    $data['judul'] = 'Data Peminjaman Hari Ini';
                    $data['peminjaman'] = $filter_model->filterHariIni();
                    break;

                case '7_hari_terakhir':
                    $data['judul'] = 'Data Peminjaman 7 Hari Terakhir';
                    $data['peminjaman'] = $filter_model->filter7HariTerakhir();
                    break;

                case '1_bulan_terakhir':
                    $data['judul'] = 'Data Peminjaman 1 Bulan Terakhir';
                    $data['peminjaman'] = $filter_model->filter1BulanTerakhir();
                    break;

                default:
                    // Jika tidak ada opsi yang cocok, kembalikan ke halaman utama
                    header('Location: ' . BASEURL . '/dataPeminjaman');
                    exit;
            }

            // Tampilkan hasil filter
            $this->view('templates/user/header', $data);
            $this->view('templates/user/headerNav', $data);
            $this->view('templates/user/sidebar');
            $this->view('histori/index', $data);
            $this->view('templates/user/footer');
        } else {
            header('Location: ' . BASEURL . '/dataPeminjaman');
            exit;
        }
    }
    
}