<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Peminjaman extends Controller {
    public function index()
    {
        $data['judul'] = 'Peminjaman';
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllBarang();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('peminjaman/index', $data);
        $this->view('templates/admin/footer');
    }

    public function hapus($id)
    {
        // Attempt to delete data
        $result = $this->model('Hapus_peminjaman')->hapusDataBarang($id);

        // Set the session variable before sending headers
        if ($result > 0) {
            $_SESSION['pesan'] = 'Data berhasil dihapus.';
        } else {
            $_SESSION['pesan'] = 'Gagal menghapus data. Silakan coba lagi.';
        }
        // Redirect to the specified URL
        header('Location: ' . BASEURL . '/peminjaman');
        exit;
    }

    public function tambah()
    {
        // Ambil daftar barang dari model
        $data['barang'] = $this->model('Barang_model')->getAllBarangs();
    
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Proses form yang disubmit
            
            // Dapatkan data dari form
            $postData = [
                'nama' => $_POST['nama'],
                'status' => $_POST['status'],
                'nama_barang' => $_POST['nama_barang'],
                'qty' => $_POST['qty'],
                'tgl_pinjam' => $_POST['tgl_pinjam'],
                'tgl_kembali' => $_POST['tgl_kembali'],
                'id_barang' => $_POST['id_barang']
            ];
    
            // Panggil fungsi tambahDataBarang untuk menambahkan data baru ke dalam peminjaman
            $result = $this->model('Tambah_peminjaman')->tambahDataBarang($postData);
    
            if ($result > 0) {
                $_SESSION['pesan'] = 'Data berhasil disimpan.';
            } else {
                $_SESSION['pesan'] = 'Gagal menyimpan data. Silakan coba lagi.';
            }
    
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }
    
        // Tampilkan form dengan daftar barang
        $this->view('index', $data);
    }
    

    public function edit($id)
    {
        $data['judul'] = 'Edit Peminjaman';
        $data['peminjaman'] = $this->model('Peminjaman_model')->getBarangById($id);

        if (!$data['barang']) {
            $_SESSION['pesan'] = 'Barang tidak ditemukan.';
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/sidebar');
        $this->view('peminjaman/edit', $data);
        $this->view('templates/admin/footer');
    }
}