<?php
include_once 'config/class-barang.php';
$barang = new Barang();

// Alert status
if(isset($_GET['status'])){
    if($_GET['status'] == 'inputsuccess'){
        echo "<script>alert('Data barang berhasil ditambahkan.');</script>";
    } elseif($_GET['status'] == 'editsuccess'){
        echo "<script>alert('Data barang berhasil diubah.');</script>";
    } elseif($_GET['status'] == 'deletesuccess'){
        echo "<script>alert('Data barang berhasil dihapus.');</script>";
    } elseif($_GET['status'] == 'deletefailed'){
        echo "<script>alert('Gagal menghapus data barang. Silakan coba lagi.');</script>";
    }
}

$dataBarang = $barang->getAllBarang();
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
                    <div class="col-sm-6">
                        <h3 class="mb-0">Daftar Barang</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Barang</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Tabel Barang</h3>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Supplier</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stock</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($dataBarang) == 0){
                                            echo '<tr><td colspan="8" class="text-center">Tidak ada data barang.</td></tr>';
                                        } else {
                                            foreach($dataBarang as $index => $b){
                                                echo '<tr>
                                                    <td>'.($index+1).'</td>
                                                    <td>'.$b['nama_barang'].'</td>
                                                    <td>'.$b['kategori'].'</td>
                                                    <td>'.$b['supplier'].'</td>
                                                    <td>Rp '.number_format($b['harga_beli'],0,',','.').'</td>
                                                    <td>Rp '.number_format($b['harga_jual'],0,',','.').'</td>
                                                    <td>'.$b['stock'].'</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-warning me-1" onclick="window.location.href=\'data-edit.php?id='.$b['id'].'\'"><i class="bi bi-pencil-fill"></i> Edit</button>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm(\'Yakin ingin menghapus data barang ini?\')){window.location.href=\'proses/proses-delete.php?id='.$b['id'].'\'}"><i class="bi bi-trash-fill"></i> Hapus</button>
                                                    </td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='data-input.php'"><i class="bi bi-plus-lg"></i> Tambah Barang</button>
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
