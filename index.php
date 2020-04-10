<?php 
session_start();
require_once 'functions.php';
require_once 'layouts/header.php';
$barang = query("SELECT * FROM tb_barang");
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

<div class="container mt-5">
	<div class="row">
		<?php foreach($barang as $b) : ?>
		<div class="col-md-6">
		<div class="card mb-3" style="max-width: 540px;">
		  <div class="row no-gutters">
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title">Nama Barang : <?php echo $b["nama_barang"] ?></h5>
		        <p class="card-text">Deskripsi Barang : <?php echo $b["deskripsi_barang"] ?></p>
		        <p class="card-text"><small class="text-muted"><?php echo $b["tgl"] ?></small></p>
		        <?php if($b["status"] === "dibuka") : ?>
		        <a href="ikutLelang.php?id=<?php echo $b["id_barang"]; ?>" class="btn btn-primary">Ikut Lelang</a>
		      	<?php else: ?>
		      	<a href="" class="btn btn-danger">Lelang telah ditutup</a>
		      	<?php endif; ?>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>