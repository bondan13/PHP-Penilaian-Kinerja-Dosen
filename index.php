<?php 
require 'database.php';
require "session.php"; 
?>
<html>
	 <?php require "head.php"; ?>
<body>
<div align="center">
	<div class="content">
	 <?php 
	 if ($upass == 1){require "upass.php";} 
	 else { 
	 require "atas.php"; ?>
	 

	<img src="icon/performance-small.jpg">
	<?php }?>
	</div>
	 
	 
	</div>
</div>
</body>
</html>
