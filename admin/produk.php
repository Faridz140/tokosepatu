<h2>Data Produk</h2>

<a href="index.php?halaman=tambahproduk" class="btn-primary btn">Tambah Data</a>
<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Stok</th>
			<th>Nama Toko</th>
			<th>Alamat</th>
			<th>Foto</th> 
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil =$koneksi->query("SELECT * FROM produk"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
			<th><?php echo $no;?></th>
			<th><?php echo $pecah['nama_produk'];?></th>
			<th><?php echo $pecah['harga_produk'];?></th>
			<th><?php echo $pecah['berat'];?></th>
			<th><?php echo $pecah['stok_produk'];?></th>
			<th><?php echo $pecah['namatoko'];?></th>
			<th><?php echo $pecah['alamat'];?></th>
			<th>
				<img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
			</th>
			<th>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-warning btn">Edit</a>
			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
