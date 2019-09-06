<?php
session_start();
include"koneksi.php";
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
	WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if (empty($detbay)) {
	echo "<script>alert('Belum ada Data Pembelian');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

//echo "<pre>";
//print_r($detbay);
//echo "</pre>";
?>
<?php include 'menu2.php';?>
<div class="container">
	<h3>Lihat Pembayaran</h3>
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<tr>
					<td>Nama</td>
					<td><?php echo $detbay['nama'];?></td>
				</tr>
				<tr>
					<td>Bank</td>
					<td><?php echo $detbay['bank'];?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td><?php echo $detbay['tanggal'];?></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>Rp. <?php echo number_format($detbay['jumlah']);?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<img src="bukti_pembayaran/<?php echo $detbay['bukti'];?>" alt="" class="img-responsive">
		</div>
	</div>
</div>







<?php include 'footer.php'; ?>