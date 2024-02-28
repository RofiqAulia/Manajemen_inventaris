<?php
class tambah_akun{

    private $table = 'user';
    private $db;
    private $password;
    private $username;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah_akun_user($data)
    {

        $query = "INSERT INTO user (username, password, level) 
            VALUES (':username', ':password', ':level')";
    
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('level', $data['level']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}