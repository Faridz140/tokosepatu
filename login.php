<?php
session_start();
include"koneksi.php";
?>
<?php include 'menu2.php';?>

<div class="container" >
	<div class="row">
		<div class="col-md-4 col-md-offset-4"  >
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" align="center"><b>Login</b></h3>
				</div>
				<div class="panel-body">
					<form method="POST">
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control">
						</div>

						</div>
						<div class="form-group">
							<button class="btn btn-primary" name="simpan">Login</button>
						</div>
						
					</form>
					<?php
					if (isset($_POST["simpan"])) {

						$email = $_POST["email"];
						$password = $_POST["password"];

						$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

						$cocok = $ambil->num_rows;

						if ($cocok == 1) {
							
							$akun = $ambil->fetch_assoc();
							$_SESSION["pelanggan"]=$akun;
							echo "<script>alert('Login Sukses');</script>";
							if ($akun[level]=='pelanggan') {
								if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) 
							{
								echo "<script>location='checkout.php';</script>";
							}
							else{
								echo "<script>location='riwayat.php';</script>";
							}
							
						}elseif ($akun[level]=='pelapak') {
							if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) 
							{
								echo "<script>location='checkout.php';</script>";
							}
							else{
								echo "<script>location='riwayat.php';</script>";
							}
						}else{
							echo "<script>alert('Login Gagal || Periksa Email or Password');</script>";
							echo "<script>location='login.php';</script>";
						}
							}
							//jika sudah belanja 
							
					}
					?>






				</div>
			</div>

		</div>
	</div>

</div>
<?php include 'footer.php'; ?>