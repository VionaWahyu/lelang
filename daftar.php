<?php  
require_once 'functions.php';
require_once 'layouts/header.php';
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
				alert('User baru ditambahkan');
				document.location.href = 'login.php';
		      </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>


<div class="container">
	<div class="row">
		<div class="col-md-6 mt-5 offset-md-3">
			<div class="card">
			  <div class="card-header bg-primary text-white text-center">
			    Register
			  </div>
			  <div class="card-body">
			    <form method="post" autocomplete="off" action="">
			    	<div class="form-group">
			    		<label>Nama Lengkap</label>
			    		<input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap">
			    	</div>
			    	<div class="form-group">
			    		<label>Username</label>
			    		<input type="text" name="username" class="form-control" placeholder="Masukkan Username">
			    	</div>
			    	<div class="form-group">
			    		<label>Password</label>
			    		<input type="password" name="password" class="form-control" placeholder="Masukkan Username">
			    	</div>
			    	<div class="form-group">
			    		<label>Telp</label>
			    		<input type="text" name="telp" class="form-control" placeholder="Masukkan Telepon">
			    	</div>
			    	<div class="mt-3">
			    		<button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
			    	</div>
			    </form>
			  </div>
			</div>
		</div>
	</div>
</div>