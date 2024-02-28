<?php

class HomeAdmin extends Controller {
    public function index()
    {
        // $data = array();
        $data['judul'] = 'Admin';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['jumlah_barang'] = $this->model('Barang_model')->getTotalBarang();
        $data['jumlah_peminjaman'] = $this->model('DataPeminjaman_model')->getTotalPeminjaman();
        $data['jumlah_anggota'] = $this->model('Akun_model')->getTotalAnggota();
        $data['jumlah_maintainer'] = $this->model('Maintainer_model')->getTotalMaintainer();


        
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/headerNav', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('homeAdmin/index', $data);
        $this->view('templates/admin/footer');

    }
}