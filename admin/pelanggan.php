<h2>Data pelanggan </h2>

<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Level</th>
			<th>Alamat</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
			<th><?php echo $no;?></th>
			<th><?php echo $pecah['nama_pelanggan'];?></th>
			<th><?php echo $pecah['email_pelanggan'];?></th>
			<th><?php echo $pecah['telepon_pelanggan'];?></th>
			<th><?php echo $pecah['level'];?></th>
			<th><?php echo $pecah['alamat_pelanggan'];?></th>
			<th>
				<img src="../foto/<?php echo $pecah['foto'];?>" width="100">
			</th>
			<th>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=editpelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn-warning btn">Edit</a>
			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
		<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Pelanggan</a>