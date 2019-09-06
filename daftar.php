<?php include"koneksi.php";?>
<?php include 'menu2.php';?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Daftar Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" name="nama" class="form-control" required><br>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="email" name="email" class="form-control"required><br>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="text" name="password" class="form-control"required><br>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea class="form-control" name="alamat"required></textarea><br>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No HP</label>
								<div class="col-md-7">
									<input type="text" name="telepon" class="form-control"required><br>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Foto</label>
								<div class="col-md-7">
									<input type="file" name="foto" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>
						</form>
						<?php 

						if (isset($_POST['daftar'])) {
							$nama = $_POST['nama'];
							$email = $_POST['email'];
							$password = $_POST['password'];
							$alamat = $_POST['alamat'];
							$telepon = $_POST['telepon'];

							//jika email telah digunakan
							$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE  email_pelanggan='$email'");
							$pencocokan = $ambil->num_rows;
							if ($pencocokan==1) {
								echo "<script>alert('Pendaftaran Gagal !! Email Sudah Terdaftar');</script>";
								echo "<script>location='daftar.php';</script>";
							}else{
								//query insert ke tabel
								$namafoto = $_FILES['foto']['name'];
								$lokasi= $_FILES['foto']['tmp_name'];
								move_uploaded_file($lokasi, "foto/".$namafoto);
								$koneksi -> query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan,foto)VALUES('$email','$password','$nama','$telepon','$alamat','$namafoto')");
								echo "<script>alert('Pendaftaran Berhasil !! , Silahkan Login');</script>";
								echo "<script>location='login.php';</script>";
							}
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



	<?php include 'footer.php'; ?>