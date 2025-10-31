<?php 
include_once 'config/class-master.php';
$master = new MasterData();

// Mengambil daftar kategori dan supplier
$kategoriList = $master->getKategori();
$supplierList = $master->getSupplier();
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
                            <h3 class="mb-0">Input Barang</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input Barang</li>
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
                                    <h3 class="card-title">Formulir Barang</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </div>
                                </div>

                                <form action="proses/proses-input.php" method="POST">
                                    <div class="card-body">
                                        <!-- Kode Barang -->
                                        <div class="mb-3">
                                            <label for="kode" class="form-label">Kode Barang</label>
                                            <input type="number" class="form-control" id="kode" name="kode" placeholder="Masukkan kode barang" required>
                                        </div>

                                        <!-- Nama Barang -->
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama barang" required>
                                        </div>

                                        <!-- Kategori Barang -->
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori Barang</label>
                                            <select class="form-select" id="kategori" name="kategori" required>
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                <?php 
                                                foreach ($kategoriList as $kategori){
                                                    echo '<option value="'.$kategori['id'].'">'.$kategori['nama'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <!-- Supplier -->
                                        <div class="mb-3">
                                            <label for="supplier" class="form-label">Supplier</label>
                                            <select class="form-select" id="supplier" name="supplier" required>
                                                <option value="" selected disabled>Pilih Supplier</option>
                                                <?php
                                                foreach ($supplierList as $supplier){
                                                    echo '<option value="'.$supplier['id'].'">'.$supplier['nama'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <!-- Nomor Telepon -->
                                        <div class="mb-3">
                                            <label for="telp" class="form-label">Nomor Telepon</label>
                                            <input type="tel" class="form-control" id="telp" name="telp" placeholder="Masukkan nomor telepon/HP" pattern="[0-9+\-\s()]{6,20}" required>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='data-list.php'">Batal</button>
                                        <button type="reset" class="btn btn-secondary me-2 float-start">Reset</button>
                                        <button type="submit" class="btn btn-primary float-end">Submit</button>
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
