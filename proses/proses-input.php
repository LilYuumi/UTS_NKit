<?php
// Memasukkan file class-barang.php untuk mengakses class Barang
include '../config/class-barang.php';

// Membuat objek dari class Barang
$barang = new Barang();

// Mengambil data dari form input menggunakan metode POST
$dataBarang = [
    'nama'       => $_POST['nama'],
    'kategori'   => $_POST['kategori'],   // ambil id kategori
    'supplier'   => $_POST['supplier'],   // ambil id supplier
    'harga_beli' => $_POST['harga_beli'],
    'harga_jual' => $_POST['harga_jual'],
    'stock'      => $_POST['stock']
];

// Memanggil method inputBarang untuk memasukkan data
$input = $barang->inputBarang($dataBarang);

// Mengecek apakah proses input berhasil atau tidak
if($input){
    // Jika berhasil, redirect ke halaman data-list.php dengan status inputsuccess
    header("Location: ../data-list.php?status=inputsuccess");
} else {
    // Jika gagal, redirect ke halaman input-barang.php dengan status failed
    header("Location: ../input-barang.php?status=failed");
}
?>
