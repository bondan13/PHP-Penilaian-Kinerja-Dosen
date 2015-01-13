<html>
	 <?php require "head.php"; ?>
	<body style="top:50px;">
	<div align="center" >
		<div class="isi" style="background:#FFFFFF; text-align:left; width:auto; top:50px; left:250px; position:absolute;">
			<h1 class="judul" style=" border:1px solid #0066ff; float:left; 
			border-radius:5px; top:-30px; padding-left:10px; padding-right:10px;">Login</h1><br><br>
			<?php if ($_GET['konfirmasi'] != NULL){
					echo "<font color='red'>".$_GET['konfirmasi']."</font>"; }?>
			<form method="post" action="v-input.php">
				<p>Username <br> <input type="text" name="username" class="input-text" maxlength="32"> </p>
				<p>Password <br> <input type="password" name="password" class="input-text" maxlength="32"> </p>
				<input type="hidden" name="verifikasi" value="login">
				<input type="submit" value="Login" class="submit">
			</form>
			&copy; 2014 ano abdillah
		</div>
		

	</div>
	</body>
</html>
