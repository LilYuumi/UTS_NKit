<?php
include_once 'config/class-master.php';
$master = new MasterData();

if(isset($_GET['status'])){
    if($_GET['status'] == 'inputsuccess') echo "<script>alert('Data supplier berhasil ditambahkan.');</script>";
    elseif($_GET['status'] == 'editsuccess') echo "<script>alert('Data supplier berhasil diubah.');</script>";
    elseif($_GET['status'] == 'deletesuccess') echo "<script>alert('Data supplier berhasil dihapus.');</script>";
    elseif($_GET['status'] == 'deletefailed') echo "<script>alert('Gagal menghapus data supplier.');</script>";
}

$dataSupplier = $master->getSupplier();
?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'template/header.php'; ?>
</head>
<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">
<div class="app-wrapper">
    <?php include 'template/navbar.php'; ?>
    <?php include 'template/sidebar.php'; ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Data Supplier</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Master Supplier</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header"><h3 class="card-title">Daftar Supplier</h3></div>
                            <div class="card-body p-0 table-responsive">
                                <table class="table table-striped" role="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kontak</th>
                                            <th>Alamat</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($dataSupplier) == 0){
                                            echo '<tr class="align-middle"><td colspan="5" class="text-center">Tidak ada data supplier.</td></tr>';
                                        } else {
                                            foreach($dataSupplier as $index => $supplier){
                                                echo '<tr class="align-middle">
                                                    <td>'.($index+1).'</td>
                                                    <td>'.$supplier['nama'].'</td>
                                                    <td>'.$supplier['kontak'].'</td>
                                                    <td>'.$supplier['alamat'].'</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-warning me-1" onclick="window.location.href=\'master-supplier-edit.php?id='.$supplier['id'].'\'"><i class="bi bi-pencil-fill"></i> Edit</button>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm(\'Yakin ingin menghapus data supplier ini?\')){window.location.href=\'proses/proses-supplier.php?aksi=deletesupplier&id='.$supplier['id'].'\'}"><i class="bi bi-trash-fill"></i> Hapus</button>
                                                    </td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='master-supplier-input.php'"><i class="bi bi-plus-lg"></i> Tambah Supplier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'template/footer.php'; ?>
</div>
<?php include 'template/script.php'; ?>
</body>
</html>
