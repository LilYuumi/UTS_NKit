<?php 
include_once 'config/class-master.php';
$master = new MasterData();

// Cek apakah parameter id ada
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if($id <= 0){
    die("ID Kategori tidak ditemukan.");
}

// Ambil data kategori
$dataKategori = $master->getUpdateKategori($id);
if(!$dataKategori){
    die("Data Kategori tidak ditemukan.");
}

// Alert jika gagal update
if(isset($_GET['status']) && $_GET['status'] == 'failed'){
    echo "<script>alert('Gagal mengubah Kategori. Silakan coba lagi.');</script>";
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
                    <div class="col-sm-6">
                        <h3 class="mb-0">Edit Kategori</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
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
                                <h3 class="card-title">Formulir Kategori</h3>
                            </div>
                            <form action="proses/proses-kategori.php?aksi=updatekategori" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?php echo $dataKategori['id_kategori']; ?>">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kategori" value="<?php echo $dataKategori['nama_kategori']; ?>" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='master-kategori-list.php'">Batal</button>
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
