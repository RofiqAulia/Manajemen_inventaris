<?php
class Tambah_maintainer{

    private $table = 'maintainer';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahDataBarang($data)
    {
        $query = "INSERT INTO maintainer 
                  (id_maintainer, nama, no_telp, alamat)
                  VALUES
                  (:id_maintainer, :nama, :no_telp, :alamat)";
    
        $this->db->query($query);
        $this->db->bind('id_maintainer', $data['id_maintainer']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}