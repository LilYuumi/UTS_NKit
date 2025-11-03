<?php
include '../config/class-master.php';
$master = new MasterData();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if($aksi == 'inputkategori'){
    $dataKategori = [
        'nama' => $_POST['nama']
    ];
    $input = $master->inputKategori($dataKategori);
    if($input){
        header("Location: ../master-kategori-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-kategori-input.php?status=failed");
    }

} elseif($aksi == 'updatekategori'){
        $dataKategori = [
        'id_kategori' => $_POST['id_kategori'],     // sesuai class-master
        'nama_kategori' => $_POST['nama_kategori']  // sesuai class-master
    ];
    $update = $master->updateKategori($dataKategori);

    if($update){
        header("Location: ../master-kategori-list.php?status=editsuccess");
    } else {
        header("Location: ../master-kategori-edit.php?id=".$dataKategori['id_kategori']."&status=failed");
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
