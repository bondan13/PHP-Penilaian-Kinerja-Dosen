<?php 
require "session.php"; 
require "database.php";
if ($level != 'kaprodi'){header("Location:index.php");}
if ($_GET['pertanyaan']=='dihapus'){
	$pedagogik=mysql_query("SELECT * FROM pertanyaan WHERE jenis='pedagogik' AND status = 'dihapus' ORDER BY id ASC");
	$profesional=mysql_query("SELECT * FROM pertanyaan WHERE jenis='profesional' AND status = 'dihapus' ORDER BY id ASC");
	$kepribadian=mysql_query("SELECT * FROM pertanyaan WHERE jenis='kepribadian' AND status = 'dihapus' ORDER BY id ASC");
	$sosial=mysql_query("SELECT * FROM pertanyaan WHERE jenis='sosial' AND status = 'dihapus' ORDER BY id ASC");
	$link="idp_g=";
	$atur="gunakan";}
else {
	$pedagogik=mysql_query("SELECT * FROM pertanyaan WHERE jenis='pedagogik' AND status = 'digunakan' ORDER BY id ASC");
	$profesional=mysql_query("SELECT * FROM pertanyaan WHERE jenis='profesional' AND status = 'digunakan' ORDER BY id ASC");
	$kepribadian=mysql_query("SELECT * FROM pertanyaan WHERE jenis='kepribadian' AND status = 'digunakan' ORDER BY id ASC");
	$sosial=mysql_query("SELECT * FROM pertanyaan WHERE jenis='sosial' AND status = 'digunakan' ORDER BY id ASC");
	$link="idp_h=";
	$atur="hapus";}
?>

<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Daftar pertanyaan <?php echo $survei; ?></h1>
	<table id="rounded-corner">
    	<thead>
    	<tr>
        	<th colspan="2">Kompetensi Pedagogik</th>
        </tr>
    	</thead>
		<tbody>	
			<?php while ($baris=mysql_fetch_array($pedagogik)){
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				if ($survei < 1){
					echo "<td width='30'><a href='hapus.php?".$link.$baris[0]."'>".$atur."</a></td>";}	
				echo "</tr>";}
			?>
		</tbody>
	</table><br>
	
	<table id="rounded-corner">
    	<thead>
    	<tr>
        	<th colspan="2">Kompetensi Profesional</th>
        </tr>
    	</thead>
		<tbody>	
			<?php while ($baris=mysql_fetch_array($profesional)){
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				if ($survei < 1){
					echo "<td width='30'><a href='hapus.php?".$link.$baris[0]."'>".$atur."</a></td>";}			
				echo "</tr>";}
			?>
		</tbody>
	</table><br>
	<table id="rounded-corner">
    	<thead>
    	<tr>
        	<th colspan="2">Kompetensi Kepribadian</th>
        </tr>
    	</thead>
		<tbody>	
			<?php while ($baris=mysql_fetch_array($kepribadian)){
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				if ($survei <1 ){
					echo "<td width='30'><a href='hapus.php?".$link.$baris[0]."'>".$atur."</a></td>";}			
				echo "</tr>";}
			?>
		</tbody>
	</table><br>
	<table id="rounded-corner">
    	<thead>
    	<tr>
        	<th colspan="2">Kompetensi Sosial</th>
        </tr>
    	</thead>
		<tbody>	
			<?php while ($baris=mysql_fetch_array($sosial)){
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				if ($survei < 1){
					echo "<td width='30'><a href='hapus.php?".$link.$baris[0]."'>".$atur."</a></td>";}		
				echo "</tr>";}
			?>
		</tbody>
	</table><br><br>
<?php if ($survei < 1){?>
	<table id="rounded-corner">
    	<thead>
    	<tr>
        	<th>
			<form method="post" action="v-input.php" >
			<input type="hidden" name="verifikasi" value="ask">
			<input type="text" name="pertanyaan" value="Tambahkan daftar pertanyaan baru" 
				class="input-text" style="width:330px; color:#333333;"
				onfocus="if(this.value==this.defaultValue)this.value='';" 
				onblur="if(this.value=='')this.value=this.defaultValue;" >
			<select name="jenis" class="input-text" style="width:110px; position:relative; top:-1px; padding-top:3px;">
				<option value="pedagogik">pedagogik</option>
				<option value="profesional">profesional</option>
				<option value="kepribadian">kepribadian</option>
				<option value="sosial">sosial</option>
			<input type="submit" value="tambahkan" class="submit" style="width:100; float:right; margin:0px;">
			</form>
			</th>
        </tr>
    	</thead>
	</table><br>
	<table id="rounded-corner" >
    	<thead>
    	<tr>
        	<th align="center">
	<?php 
	if ($atur=='gunakan'){
		echo "<a href='kinerja.php' class='submit' >kembali ke daftar pertanyaan</a>";}
	else { echo "<a href='kinerja.php?pertanyaan=dihapus' class='submit'>Lihat pertanyaan yang dihapus</a>";}
	?>
				</th>
        </tr>
    	</thead>
	</table><br>
	<?php } else {?>
	<a href='penilaian.php' class='submit' style="width:560px; background-color:#FF0000;">Untuk dapat mengedit pertanyaan, harus menghentikan jadwal survei yang sedang berjalan</a>
	<?php }?>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>