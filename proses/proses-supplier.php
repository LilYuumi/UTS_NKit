<?php
include '../config/class-master.php';
$master = new MasterData();

if($_GET['aksi'] == 'inputsupplier'){
    $nama   = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];

    $input = $master->addSupplier($nama, $kontak, $alamat);
    if($input) header("Location: ../M-Supplier-list.php?status=inputsuccess");
    else header("Location: ../master-supplier-input.php?status=failed");
    exit;

} elseif($_GET['aksi'] == 'updatesupplier'){
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];

    $update = $master->editSupplier($id, $nama, $kontak, $alamat);
    if($update) header("Location: ../M-Supplier-list.php?status=editsuccess");
    else header("Location: ../master-supplier-edit.php?id=$id&status=failed");
    exit;

} elseif($_GET['aksi'] == 'deletesupplier'){
    $id = $_GET['id'];
    $delete = $master->deleteSupplier($id);
    if($delete) header("Location: ../M-Supplier-list.php?status=deletesuccess");
    else header("Location: ../M-Supplier-list.php?status=deletefailed");
    exit;
}
?>
