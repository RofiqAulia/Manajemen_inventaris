<?php

class Update_maintainer {
    private $table = 'maintainer';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function updateDataBarang($data)
    {
        $query = "UPDATE {$this->table} SET id_maintainer = :id_maintainer, nama = :nama, no_telp = :no_telp, alamat = :alamat WHERE id_maintainer = :id_maintainer";
    
        $this->db->query($query);
        $this->db->bind(':id_maintainer', $data['id_maintainer']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':no_telp', $data['no_telp']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':id_maintainer', $data['id_maintainer']); 
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    

    public function getBarangById($id_maintainer)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_maintainer=:id_maintainer');
        $this->db->bind('id_maintainer', $id_maintainer);
        return $this->db->single();
    }
}