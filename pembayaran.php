<?php 
session_start();
require_once 'functions.php';
require_once 'layouts/header.php';
$barang = query("SELECT * FROM tb_barang");
if(isset($_SESSION["masyarakat"]["id_user"])){
    $id_user = $_SESSION["masyarakat"]["id_user"];
    $pembayaran = query("SELECT * FROM tb_pembayaran WHERE id_user = '$id_user'");
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
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Lelang</th>
                        <th>Nominal</th>
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
                        <td>Rp.<?php echo number_format($p["harga_akhir"],0,',','.'); ?></td>
                        <td><?php echo $p["status"]; ?></td>
                        <td>
                            <?php if($p["status"] === "belum-lunas") : ?>
                            <a href="kirimPembayaran.php?id=<?php echo $p["id_pembayaran"]; ?>" class="btn btn-primary">Kirim Pembayaran</a>
                            <?php elseif($p["status"] === "proses") : ?>
                            <a href="#" class="btn btn-primary">Proses Konfirmasi</a>
                            <?php else: ?>
                            <a href="kirimPembayaran.php?id=<?php echo $p["id_pembayaran"]; ?>" class="btn btn-success">Pembayaran Lunas</a>
                            <?php endif; ?>
                        </td>   
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>