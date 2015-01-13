<?php  
require "session.php"; 
require "database.php";
$query=@mysql_query("SELECT * FROM jadwal ORDER BY status asc");
$kelas=@mysql_query("SELECT DISTINCT id_kelas FROM belajar WHERE id_kelas != ''");
$jtanya=@mysql_num_rows(mysql_query("SELECT id FROM pertanyaan WHERE status = 'digunakan'"));
$jmasuk=@mysql_num_rows(mysql_query("Select penilaian.id From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id
									Where jadwal.status = 'mulai'"));
$running=@mysql_num_rows(mysql_query("SELECT id FROM jadwal WHERE status = 'mulai'"));
$bmk=@mysql_num_rows(mysql_query("SELECT id FROM belajar WHERE id_kelas = '' AND status='m'"));

$a=0;
while($hasil=mysql_fetch_array($kelas)){
	$jmlh=0;
	$dosen=@mysql_num_rows(mysql_query
	("SELECT id_user FROM belajar WHERE id_kelas = $hasil[0] and status = 'd'"));
	$mhs=@mysql_num_rows(mysql_query
	("SELECT id_user FROM belajar WHERE (id_kelas = $hasil[0]) and status = 'm'"));
	$jmlh=$dosen*$mhs;
	$a=$a+$jmlh;}
$jharus=$jtanya*($a+$bmk);	
$jprogress=@floor(($jmasuk*100)/$jharus);


?>

<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Jadwal penilaian</h1>
	<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th >Keperluan survei</th>
            <th width="165">Status</th>
 
        </tr>
    </thead>
		<tbody>	
			<?php while ($baris=mysql_fetch_array($query)){
				if($baris[2]=='mulai'){echo "<tr><td><a href='pertanyaan.php?pertanyaan=".$baris[0]."'>".$baris[1]."</a></td>";}
				if($baris[2]=='selesai'){echo "<tr><td><a href='pertanyaan.php?pertanyaan=".$baris[0]."'>".$baris[1]."</a></td>";}
				if($baris[2]==''){echo "<tr><td><a href='kinerja.php'>".$baris[1]."</a></td>";}		
				if ($running > 0){
					if($baris[2]=='mulai'){echo "<td>Sedang berlangsung</td>";}
					if($baris[2]=='selesai'){echo "<td>Selesai</td>";}
					if($baris[2]==''){echo "<td> - </td>";}}
				else{
					if($baris[2]=='mulai'){echo "<td>Sedang berlangsung</td>";}
					if($baris[2]=='selesai'){echo "<td>Selesai</td>";}
					if($baris[2]=='')
					{echo "<td><a class='submit' style='width:120px;' href='hapus.php?progress=play&idj=".$baris[0]."'>Lakukan penilaian</a>
					<a class='submit' style='width:7px;' href='hapus.php?progress=del&idj=".$baris[0]."'>x</a></td>";}}
				echo "</tr>";}
			?>
		</tbody>
	</table>
	<br>

		<?php if ($running > 0){ ?>
		<div class="input-text" style="width:565; padding:0px; float:left; background:#FFFFFF;"><img src="../icon/indikator.png" width="<?php echo $jprogress; ?>%" height="28"></div><div style="position:relative; left:260px; top:-25px">Progress <?php echo $jprogress; ?>%</div>
		<a class="submit" href="hapus.php?progress=stop" 
		style="float:right; position:relative; top:-45px; width:50; background:#FF0000;">Stop		</a>
		<?php } else {?>
		<table id="rounded-corner">
    	<thead>
    	<tr>
        	<th>
			<form method="post" action="v-input.php" >
			<input type="hidden" name="verifikasi" value="jadwal">
			<input type="text" name="nama" value="Tuliskan keperluan survei" 
				class="input-text" style="width:445px; color:#333333;"
				onfocus="if(this.value==this.defaultValue)this.value='';" 
				onblur="if(this.value=='')this.value=this.defaultValue;" >
			<input type="submit" value="tambahkan" class="submit" style="width:100; float:right;  margin:0px;">
			</form>
			</th>
        </tr>
    	</thead>
	</table>
		<?php } ?>
		<br>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>