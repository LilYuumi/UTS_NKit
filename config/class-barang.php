<?php
include_once 'db-config.php';

class Barang extends Database {

    // Method untuk menambahkan barang
    public function inputBarang($data){
        $nama       = $data['nama'];
        $idKategori = $data['kategori'];
        $idSupplier = $data['supplier'];
        $hargaBeli  = $data['harga_beli'];
        $hargaJual  = $data['harga_jual'];
        $stock       = $data['stock'];

        $query = "INSERT INTO tb_barang (nama_barang, id_kategori, id_supplier, harga_beli, harga_jual, stock)
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("siiiii", $nama, $idKategori, $idSupplier, $hargaBeli, $hargaJual, $stock);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mengambil semua barang beserta kategori dan supplier
    public function getAllBarang(){
        $query = "SELECT b.id_barang, b.nama_barang, k.nama_kategori, s.nama_supplier AS supplier, 
                        b.harga_beli, b.harga_jual, b.stock
                FROM tb_barang b
                JOIN tb_kategori k ON b.id_kategori = k.id_kategori
                JOIN tb_supplier s ON b.id_supplier = s.id_supplier";
        $result = $this->conn->query($query);
        $barang = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $barang[] = [
                    'id' => $row['id_barang'],
                    'nama_barang' => $row['nama_barang'],   // key ini harus sesuai
                    'kategori' => $row['nama_kategori'],
                    'supplier' => $row['supplier'],
                    'harga_beli' => $row['harga_beli'],
                    'harga_jual' => $row['harga_jual'],
                    'stock' => $row['stock']                 // key sama dengan yang dipakai di list
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
                'nama_barang' => $row['nama_barang'],
                'kategori' => $row['id_kategori'],
                'supplier' => $row['id_supplier'],
                'harga_beli' => $row['harga_beli'],
                'harga_jual' => $row['harga_jual'],
                'stock' => $row['stock']
            ];
        }
        $stmt->close();
        return $data;
    }

    public function updateBarang($data) {
        $sql = "UPDATE tb_barang SET nama_barang = ?, id_kategori = ?, id_supplier = ?, harga_beli = ?, harga_jual = ?, stock = ? WHERE id_barang = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "siiiiii",
            $data['nama'],
            $data['kategori'],
            $data['supplier'],
            $data['harga_beli'],
            $data['harga_jual'],
            $data['stock'],
            $data['id']
        );

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function searchBarang($keyword) {
        $keyword = '%' . $keyword . '%';
        $sql = "SELECT b.id_barang AS id, b.nama_barang, k.nama_kategori AS kategori, 
                    s.nama_supplier AS supplier, b.harga_beli, b.harga_jual, b.stock
                FROM tb_barang b
                JOIN tb_kategori k ON b.id_kategori = k.id_kategori
                JOIN tb_supplier s ON b.id_supplier = s.id_supplier
                WHERE b.nama_barang LIKE ?
                ORDER BY b.nama_barang";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    

}
?>
