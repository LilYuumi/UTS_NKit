<?php
include_once 'db-config.php';

class Barang extends Database {

    // Method untuk menambahkan barang
    public function inputBarang($data){
        $nama = $data['nama_barang'];
        $kategori = $data['id_kategori'];
        $harga = $data['harga'];
        $stok = $data['stok'];
        $supplier = $data['supplier'];
        $deskripsi = $data['deskripsi'];

        $query = "INSERT INTO tb_barang (nama_barang, id_kategori, harga, stok, supplier, deskripsi)
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("siidss", $nama, $kategori, $harga, $stok, $supplier, $deskripsi);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mengambil semua barang beserta kategori
    public function getAllBarang(){
        $query = "SELECT b.id_barang, b.nama_barang, k.nama_kategori, b.harga, b.stok, b.supplier, b.deskripsi
                  FROM tb_barang b
                  JOIN tb_kategori k ON b.id_kategori = k.id_kategori";
        $result = $this->conn->query($query);
        $barang = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $barang[] = [
                    'id' => $row['id_barang'],
                    'nama' => $row['nama_barang'],
                    'kategori' => $row['nama_kategori'],
                    'harga' => $row['harga'],
                    'stok' => $row['stok'],
                    'supplier' => $row['supplier'],
                    'deskripsi' => $row['deskripsi']
                ];
            }
        }
        return $barang;
    }

    // Method untuk mengambil data barang berdasarkan ID
    public function getUpdateBarang($id){
        $query = "SELECT * FROM tb_barang WHERE id_barang = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $data = [
                'id' => $row['id_barang'],
                'nama' => $row['nama_barang'],
                'kategori' => $row['id_kategori'],
                'harga' => $row['harga'],
                'stok' => $row['stok'],
                'supplier' => $row['supplier'],
                'deskripsi' => $row['deskripsi']
            ];
        }
        $stmt->close();
        return $data;
    }
}

?>
