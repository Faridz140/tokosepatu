<?php
session_start();
include"koneksi.php";
//jika belum login 
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
//mendapatkan id pembelian dari url
$idpembelian = $_GET['id'];
$ambil =$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpembelian'");
$detail = $ambil->fetch_assoc();

//mendapatkan id pelanggan yg beli
$id_pelangganbeli  = $detail['id_pelanggan'];
//mendapatkan id pelanggan yg login
$id_pelangganlogin = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pelangganlogin !==$id_pelangganbeli) {
	echo "<script>alert('Akses Dilarang');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}


?>
<?php include 'menu2.php';?>
<div class="container">
	<div class="row">
		<div class="col-md-12" >
			<h2>Konfirmasi Pembayaran</h2>
			<p>Kirim Bukti Pembayaran Disini</p>
			<div class="alert alert-info">Total Tagihan Anda <strong>Rp.<?php echo number_format($detail["total_pembelian"]);?></strong> </div>

			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Penyetor</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" name="bank" class="form-control">
				</div>
				<div class="form-group">
					<label>Jumlah</label>
					<input type="number" name="jumlah" class="form-control">
				</div>
				<div class="form-group">
					<label>Foto Bukti</label>
					<input type="file" name="bukti" class="form-control">
					<p class="text-danger">Foto bukti Harus Kurang Dari 2MB</p>
				</div>
				<button class="btn btn-primary" name="kirim">Kirim</button>
			</form>

		</div>
	</div>
</div>
<?php 
	//jika tombol kirim di tekan
if (isset($_POST['kirim'])) {
		//upload foto bukti
	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("YmdHis").$namabukti;
	$nama = $_POST['nama'];
	$bank = $_POST['bank'];
	$jumlah = $_POST['jumlah'];
	$tanggal = date("Y-m-d");

	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

//simpan pembayaran
	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)VALUES('$idpembelian','$nama','$bank','$jumlah','$tanggal','$namafiks')");

	//update status pembayaran menjadi selesai

	$koneksi->query("UPDATE pembelian SET status_pembelian='Selesai' WHERE id_pembelian = '$idpembelian'");

	echo "<script>alert('Terima Kasih Telah Berbelanja Di Situs Kami');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>






<?php include 'footer.php'; ?>