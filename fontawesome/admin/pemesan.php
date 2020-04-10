<?php 
session_start();
require '../functions.php';
require 'templates/header.php';
$pemesan = query("SELECT * FROM pembelian INNER JOIN pelanggan ON pelanggan.id_pelanggan = pembelian.id_pelanggan");

?>
<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">

			<!-- /# row -->
			<section id="main-content">
				<div class="shadow-lg p-3 mb-5 bg-white rounded mt-5">
					<h3 class="text-center">Halaman Pemesan</h3>

					<table class="table table-bordered mt-5" id="myTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Total</th>
								<th>Nama Kota</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							<?php foreach($pemesan as $p) : ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $p["username"]; ?></td>
								<td>Rp.<?php echo number_format($p["total_pembelian"]); ?></td>
								<td><?php echo $p["nama_kota"]; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<?php require 'templates/footer.php'; ?>


