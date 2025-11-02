<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // ===========================
    // KATEGORI
    // ===========================

    // Mendapatkan semua kategori
    public function getKategori(){
        $query = "SELECT * FROM tb_kategori";
        $result = $this->conn->query($query);
        $kategori = [];
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $kategori[] = [
                    'id_kategori' => $row['id_kategori'],
                    'nama_kategori' => $row['nama_kategori']
                ];
            }
        }
        return $kategori;
    }

    // Input kategori baru
    public function inputKategori($data){
        $namaKategori = $data['nama'];
        $query = "INSERT INTO tb_kategori (nama_kategori) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("s", $namaKategori);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Mendapatkan data kategori berdasarkan id
    public function getUpdateKategori($id){
        $query = "SELECT * FROM tb_kategori WHERE id_kategori = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $kategori = null;
        if($result && $result->num_rows > 0){
            $row = $result->fetch_assoc();
            $kategori = [
                'id_kategori' => $row['id_kategori'],
                'nama_kategori' => $row['nama_kategori']
            ];
        }
        $stmt->close();
        return $kategori;
    }

    // Update data kategori
    public function updateKategori($data){
        $idKategori = $data['id_kategori'];       // integer
        $namaKategori = $data['nama_kategori'];   // string
        $query = "UPDATE tb_kategori SET nama_kategori = ? WHERE id_kategori = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("si", $namaKategori, $idKategori);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Hapus kategori
    public function deleteKategori($id){
        $query = "DELETE FROM tb_kategori WHERE id_kategori = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    

    // ===========================
    // SUPPLIER
    // ===========================

       // Ambil semua supplier
    public function getSupplier() {
        $query = "SELECT id_supplier, nama_supplier, kontak_sup, alamat_sup FROM tb_supplier";
        $result = $this->conn->query($query);
        $suppliers = [];

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $suppliers[] = [
                    'id' => $row['id_supplier'],
                    'nama' => $row['nama_supplier'],
                    'kontak' => $row['kontak_sup'],
                    'alamat' => $row['alamat_sup']
                ];
            }
        }

        return $suppliers;
    }

    // Ambil supplier berdasarkan ID
    public function getUpdateSupplier($id) {
        $query = "SELECT id_supplier, nama_supplier, kontak_sup, alamat_sup FROM tb_supplier WHERE id_supplier = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $supplier = null;

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $supplier = [
                'id' => $row['id_supplier'],
                'nama' => $row['nama_supplier'],
                'kontak' => $row['kontak_sup'],
                'alamat' => $row['alamat_sup']
            ];
        }

        $stmt->close();
        return $supplier;
    }

    // Tambah supplier
    public function addSupplier($nama, $kontak, $alamat) {
        $query = "INSERT INTO tb_supplier (nama_supplier, kontak_sup, alamat_sup) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("sss", $nama, $kontak, $alamat);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Update supplier
    public function editSupplier($id, $nama, $kontak, $alamat) {
        $query = "UPDATE tb_supplier SET nama_supplier=?, kontak_sup=?, alamat_sup=? WHERE id_supplier=?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("sssi", $nama, $kontak, $alamat, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Hapus supplier
    public function deleteSupplier($id) {
        $query = "DELETE FROM tb_supplier WHERE id_supplier=?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
