<?php 


require '../functions.php';
$id = $_GET["id_produk"];
if( hapus_produk($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
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