<?php
class Hapus_model
{
    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function hapusDataBarang($id_barang)
    {
        $query = "DELETE FROM barang WHERE id_barang = :id_barang";
        $this->db->query($query);
        $this->db->bind('id_barang', $id_barang);
    
        if (!$this->db->execute()) {
            // Tangkap dan tampilkan pesan kesalahan
            $errorInfo = $this->db->getStatement()->errorInfo();
            echo 'Error executing SQL: ' . $errorInfo[2];
            return false;
        }
    
        // Resetkan auto-increment ke 1
        $this->resetAutoIncrement();
    
        return true;
    }
    
    
    

    private function resetAutoIncrement()
    {
        // Query untuk mereset auto-increment ke 1
        $resetQuery = "ALTER TABLE barang AUTO_INCREMENT = 1";
        $this->db->query($resetQuery);
        $this->db->execute();
    }   
}
?>
