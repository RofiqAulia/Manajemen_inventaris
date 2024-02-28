<?php
class Hapus_peminjaman
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function hapusDataBarang($id)
    {
        $query = "DELETE FROM peminjaman WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
    
        if (!$this->db->execute()) {
            // Capture and display the error message
            $errorInfo = $this->db->getStatement()->errorInfo();
            echo 'Error executing SQL: ' . $errorInfo[2];
            return false;
        }
    
        // Reset ID ke 1
        $this->resetAutoIncrement();
        
        return true;
    }
    
    

    private function resetAutoIncrement()
    {
        // Query untuk mereset auto-increment ke 1
        $resetQuery = "ALTER TABLE peminjaman AUTO_INCREMENT = 1";
        $this->db->query($resetQuery);
        $this->db->execute();
    }   
}
?>
