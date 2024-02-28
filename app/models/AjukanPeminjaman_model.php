<?php

class AjukanPeminjaman_model {
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
    public function findMaintainerById($maintainerId, $maintainers)
    {
        foreach ($maintainers as $maintainer) {
            if ($maintainer['id_maintainer'] == $maintainerId) {
                return $maintainer;
            }
        }
        return null; // Return null if not found
    }

    public function simpanPeminjaman($id_anggota, $tanggal_mulai, $tanggal_selesai) {
        $query = "INSERT INTO peminjaman 
                  (tgl_pinjam, tgl_kembali, konfirmasi, id_anggota)
                  VALUES
                  (:tgl_pinjam, :tgl_kembali, 'belum dikembalikan', :id_anggota)";
    
        $this->db->query($query);
        $this->db->bind('tgl_pinjam', $tanggal_mulai);
        $this->db->bind('tgl_kembali', $tanggal_selesai);
        $this->db->bind('id_anggota', $id_anggota);
        $this->db->execute();
    
        return $this->db->lastInsertId();
    }
    
    public function detailPeminjaman($id_peminjaman,$id_barang,$qty){
        $query = "INSERT INTO detail_peminjaman 
              (id_peminjaman, id_barang, qty)
              VALUES
              (:id_peminjaman, :id_barang, :qty)";

        $this->db->query($query);
        $this->db->bind('id_peminjaman', $id_peminjaman);
        $this->db->bind('id_barang', $id_barang);
        $this->db->bind('qty', $qty);
        $this->db->execute();

        return $this->db->rowCount();
    }

// public function getDataForSelectedItems($selectedItems)
// {
//     $selectedItemsData = array();

//     foreach ($selectedItems as $selectedItemId) {
//         $barang = $this->getBarangById($selectedItemId);

//         if (is_array($barang) && isset($barang['id_maintainer'])) {
//             $maintainer = $this->findMaintainerById($barang['id_maintainer'], $this->getAllMaintainers());

//             if (is_array($maintainer)) {
//                 $barang['maintainer'] = isset($maintainer['nama']) ? $maintainer['nama'] : '';
//                 $selectedItemsData[] = $barang;
//             }
//         }
//     }

//     return $selectedItemsData;
// }

// public function getAllMaintainers()
// {
//     $this->db->query('SELECT * FROM maintainer');

//     // Attempt to execute the query and log any errors
//     try {
//         $result = $this->db->resultSet();
//     } catch (PDOException $e) {
//         die("Database error: " . $e->getMessage());
//     }

//     // Log the query for debugging purposes
//     error_log("Query: " . $this->db->getFullQuery());

//     // Add debug information
//     var_dump($result);

//     return $result;
// }

public function getAnggotaById($id_anggota)
{
    $this->db->query('SELECT * FROM anggota WHERE id_anggota = :id_anggota');
    $this->db->bind(':id_anggota', $id_anggota);
    // var_dump($this->db->single()); // Add this line for debugging
    return $this->db->single();
}

public function getMaintainerById($id_maintainer)
{
    $this->db->query('SELECT * FROM maintainer WHERE id_maintainer=:id_maintainer');
    $this->db->bind('id_maintainer', $id_maintainer);
    return $this->db->single();
}

public function getTotalBrgPeminjam(){
    $sql = "SELECT COUNT(*) AS total FROM barang";
    $this->db->query($sql);
    return $this->db->resultSet();
}

public function getTotalBrg(){
    $sql = "SELECT SUM(qty) AS total FROM barang";
    $this->db->query($sql);
    return $this->db->resultSet();
}

}