<h2>Tambah produk</h2>
<?php include '../koneksi.php'; ?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" name="stok" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea type="text" name="deskripsi" rows="10" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Nama Toko</label>
		<input type="text" name="toko" rows="10" class="form-control">
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
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk(nama_produk , harga_produk , berat ,stok_produk, foto_produk , deskripsi_produk,namatoko,alamat) 
		VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[stok]','$nama' ,'$_POST[deskripsi]','$_POST[toko]','$_POST[alamat]')" );
	echo "<script>alert('Data Tersimpan');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>
