<?php 
session_start();
require_once 'functions.php';
require_once 'layouts/header.php';
$id = $_GET["id"];
if(isset($_SESSION["masyarakat"]["id_user"])){
		$id_user = $_SESSION["masyarakat"]["id_user"];	
		$barang = query("SELECT * FROM tb_barang WHERE id_barang = '$id'")[0];
		$history = query("SELECT * FROM history_lelang WHERE id_barang = '$id' ORDER BY penawaran_harga DESC");
		$harga = query("SELECT MAX(penawaran_harga) AS penawaran FROM history_lelang WHERE id_barang = '$id'")[0];
		$penawaranTertinggi = $harga["penawaran"];

		if(date("Y-m-d") > $barang["tgl_akhir"]){
				if(tambahPembayaran($penawaranTertinggi,$id,$id_user) > 0){
				        echo "<script>
		              alert('Lelang telah berahkir');
		              document.location.href = 'pembayaran.php';
		            </script>";
					}
		}
}

if(!isset($_SESSION["login"])){
	     echo "<script>
              alert('Anda harus login');
              document.location.href= 'login.php';
             </script>";
}



// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil dikirim atau tidak
    if (kirimPenawaran($_POST) > 0) {
        echo "<script>
              alert('Data berhasil dikirim');
              document.location.href = 'ikutLelang.php?id=$id';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal dikirim');
                document.location.href = 'ikutLelang.php?id=$id';
            </script>";
    }

}

?>


<div class="container mt-5">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header text-center bg-primary text-white">
					Kirim Penawaran
				</div>
				<div class="card-body">
					<form method="post" action="">
						<input type="hidden" name="id_barang" value="<?php echo $id; ?>">
						<input type="hidden" name="id_user" value="<?php echo $_SESSION["masyarakat"]["id_user"]; ?>">
						<table>
							<tr>
								<td>Harga Minimal Penawaran</td>
								<td>: Rp.<?php echo number_format($barang["harga_awal"],0,',','.'); ?></td>
							</tr>
						</table>
						<div class="form-group">
							<label>Kirim Penawaran</label>
							<input type="number" name="kirim_penawaran" class="form-control" placeholder="Masukkan....." min="<?php echo $barang["harga_awal"]; ?>">
						</div>
						<button class="btn btn-block btn-primary" type="submit" name="submit">Kirim Penawaran</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Penawaran</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php foreach($history as $h) : ?>
					<tr>
						<td><?php echo $nomor++; ?></td>
						<td><?php echo $barang["nama_barang"]; ?></td>
						<td>Rp.<?php echo number_format($h["penawaran_harga"],0,',','.'); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>