<?php

class Histori_model
{

    private $table = 'peminjaman';
    private $view_peminjaman = 'view_peminjaman';
    private $view_peminjaman_detail = 'view_peminjaman_detail';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDataPeminjaman()
    {
        $this->db->query('SELECT * FROM ' . $this->view_peminjaman);
        return $this->db->resultSet();
    }

    public function getAllDataPeminjamanDetail()
    {
        $this->db->query('SELECT * FROM ' . $this->view_peminjaman_detail);
        return $this->db->resultSet();
    }

    public function getDataPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->view_peminjaman . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getDataPeminjamanDetailById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->view_peminjaman_detail . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function cariDataPeminjaman()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM {$this->view_peminjaman_detail} 
              WHERE id_barang LIKE :keyword 
              OR nama_barang LIKE :keyword 
              OR nama_anggota LIKE :keyword
              OR id_anggota LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }


    public function filterSemua()
    {
        $query = "SELECT * FROM {$this->view_peminjaman_detail}";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function filterBelumDikembalikan()
    {
        $query = "SELECT * FROM {$this->view_peminjaman_detail} WHERE konfirmasi = 'belum dikembalikan'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function filterSudahDikembalikan()
    {
        $query = "SELECT * FROM {$this->view_peminjaman_detail} WHERE konfirmasi = 'sudah dikembalikan'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function filterHariIni()
    {
        $today = date('Y-m-d');
        $query = "SELECT * FROM {$this->view_peminjaman_detail} WHERE DATE(tgl_pinjam) = '$today'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function filter7HariTerakhir()
    {
        $sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));
        $today = date('Y-m-d');
        $query = "SELECT * FROM {$this->view_peminjaman_detail} WHERE DATE(tgl_pinjam) BETWEEN '$sevenDaysAgo' AND '$today'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function filter1BulanTerakhir()
    {
        $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));
        $today = date('Y-m-d');
        $query = "SELECT * FROM {$this->view_peminjaman_detail} WHERE DATE(tgl_pinjam) BETWEEN '$oneMonthAgo' AND '$today'";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getTotalPeminjaman(){
        $sql = "SELECT COUNT(*) AS total FROM peminjaman";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getHistoriPeminjamanByUserId($id_anggota)
    {
        $query = "SELECT * FROM {$this->view_peminjaman_detail} 
                  WHERE id_anggota = :id_anggota";
        
        $this->db->query($query);
        $this->db->bind('id_anggota', $id_anggota);
        
        return $this->db->resultSet();
    }
    
}