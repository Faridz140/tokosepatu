<?php 
session_start();
include 'koneksi.php';

$id_pelanggan = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
$pecah = $ambil ->fetch_assoc();
?>

<?php include 'menu2.php'; ?>
<div class="konten">
	<div class="container">
		<div class="rows">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama </label>
					<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan'];?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan'];?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" name="pass" class="form-control" value="<?php echo $pecah['password_pelanggan'];?>">
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="number" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan'];?>">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat_pelanggan'];?>">
				</div>
				<div class="form-group">
					<img src="foto/<?php echo $pecah['foto'];?>" width="200">
				</div>
				<div class="form-group">
					<label>Ganti Foto</label>
					<input type="file" name="foto" class="form-control">
				</div>
				<button class="btn btn-primary" name="ubah">Ubah</button>
			</form>
			<?php

			if (isset($_POST['ubah'])) {

				$nama_foto = $_FILES['foto']['name'];
				$lokasi_foto = $_FILES['foto']['tmp_name'];

				if (!empty($lokasi_foto)) {
					move_uploaded_file($lokasi_foto, "foto/$nama_foto");

					$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[pass]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]','$nama_foto'  WHERE id_pelanggan='$_GET[id]'");
				}
				else{
					$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[pass]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]'");
					echo "<script>alert('Data Telah Diubah');</script>";
					echo "<script>location='index.php'</script>";
				}
			}
				?>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
