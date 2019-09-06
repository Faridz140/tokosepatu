<?php include 'koneksi.php';
session_start();
$id = $_GET['id'];
?>
<?php include 'menu2.php'; ?>
<section class="konten">
	<div class="container">
		<h2>Detail Pembelian</h2>
		<?php 

		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]' ");
		$detail = $ambil->fetch_assoc();
		?>
		<div class="row">
			<div class="col-md-12" align="center" >
				<div class="alert alert-info">
					
					<div class="row">
						<div class="col-md-4"> 
							<h3>Pembelian</h3>
							<strong>No Pembelian : <?php echo $detail['id_pembelian'];?></strong><br>
							Tanggal : <?php echo $detail['tanggal_pembelian'];?><br>
							Total   : Rp.<?php echo number_format($detail['total_pembelian']);?>

						</div>
						<div class="col-md-4">
							<h3>Pelanggan</h3>
							<strong><?php echo $detail['nama_pelanggan'];?></strong><br>

							<?php echo $detail['email_pelanggan'];?><br>
							<?php echo $detail['telepon_pelanggan'];?>

						</div>
						<div class="col-md-4">
							<h3>Pengiriman</h3>
							<strong><?php echo $detail['nama_kota'];?><br></strong>
							Ongkos Kirim  : Rp.<?php echo number_format($detail['tarif']);?><br>
							Alamat        : <?php echo $detail['alamat_pengiriman'];?>
						</div>
					</div>

					<table class="table table-bordered">

						<thead>
							<tr>
								<th>No</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Berat</th>
								<th>Jumlah</th>
								<th>SubBerat</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;?>
							<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
							<?php while ($pecah = $ambil->fetch_assoc()) {?> 
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $pecah['nama'];?></td>
									<td>Rp.<?php echo number_format($pecah['harga']);?></td>
									<td><?php echo $pecah['berat'];?>Gr.</td>
									<td><?php echo $pecah['jumlah'];?></td>
									<td><?php echo $pecah['subberat'];?>Gr.</td>
									<td>Rp.<?php echo number_format($pecah['subharga']);?></td>
								</tr>
								<?php $no++;?>
							<?php }?>
						</tbody>

					</div>
				</div>
			</div>
			

		</table>
		<script>
			window.print();
		</script>

	</section>
	<?php include 'footer.php'; ?>