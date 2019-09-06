<h2>Tambah produk</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" name="jumlah" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga Asli</label>
		<input type="number" name="asli" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea type="text" name="deskripsi" rows="10" class="form-control"></textarea>
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
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO diskon(nama_produk , harga_produk , jumlah_produk , foto , descripsi,harga_asli) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[jumlah]','$nama' ,'$_POST[deskripsi]','$_POST[asli]')" );
	echo "<script>alert('Data Tersimpan');</script>";
   	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=diskon'>";
}
?>

	