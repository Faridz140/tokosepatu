<?php

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

$koneksi->query("DELETE  FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>
