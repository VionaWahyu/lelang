<?php 
session_start();
require '../functions.php';
require 'templates/header.php'; 
// cek apakah tombol submit sudah ditekan atau belum
$id_produk = $_GET["id_produk"];
$produk = query("SELECT * FROM produk WHERE id_produk = $id_produk")[0];
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]) ) {
  // cek apakah data berhasil di update atau tidak
  if (ubah_produk($_POST) > 0 ) {
    echo "<script>
        alert('Data berhasil diupdate');
        document.location.href = 'romance.php';
       </script>";
  } else {
    echo "<script>
        alert('Data gagal diupdate');
        document.location.href = 'romance.php';
       </script>";
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
								<input type="hidden" name="id_produk" value="<?php echo $produk["id_produk"]; ?>">
            					<input type="hidden" name="gambarLama" value="<?php echo $produk["gambar"]; ?>"> 
								<div class="form-group">
									<label>Nama Produk</label>
									<input type="text" name="nama_produk" class="form-control" value="<?php echo $produk["nama_produk"]; ?>">
								</div>
								<div class="form-group">
									<label>Harga Produk</label>
									<input type="text" name="harga_produk" class="form-control" value="<?php echo $produk["harga_produk"]; ?>">
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<input type="text" name="deskripsi_produk" class="form-control" value="<?php echo $produk["deskripsi_produk"]; ?>">
								</div>
								<div class="form-group">
									<label>Stok</label>
									<input type="text" name="stok_produk" class="form-control" value="<?php echo $produk["stok_produk"]; ?>">
								</div>
								<div class="form-group">
									<label>Code</label>
									<input type="text" name="code" class="form-control" value="<?php echo $produk["code"]; ?>">
								</div>
								<div class="form-group">
									<label>Gambar</label> <br>
									<img src="../img/buku/<?= $produk["gambar"]; ?> " style="width:40%"> <br>
									<input type="file" name="gambar" class="form-control">
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Update Data</button>
							</form>
						</div>
					</div>

					<?php require 'templates/footer.php'; ?>

