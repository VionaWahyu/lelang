<?php  
session_start();
require_once 'functions.php';
require_once 'layouts/header.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_masyarakat WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
    
    // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;
            $_SESSION["masyarakat"] = $row;

            echo "<script>
              alert('Login Berhasil');
              document.location.href= 'index.php';
             </script>";
        }
    }

    $error = true;

}
?>


<div class="container">
	<div class="row">
		<div class="col-md-6 mt-5 offset-md-3">
			<div class="card">
			  <div class="card-header bg-primary text-white text-center">
			    Login Page
			  </div>
			  <div class="card-body">
			    <form method="post" autocomplete="off" action="">
			    	<div class="form-group">
			    		<label>Username</label>
			    		<input type="text" name="username" class="form-control" placeholder="Masukkan Username">
			    	</div>
			    	<div class="form-group">
			    		<label>Password</label>
			    		<input type="password" name="password" class="form-control" placeholder="Masukkan Username">
			    	</div>
			    	<div class="mt-3">
			    		<button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
			    	</div>
			    </form>
			  </div>
			</div>
		</div>
	</div>
</div>