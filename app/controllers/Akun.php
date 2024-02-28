<?php
class Akun extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Anggota';
        $data['anggota'] = $this->model('Akun_model')->getAllAnggota();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('akun/index', $data);
        $this->view('templates/admin/footer');
    }

    public function tambah()
    {
        if ($this->model('Akun_model')->tambahDataAnggota($_POST) > 0) {
            $_SESSION['pesan'] = 'Data berhasil disimpan.';
            header('Location: ' . BASEURL . '/akun');
            exit;
        } else {
            $_SESSION['pesan'] = 'Gagal menyimpan data. Silakan coba lagi.';
            header('Location: ' . BASEURL . '/akun');
            exit;
        }
    }

    public function hapus($id_anggota)
    {
        $result = $this->model('Akun_model')->hapusDataAnggota($id_anggota);
    
        if ($result > 0) {
            $_SESSION['pesan'] = 'Data berhasil dihapus.';
        } else {
            $_SESSION['pesan'] = 'Gagal menghapus data. Silakan coba lagi.';
        }
    
        header('Location: ' . BASEURL . '/akun');
        exit;
    }
    

    public function edit($id_anggota)
    {
        $data['judul'] = 'Edit Data Anggota';
        $data['anggota'] = $this->model('Akun_model')->getAnggotaById($id_anggota);
    
        if (!$data['anggota']) {
            $_SESSION['pesan'] = 'Anggota tidak ditemukan.';
            header('Location: ' . BASEURL . '/akun');
            exit;
        }
    
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar');
        $this->view('akun/edit', $data);
        $this->view('templates/admin/footer');
    }

    // public function getUbah(){
    //     echo json_encode($this->model('Akun_model')->getAnggotaById($_POST['id_anggota']));
    // }

    public function cari()
    {
        $data['judul'] = 'List Anggota';
        $data['anggota'] = $this->model('Akun_model')->cariDataAnggota();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('akun/index', $data);
        $this->view('templates/admin/footer');
    }

public function update()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $update_model = $this->model('Akun_model');

        // Pastikan $_POST berisi data yang benar
        if (isset($_POST['id_anggota'])) {
            $data = $_POST;

            // Perbarui password hanya jika password baru tidak kosong
            if (!empty($data['password'])) {
                $hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);
                $data['password'] = $hashed_password;
            } else {
                unset($data['password']); // Hapus password dari data agar tidak diubah jika kosong
            }

            if ($update_model->ubahDataAnggota($_POST) > 0) {
                $_SESSION['pesan'] = 'Data anggota berhasil diperbarui.';
            } else {
                $_SESSION['pesan'] = 'Gagal memperbarui data anggota. Silakan coba lagi.';
            }
        }

        header('Location: ' . BASEURL . '/akun');
        exit;
    } else {
        header('Location: ' . BASEURL . '/akun');
        exit;
    }
}

}
