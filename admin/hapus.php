<?php
require 'database.php';
require "session.php";

if (isset($_GET['idm']) && $level=='admin'){
	$idm=$_GET['idm'];
	mysql_query("DELETE FROM `mahasiswa` WHERE `id` = '$idm';");
	header('Location:mahasiswa.php');}

if ($_GET['opsi'] == 'reset' && $level=='admin'){
	$idm=$_GET['idreset'];
	$nim=md5($_GET['nim']);
	mysql_query("DELETE FROM penilaian Inner Join jadwal On penilaian.id_j = jadwal.id
		Where jadwal.status = 'mulai' And penilaian.id_mhs = '$idm';");
	mysql_query("UPDATE `mahasiswa` SET `password` = '$nim' WHERE `id` = '$idm';");
	mysql_query("UPDATE `belajar` SET `id_kelas` = 'NULL' WHERE `id_user` = '$idm' AND status ='m';");
	header('Location:mahasiswa.php');}

if ($_GET['opsi'] == 'levelup' && $level=='admin'){
	$survei=@mysql_num_rows(mysql_query("SELECT id FROM jadwal WHERE status ='mulai'"));
	if ($survei<1){
	mysql_query("UPDATE `mahasiswa` SET `semester`=`semester`+1 WHERE semester <8 AND status = 'aktif';");
	mysql_query("UPDATE `mahasiswa` SET `status`= 'lulus' WHERE semester >=8 AND status = 'aktif';");
	mysql_query("UPDATE `belajar` SET `id_kelas`= NULL WHERE status = 'm' ;");
	header('Location:mahasiswa.php');}}
		
if (isset($_GET['idd']) && $level=='admin'){
	$idd=$_GET['idd'];
	mysql_query("DELETE FROM `dosen` WHERE `id` = '$idd';");
	header('Location:dosen.php');}

if (isset($_GET['idk']) && $level=='admin'){
	$idk=$_GET['idk'];
	mysql_query("DELETE FROM `kelas` WHERE `id` = '$idk';");
	header('Location:kelas.php');}
	
if (isset($_GET['idajar']) && $level=='admin'){
	$idajar=$_GET['idajar'];
	mysql_query("DELETE FROM `belajar` WHERE `id` = '$idajar';");
	header('Location:'.$_SERVER['HTTP_REFERER']);}
	
if (isset($_GET['idp_h']) && $level=='kaprodi' ){
	$idp=$_GET['idp_h'];
	mysql_query("UPDATE `pertanyaan` SET `status` = 'dihapus' WHERE `id` = '$idp';");
	header('Location:'.$_SERVER['HTTP_REFERER']);}

if (isset($_GET['idp_g']) && $level=='kaprodi' && $survei== 'off'){
	$idp=$_GET['idp_g'];
	mysql_query("UPDATE `pertanyaan` SET `status` = 'digunakan' WHERE `id` = '$idp';");
	header('Location:kinerja.php');}
	
if ($_GET['progress'] == 'del' && $level=='kaprodi'){
	$idj=$_GET['idj'];
	mysql_query("DELETE FROM `jadwal` WHERE `id` = '$idj' AND status='';");
	header('Location:penilaian.php');}
	
if ($_GET['progress'] == 'play' && $level=='kaprodi'){
	$idj=$_GET['idj'];
	if ($idj > 0){
	mysql_query("UPDATE `jadwal` SET `status` = 'selesai' WHERE `id` != '$idj';");
	mysql_query("UPDATE `jadwal` SET `status` = 'mulai' WHERE `id` = '$idj';");}
	header('Location:penilaian.php');}

if ($_GET['progress'] == 'stop' && $level=='kaprodi'){
	$id=@mysql_result(mysql_query("Select id from jadwal where status = 'mulai'"),0,0);
	$query=mysql_query("Select DISTINCT penilaian.id_dsn 
			From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id 
			Where jadwal.status = 'mulai'");
	//header('Location:php');
	while ($hasil=mysql_fetch_array($query)){
	$pedagogik=floor(@mysql_result(mysql_query (" Select AVG (penilaian.nilai) 
		From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id 
		Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
		Where penilaian.id_dsn = '$hasil[0]' And jadwal.status = 'mulai' And pertanyaan.jenis = 'pedagogik'"),0,0)*20); 
	$profesional=floor(@mysql_result(mysql_query (" Select AVG (penilaian.nilai) 
		From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id 
		Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
		Where penilaian.id_dsn = '$hasil[0]' And jadwal.status = 'mulai' And pertanyaan.jenis = 'profesional'"),0,0)*20); 
	$kepribadian=floor(@mysql_result(mysql_query (" Select AVG (penilaian.nilai) 
		From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id 
		Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
		Where penilaian.id_dsn = '$hasil[0]' And jadwal.status = 'mulai' And pertanyaan.jenis = 'kepribadian'"),0,0)*20); 
	$sosial=floor(@mysql_result(mysql_query (" Select AVG (penilaian.nilai) 
		From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id 
		Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
		Where penilaian.id_dsn = '$hasil[0]' And jadwal.status = 'mulai' And pertanyaan.jenis = 'sosial'"),0,0)*20); 
	$all=floor(@mysql_result(mysql_query (" Select AVG (penilaian.nilai) 
		From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id 
		Inner Join pertanyaan On pertanyaan.id = penilaian.id_prt
		Where penilaian.id_dsn = '$hasil[0]' And jadwal.status = 'mulai' "),0,0)*20);
	$jmhs=@mysql_num_rows(mysql_query
		("Select DISTINCT penilaian.id_mhs From penilaian Inner Join jadwal On penilaian.id_j = jadwal.id
		Where penilaian.id_dsn = '$hasil[0]' and jadwal.status = 'mulai'"));
		
	$bmk=@mysql_num_rows(mysql_query("SELECT id FROM belajar WHERE id_kelas = '' AND status='m'"));
		
	$idk=@mysql_query("Select id_kelas From belajar Where status = 'd' And id_user = '$hasil[0]'");
	$a=0;
	
	while ($hasil2=mysql_fetch_array($idk)){
			$jmhss=@mysql_num_rows(mysql_query
				("Select id_user From belajar Where status = 'm' And id_kelas = '$hasil2[0]'"));
			$a=$a+$jmhss;}
				
	$jseharusnya=floor(($jmhs*100)/($a+$bmk));
	
	@mysql_query ("INSERT INTO `hasil` 
		VALUES (NULL , '$hasil[0]', '$id', '$pedagogik', '$profesional', '$kepribadian', '$sosial', '$all', '$jseharusnya')");}
		
	mysql_query("UPDATE `jadwal` SET `status` = 'selesai' WHERE `id` = '$id';");
	header('Location:'.$_SERVER['HTTP_REFERER']);
	}
	
?>

