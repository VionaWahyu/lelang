<?php  
session_start();
require_once '../functions.php';
require_once 'layouts/header.php';

if(!isset($_SESSION["petugas"])){
	            echo "<script>
              alert('Anda harus login');
              document.location.href= 'login.php';
             </script>";
}

$barang = query("SELECT * FROM tb_barang");

?>	

	<h3 class="text-center mt-5 mb-3">Data Barang</h3>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="tambahBarang.php" class="btn btn-primary">Tambah Barang</a>
				<table class="table table-striped mt-2">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Harga Awal</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php foreach($barang as $p) : ?>
						<tr>
							<td><?php echo $nomor++; ?></td>
							<td><?php echo $p["nama_barang"]; ?></td>
							<td>Rp.<?php echo number_format($p["harga_awal"],0,',','.') ?></td>
							<td>
								<a href="updateBarang.php?id=<?php echo $p["id_barang"] ?>" class="btn btn-info">Update</a>
								<a href="deleteBarang.php?id=<?php echo $p["id_barang"] ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>