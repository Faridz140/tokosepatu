<?php
session_start();
include"koneksi.php";
if(!isset($_SESSION['pelanggan'])){
	echo "<script>location='login.php'</script>";
}
?>
<?php include 'menu2.php';?>
<!--=================================-->
<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php $totalbelanja = 0 ;?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<?php 

					$mengambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk' ");
					$pemecahan = $mengambil->fetch_assoc();
					$total = $pemecahan["harga_produk"]*$jumlah;

					?>


					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $pemecahan["nama_produk"];?></td>
						<td>Rp. <?php echo number_format($pemecahan["harga_produk"]);?></td>
						<td><?php echo $jumlah?></td>
						<td>Rp. <?php echo number_format($total);?></td>
					</tr>
					<?php $nomor++;?>
					<?php $totalbelanja+=$total;?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<th colspan="4">Total Belanja</th>
				<th>Rp.<?php echo number_format($totalbelanja);?></th>
			</tfoot>
		</table>
		<form method="POST">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"  readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'];?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control"  readonly value="<?php echo $_SESSION["pelanggan"]['email_pelanggan'];?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" required>
						<select class="form-control" name="id_ongkir" required>
							<option >Pilih Kurir Pengantaran</option>
							<?php $ambil = $koneksi->query("SELECT * FROM ongkir");
							while($perongkir = $ambil->fetch_assoc()){
								?>
								<option value="<?php echo $perongkir['id_ongkir'];?>">
									<?php echo $perongkir['nama_kota']?> -
									Rp.<?php echo number_format($perongkir['tarif'])?>
								</option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
				<div class="form-group">
					<label>Alamat Lengkap Pengiriman</label>
					<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan Alamat Lengkap Penerima Barang (Kecamatan , Desa/Nagari , Kode Pos)" required></textarea>
				</div>
				</div>
				<section class="konten">
					<div class="container">
						<hr>

						<form method="POST">

							<button class="btn btn-primary" name="beli">Beli</button>
						</form>
						<?php

						if (isset($_POST["beli"])) 
						{
							$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
							$id_ongkir = $_POST["id_ongkir"];
							$tanggal_pembelian = date("Y-m_d");
							$alamat_pengiriman = $_POST["alamat_pengiriman"];

							$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
							$array = $ambil->fetch_assoc();
							$nama_kota =$array['nama_kota'];
							$tarif = $array['tarif'];

							$total_pembelian  = $totalbelanja+$tarif;

							//menyimpan data ke table pembelian
							$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

							// mengetahui pembelian terbaru

							$new_beli = $koneksi->insert_id;
							foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

								$ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' ");
								$perproduk = $ambil->fetch_assoc();
								$nama = $perproduk['nama_produk'];
								$harga = $perproduk['harga_produk'];
								$berat = $perproduk['berat'];

								$subberat = $perproduk['berat']*$jumlah;
								$subharga = $perproduk['harga_produk']*$jumlah;


								$koneksi->query("INSERT INTO pembelian_produk(id_pembelian ,id_produk,nama,harga,berat,subberat,subharga,jumlah)VALUES('$new_beli','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
							}

							//update stok 
							$koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
							//kosongkan keranjang
							unset($_SESSION['keranjang']);
							//memindahkan user ke halaman nota pembelian
							echo "<script>alert('Pembelian Berhasil');</script>";
							echo "<script>location='nota.php?id=$new_beli';</script>";
						}


						?>
					</div>
				</section>

<?php include 'footer.php'; ?>