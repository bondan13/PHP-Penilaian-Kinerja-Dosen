<?php 
require "session.php"; 
require "database.php";
if (isset($_GET['idd'])){
	$idd=$_GET['idd'];
	$query=@mysql_query ("SELECT * FROM dosen WHERE id = '$idd'");
		$idd=@mysql_result($query,0,0);
		$nidn=@mysql_result($query,0,1);
		$nip=@mysql_result($query,0,2);
		$nama=@mysql_result($query,0,3);
		$gelar=@mysql_result($query,0,4);
		$status=@mysql_result($query,0,5);}
?>
<html>
	 <?php require "head.php"; ?>
	 <script>
		$( document ).ready(function() {
		$('#k').on('click', function () {
				return confirm('Apakah anda ingin menghapus?');
			});
		});
	</script>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Edit Dosen</h1>
			<form method="post" action="v-input.php">
				<p>NIDN : <?php echo $nidn; ?> </p> 
				<p>NIP &nbsp;&nbsp;&nbsp;: <?php echo $nip; ?> </p>
				<p>Nama <br> <input type="text" name="nama" class="input-text" maxlength="40"
				value="<?php echo $nama; ?>"> </p>
				<p>Gelar <br> <input type="text" name="gelar" class="input-text" maxlength="20"
				value="<?php echo $gelar; ?>"> </p>
				<p>Status <br>
				<input type="radio" value="tetap" name="status" 
				<?php if ($status=='tetap'){echo 'checked';} ?>> Dosen tetap &nbsp;&nbsp;
				<input type="radio" value="honor" name="status"
				<?php if ($status=='honor'){echo 'checked';} ?>> Dosen honor </p>
				<input type="hidden" name="verifikasi" value="edit-dsn">
				<input type="hidden" name="idd" value="<?php echo $idd; ?>">
				<input type="hidden" name="nidn" value="<?php echo $nidn; ?>"> 
				<input type="hidden" name="nip" value="<?php echo $nip; ?>">
				<input type="submit" value="Simpan" class="submit" style="width:160;">
				<a class="submit" href="mengajar.php?idd=<?php echo $idd; ?>" style="width:auto; padding:2px;">Edit jadwal</a>
				<a class="submit" id="k" href="hapus.php?idd=<?php echo $idd; ?>" style="width:auto; padding:2px;">Hapus</a>
			</form>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>
