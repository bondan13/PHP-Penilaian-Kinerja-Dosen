<?php 
require "session.php"; 
require "database.php";
if (isset($_GET['idd'])){
	$idd=$_GET['idd'];
	$query=@mysql_query ("SELECT nama,gelar FROM dosen WHERE id = '$idd'");
		$nama=@mysql_result($query,0,0);
		$gelar=@mysql_result($query,0,1);
	$query=@mysql_query ("Select * From kelas WHERE id NOT IN 
						(Select kelas.id From belajar Inner Join kelas On belajar.id_kelas = kelas.id
						Where belajar.id_user = '$idd') ORDER BY semester DESC, kelas DESC");

	$query2=@mysql_query ("Select belajar.id, kelas.kelas, kelas.waktu, kelas.semester 
						From belajar Inner Join kelas On belajar.id_kelas = kelas.id
						Where belajar.id_user = '$idd' ORDER BY semester DESC, kelas DESC");
	}
	
	
?>
<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
		<h1 class="judul">Mengajar</h1>
		<b><?php echo $nama." ".$gelar; ?></b><br /><br />
			<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
   			<thead>
    		<tr>
        	<th width="40">Mengajar </th>
            <th width="40">Semester</th>
            <th width="40">Waktu</th>
			<th >Ruangan</th>
			<th width="40">&nbsp;</th>
       		</tr>
  			</thead>
			<tbody>
			<?php
				while ($hasil2=mysql_fetch_array($query2)){
					echo "<tr><td><img src='../icon/check.png' width='20' height='20'/></td>";
					echo "<td>".$hasil2[3]."</td>";
					echo "<td>".$hasil2[2]."</td>";
					echo "<td>".$hasil2[1]."</td>";
					echo "<td><a class='k' href='hapus.php?idajar=".$hasil2[0]."'>hapus</a></td></tr>";}
			?>
			</tbody>
			</table>
		</div>
		<div class="isi" style="margin-top:30px;">
			<h1 class="judul" style="font-size:20px; top:-25px;">Kelas belum dipilih</h1>
			<form method="post" action="v-input.php">
			<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
   			<thead>
    		<tr>
        	<th width="40">Mengajar</th>
            <th width="40">Semester</th>
            <th width="40">Waktu</th>
			<th >Ruangan</th>
       		</tr>
  			</thead>
			<tbody>				
			<?php
				$i=1;
				while ($hasil=mysql_fetch_array($query)){
				echo "<tr><td><input type='checkbox' value='".$hasil[0]."' name='id[".$i."]'></td>";
				echo "<td>".$hasil[3]."</td>";
				echo "<td>".$hasil[2]."</td>";
				echo "<td>".$hasil[1]."</td></tr>";
				$i++;}
				?>
			</tbody>
			</table>
			<input type="hidden" name="verifikasi" value="dosen-kelas" >
			<input type="hidden" name="idd" value="<?php echo $idd; ?>" >
			<input type="submit" value="Pilih" class="submit">
			</form>
			<div align="center">
			<a class="submit" href="dosen.php" style="width:250; left:10px; float:right; position:relative; top:-37;">selesai</a>
			</div>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
	 <script>
		$( document ).ready(function() {
		$('.k').on('click', function () {
				return confirm('Apakah anda ingin menghapus?');
			});
		});
	</script>
</html>
