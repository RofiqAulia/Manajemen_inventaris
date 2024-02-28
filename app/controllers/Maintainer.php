<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Maintainer extends Controller {
    public function index()
    {
        $data['judul'] = 'Maintainer';
        $data['maintainer'] = $this->model('Maintainer_model')->getAllBarang();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('maintainer/index', $data);
        $this->view('templates/admin/footer');
    }
    public function hapus($id_maintainer)
    {
        // Attempt to delete data
        $result = $this->model('Hapus_maintainer')->hapusDataBarang($id_maintainer);

        // Set the session variable before sending headers
        if ($result > 0) {
            $_SESSION['pesan'] = 'Data berhasil dihapus.';
        } else {
            $_SESSION['pesan'] = 'Gagal menghapus data. Silakan coba lagi.';
        }
        // Redirect to the specified URL
        header('Location: ' . BASEURL . '/maintainer');
        exit;
    }

    public function edit($id_maintainer)
    {
        $data['judul'] = 'Edit Maintainer';
        $data['maintainer'] = $this->model('Maintainer_model')->getBarangById($id_maintainer);
    
        if (!$data['maintainer']) {
            $_SESSION['pesan'] = 'Maintainer tidak ditemukan.';
            header('Location: ' . BASEURL . '/maintainer');
            exit;
        }
    
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('maintainer/edit', $data);
        $this->view('templates/admin/footer');
    }
    

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $update_maintainer = $this->model('Update_maintainer');

            if ($update_maintainer->updateDataBarang($_POST) > 0) {
                $_SESSION['pesan'] = 'Data barang berhasil diperbarui.';
            } else {
                $_SESSION['pesan'] = 'Gagal memperbarui data barang. Silakan coba lagi.';
            }
            header('Location: ' . BASEURL . '/maintainer');
            exit;
        } else {
            header('Location: ' . BASEURL . '/maintainer');
            exit;
        }

    }
    
    public function tambah()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Attempt to add data
            $result = $this->model('Tambah_maintainer')->tambahDataBarang($_POST);

            // Set the session variable before sending headers
            if ($result > 0) {
                $_SESSION['pesan'] = 'Data berhasil disimpan.'; // Notification in Bahasa Indonesia
            } else {
                $_SESSION['pesan'] = 'Gagal menyimpan data. Silakan coba lagi.';
            }

            // Redirect to the specified URL
            header('Location: ' . BASEURL . '/maintainer');
            exit;
        }
    }
}