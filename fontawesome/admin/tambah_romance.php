<?php 
session_start();
require '../functions.php';
require 'templates/header.php'; 
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah_produk($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'romance.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'romance.php';
			</script>
		";
	}
}

?>

<div class="content-wrap">
	<div class="main">
		<div class="container">

			<!-- /# row -->
			<section id="main-content">
				<div class="row">
					<div class="col-md-6">
						<div class="shadow-lg p-3 mb-5 bg-white rounded mt-5">
							<form method="post" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nama Produk</label>
									<input type="text" name="nama_produk" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga Produk</label>
									<input type="text" name="harga_produk" class="form-control">
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<input type="text" name="deskripsi_produk" class="form-control">
								</div>
								<div class="form-group">
									<label>Stok</label>
									<input type="text" name="stok_produk" class="form-control">
								</div>
								<div class="form-group">
									<label>Code</label>
									<input type="text" name="code" class="form-control">
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<input type="file" name="gambar" class="form-control">
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
							</form>
						</div>
					</div>

					<?php require 'templates/footer.php'; ?>

