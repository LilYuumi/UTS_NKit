<?php
// proses/proses-edit.php
include_once '../config/class-barang.php';
$barang = new Barang();

$data = [
    'id'         => $_POST['id'],
    'nama'       => $_POST['nama'],
    'kategori'   => $_POST['kategori'],
    'supplier'   => $_POST['supplier'],
    'harga_beli' => $_POST['harga_beli'],
    'harga_jual' => $_POST['harga_jual'],
    'stock'      => $_POST['stock']
];

$update = $barang->updateBarang($data);

if($update){
    header("Location: ../data-list.php?status=editsuccess");
} else {
    header("Location: ../data-edit.php?id=".$data['id']."&status=failed");
}
exit;
?>