<?php 
require_once '../functions.php';
$id_pembayaran = $_GET["id"];
    
    // cek apakah tombol submit berhasil dikirim atau tidak
    if (kirimKonfirmasi($id_pembayaran) > 0) {
        echo "<script>
              alert('Berhasil melakukan konfirmasi');
              document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal melakukan konfirmasi');
                document.location.href = 'index.php';
            </script>";
    }
