<?php require "session.php"; ?>
	 <div class="isi2" style="background:url(icon/performance-management.png); height:100%;">
		<div class="isi" style="background:#FFFFFF; text-align:left; width:auto; 
		top:100px; left:120px; position:absolute; background-image:url(icon/performance-small.jpg);">
			<h1 class="judul" style=" border:1px solid #0066ff; float:left; 
			border-radius:5px; top:-30px; padding-left:10px; padding-right:10px; padding-bottom:5px;">
			Ubah Password</h1><br><br>
			
			<?php if ($_GET['konfirmasi'] != NULL){
					echo "<br><font color='red' size='4'>".$_GET['konfirmasi']."</font>"; }?>
			<br><div class="input-text" style="background-color:#FFFFFF; width:295px; height:auto;">
			Password tidak boleh sama dengan NIM <br>harus diubah</div>
			<form method="post" action="v-input.php">
				<br><b style="background-color:#ffffff;">Masukkan password baru</b><br> 
				<input type="password" name="password" class="input-text" maxlength="32"> </p>
				<input type="hidden" name="verifikasi" value="u-pass">
				<input type="submit" value="Simpan" class="submit">
			</form>
			<div align="center">&copy; 2014 ano abdillah</div>
		</div>
