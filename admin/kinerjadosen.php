<?php 
require "session.php"; 
require "database.php";
if ($level != 'kaprodi'){header("Location:index.php");}
if ($_GET['idd'] < 1){header("Location:index.php");}
$idd=$_GET['idd'];
$query=@mysql_query("SELECT * FROM dosen WHERE id = '$idd'");
		$nama=@mysql_result($query,0,3);
		$gelar=@mysql_result($query,0,4);

$ped=@mysql_query("SELECT hasil.pedagogik,jadwal.id,jadwal.nama FROM hasil inner join jadwal on hasil.id_jadwal=jadwal.id WHERE id_dosen = '$idd' ORDER BY hasil.id desc LIMIT 10");
$pro=@mysql_query("SELECT hasil.profesional,jadwal.id,jadwal.nama FROM hasil inner join jadwal on hasil.id_jadwal=jadwal.id WHERE id_dosen = '$idd' ORDER BY hasil.id desc LIMIT 10");
$kep=@mysql_query("SELECT hasil.kepribadian,jadwal.id,jadwal.nama FROM hasil inner join jadwal on hasil.id_jadwal=jadwal.id WHERE id_dosen = '$idd' ORDER BY hasil.id desc LIMIT 10");
$sos=@mysql_query("SELECT hasil.sosial,jadwal.id,jadwal.nama FROM hasil inner join jadwal on hasil.id_jadwal=jadwal.id WHERE id_dosen = '$idd' ORDER BY hasil.id desc LIMIT 10");
$semua=@mysql_query("SELECT hasil.all,jadwal.id,jadwal.nama FROM hasil inner join jadwal on hasil.id_jadwal=jadwal.id WHERE id_dosen = '$idd' ORDER BY hasil.id desc LIMIT 10");
$res=@mysql_query("SELECT hasil.mhs,jadwal.id,jadwal.nama FROM hasil inner join jadwal on hasil.id_jadwal=jadwal.id WHERE id_dosen = '$idd' ORDER BY hasil.id desc LIMIT 10");

?>

<html>
	 <?php require "head.php"; ?>
	  <script>
$(function() {
$( document ).tooltip();
});
</script>
<style>
label {
display: inline-block;
width: 5em;
font-size:5px;
}
</style>
	 <style>
	 .bars{
	 width:30px;
	 height:220px;
	 float:right;
	 margin-right:10px;
	 background-color:#0099FF;
	 }
	 .bar{
	 width:30px;
	 padding:0px;
	 background-color:#FFFFFF;}
	 .number{
	 width:30px;
	 height:20px;
	 padding:0px;
	 background-color:#FFFFFF;}
	 </style>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<h1 class="judul" style="font-size:18px; top:0; float:left; margin-left:5px;"><?php echo $nama." ".$gelar;?></h1>
		<div class="isi">
			<h1 class="judul" style="font-size:16px; top:-23px;">Pedagogik</h1>
		<div class="bars" style="float:left;"><div class="number">&nbsp;</div><img src="../icon/bar.png"></div>
		<div style="float:left; height:220; width:auto;">
		<?php while ($pedagogik=mysql_fetch_array($ped)){
				$peda=200-($pedagogik[0]*2);
				echo "<div class='bars'><div class='bar' style='height:".$peda."px;'>
				</div><div class='number' align='center'>
				<a href='pertanyaan.php?pertanyaan=".$pedagogik[1]."' title='".$pedagogik[2]."'>
				".$pedagogik[0]."</a></div></div>";}
				
		?>
		</div>
		</div><br />&nbsp;

		<div class="isi">
			<h1 class="judul" style="font-size:16px; top:-23px;">Profesional</h1>
		<div class="bars" style="float:left;"><div class="number">&nbsp;</div><img src="../icon/bar.png"></div>
		<div style="float:left; height:220; width:auto">
		<?php while ($profesional=mysql_fetch_array($pro)){
				$prof=200-($profesional[0]*2);
				echo "<div class='bars'><div class='bar' style='height:".$prof."px;'>
				</div><div class='number' align='center'>
				<a href='pertanyaan.php?pertanyaan=".$profesional[1]."' title='".$profesional[2]."'>
				".$profesional[0]."</a></div></div>";}
		?>
		</div>
		</div><br />&nbsp;

		<div class="isi">
			<h1 class="judul" style="font-size:16px; top:-23px;">Kepribadian</h1>
		<div class="bars" style="float:left;"><div class="number">&nbsp;</div><img src="../icon/bar.png"></div>
		<div style="float:left; height:220; width:auto">
		<?php while ($kepribadian=mysql_fetch_array($kep)){
				$kepr=200-($kepribadian[0]*2);
				echo "<div class='bars'><div class='bar' style='height:".$kepr."px;'>
				</div><div class='number' align='center'>
				<a href='pertanyaan.php?pertanyaan=".$kepribadian[1]."' title='".$kepribadian[2]."'>
				".$kepribadian[0]."</a></div></div>";}
		?>
		</div>
		</div><br />&nbsp;

		<div class="isi">
			<h1 class="judul" style="font-size:16px; top:-23px;">Sosial</h1>
		<div class="bars" style="float:left;"><div class="number">&nbsp;</div><img src="../icon/bar.png"></div>
		<div style="float:left; height:220; width:auto">
		<?php while ($sosial=mysql_fetch_array($sos)){
				$sosi=200-($sosial[0]*2);
				echo "<div class='bars'><div class='bar' style='height:".$sosi."px;'>
				</div><div class='number' align='center'>
				<a href='pertanyaan.php?pertanyaan=".$sosial[1]."' title='".$sosial[2]."'>
				".$sosial[0]."</a></div></div>";}
		?>
		</div>
		</div><br />&nbsp;
		
		<div class="isi">
			<h1 class="judul" style="font-size:16px; top:-23px;">Keseluruhan rata-rata</h1>
		<div class="bars" style="float:left;"><div class="number">&nbsp;</div><img src="../icon/bar.png"></div>
		<div style="float:left; height:220; width:auto">
		<?php while ($semuanya=mysql_fetch_array($semua)){
				$semu=200-($semuanya[0]*2);
				echo "<div class='bars'><div class='bar' style='height:".$semu."px;'>
				</div><div class='number' align='center'>
				<a href='pertanyaan.php?pertanyaan=".$semuanya[1]."' title='".$semuanya[2]."'>
				".$semuanya[0]."</a></div></div>";}
		?>
		</div>
		</div><br />&nbsp;
		
		<div class="isi">
			<h1 class="judul" style="font-size:16px; top:-23px;">Persentase jumlah mahasiswa yang menilai</h1>
		<div class="bars" style="float:left;"><div class="number">&nbsp;</div><img src="../icon/bar.png"></div>
		<div style="float:left; height:220; width:auto">
		<?php while ($responden=mysql_fetch_array($res)){
				$resp=200-($responden[0]*2);
				echo "<div class='bars'><div class='bar' style='height:".$resp."px;'>
				</div><div class='number' align='center'>
				<a href='pertanyaan.php?pertanyaan=".$responden[1]."' title='".$responden[2]."'>
				".$responden[0]."%</a></div></div>";
				}
				
		?>
		</div>
		</div><br />&nbsp;
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>