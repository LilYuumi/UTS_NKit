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
                                                    echo '<option value="'.$kategori['id_kategori'].'">'.$kategori['nama_kategori'].'</option>';
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

                                        <!-- Harga Beli -->
                                        <div class="mb-3">
                                            <label for="harga_beli" class="form-label">Harga Beli</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="0" min="0" step="100" required>
                                            </div>
                                        </div>

                                        <!-- Harga Jual -->
                                        <div class="mb-3">
                                            <label for="harga_jual" class="form-label">Harga Jual</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="0" min="0" step="100" required>
                                            </div>
                                        </div>

                                        <!-- Stock -->
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock Barang</label>
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Stock Barang" min="0" step="1" required>
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
