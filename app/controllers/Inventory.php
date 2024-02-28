<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Inventory extends Controller {
    public function index()
    {
        $data['judul'] = 'Inventaris';
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('inventory/index', $data);
        $this->view('templates/admin/footer');
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
