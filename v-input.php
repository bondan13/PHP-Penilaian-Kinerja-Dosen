<?php
require 'database.php';
require "session.php";
$verifikasi = $_POST['verifikasi'];

if ($verifikasi=='login'){
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	if ($username !=NULL and $password !=NULL) { 
		$hasil=@mysql_query("select * from mahasiswa where nim = '$username'");
		$d_id=@mysql_result($hasil,0,0);
		$d_nim=@mysql_result($hasil,0,1);
		$d_password=@mysql_result($hasil,0,2);
		$d_nama=@mysql_result($hasil,0,3);
		$d_semester=@mysql_result($hasil,0,5);
		$d_status=@mysql_result($hasil,0,7);

		
		if (md5($password) == $d_password){
			unset ($_POST);
			$_SESSION['idm']=$d_id;
			$_SESSION['nim']=$d_nim;
			$_SESSION['nama']=$d_nama;
			$_SESSION['sms']=$d_semester;
			$_SESSION['status']=$d_status;
			
			if (md5($d_nim) == $d_password){
				$_SESSION['pass']=1;
				 header('Location:index.php');}
			else { header('Location:index.php');}}
		else {
			$konfirmasi = "NIM atau Password salah";
			header ("location:login.php?konfirmasi=".$konfirmasi);}}
	else{
		$konfirmasi = "NIM atau Password tidak boleh kosong";
		header ("location:login.php?konfirmasi=".$konfirmasi);}}
		
if ($verifikasi=='u-pass'){
	session_start();
	$_SESSION['pass']=NULL;
	$password=md5($_POST['password']);
	mysql_query("UPDATE `mahasiswa` SET `password` = '$password' WHERE `id` = '$idm';");
	header('Location:index.php');}
	
if ($verifikasi=='update-kls'){
	$idk=$_POST['idk'];
	mysql_query("UPDATE `belajar` SET `id_kelas` = '$idk' WHERE `id_user` = '$idm';");
	header('Location:'.$_SERVER['HTTP_REFERER']);}
?>