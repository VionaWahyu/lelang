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

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil dikirim atau tidak
    if (tambahBarang($_POST) > 0) {
        echo "<script>
              alert('Tambah telah berhasil');
              document.location.href = 'barang.php';
            </script>";
    } else {
        echo "<script>
                alert('Tambah telah gagal');
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
					Tambah Barang
				</div>
				<div class="card-body">
					<form method="post" action="" autocomplete="off">
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control">
						</div>
						<div class="form-group">
							<label>Tanggal Mulai Lelang</label>
							<input type="date" name="tgl" class="form-control">
						</div>
						<div class="form-group">
							<label>Tanggal Akhir Lelang</label>
							<input type="date" name="tgl_akhir" class="form-control">
						</div>
						<div class="form-group">
							<label>Harga Awal</label>
							<input type="number" name="harga_awal" class="form-control">
						</div>
						<div class="form-group">
							<label>Deskripsi Barang</label>
							<textarea class="form-control" name="deskripsi_barang"></textarea>
						</div>
						<button class="btn btn-primary" type="submit" name="submit">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>