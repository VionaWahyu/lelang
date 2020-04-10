<?php 

$conn = mysqli_connect("localhost","root","","lelangku");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($data){
	global $conn;
	$nama_lengkap = $data["nama_lengkap"];
	$username = $data["username"];
	$password = $data["password"];
	$telp = $data["telp"]; 

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tb_masyarakat WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
              alert('Username sudah terdaftar');
          </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO tb_masyarakat 
                  VALUES
                  ('','$nama_lengkap','$username','$password','$telp')");
    return mysqli_affected_rows($conn);

}

function kirimPenawaran($data){
    global $conn;
    $id_barang = $data["id_barang"];
    $id_user = $data["id_user"];
    $penawaran_harga = $data["kirim_penawaran"];

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO history_lelang 
                  VALUES
                  ('','$id_barang','$id_user','$penawaran_harga')");
    return mysqli_affected_rows($conn);    
}

function tambahPembayaran($penawaranTertinggi,$id,$id_user){
    global $conn;
    $id_barang = $id;
    $tgl_lelang = date("Y-m-d");
    $harga_akhir = $penawaranTertinggi;

    // update barang 
    mysqli_query($conn,"UPDATE tb_barang SET status = 'ditutup' WHERE id_barang = '$id'");

    // tambahkan pembayaran ke database
    mysqli_query($conn, "INSERT INTO tb_pembayaran 
                  VALUES
                  ('','$id_barang','$tgl_lelang','$harga_akhir','$id_user','belum-lunas','')");
    return mysqli_affected_rows($conn); 

}

function kirimPembayaran($data){
    global $conn;
    $id_pembayaran = $data["id_pembayaran"];
    // upload gambar
    $bukti = upload();
    if (!$bukti) {
        return false;
    }

    mysqli_query($conn,"UPDATE tb_pembayaran SET bukti = '$bukti' WHERE id_pembayaran = '$id_pembayaran'");
    return mysqli_affected_rows($conn); 
}


function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
             </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar');
             </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 20000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan,gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/bukti/' . $namaFileBaru);
    return $namaFileBaru;

}

function kirimKonfirmasi($id_pembayaran){
    global $conn;
    mysqli_query($conn,"UPDATE tb_pembayaran SET status = 'lunas' WHERE id_pembayaran = '$id_pembayaran'");
    return mysqli_affected_rows($conn); 
}

function updateBarang($data){
    global $conn;

    $nama_barang = $data["nama_barang"];
    $tgl = $data["tgl"];
    $tgl_akhir = $data["tgl_akhir"];
    $harga_awal = $data["harga_awal"];
    $deskripsi_barang = $data["deskripsi_barang"];
    $id_barang = $data["id_barang"];


    $query = "UPDATE tb_barang SET 
               nama_barang      = '$nama_barang',
               tgl     = '$tgl',
               tgl_akhir = '$tgl_akhir',
               harga_awal      = '$harga_awal',
               deskripsi_barang             = '$deskripsi_barang',
               status           = 'dibuka' 
             WHERE id_barang = $id_barang
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


}

function tambahBarang($data){
    global $conn;

    $nama_barang = $data["nama_barang"];
    $tgl = $data["tgl"];
    $tgl_akhir = $data["tgl_akhir"];
    $harga_awal = $data["harga_awal"];
    $deskripsi_barang = $data["deskripsi_barang"];

        // tambahkan pembayaran ke database
    mysqli_query($conn, "INSERT INTO tb_barang 
                  VALUES
                  ('','$nama_barang','$tgl','$tgl_akhir','$harga_awal','$deskripsi_barang','dibuka')");
    return mysqli_affected_rows($conn); 
}


function hapusBarang($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang = '$id'");
    return mysqli_affected_rows($conn);
}
