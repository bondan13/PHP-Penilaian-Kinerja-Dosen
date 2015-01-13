<?php
require 'database.php';
require "session.php";
if($status !='aktif'){header('location:index.php');}
$pilih=@mysql_num_rows(mysql_query ("Select kelas.id
					From belajar Inner Join kelas On belajar.id_kelas = kelas.id
					Where belajar.id_user = '$idm'"));
if ($pilih < 1){
$query=@mysql_query ("Select * From kelas WHERE semester = '$sms' ORDER BY waktu DESC, kelas DESC");
						?>
	 <div class="isi">
	 <h1 class="judul">Dimana saya belajar ?</h1><br>
			<form method="post" action="v-input.php">
			<table id="rounded-corner" >
   			<thead>
    		<tr>
        	<th width="40">Belajar</th>
            <th width="40">Semester</th>
            <th width="40">Waktu</th>
			<th >Ruangan</th>
       		</tr>
  			</thead>
			<tbody>				
			<?php
				while ($hasil=mysql_fetch_array($query)){
				echo "<tr><td><input type='radio' value='".$hasil[0]."' name='idk'></td>";
				echo "<td>".$hasil[3]."</td>";
				echo "<td>".$hasil[2]."</td>";
				echo "<td>".$hasil[1]."</td></tr>";
				$i++;}
				?>
			</tbody>
			</table>
			<input type="hidden" name="verifikasi" value="update-kls" >
			<input type="submit" value="Pilih" class="submit">
			</form>
		</div>
<?php } ?>