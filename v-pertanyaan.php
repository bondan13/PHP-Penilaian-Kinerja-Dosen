<?php
require 'database.php';
require "session.php";
$idd=$_POST['idd'];
$idk=$_POST['idk'];
$jped=$_POST['jped'];
$jpro=$_POST['jpro'];
$jkep=$_POST['jkep'];
$jsos=$_POST['jsos'];

if ($idd > 0 && $idk > 0){
	$err=0;
	
	for ($i=1; $i<=$jped; $i++){
		$nilai=$_POST['ped'][$i];
		if ($nilai <1 || $niali >5){$err=$err+1;}}	

	for ($i=1; $i<=$jpro; $i++){
		$nilai=$_POST['pro'][$i];
		if ($nilai <1 || $niali >5){$err=$err+1;}}
		
	for ($i=1; $i<=$jkep; $i++){
		$nilai=$_POST['kep'][$i];
		if ($nilai <1 || $niali >5){$err=$err+1;}}
		
	for ($i=1; $i<=$jsos; $i++){
		$nilai=$_POST['sos'][$i];
		if ($nilai <1 || $niali >5){$err=$err+1;}}
		
	if($err > 0){header('Location:menilai.php?isi=error');}
		
	else{
			$query= @mysql_query("SELECT id FROM jadwal WHERE status = 'mulai' LIMIT 1");
			$idj=@mysql_result($query,0,0);
			
		for ($i=1; $i<=$jped; $i++){
			$idp=$_POST['idpped'][$i];
			$nilai=$_POST['ped'][$i];
			mysql_query ("INSERT INTO `penilaian` VALUES (NULL , '$idj', '$idm', '$idd', '$idk', '$idp', '$nilai');"); }
	
		
		for ($i=1; $i<=$jpro; $i++){
			$idp=$_POST['idppro'][$i];
			$nilai=$_POST['pro'][$i];
			mysql_query ("INSERT INTO `penilaian` VALUES (NULL , '$idj', '$idm', '$idd', '$idk', '$idp', '$nilai');"); }
		
		for ($i=1; $i<=$jkep; $i++){
			$idp=$_POST['idpkep'][$i];
			$nilai=$_POST['kep'][$i];
			mysql_query ("INSERT INTO `penilaian` VALUES (NULL , '$idj', '$idm', '$idd', '$idk', '$idp', '$nilai');"); }
			
		for ($i=1; $i<=$jsos; $i++){
			$idp=$_POST['idpsos'][$i];
			$nilai=$_POST['sos'][$i];
			mysql_query ("INSERT INTO `penilaian` VALUES (NULL , '$idj', '$idm', '$idd', '$idk', '$idp', '$nilai');"); }
			
		header('Location:menilai.php?isi=sukses');
	}
}
	
else { header('Location:menilai.php');}
?>

