<?php

class HomeUser extends Controller {
    public function index()
    {
        $data['judul'] = 'Admin';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['jumlah_brgpeminjam'] = $this->model('AjukanPeminjaman_model')->getTotalBrgPeminjam();
        $data['jumlah_brg'] = $this->model('AjukanPeminjaman_model')->getTotalBrg();
        
        $this->view('templates/user/header', $data);
        $this->view('templates/user/headerNav', $data);
        $this->view('templates/user/sidebar', $data);
        $this->view('homeUser/index', $data);
        $this->view('templates/user/footer');
    }
}