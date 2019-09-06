<h2>Edit Produk</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil-> fetch_assoc();

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" value="<?php echo $pecah['password_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>No HP</label>
		<input type="number" name="telfon" class="form-control" value="<?php echo $pecah['telepon_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Level</label>
		<select class="form-control" name="level">
			<option value="">Plih Level</option>
			<option value="pelanggan">Pelanggan</option>
			<option value="pelapak">Pelapak</option>
		</select>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
if (isset($_POST['ubah'])) {
	$nama_foto = $_FILES['foto']['name'];
	$lokasi_foto = $_FILES['foto']['tmp_name'];
	$level = $_POST["level"];
	if (!empty($lokasi_foto)) {
		move_uploaded_file($lokasi_foto, "../foto/$nama_foto");
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',telepon_pelanggan='$_POST[telfon]',alamat_pelanggan='$_POST[alamat]',foto='$nama_foto',level='$level' WHERE id_pelanggan='$_GET[id]'" );
	}else{
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',telepon_pelanggan='$_POST[telfon]',alamat_pelanggan='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]'" );
	}
	echo "<script>alert('Data Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan'</script>";
}

?>