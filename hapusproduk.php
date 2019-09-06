<?php
include "koneksi.php";
$id_pelanggan = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("foto_produk/$fotoproduk")) {

	unlink("foto_produk/$fotoproduk");
}
$koneksi->query("DELETE  FROM produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php';</script>";

?>
