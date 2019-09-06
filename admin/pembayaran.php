<h2>Data Pembayaran</h2>

<?php 
//mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian' ");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<td>Nama</td>
				<td><?php echo $detail['nama'];?></td>
			</tr>
			<tr>
				<td>Bank</td>
				<td><?php echo $detail['bank'];?></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>Rp. <?php echo number_format($detail['jumlah']);?></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><?php echo $detail['tanggal'];?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<img src="../bukti_pembayaran/<?php echo $detail['bukti'];?>" alt="" class="img-responsive">
	</div>
</div>
<form method="POST">
	<div class="form-group">
		<label>No Resi Pengiriman</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Plih Status</option>
			<option value="lunas">Lunas</option>
			<option value="barang dikirim">Barang Dikirim</option>
			<option value="batal">Batal</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php 
if (isset($_POST["proses"])) {
	$resi = $_POST["resi"];
	$status = $_POST["status"];
	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi',status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

	echo "<script>alert('Data Telah Diupdate');</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>