<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class DataPeminjaman extends Controller {
    public function index()
    {
        $data['judul'] = 'Data Peminjaman Inventaris JTI';
        $data['peminjaman'] = $this->model('DataPeminjaman_model')->getAllDataPeminjaman();
        $data['peminjaman'] = $this->model('DataPeminjaman_model')->getAllDataPeminjamanDetail();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('dataPeminjaman/index', $data);
        $this->view('templates/admin/footer');
    }
    public function hapus($id)
    {
        // Attempt to delete data
        $result = $this->model('DataPeminjaman_model')->hapusDataPeminjaman($id);

        // Set the session variable before sending headers
        if ($result > 0) {
            $_SESSION['pesan'] = 'Data berhasil dihapus.';
        } else {
            $_SESSION['pesan'] = 'Gagal menghapus data. Silakan coba lagi.';
        }
        // Redirect to the specified URL
        header('Location: ' . BASEURL . '/dataPeminjaman');
        exit;
    }
    public function cari()
    {
        $data['judul'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->model('DataPeminjaman_model')->cariDataPeminjaman();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('dataPeminjaman/index', $data);
        $this->view('templates/admin/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Data Peminjaman';
        $data['peminjaman'] = $this->model('DataPeminjaman_model')->getDataPeminjamanById($id);

        if (!$data['peminjaman']) {
            $_SESSION['pesan'] = 'Data tidak ditemukan.';
            header('Location: ' . BASEURL . '/dataPeminjaman');
            exit;
        }

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('dataPeminjaman/edit', $data);
        $this->view('templates/admin/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Peminjaman';
        $data['peminjaman'] = $this->model('DataPeminjaman_model')->getDataPeminjamanDetailById($id);

        if (!$data['peminjaman']) {
            $_SESSION['pesan'] = 'Data tidak ditemukan.';
            header('Location: ' . BASEURL . '/dataPeminjaman');
            exit;
        }

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('dataPeminjaman/detail', $data);
        $this->view('templates/admin/footer');
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $update_model = $this->model('Datapeminjaman_model');

            if ($update_model->updateDataPeminjaman($_POST) > 0) {
                $_SESSION['pesan'] = 'Data barang berhasil diperbarui.';
            } else {
                $_SESSION['pesan'] = 'Gagal memperbarui data barang. Silakan coba lagi.';
            }
            header('Location: ' . BASEURL . '/dataPeminjaman');
            exit;
        } else {
            header('Location: ' . BASEURL . '/dataPeminjaman');
            exit;
        }
    }

    public function tambah()
    {
        var_dump($_POST);

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Attempt to add data
            $result = $this->model('Tambah_model')->tambahDataBarang($_POST);

            // Set the session variable before sending headers
            if ($result > 0) {
                $_SESSION['pesan'] = 'Data berhasil disimpan.'; // Notification in Bahasa Indonesia
            } else {
                $_SESSION['pesan'] = 'Gagal menyimpan data. Silakan coba lagi.';
            }

            // Redirect to the specified URL
            header('Location: ' . BASEURL . '/dataPeminjaman');
            exit;
        }
    }

    public function filter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filter_model = $this->model('DataPeminjaman_model');
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
            $this->view('templates/admin/header', $data);
            $this->view('templates/admin/headerNav', $data);
            $this->view('templates/admin/sidebar');
            $this->view('dataPeminjaman/index', $data);
            $this->view('templates/admin/footer');
        } else {
            header('Location: ' . BASEURL . '/dataPeminjaman');
            exit;
        }
    }

}