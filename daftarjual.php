<?php 
session_start();
include 'koneksi.php';
$id_pelanggan = $_GET['id'];?>
<?php include 'menu2.php'; ?>

<div class="konten">
	<div class="container">
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
				<?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_pelanggan='$id_pelanggan'"); ?>
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
							<img src="foto_produk/<?php echo $pecah['foto_produk'];?>" width="50%" height="50%">
						</th>
						<th>
							<a href="hapusproduk.php?id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn">Hapus</a>
							<a href="editproduk.php?id=<?php echo $pecah['id_produk'];?>" class="btn-warning btn">Edit</a>
						</th>
					</tr>
					<?php $no++;?>
				<?php }?>
			</tbody>
		</table>
		<a href="lapak.php?id=<?php echo $id_pelanggan;?>" class="btn-primary btn">Tambah Jualan</a>
	</div>
</div>
<?php include 'footer.php'; ?>