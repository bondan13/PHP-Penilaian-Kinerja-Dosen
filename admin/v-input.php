<?php
require 'database.php';
require "session.php";
$verifikasi = $_POST['verifikasi'];

if ($verifikasi=='input-mhs' && $level=='admin'){
	$nim=$_POST['nim'];
	$nama=$_POST['nama'];
	$password=md5($_POST['nim']);
	$angkatan=$_POST['angkatan'];
	$semester=$_POST['semester'];
	$jk=$_POST['jk'];
	mysql_query("INSERT INTO `mahasiswa` VALUES 
				(NULL , '$nim', '$password', '$nama', '$angkatan', '$semester', '$jk', 'aktif');");
	$id=mysql_insert_id();
	mysql_query("INSERT INTO `belajar` VALUES 
				(NULL , '$id', NULL, 'm');");
	header('Location:mahasiswa.php');}
	
if ($verifikasi=='edit-mhs' && $level=='admin'){
	$idm=$_POST['idm'];
	$nim=$_POST['nim'];
	$nama=$_POST['nama'];
	$angkatan=$_POST['angkatan'];
	$semester=$_POST['semester'];
	$jk=$_POST['jk'];
	$status=$_POST['status'];
	mysql_query("UPDATE `mahasiswa` SET `nim` = '$nim', `nama` = '$nama',`angkatan` = '$angkatan',
	`semester` = '$semester', `jk` = '$jk', `status` = '$status' WHERE `id` = '$idm';");
	if ($status=='' || $status == 'tidak aktif' || $status == 'lulus'){
		mysql_query("DELETE FROM `belajar` WHERE `id_user` = '$idm' AND status='m';");}
	header('Location:mahasiswa.php');}
	
if ($verifikasi=='input-dsn' && $level=='admin'){
	$nidn=$_POST['nidn'];
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
	$gelar=$_POST['gelar'];
	$status=$_POST['status'];
	mysql_query("INSERT INTO `dosen` VALUES (NULL , '$nidn', '$nip', '$nama', '$gelar', '$status');");
	$idnya=mysql_insert_id();
	header('Location:mengajar.php?idd='.$idnya);}

if ($verifikasi=='edit-dsn' && $level=='admin'){
	$idd=$_POST['idd'];
	$nidn=$_POST['nidn'];
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
	$gelar=$_POST['gelar'];
	$status=$_POST['status'];
	mysql_query("UPDATE `dosen` SET `id` = '$idd', `nidn` = '$nidn', `nip` = '$nip',
	`nama` = '$nama', `gelar` = '$gelar', `status` = '$status' WHERE `id` = '$idd';");
	header('Location:dosen.php');}
	
if ($verifikasi=='input-kls' && $level=='admin'){
	$kelas=$_POST['kelas'];
	$semester=$_POST['semester'];
	$waktu=$_POST['waktu'];
	mysql_query("INSERT INTO `kelas` VALUES (NULL , '$kelas', '$waktu', '$semester');");
	header('Location:kelas.php');}
	
if ($verifikasi=='edit-kls' && $level=='admin'){
	$idk=$_POST['idk'];
	$kelas=$_POST['kelas'];
	$semester=$_POST['semester'];
	$waktu=$_POST['waktu'];
	mysql_query("UPDATE `kelas` SET `kelas` = '$kelas', `waktu` = '$waktu',
	`semester` = '$semester' WHERE `id` = '$idk';");
	header('Location:kelas.php');}

if ($verifikasi=='login'){
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	if ($username !=NULL and $password !=NULL) { 
		$hasil=@mysql_query("select * from admin where username = '$username'");
		$d_username=@mysql_result($hasil,0,1);
		$d_password=@mysql_result($hasil,0,2);
		$d_level=@mysql_result($hasil,0,3);
		
		if (md5($password) == $d_password){
			unset ($_POST);
			$_SESSION['username']=$d_username;
			$_SESSION['level']=$d_level;
			header('Location:index.php');}
		else {
			$konfirmasi = "Username atau Password salah";
			header ("location:login.php?konfirmasi=".$konfirmasi);}}
	else{
		$konfirmasi = "Username atau Password tidak boleh kosong";
		header ("location:login.php?konfirmasi=".$konfirmasi);}}

if ($verifikasi=='dosen-kelas' && $level=='admin'){
	$idd=$_POST['idd'];
	$j_kelas=@mysql_num_rows(mysql_query("SELECT `id` FROM `kelas` "));
	for ($i=1; $i<=$j_kelas; $i++){
		$kelas=$_POST['id'][$i];
		if ($kelas > 0 && $kelas != NULL){
		mysql_query("INSERT INTO `belajar` VALUES (NULL , '$idd', '$kelas', 'd');");}}
	header('Location:mengajar.php?idd='.$idd);}
	
	
if ($verifikasi=='ask' && $level=='kaprodi'){
	$pertanyaan=$_POST['pertanyaan'];
	$jenis=$_POST['jenis'];
	mysql_query("INSERT INTO `pertanyaan` VALUES (NULL , '$pertanyaan', '$jenis', 'digunakan');");
	header('Location:'.$_SERVER['HTTP_REFERER']);}
	
if ($verifikasi=='jadwal' && $level=='kaprodi'){
	$nama=$_POST['nama'];
	mysql_query("INSERT INTO `jadwal` VALUES (NULL , '$nama', NULL);");
	header('Location:'.$_SERVER['HTTP_REFERER']);}

if ($verifikasi==NULL){	header('Location:index.php');}
?>