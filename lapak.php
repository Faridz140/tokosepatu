<?php 
session_start();
include "koneksi.php";
$id_pelanggan = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah = $ambil ->fetch_assoc();
?>
<?php include 'menu2.php'; ?>



<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(data/images/pp.jpg);">
	<h2 class="l-text2 t-center">
		Lapak <?php echo $pecah['nama_pelanggan']; ?>
	</h2>
</section>
<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
	<div class="container">
		<div class="row">
			<div class="col-md-4 p-b-30">
				<div class="hov-img-zoom">
					<img src="foto/<?php echo $pecah['foto']; ?>" alt="IMG-ABOUT">
				</div>
			</div>

			<div class="col-md-8 p-b-30">

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
					$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
					$lokasi= $_FILES['foto']['tmp_name'];
					move_uploaded_file($lokasi, "foto_produk/".$nama);
					$koneksi->query("INSERT INTO produk(id_pelanggan,nama_produk , harga_produk , berat ,stok_produk, foto_produk , deskripsi_produk,namatoko,alamat) VALUES ('$id_pelanggan','$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[stok]','$nama' ,'$_POST[deskripsi]','$_POST[toko]','$_POST[alamat]')" );
					echo "<script>alert('Data Tersimpan');</script>";
					echo "<script>location='index.php';</script>";
				}
				?>
				
			</div>
		</div>
	</div>
</div>
</section>


<?php include 'footer.php'; ?>