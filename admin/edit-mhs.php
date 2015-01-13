<?php 
require "session.php"; 
require "database.php";
if (isset($_GET['idm'])){
	$idm=$_GET['idm'];
	$query=@mysql_query ("SELECT * FROM mahasiswa WHERE id = '$idm'");
		$id=@mysql_result($query,0,0);
		$nim=@mysql_result($query,0,1);
		$nama=@mysql_result($query,0,3);
		$angkatan=@mysql_result($query,0,4);
		$semester=@mysql_result($query,0,5);
		$jk=@mysql_result($query,0,6);
		$status=@mysql_result($query,0,7);}
	
	
?>
<html>
	 <?php require "head.php"; ?>
	 <script>
		$( document ).ready(function() {
		$('#k').on('click', function () {
				return confirm('Apakah anda ingin menghapus?');
			});
		});
		
		$( document ).ready(function() {
		$('#r').on('click', function () {
				return confirm('Apakah anda ingin mereset password?\nini juga akan mereset penilaian sebelumnya');
			});
		});
	</script>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Edit Mahasiswa</h1>
			<form method="post" action="v-input.php">
				<input type="hidden" name="nim" value="<?php echo $nim; ?>">
				<p>Nim : <?php echo $nim; ?> </p>
				<p>Nama <br> <input type="text" name="nama" class="input-text" maxlength="40" 
				value="<?php echo $nama; ?>"> <br>
				<a class="submit" id="r" href="hapus.php?opsi=reset&idreset=<?php echo $idm; ?>&nim=<?php echo $nim; ?>" 
				style="width:auto; padding:2px;">Reset Password</a><br></p>
				<p>Angkatan <br> <input type="text" name="angkatan" class="input-text" maxlength="4" 
				value="<?php echo $angkatan; ?>"> </p>
				<p>Semester <br> <input type="text" name="semester" class="input-text" maxlength="2" 
				value="<?php echo $semester; ?>"> </p>
				<p>Jenis kelamin <br>
				<input type="radio" value="L" name="jk" <?php if ($jk=='L'){echo 'checked';} ?>> Laki-laki &nbsp;&nbsp;
				<input type="radio" value="P" name="jk" <?php if ($jk=='P'){echo 'checked';} ?>> Perempuan </p>
				<p >Status mahasiswa<br>
				<input type="radio" value="aktif" name="status" 
				<?php if ($status=='aktif'){echo 'checked';} ?>> Aktif &nbsp;&nbsp;
				<input type="radio" value="tidak aktif" name="status" 
				<?php if ($status=='tidak aktif'){echo 'checked';} ?>> Tidak aktif  &nbsp;&nbsp;
				<input type="radio" value="lulus" name="status" 
				<?php if ($status=='lulus'){echo 'checked';} ?>> Lulus </p>
				<input type="hidden" name="verifikasi" value="edit-mhs">
				<input type="hidden" name="idm" value="<?php echo $idm; ?>">
				<input type="submit" value="Simpan" class="submit" style="width:240;">
				<a class="submit" id="k" href="hapus.php?idm=<?php echo $idm; ?>" style="width:auto; padding:2px;">Hapus</a>
			</form>
		</div>
			<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>
