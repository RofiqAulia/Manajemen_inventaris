<?php
class Hapus_maintainer
{
    private $table = 'maintainer';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function hapusDataBarang($id_maintainer)
    {
        $query = "DELETE FROM maintainer WHERE id_maintainer = :id_maintainer";
        $this->db->query($query);
        $this->db->bind('id_maintainer', $id_maintainer);
    
        if (!$this->db->execute()) {
            // Capture and display the error message
            $errorInfo = $this->db->getStatement()->errorInfo();
            echo 'Error executing SQL: ' . $errorInfo[2];
            return false;
        }
        
        return true;
    }
      
}
?>
