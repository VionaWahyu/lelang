<?php session_start(); ?>
<?php 
require '../functions.php';
require 'templates/header.php'; 
$romance = query("SELECT * FROM produk WHERE code LIKE 'RM00%'");

?>



<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">

			<!-- /# row -->
			<section id="main-content">
				<div class="shadow-lg p-3 mb-5 bg-white rounded mt-5">
					<h3 class="text-center">Halaman Romance</h3>

					<table class="table table-bordered mt-5">
						<thead>
							<tr>
								<th>No</th>	
								<th>Nama Produk</th>	
								<th>Harga</th>	
								<th>Aksi</th>	
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							<?php foreach($romance as $r) : ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $r["nama_produk"]; ?></td>
								<td><img src="../img/buku/<?php echo $r["gambar"]; ?>"></td>
								<td>
									<a href="update_romance.php?id_produk=<?php echo $r["id_produk"]; ?>" class="btn btn-info">Update</a>
									<a href="hapus_romance.php?id_produk=<?php echo  $r["id_produk"]; ?>" onclick="return confirm('yakin?');" class="btn btn-danger">Hapus</a>
									<a href="tambah_romance.php" class="btn btn-success">Tambah</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>


				<?php require 'templates/footer.php'; ?>