<h2>Tambah Pelanggan</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	<div class="form-group">
		<label>No HP</label>
		<input type="number" name="telfon" rows="10" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" rows="10" class="form-control">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
	
</form>
<?php 
if (isset($_POST['save'])) {
	$nama = $_FILES['foto']['name'];
	$lokasi= $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto/".$nama);
	$koneksi->query("INSERT INTO pelanggan(nama_pelanggan , email_pelanggan , password_pelanggan , telepon_pelanggan ,alamat_pelanggan ,foto) VALUES ('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[telfon]','$_POST[alamat]','$nama')" );
	echo "<script>alert('Data Tersimpan');</script>";
   	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>

	