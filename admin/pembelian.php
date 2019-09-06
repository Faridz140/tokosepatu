<h2>Data Pembelian</h2>

<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
			<th><?php echo $no;?></th>
			<th><?php echo $pecah['nama_pelanggan'];?></th>
			<th><?php echo $pecah['tanggal_pembelian'];?></th>
			<th><?php echo $pecah['total_pembelian'];?></th>
			<th><?php echo $pecah['status_pembelian'];?></th>
			<th>
				<a href="index.php?halaman=hapuspembelian&id=<?php echo $pecah['id_pembelian'];?>" class="btn-info btn">Hapus</a>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-info">Detail</a>

				<?php if ($pecah['status_pembelian']!=="pending"):?> 
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'];?> " class="btn btn-success">Lihat Pembayaran</a>
				<?php endif ?>

			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
