<?php
session_start();
include"koneksi.php";
?>
<?php include 'menu2.php';?>

<!--=================================-->
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
				<h2>Pembelian</h2>
				<strong>No Pembelian : <?php echo $detail['id_pembelian'];?></strong><br>
				Tanggal : <?php echo $detail['tanggal_pembelian'];?><br>
				Total   : Rp.<?php echo number_format($detail['total_pembelian']);?>

			</div>
			<div class="col-md-4">
					<h2>Pelanggan</h2>
					<strong><?php echo $detail['nama_pelanggan'];?></strong><br>
			
						<?php echo $detail['email_pelanggan'];?><br>
						<?php echo $detail['telepon_pelanggan'];?>
					
			</div>
			<div class="col-md-4">
				<h2>Pengiriman</h2>
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
						<td><?php echo $pecah['berat'];?>kg.</td>
						<td><?php echo $pecah['jumlah'];?></td>
						<td><?php echo $pecah['subberat'];?>kg.</td>
						<td>Rp.<?php echo number_format($pecah['subharga']);?></td>
					</tr>
					<?php $no++;?>
				<?php }?>
			</tbody>

				</div>
			</div>
		</div>
			

		</table>
		<a href="cetak.php?id=<?php echo $detail['id_pembelian'];?>" class="btn btn-primary" target="_BLANK">Cetak Nota</a>

		<div class="row">
			<div class="col-md-12" align="center" >
				<div class="alert alert-info">
					<p>
						Silahkan Melakukan Pembayaran Rp.<?php echo number_format($detail['total_pembelian']);?>Ke Agustio Fernando<br>
						<strong>
							Bank BCA    			=>   821 546 562<br>

							Bank Mandiri 			=>   739 2831 13431<br>

							Bank BSM    			=>   231 4544 323 32345<br>

							Bank BNI  			 	=>   957 3234 5675 5789 543<br>

							Bank BRI   				=>   563 9975 3883 3533 

						</strong>
					</p>
				</div>
			</div>
		</div>
	</div>

</section>





<?php include 'footer.php'; ?>