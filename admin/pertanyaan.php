<?php 
require "session.php"; 
require "database.php";
if ($level != 'kaprodi' && $_GET['pertanyaan'] <1){header("Location:index.php");}
	$idj=$_GET['pertanyaan'];
	
	$judul=@mysql_result(@mysql_query("SELECT nama FROM jadwal WHERE id = '$idj'"),0,0);
	$pedagogik=@mysql_query("Select DISTINCT pertanyaan.pertanyaan
From jadwal Inner Join penilaian On jadwal.id = penilaian.id_j Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
Where jadwal.id = '$idj' And pertanyaan.jenis = 'pedagogik' ORDER BY pertanyaan.id ASC");

	$profesional=@mysql_query("Select DISTINCT pertanyaan.pertanyaan
From jadwal Inner Join penilaian On jadwal.id = penilaian.id_j Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
Where jadwal.id = '$idj' And pertanyaan.jenis = 'profesional' ORDER BY pertanyaan.id ASC");

	$kepribadian=@mysql_query("Select DISTINCT pertanyaan.pertanyaan
From jadwal Inner Join penilaian On jadwal.id = penilaian.id_j Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
Where jadwal.id = '$idj' And pertanyaan.jenis = 'kepribadian' ORDER BY pertanyaan.id ASC");

	$sosial=@mysql_query("Select DISTINCT pertanyaan.pertanyaan
From jadwal Inner Join penilaian On jadwal.id = penilaian.id_j Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
Where jadwal.id = '$idj' And pertanyaan.jenis = 'sosial' ORDER BY pertanyaan.id ASC");
?>

<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul" style="font-size:18; top:-23px;">Daftar pertanyaan <?php echo $judul; ?></h1>
	<table id="rounded-corner">
    	<thead>
    	<tr>
        	<th colspan="2">Kompetensi Pedagogik</th>
        </tr>
    	</thead>
		<tbody>	
			<?php while ($baris=mysql_fetch_array($pedagogik)){
				echo "<tr>";
				echo "<td>".$baris[0]."</td>";	
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
				echo "<td>".$baris[0]."</td>";			
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
				echo "<td>".$baris[0]."</td>";				
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
				echo "<td>".$baris[0]."</td>";		
				echo "</tr>";}
			?>
		</tbody>
	</table>
	</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>