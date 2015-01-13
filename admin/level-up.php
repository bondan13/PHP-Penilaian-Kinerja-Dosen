<?php 
require "session.php"; 
require "database.php";
?>

<html>
	 <?php require "head.php"; ?>
	 <script>
		$( document ).ready(function() {
		$('#k').on('click', function () {
				return confirm('Perintah ini tidak dapat di undo \nAnda yakin ingin meningkatkan semester?');
			});
		});
	</script>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Tingkatkan semester </h1>
		<div align="center">
		<?php if ($survei <1){?>
			<a class="submit" id="k" style="width:555px;" href="hapus.php?opsi=levelup"> Tingkatkan semester seluruh mahasiswa</a>
		<?php }
		if ($survei > 0){?>
		<div class="submit" align="center" style="width:555px; cursor:default; background-color:#FF0000;">
			Proses penilaian kinerja dosen sedang berjalan, menu ini tidak dapat digunakan
		</div>
		<?php }?>
		</div>
		<div class="submit" align="justify" style="width:555px; cursor:default;">
		Meningkatkan semester mahasiswa akan otomatis meningkatkan seluruh semester mahasiswa aktif. Untuk semester 1 - 7 akan meningkat 1 semester, dan untuk semester 8 atau lebih akan diubah statusnya menjadi mahasiswa Lulus. 
		</div>
		</div>
		<?php require "footer.php"; 
		echo $survei;?>
	</div>
	</div>
	</body>
</html>