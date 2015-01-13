<?php require "session.php"; ?>
<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Input Dosen</h1>
			<form method="post" action="v-input.php">
				<p>NIDN <br> <input type="text" name="nidn" class="input-text" maxlength="11"> </p>
				<p>NIP <br> <input type="text" name="nip" class="input-text" maxlength="11"> </p>
				<p>Nama <br> <input type="text" name="nama" class="input-text" maxlength="40"> </p>
				<p>Gelar <br> <input type="text" name="gelar" class="input-text" maxlength="20"> </p>
				<p>Status <br>
				<input type="radio" value="tetap" name="status"> Dosen tetap &nbsp;&nbsp;
				<input type="radio" value="honor" name="status"> Dosen honor </p>
				<input type="hidden" name="verifikasi" value="input-dsn">
				<input type="submit" value="Simpan" class="submit">
			</form>
		</div>
		<div class="footer">
		sdasd
		
		</div>
	</div>
	</div>
	</body>
</html>
