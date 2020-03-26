<?php 
$ambil = $koneksi->query("SELECT * FROM siswa WHERE nisn='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotosiswa = $pecah['foto_siswa'];
if (file_exists("../fotosiswa/$fotosiswa")) {
	unlink("../fotosiswa/$fotosiswa");
}
$koneksi->query("DELETE FROM siswa WHERE nisn='$_GET[id]'");
echo "<script>alert('Data Siswa Berhasil Terhapus');</script>";
echo "<script>location='index.php?halaman=siswa';</script>";


 ?>