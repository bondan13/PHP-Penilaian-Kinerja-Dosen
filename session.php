<?php
session_start();
if($_SESSION['idm']!=NULL && $_SESSION['nim']!=NULL && $_SESSION['nama']!=NULL && $_SESSION['sms']!=NULL){
	$login='true';
	$idm=$_SESSION['idm'];
	$nim=$_SESSION['nim'];
	$nama=$_SESSION['nama'];
	$sms=$_SESSION['sms'];
	$status=$_SESSION['status'];
	$upass=$_SESSION['pass'];}
else {header ("location:login.php");}
?>