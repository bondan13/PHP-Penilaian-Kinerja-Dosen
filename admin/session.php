<?php
session_start();
require 'database.php';
if($_SESSION['username']!=NULL && $_SESSION['level']!=NULL){
	$login='true';
	$username=$_SESSION['username'];
	$level=$_SESSION['level'];
	$survei=@mysql_num_rows(mysql_query("SELECT id FROM jadwal WHERE status ='mulai'"));}
else {header ("location:login.php");}
?>