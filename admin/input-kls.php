<?php require "session.php"; ?>
<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Input Ruang kelas</h1>
			<form method="post" action="v-input.php">
				<p>Nomor Ruangan <br> <input type="text" name="kelas" class="input-text" maxlength="3"> </p>
				<p>Semester <br> <input type="text" name="semester" class="input-text" maxlength="40"> </p>
				<p>Waktu <br>
				<input type="radio" value="pagi" name="waktu"> Pagi &nbsp;&nbsp;
				<input type="radio" value="malam" name="waktu"> Malam &nbsp;&nbsp;
				<input type="radio" value="p2k" name="waktu"> P2k </p>
				<input type="hidden" name="verifikasi" value="input-kls">
				<input type="submit" value="Simpan" class="submit">
			</form>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>
