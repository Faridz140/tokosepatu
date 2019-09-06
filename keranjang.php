<?php 
session_start();
include"koneksi.php";
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('Keranjang Kosong');</script>";
	echo "<script>location='index.php';</script>";
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
					<th>harga</th>
					<th>Jumlah</th>
					<th>Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
				<?php 

					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk' ");
					$pecah = $ambil->fetch_assoc();
					$total = $pecah["harga_produk"]*$jumlah;

				?>


				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["nama_produk"];?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]);?></td>
					<td><?php echo $jumlah?></td>
					<td>Rp. <?php echo number_format($total);?></td>
					<td><a href="hapuskeranjang.php?id=<?php echo $id_produk;?>" class="btn btn-danger btn-xs">Hapus</a></td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
			</table>
			<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-primary">CheckOut</a>
			</div>
		</section>




<?php include 'footer.php'; ?>