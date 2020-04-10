<?php 
session_start();
require_once 'functions.php';
require_once 'layouts/header.php';
$id_pembayaran = $_GET["id"];
$pembayaran = query("SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil dikirim atau tidak
    if (kirimPembayaran($_POST) > 0) {
        echo "<script>
              alert('Berhasil melakukan pembayaran');
              document.location.href = 'pembayaran.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal melakukan pembayaran');
                document.location.href = 'pembayaran.php';
            </script>";
    }

}

?>

<div class="jumbotron jumbotron-fluid" style="background-image: url('img/background/background.jpg');">
  <div class="container">
    <div class="row">
    	<div class="col-md-12 text-center">
    		<div class="text-white mt-5">
    			<h1 class="display-4">Lelang Saya</h1>
    			<p class="lead">Dengan adanya website ini masyarakat dapat mengikuti lelang</p>
    		</div>
    	</div>
    </div>
  </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <table class="table table-striped">
                        <tr>
                            <td>Total Pembayaran</td>
                            <td><?php echo number_format($pembayaran["harga_akhir"],0,',','.'); ?></td>
                        </tr>
                </table>
                <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id_pembayaran" value="<?php echo $pembayaran["id_pembayaran"]; ?>">
                <div class="form-group">
                    <label>Kirim Bukti Pembayaran</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

