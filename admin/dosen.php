<?php 
require "session.php"; 
require "database.php";
//=====================================================================halaman
	$itemperpage=20;
	if (isset($_GET['h'])){
		$hal=$_GET['h'];
		$posisi=($hal-1)*$itemperpage;}
	else if (empty($_GET['h'])){
		$hal=1;
		$posisi=0;}
//=====================================================================halaman

if (isset($_GET['nama'])){
	$cari=$_GET['nama'];
	$query=mysql_query("SELECT * FROM dosen WHERE nama LIKE '%$cari%' LIMIT $posisi,$itemperpage");
	$jumlahdata=@mysql_num_rows(mysql_query("SELECT * FROM dosen WHERE nama LIKE '%$cari%'"));
	$link="nama=".$cari."&";}
else {
	$query=mysql_query("SELECT * FROM dosen ORDER BY nama asc LIMIT $posisi,$itemperpage");
	$jumlahdata=@mysql_num_rows(mysql_query("SELECT * FROM dosen"));}

//=====================================================================halaman
$jumlahhalaman=ceil($jumlahdata/$itemperpage);
//=====================================================================halaman	
?>
<html>
	 <?php require "head.php"; ?>
	<body>
	<div align="center">
	<div class="content">
		<?php require "atas.php"; ?>
		<div class="isi">
			<h1 class="judul">Data dosen 
			<?php if ($level==admin){ ?><a href="input-dsn.php">
			<img src="../icon/add.jpeg" height="30px" width="30px;"></a> <?php } ?>
			</h1>
	<form method="get" action="dosen.php">
	<input type="text" name="nama" value="Cari berdasarkan nama" 
	style=" border:1px solid #666666; color:#666666; padding-left:5px; padding-right:50px; 
	border-radius:5px; height:28px; width:250px;"
		onfocus="if(this.value==this.defaultValue)this.value='';" 
		onblur="if(this.value=='')this.value=this.defaultValue;" >
	<input type="submit" value="cari" style="position:relative; left:-52px;" >
	</form>
	<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th width="90">NIDN</th>
            <th width="90">NIP</th>
            <th >Nama</th>
            <th width="40">Status</th>
        </tr>
    </thead>
		<tbody>	
			<?php while ($baris=mysql_fetch_array($query)){
				echo "<tr><td>".$baris[1]."</td>";
				echo "<td>".$baris[2]."</td>";
				if ($level=='admin'){echo "<td> <a href='edit-dsn.php?idd=".$baris[0]."'>".$baris[3]." ".$baris[4]."</a></td>";}			
				else {echo "<td><a href='kinerjadosen.php?idd=".$baris[0]."'>".$baris[3]." ".$baris[4]."</a></td>";}
				echo "<td>".$baris[5]."</td></tr>";}
			?>
		</tbody>
	</table>
<?php
//=====================================================================halaman				
				echo "<div align='center' style='width:100%; float:inherit; margin-top:10px;'>";
				if ($hal<=3){
					$blockhal=1;}
					else if ($hal==$jumlahhalaman-1 && $jumlahhalaman>5){
					$blockhal=$hal-3;}
					else if ($hal==$jumlahhalaman && $jumlahhalaman>5){
					$blockhal=$hal-4;}
					else {
					$blockhal=$hal-2;}
					
					
				if ($jumlahhalaman<=3){
					$itemblok=$jumlahhalaman;}
					else if ($hal==$jumlahhalaman-1){
					$itemblok=$hal+1;}
					else if ($hal==$jumlahhalaman){
					$itemblok=$hal;}
					else if ($jumlahhalaman==4){
					$itemblok=4;}
					else if ($hal <=3 && $jumlahhalaman>4){
					$itemblok=5;}
					else{
					$itemblok=$hal+2;}
					
				echo "<div class='paging'>";
				
				if ($hal>3){
					echo "<a href='".$_SERVER['HTTP_SERVER']."/kinerja/admin/dosen.php?".$link."'>first</a>";}
					
				if ($jumlahhalaman>1){
					for ($i=$blockhal; $i<=$itemblok; $i++){
						echo "<a class='paging' href='".$_SERVER['HTTP_SERVER'].
						"/kinerja/admin/dosen.php?".$link."h=".$i."'>".$i."</a>";}
					}
						
				if ($jumlahhalaman>5 && $jumlahhalaman-2 > $hal){
					echo "<a href='".$_SERVER['HTTP_SERVER'].
					"/kinerja/admin/dosen.php?".$link."h=".$jumlahhalaman."'>last</a>";}
							
				echo "</div></div>";	
//=====================================================================halaman
?>
		</div>
		<?php require "footer.php"; ?>
	</div>
	</div>
	</body>
</html>