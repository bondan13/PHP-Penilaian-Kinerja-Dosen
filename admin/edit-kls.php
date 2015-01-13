<?php 
require "session.php"; 
require "database.php";
if (isset($_GET['idk'])){
	$idk=$_GET['idk'];
	$query=@mysql_query ("SELECT * FROM kelas WHERE id = '$idk'");
		$idk=@mysql_result($query,0,0);
		$kelas=@mysql_result($query,0,1);
		$waktu=@mysql_result($query,0,2);
		$semester=@mysql_result($query,0,3);
}
	
	
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
			<h1 class="judul">Edit Ruang kelas</h1>
			<form method="post" action="v-input.php">
				<p>Nomor Ruangan <br> <input type="text" name="kelas" class="input-text" maxlength="3" 
				value="<?php echo $kelas; ?>"> </p>
				<p>Semester <br> <input type="text" name="semester" class="input-text" maxlength="40"
				value="<?php echo $semester; ?>"> </p>
				<p>Waktu <br>
				<input type="radio" value="pagi" name="waktu" 
				<?php if ($waktu=='pagi'){echo 'checked';} ?>> Pagi &nbsp;&nbsp;
				<input type="radio" value="malam" name="waktu"
				<?php if ($waktu=='malam'){echo 'checked';} ?>> Malam &nbsp;&nbsp;
				<input type="radio" value="p2k" name="waktu"
				<?php if ($waktu=='p2k'){echo 'checked';} ?>> P2k </p>
				<input type="hidden" name="verifikasi" value="edit-kls">
				<input type="hidden" name="idk" value="<?php echo $idk; ?>"> 
				<input type="submit" value="Simpan" class="submit" style="width:240px;">
				<a class="submit" id="k" href="hapus.php?idk=<?php echo $idk; ?>" style="width:auto; padding:2px;">Hapus</a>
			</form>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>
