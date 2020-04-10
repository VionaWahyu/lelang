<?php  
session_start();
require_once '../functions.php';
require_once 'layouts/header.php';
$id = $_GET["id"];
if(!isset($_SESSION["petugas"])){
	            echo "<script>
              alert('Anda harus login');
              document.location.href= 'login.php';
             </script>";
}

$barang = query("SELECT * FROM tb_barang WHERE id_barang = '$id'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil dikirim atau tidak
    if (updateBarang($_POST) > 0) {
        echo "<script>
              alert('Update telah berhasil');
              document.location.href = 'barang.php';
            </script>";
    } else {
        echo "<script>
                alert('Update telah gagal');
                document.location.href = 'barang.php';
            </script>";
    }

}

?>	

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header bg-primary text-center text-white">
					Update Barang
				</div>
				<div class="card-body">
					<form method="post" action="" autocomplete="off">
						<input type="hidden" name="id_barang" value="<?php echo $barang["id_barang"]; ?>">
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control" value="<?php echo $barang["nama_barang"]; ?>">
						</div>
						<div class="form-group">
							<label>Tanggal Mulai Lelang</label>
							<input type="date" name="tgl" class="form-control" value="<?php echo $barang["tgl"]; ?>">
						</div>
						<div class="form-group">
							<label>Tanggal Akhir Lelang</label>
							<input type="date" name="tgl_akhir" class="form-control" value="<?php echo $barang["tgl_akhir"]; ?>">
						</div>
						<div class="form-group">
							<label>Harga Awal</label>
							<input type="number" name="harga_awal" class="form-control" value="<?php echo $barang["harga_awal"]; ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi Barang</label>
							<textarea class="form-control" name="deskripsi_barang"><?php echo $barang["deskripsi_barang"] ?></textarea>
						</div>
						<button class="btn btn-primary" type="submit" name="submit">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>