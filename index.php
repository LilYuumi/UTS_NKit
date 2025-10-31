<!doctype html>
<html lang="en">
	<head>
		<?php include 'template/header.php'; // Menyertakan header template ?>
	</head>

	<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

		<div class="app-wrapper">

			<?php include 'template/navbar.php'; // Menyertakan navbar template ?>

			<?php include 'template/sidebar.php'; // Menyertakan sidebar template ?>

			<main class="app-main">

				<div class="app-content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="mb-0">N-Kitventory Apps</h3>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-end">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item active" aria-current="page">Beranda</li>
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
										<h3 class="card-title">Selamat Datang di N-Kitventory!</h3>
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

									<div class="card-body" style="line-height:1.7; font-size:16px;">
										<p><b>N-Kitventory</b> adalah sistem informasi inventori milik <b>NationKit</b>,
										sebuah toko yang menyediakan berbagai <i>model kit Gundam</i>, 
										perlengkapan perakitan, cat, serta komponen pendukung hobi rakitmu.
										Sistem ini dirancang untuk membantu pengelolaan data stok barang secara 
										efisien, akurat, dan mudah digunakan oleh admin toko.</p>

										<p>Melalui sistem ini, admin dapat menambah data produk baru, memperbarui stok,
										serta melihat daftar barang yang tersedia di gudang maupun etalase. 
										Semua proses dilakukan secara cepat dan terpusat untuk memastikan 
										ketersediaan produk favorit pelanggan NationKit.</p>

										<div style="margin-top:25px;">
											<a href="data-input.php" class="btn btn-primary btn-lg">
												<i class="bi bi-box-seam"></i> Tambah Data Barang
											</a>
											<a href="data-list.php" class="btn btn-success btn-lg">
												<i class="bi bi-card-list"></i> Lihat Daftar Barang
											</a>
											<a href="data-search.php" class="btn btn-warning btn-lg text-white">
												<i class="bi bi-search"></i> Cari Barang
											</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

			</main>

			<?php include 'template/footer.php'; // Menyertakan footer template ?>

		</div>
		
		<?php include 'template/script.php'; // Menyertakan script template ?>

	</body>
</html>
