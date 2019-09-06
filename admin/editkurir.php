<h2>Edit Produk</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$pecah = $ambil-> fetch_assoc();

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['kurir'];?>">
	</div>
	<div class="form-group">
		<label>Tarif</label>
		<input type="number" name="tarif" class="form-control" value="<?php echo $pecah['tarif'];?>">
	</div>
	<div class="form-group">
		<label>Wilayah</label>
		<input type="text" name="kota" class="form-control" value="<?php echo $pecah['nama_kota'];?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
if (isset($_POST['ubah'])) {
	if (!empty($lokasi_foto)) {
		$koneksi->query("UPDATE ongkir SET kurir='$_POST[nama]',tarif='$_POST[tarif]',nama_kota='$_POST[kota]' WHERE id_ongkir='$_GET[id]'" );
	}else{
		$koneksi->query("UPDATE ongkir SET kurir='$_POST[nama]',tarif='$_POST[tarif]',nama_kota='$_POST[kota]' WHERE id_ongkir='$_GET[id]'" );
	}
	echo "<script>alert('Data Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=metodekirim'</script>";
}

?>