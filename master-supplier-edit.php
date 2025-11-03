<?php 
include_once 'config/class-master.php';
$master = new MasterData();
$dataSupplier = $master->getUpdateSupplier($_GET['id']);
if(isset($_GET['status'])){
    if($_GET['status'] == 'failed'){
        echo "<script>alert('Gagal mengubah data supplier. Silakan coba lagi.');</script>";
    }
}
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
                    <div class="col-sm-6"><h3 class="mb-0">Edit Supplier</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
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
                                <h3 class="card-title">Formulir Supplier</h3>
                            </div>
                            <form action="proses/proses-supplier.php?aksi=updatesupplier" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?php echo $dataSupplier['id']; ?>">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Supplier</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dataSupplier['nama']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kontak" class="form-label">Kontak Supplier</label>
                                        <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo $dataSupplier['kontak']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Supplier</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $dataSupplier['alamat']; ?>" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='M-Supplier-list.php'">Batal</button>
                                    <button type="submit" class="btn btn-warning float-end">Update Data</button>
                                </div>
                            </form>
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
