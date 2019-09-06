<h2>Edit Produk</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil-> fetch_assoc();

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'];?>">
	</div>
	<div class="form-group">
		<label>Berat</label>
		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat'];?>">
	</div>
	<div class="form-group">
		<label>Stok Produk</label>
		<input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok_produk'];?>">
	</div>
	<div class="form-group">
		<label>Nama Toko</label>
		<input type="text" name="toko" class="form-control" value="<?php echo $pecah['namatoko'];?>"readonly>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat'];?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" rows="10" name="deskripsi">
			<?php echo $pecah['deskripsi_produk'];?>
		</textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php

if (isset($_POST['ubah'])) {
	
	$nama_foto = $_FILES['foto']['name'];
	$lokasi_foto = $_FILES['foto']['tmp_name'];

	if (!empty($lokasi_foto)) {
		move_uploaded_file($lokasi_foto, "../foto_produk/$nama_foto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',kategori='$_POST[kategori]',harga_produk='$_POST[harga]',berat='$_POST[berat]',stok_produk='$_POST[stok]',namatoko='$_POST[toko]',alamat='$_POST[alamat]',foto_produk='$nama_foto',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}else{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',kategori='$_POST[kategori]',harga_produk='$_POST[harga]',berat='$_POST[berat]',stok_produk='$_POST[stok]',foto_produk='$nama_foto',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('Data Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=produk'</script>";
}

?>