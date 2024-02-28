<?php

class Maintainer_model {
    private $table = 'maintainer';
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
    public function getBarangById($id_maintainer)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_maintainer=:id_maintainer');
        $this->db->bind('id_maintainer', $id_maintainer);
        return $this->db->single();
    }
    public function getTotalMaintainer(){
        $sql = "SELECT COUNT(*) AS total FROM maintainer";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
}