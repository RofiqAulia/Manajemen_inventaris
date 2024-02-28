<?php
class Tambah_model{

    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahDataBarang($data)
    {
        
        $query = "INSERT INTO barang 
                  (id_barang, nama_barang, qty, asal, keterangan, id_maintainer)
                  VALUES
                  (:id_barang, :nama_barang, :qty, :asal, :keterangan, :id_maintainer)";
    
        $this->db->query($query);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('asal', $data['asal']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id_maintainer', $data['id_maintainer']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}