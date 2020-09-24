<?php 
$ambil = $koneksi->query("SELECT * FROM siswa INNER JOIN kelas USING (id_kelas) WHERE nisn='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
 ?>
<div class="row">
          <img src="../fotosiswa/<?php echo $pecah['foto_siswa']; ?>" class="col-lg-4" id="image-preview" name="foto">
          <div class="col-lg-7">
            <div class="p-4">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ubah Data Siswa</h1>
              </div>
              <form class="user" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">NISN : 
                    <input type="text" class="form-control form-control-user" name="nisn" value="<?php echo $pecah['nisn']; ?>" readonly>
                  </div>
                  <div class="col-sm-6">NIS : 
                    <input type="text" class="form-control form-control-user" name="nis" value="<?php echo $pecah['nis']; ?>">
                  </div>
                </div>
                <div class="form-group">Nama Lengkap :
                  <input type="text" class="form-control form-control-user" name="nama" value="<?php echo $pecah['nama']; ?>">
                </div>
                 <div class="form-group">Alamat :
                  <input type="text" class="form-control form-control-user" name="alamat" value="<?php echo $pecah['alamat']; ?>">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0"> Kelas :
                     <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="kelas" placeholder="<?php echo $pecah['nama_kelas']; ?>" readonly>
                </div>
                  </div>
                  <div class="col-sm-6"> No Handphone : 
                    <input type="text" class="form-control form-control-user" name="no_telp" value="<?php echo $pecah['no_telp']; ?>">
                  </div>
                </div>
                <label>Foto Siswa : </label> <input type="file" class="form-control-file" id="image-source"  onchange="previewImage();" name="foto"/><br>
                <button class="btn btn-primary btn-user btn-block" name="ubah">Ubah Data Siswa</button>
              </form>
              <hr>
              <div class="text-center">
               <label>Data yang dibuat harus sama dengan data yang asli.</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php 
 $kelasbaru = $pecah['id_kelas'];
 $idspp = 1;
if (isset($_POST['ubah'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../fotosiswa/$namafoto");

		$koneksi->query("UPDATE siswa SET nis='$_POST[nis]', nama='$_POST[nama]', alamat='$_POST[alamat]', no_telp='$_POST[no_telp]', id_kelas='$kelasbaru', foto_siswa='$namafoto' WHERE nisn='$_GET[id]'");
	}else{
		$koneksi->query("UPDATE siswa SET nis='$_POST[nis]', nama='$_POST[nama]', alamat='$_POST[alamat]', no_telp='$_POST[no_telp]', id_kelas='$kelasbaru' WHERE nisn='$_GET[id]'");
	}
echo "<script>alert('Data Siswa Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=siswa';</script>";
}

 ?>