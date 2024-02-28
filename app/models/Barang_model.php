<?php

class Barang_model {
    private $table = 'barang';
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
    public function getBarangById($id_barang)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_barang=:id_barang');
        $this->db->bind('id_barang', $id_barang);
        return $this->db->single();
    }
        public function cariDataBarang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang WHERE nama_barang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
    public function getTotalBarang(){
        $sql = "SELECT COUNT(*) AS total FROM barang";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
}