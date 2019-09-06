<?php
session_start();

$id_produk = $_GET['id'];


//memasukkan ke keranjang 
//jika sudah ada 1

if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk]+=1;
}
//jika belum ada
else{
	$_SESSION['keranjang'][$id_produk]=1;
}

//pindahkan ke keranjang php
echo "<script>alert('Barang Sudah Masuk Ke Keranjang');</script>";
echo "<script>location='keranjang.php';</script>";




?>