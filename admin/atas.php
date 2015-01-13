<img src="../icon/logo.png" />
<div class="box">
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="index.php">Home</a></div>
	
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="mahasiswa.php">Mahasiswa</a></div>

	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="dosen.php">Dosen</a></div>

	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="kelas.php">Kelas</a></div>
	
	<?php if ($level=='kaprodi'){ ?>
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="kinerja.php">Daftar pertanyaan</a></div> 
	
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="penilaian.php">Penilaian</a></div>
	<?php } ?>
	
	<?php if ($level=='admin'){ ?>
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="level-up.php">Tingkatkan semester</a></div> 

	<?php } ?>
	
	<div class="menu" onmouseover="this.style.background='#FFFFFF';" onmouseout="this.style.background='#1daeea';">
	<a href="../logout.php">Logout</a></div>
	
</div>

