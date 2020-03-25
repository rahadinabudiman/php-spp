<?php 
$koneksi->query("DELETE FROM siswa WHERE nisn='$_GET[id]'");
echo "<script>alert('Data Siswa Berhasil Terhapus');</script>";
echo "<script>location='index.php?halaman=siswa';</script>";


 ?>