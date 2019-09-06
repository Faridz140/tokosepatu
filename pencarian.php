<?php include 'koneksi.php';?>
<?php
$keyword = $_GET['keyword'];

$semuadata = array();

$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) 
{
	$semuadata[] = $pecah;
}

//echo "<pre>";
//print_r($semuadata);
//echo "</pre>";
?>

<?php include 'menu2.php';?>

<div class="container">
	<h2>Hasil Pencarian : <?php echo $keyword;?></h2>
	<?php if (empty($semuadata)): ?>
		<div class="alert alert-danger">Keyword <strong><?php echo $keyword;?></strong> Tidak Ditemukan</div>
	<?php endif ?>
	<div class="row"> 

		<?php foreach ($semuadata as $key => $value) :?>
			

		<div class="col-md-3"  align="center">
			<div class="thumbnail">
				<a href="detail.php?id=<?php echo $value['id_produk'];?>"><img src="foto_produk/<?php echo $value['foto_produk'];?>" alt="" class="img-responsive"></a>
				<div class="caption">
					<a href="detail.php?id=<?php echo $value['id_produk'];?>" style="color: black"><h3><?php echo $value['nama_produk'];?></h3></a>
					<h5>Rp. <?php echo number_format($value['harga_produk']);?></h5>
					<a href="beli.php?id=<?php echo $value['id_produk'];?>" class="btn btn-primary">Beli</a>
					<a href="detail.php?id=<?php echo $value['id_produk'];?>" class="btn btn-default">Detail</a>
				</div>
			</div>
		</div>
	<?php endforeach  ?>
	</div>
</div>





<?php include 'footer.php'; ?>