<?php
class Akun_model
{
    private $table = 'anggota';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllAnggota()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAnggotaById($id_anggota)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_anggota = :id_anggota');
        $this->db->bind(':id_anggota', $id_anggota);
        return $this->db->single();
    }

    public function tambahDataAnggota($data)
    {
        if ($data['status'] == 'mahasiswa' || $data['status'] == 'dosen') {
            $level = 'user';
        } else {
            $level = 'admin';
        }

        $password = $data['password'];
        $salt = bin2hex(random_bytes(16));
        $combined_password = $salt . $password;
        $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);

        $userInsertQuery = "INSERT INTO user (id_user, username, password, salt, level) VALUES ('', :username, :password, :salt, :level)";
        $this->db->query($userInsertQuery);
        $this->db->bind(':username', $data['id_anggota']);
        $this->db->bind(':password', $hashed_password);
        $this->db->bind(':salt', $salt);
        $this->db->bind(':level', $level);
        $this->db->execute();

        $id_user = $this->db->lastInsertId();

        $anggotaInsertQuery = "INSERT INTO anggota (id_anggota, nama, no_telp, status, id_user) VALUES (:username, :nama, :no_telp, :status, :id_user)";
        $this->db->query($anggotaInsertQuery);
        $this->db->bind(':username', $data['id_anggota']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':no_telp', $data['no_telp']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':id_user', $id_user);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataAnggota($id_anggota)
    {
        try {
            // Delete data from 'anggota' table and the corresponding user record from 'user' table
            $deleteQuery = "
                DELETE anggota, user FROM anggota
                LEFT JOIN user ON anggota.id_user = user.id_user
                WHERE anggota.id_anggota = :id_anggota
            ";
    
            $this->db->query($deleteQuery);
            $this->db->bind(':id_anggota', $id_anggota);
            $this->db->execute();
        } catch (PDOException $e) {
            // Print or log the error message
            error_log('Error deleting data: ' . $e->getMessage());
            // Optionally, you can echo the error message for debugging
            echo 'Error deleting data: ' . $e->getMessage();
        }
    
        return $this->db->rowCount();
    }
    
    public function ubahDataAnggota($data)
    {
   
    $query = "
    UPDATE anggota
    JOIN user ON anggota.id_user = user.id_user
    SET 
        anggota.id_user = :new_id_user,
        user.password = :new_password,
        anggota.nama = :nama,
        anggota.no_telp = :no_telp,
        anggota.status = :status
    WHERE anggota.id_anggota = :id_anggota
";

$this->db->query($query);
$this->db->bind(':new_id_user', $data['id_user']); // Ganti dengan nilai baru id_user
$this->db->bind(':new_password', password_hash($data['password'], PASSWORD_BCRYPT)); // Ganti dengan password baru
$this->db->bind(':nama', $data['nama']);
$this->db->bind(':no_telp', $data['no_telp']);
$this->db->bind(':status', $data['status']);
$this->db->bind(':id_anggota', $data['id_anggota']);
$this->db->execute();


    return $this->db->rowCount();
}

    
    
    
    public function cariDataAnggota()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM anggota WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getTotalAnggota(){
        $sql = "SELECT COUNT(*) AS total FROM anggota";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
}