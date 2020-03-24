<h2>Siswa</h2>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>NISN</th>
			<th>NIS</th>
			<th>Nama Peserta Didik</th>
			<th>Kelas</th>
			<th>No Telepon Siswa</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>No</th>
			<th>NISN</th>
			<th>NIS</th>
			<th>Nama Peserta Didik</th>
			<th>Kelas</th>
			<th>No Telepon Siswa</th>
			<th>AKSI</th>
		</tr>
	</tfoot>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT nisn, nis, nama, no_telp, nama_kelas FROM siswa INNER JOIN kelas USING (id_kelas)");  ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?> </td>
			<td><?php echo $pecah['nisn']; ?> </td>
			<td><?php echo $pecah['nis']; ?> </td>
			<td><?php echo $pecah['nama']; ?> </td>
			<td><?php echo $pecah['nama_kelas']; ?></td>
			<td><?php echo $pecah['no_telp']; ?></td>
			<td><a href="index.php?halaman=ubahsiswa" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a> | <a href="index.php?halaman=hapussiswa" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i></a></td>
		</tr>
	</tbody>
	<?php $nomor++ ?>
	<?php } ?>
</table>
</div>
