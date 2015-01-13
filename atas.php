
<?php if ($login==true){ ?>
<img src="icon/logo.PNG" />
<div class="box">
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="index.php"><?php echo $nama; ?></a></div>
	
	<?php if ($status=='aktif'){ ?>
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="menilai.php">Menilai</a></div>
	<?php } ?>
	
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="logout.php">Logout</a></div>	
</div>
<?php }?>

