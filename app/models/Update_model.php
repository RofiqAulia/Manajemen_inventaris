<?php

class Update_model {
    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function updateDataBarang($data)
    {

        $query = "UPDATE {$this->table} SET id_barang = :id_barang, nama_barang = :nama_barang, qty = :qty, asal = :asal, keterangan = :keterangan, id_maintainer = :id_maintainer WHERE id_barang = :id_barang";
    
        $this->db->query($query);
        $this->db->bind(':id_barang', $data['id_barang']);
        $this->db->bind(':nama_barang', $data['nama_barang']);
        $this->db->bind(':qty', $data['qty']);
        $this->db->bind(':asal', $data['asal']);
        $this->db->bind(':keterangan', $data['keterangan']);
        $this->db->bind(':id_maintainer', $data['id_maintainer']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}