<?php 
require "session.php"; 
require "database.php";
$idd=$_POST['idd'];
$idk=$_POST['idk'];
	if ($idd < 1 || $idk < 1){header('Location:menilai.php');}
$pedagogik=mysql_query("SELECT * FROM pertanyaan WHERE jenis='pedagogik' AND status = 'digunakan' ORDER BY id ASC");
$profesional=mysql_query("SELECT * FROM pertanyaan WHERE jenis='profesional' AND status = 'digunakan'  ORDER BY id ASC");
$kepribadian=mysql_query("SELECT * FROM pertanyaan WHERE jenis='kepribadian' AND status = 'digunakan' ORDER BY id ASC");
$sosial=mysql_query("SELECT * FROM pertanyaan WHERE jenis='sosial' AND status = 'digunakan' ORDER BY id ASC");

?>

<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
		<form method="post" action="v-pertanyaan.php" name="pertanyaan">
		<input type="hidden" name="idk" value="<?php echo $idk; ?>">
		<input type="hidden" name="idd" value="<?php echo $idd; ?>">
			<h1 class="judul">Daftar pertanyaan</h1>
	<table id="rounded-corner">
    	<thead>
			<tr>
				<th rowspan="2">Kompetensi Pedagogik</th>
				<th colspan="5" width="40" align="center">Nilai</th>
			</tr>
			<tr align="center">
				<th >1</th><th>2</th><th>3</th><th>4</th><th>5</th>
			</tr>
    	</thead>
		<tbody>	
			<?php 
			$i=0;
			while ($baris=mysql_fetch_array($pedagogik)){
				$i++;
				echo "<input type='hidden' name='idpped[".$i."]' value='".$baris[0]."'>";
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				echo "<td><input type='radio' value='1' name='ped[".$i."]'></td>";
				echo "<td><input type='radio' value='2' name='ped[".$i."]'></td>";
				echo "<td><input type='radio' value='3' name='ped[".$i."]'></td>";
				echo "<td><input type='radio' value='4' name='ped[".$i."]'></td>";
				echo "<td><input type='radio' value='5' name='ped[".$i."]'></td>";
				echo "</tr>"; }
			echo "<input type='hidden' name='jped' value='".$i."'>";
			?>
		</tbody>
	</table><br>
	
	<table id="rounded-corner">
    	<thead>
			<tr>
				<th rowspan="2">Kompetensi Profesional</th>
				<th colspan="5" width="40" align="center">Nilai</th>
			</tr>
			<tr align="center">
				<th >1</th><th>2</th><th>3</th><th>4</th><th>5</th>
			</tr>
    	</thead>
		<tbody>	
			<?php 
			$i=0;
			while ($baris=mysql_fetch_array($profesional)){
				$i++;
				echo "<input type='hidden' name='idppro[".$i."]' value='".$baris[0]."'>";
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				echo "<td><input type='radio' value='1' name='pro[".$i."]' class='input'></td>";
				echo "<td><input type='radio' value='2' name='pro[".$i."]'></td>";
				echo "<td><input type='radio' value='3' name='pro[".$i."]'></td>";
				echo "<td><input type='radio' value='4' name='pro[".$i."]'></td>";
				echo "<td><input type='radio' value='5' name='pro[".$i."]'></td>";
				echo "</tr>"; }
			echo "<input type='hidden' name='jpro' value='".$i."'>";
			?>
		</tbody>
	</table><br>
	
	<table id="rounded-corner">
    	<thead>
			<tr>
				<th rowspan="2">Kompetensi Kepribadian</th>
				<th colspan="5" width="40" align="center">Nilai</th>
			</tr>
			<tr align="center">
				<th >1</th><th>2</th><th>3</th><th>4</th><th>5</th>
			</tr>
    	</thead>
		<tbody>	
			<?php 
			$i=0;
			while ($baris=mysql_fetch_array($kepribadian)){
				$i++;
				echo "<input type='hidden' name='idpkep[".$i."]' value='".$baris[0]."'>";
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				echo "<td><input type='radio' value='1' name='kep[".$i."]'></td>";
				echo "<td><input type='radio' value='2' name='kep[".$i."]'></td>";
				echo "<td><input type='radio' value='3' name='kep[".$i."]'></td>";
				echo "<td><input type='radio' value='4' name='kep[".$i."]'></td>";
				echo "<td><input type='radio' value='5' name='kep[".$i."]'></td>";
				echo "</tr>"; }
			echo "<input type='hidden' name='jkep' value='".$i."'>";
			?>
		</tbody>
	</table><br>
	
	<table id="rounded-corner">
    	<thead>
			<tr>
				<th rowspan="2">Kompetensi Sosial</th>
				<th colspan="5" width="40" align="center">Nilai</th>
			</tr>
			<tr align="center">
				<th >1</th><th>2</th><th>3</th><th>4</th><th>5</th>
			</tr>
    	</thead>
		<tbody>	
			<?php 
			$i=0;
			while ($baris=mysql_fetch_array($sosial)){
				$i++;
				echo "<input type='hidden' name='idpsos[".$i."]' value='".$baris[0]."'>";
				echo "<tr>";
				echo "<td>".$baris[1]."</td>";	
				echo "<td><input type='radio' value='1' name='sos[".$i."]'></td>";
				echo "<td><input type='radio' value='2' name='sos[".$i."]'></td>";
				echo "<td><input type='radio' value='3' name='sos[".$i."]'></td>";
				echo "<td><input type='radio' value='4' name='sos[".$i."]'></td>";
				echo "<td><input type='radio' value='5' name='sos[".$i."]'></td>";
				echo "</tr>"; }
			echo "<input type='hidden' name='jsos' value='".$i."'>";
			?>
		</tbody>
	</table><br>
	<input type="submit" class="submit" value="submit" style="width:100%;" onClick="validateForm()">
		</form>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>