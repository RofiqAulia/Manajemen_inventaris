<?php
class Tambah_peminjaman{

    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    

    public function tambahDataBarang($data)
    {

        

        $query = "INSERT INTO peminjaman 
                  (nama, status,  nama_barang, qty, tgl_pinjam, tgl_kembali, id_barang)
                  VALUES
                  (:nama, :status,  :nama_barang, :qty, :tgl_pinjam, :tgl_kembali, :id_barang)";
    
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->bind('id_barang', $data['id_barang']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}