<?php
include '../config/class-master.php';
$master = new MasterData();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if($aksi == 'inputkategori'){
    $dataKategori = [
        'nama' => $_POST['nama'] // key sesuai class-master.php
    ];
    $input = $master->inputKategori($dataKategori);
    if($input){
        header("Location: ../master-kategori-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-kategori-input.php?status=failed");
    }

} elseif($aksi == 'updatekategori'){
    $dataKategori = [
        'id' => $_POST['id'],     // key sesuai class-master.php
        'nama' => $_POST['nama']
    ];
    $update = $master->updateKategori($dataKategori);
    if($update){
        header("Location: ../master-kategori-list.php?status=editsuccess");
    } else {
        header("Location: ../master-kategori-edit.php?id=".$dataKategori['id']."&status=failed");
    }

} elseif($aksi == 'deletekategori'){
    $id = $_GET['id'];
    $delete = $master->deleteKategori($id);
    if($delete){
        header("Location: ../master-kategori-list.php?status=deletesuccess");
    } else {
        header("Location: ../master-kategori-list.php?status=deletefailed");
    }
}
?>
