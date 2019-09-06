<h2>Metode Pengiriman Barang </h2>

<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Kurir</th>
			<th>Wilayah</th>
			<th>Tarif</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM ongkir"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
			<th><?php echo $no;?></th>
			<th><?php echo $pecah['kurir'];?></th>
			<th><?php echo $pecah['nama_kota'];?></th>
			<th><?php echo $pecah['tarif'];?></th>
			<th>
				<a href="index.php?halaman=hapuskurir&id=<?php echo $pecah['id_ongkir'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=editkurir&id=<?php echo $pecah['id_ongkir'];?>" class="btn-warning btn">Edit</a>
			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
		<a href="index.php?halaman=tambahkurir" class="btn btn-primary">Tambah Kurir</a>