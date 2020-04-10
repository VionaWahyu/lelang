<!DOCTYPE html>
<html>
<head>
	<title>Petugas</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		  <a class="navbar-brand" href="index.php">Halaman Petugas</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav ml-auto">
		      	<a class="nav-item nav-link active" href="#"><?php echo $_SESSION["petugas"]["nama_petugas"]; ?></a>
		      	<a class="nav-item nav-link active" href="barang.php">Barang</a>
		      	<a class="nav-item nav-link active" href="../logout.php">Logout</a>
		    </div>
		  </div>
		</div>
	</nav>
	<!-- akhir-navbar -->