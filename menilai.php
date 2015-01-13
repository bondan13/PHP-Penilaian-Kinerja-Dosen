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
		 require "atas.php";
		 require "pilih-kls.php";
		 
		 if ($pilih == 1){
		 	$query=@mysql_query ("Select id_kelas From belajar WHERE id_user = '$idm'");
			$idk=@mysql_result($query,0,0);
			
			$jsurvei=@mysql_num_rows(mysql_query("SELECT id FROM jadwal WHERE status = 'mulai'"));	
			if ($jsurvei >0){	
		 	$query2=@mysql_query ("Select dosen.id, dosen.nama, dosen.gelar From belajar 
					Inner Join dosen On belajar.id_user = dosen.id WHERE belajar.id_kelas = '$idk'
					AND dosen.id NOT IN
						(Select DISTINCT penilaian.id_dsn From penilaian Inner Join jadwal On jadwal.id = penilaian.id_j
						Where jadwal.status = 'mulai' And penilaian.id_mhs = '$idm')");
						
			echo "<div class='isi'><h1 class='judul'>Pilih dosen</h1><br>";
			if ($_GET['isi']=='error'){echo "<font color='red'><b>GAGAL MENILAI [Semua pertanyaan harus dijawab]</b></font><br>";}
			if ($_GET['isi']=='sukses'){echo "<font color='red'><b>terimakasih penilaian anda telah masuk</b></font><br>";}
			while ($hasil=mysql_fetch_array($query2)){
				echo "<form method='post' action='pertanyaan.php'>";
				echo "<input type='hidden' name='idd' value='".$hasil[0]."'>";
				echo "<input type='hidden' name='idk' value='".$idk."'>";
				echo "<input class='submit' name='nm' type='submit'value='".$hasil[1]." ".$hasil[2]."'></td>";
				echo "</form><br>";}
			echo "</div>";}}
		
		require "footer.php";}
	 ?>
	
	</div>
</div>
</body>
</html>