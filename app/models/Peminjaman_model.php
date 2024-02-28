<?php

class Peminjaman_model {
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    // public function getBarangById($id)
    // {
        
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    //     $this->db->bind('id', $id);
    //     return $this->db->single();
    // }

    public function getBarangById($id)
    {
        $this->db->query('SELECT peminjaman.*, barang.id 
                        FROM peminjaman 
                        INNER JOIN barang ON peminjaman.id_barang = barang.id 
                        WHERE peminjaman.id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}