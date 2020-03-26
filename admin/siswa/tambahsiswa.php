<div class="row">
          <img class="col-lg-4" id="image-preview" name="foto">
          <div class="col-lg-7">
            <div class="p-4">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tambah Data Siswa</h1>
              </div>
              <form class="user" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="nisn" placeholder="NISN">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="nis" placeholder="NIS">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap">
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="kelas" class="form-control">
                    	<option value="1">X-RPL 1</option>
                    	<option value="2">X-RPL 2</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="no_telp" placeholder="No Handphone">
                  </div>
                </div>
                <label>Foto Siswa : </label> <input type="file" class="form-control-file" id="image-source"  onchange="previewImage();" name="foto"/><br>
                <button class="btn btn-primary btn-user btn-block" name="save">Simpan Data Siswa</button>
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
 $idspp = 1;
if (isset($_POST['save'])) {
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, '../fotosiswa/'.$nama);
	$koneksi->query("INSERT INTO siswa (nisn,nis,nama,alamat,id_kelas,no_telp,id_spp,foto_siswa) VALUES('$_POST[nisn]','$_POST[nis]','$_POST[nama]','$_POST[alamat]','$_POST[kelas]','$_POST[no_telp]','$idspp','$nama')");
	 echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=siswa'>";
}

 ?>