<h2>Tambah Kurir Pengiriman</h2>

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
		<label>Wilayah</label>
		<input type="text" name="kota" class="form-control">
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
	
</form>
<?php 
if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO ongkir(kurir , tarif , nama_kota) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[kota]')" );
	echo "<script>alert('Data Tersimpan');</script>";
   	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=metodekirim'>";
}
?>
	