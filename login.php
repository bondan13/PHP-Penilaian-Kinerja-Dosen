<?php 
session_start();
session_destroy();
?>
<html>
	 <?php require "head.php"; ?>
<body>
<div align="center">
	<div class="content">
	 <div class="isi2" style="background:url(icon/performance-management.png); height:100%;">
		<div class="isi" style="background:#FFFFFF; text-align:left; width:auto; top:100px; left:120px; position:absolute; background-image:url(icon/performance-small.jpg);">
			<h1 class="judul" style=" border:1px solid #0066ff; float:left; 
			border-radius:5px; top:-30px; padding-left:10px; padding-right:10px; padding-bottom:5px;">Login</h1><br><br>
			
			<?php if ($_GET['konfirmasi'] != NULL){
					echo "<br><font color='red' size='4'>".$_GET['konfirmasi']."</font>"; }?>
			<form method="post" action="v-input.php">
				<p>NIM <br> <input type="text" name="username" class="input-text" maxlength="32"> </p>
				<p>Password <br> <input type="password" name="password" class="input-text" maxlength="32"> </p>
				<input type="hidden" name="verifikasi" value="login">
				<input type="submit" value="Login" class="submit">
			</form>
			<div align="center">&copy; 2014 ano abdillah</div>
		</div>
	 </div>
	 
	 
	</div>
</div>
</body>
</html>