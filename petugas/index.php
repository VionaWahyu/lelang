<?php  
session_start();
require_once '../functions.php';
require_once 'layouts/header.php';

$pembayaran = query("SELECT * FROM tb_pembayaran WHERE status = 'proses'");

?>	
	<h3 class="mt-5 text-center">Petugas</h3>
	<p class="text-center">Data Pembayaran</p>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Lelang</th>
							<th>Harga Akhir</th>
							<th>Status</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php foreach($pembayaran as $p) : ?>
						<tr>
							<td><?php echo $nomor++; ?></td>
							<td><?php echo $p["tgl_lelang"]; ?></td>
							<td>Rp.<?php echo number_format($p["harga_akhir"],0,',','.') ?></td>
							<td><?php echo $p["status"]; ?></td>
							<td>
								<a href="kirimKonfirmasi.php?id=<?php echo $p["id_pembayaran"] ?>" class="btn btn-primary" onclick="confirm('Apakah yakin Konfirmasi')" >Konfirmasi</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>