<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Dataitem extends Controller {

    public function index()
    {
        $data['judul'] = 'Data Item';
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $data['maintainer'] = $this->model('Maintainer_model')->getAllBarang();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('dataitem/index', $data);
        $this->view('templates/admin/footer');
    }
    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_barang = $_POST['id_barang'];
    
            // Lakukan penghapusan berdasarkan $id_barang
            $result = $this->model('Hapus_model')->hapusDataBarang($id_barang);
    
            // Setel pesan sesuai hasil penghapusan
            if ($result > 0) {
                $_SESSION['pesan'] = 'Data berhasil dihapus.';
            } else {
                $_SESSION['pesan'] = 'Gagal menghapus data. Silakan coba lagi.';
            }
    
            // Redirect ke halaman dataitem
            header('Location: ' . BASEURL . '/dataitem');
            exit;
        } else {
            header('Location: ' . BASEURL . '/dataitem');
            exit;
        }
    }
    
    public function cari()
    {
        $data['judul'] = 'Data Item';
        $data['barang'] = $this->model('Barang_model')->cariDataBarang();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('dataitem/index', $data);
        $this->view('templates/admin/footer');
    }

    public function edit($id_barang)
    {
        $data['judul'] = 'Edit Barang';
        $data['barang'] = $this->model('Barang_model')->getBarangById($id_barang);
        $data['maintainer'] = $this->model('Maintainer_model')->getAllBarang();
    
        if (!$data['barang']) {
            $_SESSION['pesan'] = 'Barang tidak ditemukan.';
            header('Location: ' . BASEURL . '/dataitem');
            exit;
        }
    
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('dataitem/edit', $data);
        $this->view('templates/admin/footer');
    }
    

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $update_model = $this->model('Update_model');
    
            // Pastikan $_POST berisi data yang benar
            if (isset($_POST['id_barang'])) {
                if ($update_model->updateDataBarang($_POST) > 0) {
                    $_SESSION['pesan'] = 'Data barang berhasil diperbarui.';
                } else {
                    $_SESSION['pesan'] = 'Gagal memperbarui data barang. Silakan coba lagi.';
                }
            }
    
            header('Location: ' . BASEURL . '/dataitem');
            exit;
        } else {
            header('Location: ' . BASEURL . '/dataitem');
            exit;
        }
    }
    
    
    public function tambah()
    {
        
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
            header('Location: ' . BASEURL . '/dataitem');
            exit;
        }
    }
}