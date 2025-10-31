<?php
include '../config/class-master.php';
$master = new MasterData();

if($_GET['aksi'] == 'inputkategori'){
    $dataKategori = [
        'kode_kategori' => $_POST['kode'],
        'nama_kategori' => $_POST['nama']
    ];
    $input = $master->inputKategori($dataKategori);
    if($input){
        header("Location: ../master-kategori-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-kategori-input.php?status=failed");
    }
} elseif($_GET['aksi'] == 'updatekategori'){
    $dataKategori = [
        'id_kategori' => $_POST['id_kategori'],
        'kode_kategori' => $_POST['kode_kategori'],
        'nama_kategori' => $_POST['nama_kategori']
    ];
    $update = $master->updateKategori($dataKategori);
    if($update){
        header("Location: ../master-kategori-list.php?status=editsuccess");
    } else {
        header("Location: ../master-kategori-edit.php?id=".$dataKategori['id_kategori']."&status=failed");
    }
} elseif($_GET['aksi'] == 'deletekategori'){
    $id = $_GET['id'];
    $delete = $master->deleteKategori($id);
    if($delete){
        header("Location: ../master-kategori-list.php?status=deletesuccess");
    } else {
        header("Location: ../master-kategori-list.php?status=deletefailed");
    }
}
?>
