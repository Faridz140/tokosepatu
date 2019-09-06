<?php session_start();?>
<?php
include"koneksi.php";
?>
<?php

$id_produk = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
?>
<?php include 'menu2.php';?>


<section class="kontent">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="hov-img-zoom">
				<img src="foto_produk/<?php echo $detail["foto_produk"];?>" height="280">
			</div>
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail['nama_produk'];?></h2>
				<h4>Harga       	: Rp.<?php echo number_format($detail['harga_produk']);?></h4>
				<h5>Stok Barang		: <?php echo $detail['stok_produk'];?></h5>
				<h5>Nama Toko   	: <?php echo $detail['namatoko'];?></h5>
				<h5>alamat Pelapak  : <?php echo $detail['alamat'];?></h5>

				<form method="POST">
					<div class="form-group">
						<div class="input-group">
							<input type="number" class="form-control" min="1" max="<?php echo $detail['stok_produk'];?>" name="jumlah" required>
							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">Beli</button>
							</div>
						</div>
					</div>
				</form>
				<?php 
				if (isset($_POST['beli'])) {
						//mendapatkan jumlah diinputkan
					$jumlah =$_POST["jumlah"];
						//masukkan ke keranjang belanja
					$_SESSION["keranjang"][$id_produk] = $jumlah;

					echo "<script>alert('Produk Telah Masuk ke Keranjang');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>
				<p><?php echo $detail['deskripsi_produk'];?></p>
			</div>
		</div>
	</div>
</section>
<section class="instagram p-t-20">
	<div class="sec-title p-b-52 p-l-15 p-r-15">
		<h3 class="m-text5 t-center">
			Produk Lain !!
		</h3>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY RAND() LIMIT 4 ");?>
			<?php while ($produk = $ambil->fetch_assoc()){ ?>
				<div class="col-xs-3 col-md-3">
					<div class="thumbnail">
						<div class="hov-img-zoom">
						<a href="detail.php?id=<?php echo $produk['id_produk'];?>"><img width="400"  class="img-responsive" src="foto_produk/<?php echo $produk['foto_produk'];?>" alt=""></a>
					</div>
						<div class="caption" align="center">
							<a href="detail.php?id=<?php echo $produk['id_produk'];?>" style="color: black;"><h3><?php echo $produk['nama_produk'];?></h3></a>
							<h4><b>Rp.<?php echo number_format($produk['harga_produk']);?></b></h4>
							<a href="beli.php?id=<?php echo $produk['id_produk'];?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $produk['id_produk'];?>" class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</section>




<?php include 'footer.php'; ?>