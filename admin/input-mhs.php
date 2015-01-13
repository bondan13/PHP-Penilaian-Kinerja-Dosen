<?php require "session.php"; ?>
<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Input Mahasiswa</h1>
			<form method="post" action="v-input.php">
				<p>Nim <br> <input type="text" name="nim" class="input-text" maxlength="10"> </p>
				<p>Nama <br> <input type="text" name="nama" class="input-text" maxlength="40"> </p>
				<p>Angkatan <br> <input type="text" name="angkatan" class="input-text" maxlength="4"> </p>
				<p>Semester <br> <input type="text" name="semester" class="input-text" maxlength="2"> </p>
				<p>Jenis kelamin <br>
				<input type="radio" value="L" name="jk"> Laki-laki &nbsp;&nbsp;
				<input type="radio" value="P" name="jk"> Perempuan </p>
				<input type="hidden" name="verifikasi" value="input-mhs">
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
