<?php

class AjukanPeminjaman extends Controller
{
    public function index()
    {
        $data['judul'] = 'Ajukan Peminjaman';
        $data['barang'] = $this->model('AjukanPeminjaman_model')->getAllBarang();
        $data['maintainer'] = $this->model('Maintainer_model')->getAllBarang();
        // Gunakan Login->getAnggotaByIdUser() untuk mendapatkan informasi anggota dari session
        $this->view('templates/user/header', $data);
        $this->view('templates/user/headerNav', $data);
        $this->view('templates/user/sidebar');
        $this->view('ajukanPeminjaman/index', $data);
        $this->view('templates/user/footer');
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

    public function selectedBarang()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            if (!empty($_POST['selected_items'])) {
                $_SESSION['selected_items'] = $_POST['selected_items'];
                header('Location: ' . BASEURL . '/AjukanPeminjaman/formPinjam');
                exit();
            } else {
                $_SESSION['pesan_selected_items'] = 'Pilih setidaknya satu barang!';
                header('Location: ' . BASEURL . '/AjukanPeminjaman/index');
                exit();
            }
        }
    }

    public function formPinjam()
    {
        // Ambil data barang yang dipilih dari session
        $selectedItems = $_SESSION['selected_items'] ?? [];

        // Jika tidak ada barang yang dipilih, redirect ke index
        if (empty($selectedItems)) {
            $_SESSION['pesan_selected_items'] = 'Pilih setidaknya satu barang!';
            header('Location: ' . BASEURL . '/AjukanPeminjaman/index');
            exit();
        }

        // Lakukan pengolahan terhadap barang yang dipilih
        // Di sini Anda dapat menyiapkan data yang diperlukan untuk formPinjam.php

        // Contoh: Mendapatkan data barang yang dipilih dari model
        $ajukanPeminjamanModel = $this->model('AjukanPeminjaman_model');
        $selectedBarang = [];
        foreach ($selectedItems as $selectedItem) {
            $barang = $ajukanPeminjamanModel->getBarangById($selectedItem);
            if ($barang) {
                $selectedBarang[] = $barang;
            }
        }

        // Ambil informasi anggota peminjam dari database
        $anggotaModel = $this->model('AjukanPeminjaman_model');
        $anggota = $anggotaModel->getAnggotaById($_SESSION['username']);


        // Tambahkan informasi anggota peminjam ke dalam data
        $data['nama'] = isset($anggota['nama']) ? $anggota['nama'] : '';  // Ganti dengan kolom yang sesuai
        $data['id_anggota'] = isset($anggota['id_anggota']) ? $anggota['id_anggota'] : '';  // Ganti dengan kolom yang sesuai
        // Menyiapkan data untuk ditampilkan di formPinjam.php
        $data['judul'] = 'Form Peminjaman';
        $data['barang'] = $selectedBarang; // Data barang yang dipilih

        // Tampilkan halaman formPinjam.php dengan data barang yang dipilih
        $this->view('templates/user/header', $data);
        $this->view('templates/user/headerNav', $data);
        $this->view('templates/user/sidebar');
        $this->view('ajukanPeminjaman/formPinjam', $data);
        $this->view('templates/user/footer');
    }
}
