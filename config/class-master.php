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
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $kategori[] = [
                    'id' => $row['id_kategori'],
                    'kode' => $row['kode_kategori'],
                    'nama' => $row['nama_kategori']
                ];
            }
        }
        return $kategori;
    }

    // Input kategori baru
    public function inputKategori($data){
        $kodeKategori = $data['kode_kategori'];
        $namaKategori = $data['nama_kategori'];
        $query = "INSERT INTO tb_kategori (kode_kategori, nama_kategori) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("ss", $kodeKategori, $namaKategori);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Mendapatkan data kategori berdasarkan kode
    public function getUpdateKategori($kode){
        $query = "SELECT * FROM tb_kategori WHERE kode_kategori = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("s", $kode);
        $stmt->execute();
        $result = $stmt->get_result();
        $kategori = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $kategori = [
                'id' => $row['id_kategori'],
                'kode' => $row['kode_kategori'],
                'nama' => $row['nama_kategori']
            ];
        }
        $stmt->close();
        return $kategori;
    }

    // Update data kategori
    public function updateKategori($data){
        $kodeKategori = $data['kode'];
        $namaKategori = $data['nama'];
        $query = "UPDATE tb_kategori SET nama_kategori = ? WHERE kode_kategori = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("ss", $namaKategori, $kodeKategori);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Hapus kategori
    public function deleteKategori($kode){
        $query = "DELETE FROM tb_kategori WHERE kode_kategori = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("s", $kode);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ===========================
    // SUPPLIER
    // ===========================

    // Mendapatkan semua supplier
    public function getSupplier(){
        $query = "SELECT * FROM tb_supplier";
        $result = $this->conn->query($query);
        $supplier = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $supplier[] = [
                    'id' => $row['id_supplier'],
                    'nama' => $row['nama_supplier']
                ];
            }
        }
        return $supplier;
    }

    // Input supplier baru
    public function inputSupplier($data){
        $namaSupplier = $data['nama'];
        $query = "INSERT INTO tb_supplier (nama_supplier) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("s", $namaSupplier);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Mendapatkan data supplier berdasarkan id
    public function getUpdateSupplier($id){
        $query = "SELECT * FROM tb_supplier WHERE id_supplier = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $supplier = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $supplier = [
                'id' => $row['id_supplier'],
                'nama' => $row['nama_supplier']
            ];
        }
        $stmt->close();
        return $supplier;
    }

    // Update data supplier
    public function updateSupplier($data){
        $idSupplier = $data['id'];
        $namaSupplier = $data['nama'];
        $query = "UPDATE tb_supplier SET nama_supplier = ? WHERE id_supplier = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("si", $namaSupplier, $idSupplier);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Hapus supplier
    public function deleteSupplier($id){
        $query = "DELETE FROM tb_supplier WHERE id_supplier = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

}
?>
