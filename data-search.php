<?php 
include_once 'config/class-barang.php';
$barang = new Barang();

$kataKunci = '';
$cariBarang = [];

if(isset($_GET['search'])){
    $kataKunci = $_GET['search'];
    $cariBarang = $barang->searchBarang($kataKunci); // nanti kita buat method ini
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
                        <h3 class="mb-0">Cari Barang</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active">Cari Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Pencarian Barang</h3>
                            </div>
                            <div class="card-body">
                                <form action="data-search.php" method="GET">
                                    <div class="mb-3">
                                        <label for="search" class="form-label">Masukkan Nama Barang</label>
                                        <input type="text" class="form-control" id="search" name="search" 
                                               placeholder="Cari nama barang..." value="<?php echo htmlspecialchars($kataKunci); ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Cari
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hasil Pencarian</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_GET['search'])): ?>
                                    <?php if(count($cariBarang) > 0): ?>
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
                                                <?php foreach($cariBarang as $index => $b): ?>
                                                <tr>
                                                    <td><?php echo $index + 1; ?></td>
                                                    <td><strong><?php echo $b['nama_barang']; ?></strong></td>
                                                    <td><?php echo $b['kategori']; ?></td>
                                                    <td><?php echo $b['supplier']; ?></td>
                                                    <td>Rp <?php echo number_format($b['harga_beli'],0,',','.'); ?></td>
                                                    <td>Rp <?php echo number_format($b['harga_jual'],0,',','.'); ?></td>
                                                    <td>
                                                        <span class="badge <?php echo $b['stock'] == 0 ? 'bg-danger' : 'bg-success'; ?>">
                                                            <?php echo $b['stock']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="data-edit.php?id=<?php echo $b['id']; ?>" class="btn btn-sm btn-warning">
                                                            Edit
                                                        </a>
                                                        <a href="proses/proses-delete.php?id=<?php echo $b['id']; ?>" 
                                                           onclick="return confirm('Yakin hapus?')" 
                                                           class="btn btn-sm btn-danger">
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <div class="alert alert-warning">
                                            Tidak ditemukan barang dengan kata kunci "<strong><?php echo htmlspecialchars($kataKunci); ?></strong>"
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="alert alert-info">
                                        Silakan masukkan nama barang di atas untuk mencari.
                                    </div>
                                <?php endif; ?>
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