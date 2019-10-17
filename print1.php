
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>contoh</title>
<style type="text/css">body {width: 100%;} </style> 
<!-- <body OnLoad="window.print()" OnFocus="window.close()">  -->
	<script>
		window.print();
	</script>


</head>

<?php
include "../konmysqli.php";

$periode = $_POST["id_periode"];
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<body>

<h3><center>Laporan Data Pendaftar:</h3>
 

<table width="90%" border="0">
  <tr>
   
<!--     <th width="10%"><center>id pendaftar</td> -->
    <th width="2%"><center>No</th>
    <th width="10%"><center>Periode</th>
    <th width="15%"><center>Data Pendaftar</th>
    <th width="15%"><center>Data Keluarga</th>


<!--    	<th width="5%"><center>upload khs</td>
   	<th width="5%"><center>upload kk</td>
   	<th width="5%"><center>upload prestasi</td>
   	<th width="5%"><center>username</td>
   	<th width="5%"><center>password</td> -->
   			
  </tr>
<?php  
  $sql=" SELECT a.*, b.nama_periode FROM tbl_pendaftar a
INNER JOIN tbl_periode b ON a.id_periode = b.id_periode where a.id_periode = '$periode' order by a.id_pendaftar desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				// $id_pendaftar=$d["id_pendaftar"];
				$id_pendaftar=$d["id_pendaftar"];
				$nama_pendaftar=($d["nama_pendaftar"]);
				$tempat_lahir=$d["tempat_lahir"];
				$tgl_lahir=$d["tgl_lahir"];
				$alamat=$d["alamat"];
				$no_tlpa=$d["no_tlpa"];
				$no_tlpo=$d["no_tlpo"];
				$id_jabatan=$d["id_jabatan"];
        		$id_periode=$d["id_periode"];
				$nama_periode=$d["nama_periode"];
				$nama_ortu=$d["nama_ortu"];
				$ipk=$d["ipk"];
				$prestasi=$d["prestasi"];
				$organisasi=$d["organisasi"];
				$penghasilan=$d["penghasilan"];
				$jumlah_tanggungan=$d["jumlah_tanggungan"];
				$upload_khs=$d["upload_khs"];
				$upload_kk=$d["upload_kk"];
				$upload_prestasi=$d["upload_prestasi"];
				$username=$d["username"];
				$password=$d["password"];
				$nama_saudara=$d["nama_saudara"];
				$status=$d["status"];
				$tgl1=$d["tgl1"];
				$tgl2=$d["tgl2"];
				$tgl3=$d["tgl3"];
				$hasil=$d["hasil"];
				// $upload_khs=$d["upload_khs"];
				// $upload_kk=$d["upload_kk"];
				// $upload_prestasi=$d["upload_prestasi"];
				// $username=$d["username"];
				// $password=$d["password"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$nama_periode</td>		
				<td>

				<b>Nama :  $nama_pendaftar ($id_pendaftar) </b>
				<br><b>TTL</b> :</b> $tempat_lahir , $tgl_lahir
				<br><b>No Anak</b> : $no_tlpa
				<br><b>IPK</b> :$ipk
				<br><b>Prestasi</b>: $prestasi 
				<br><b>Organisasi yang Diikuti</b> : $organisasi
				
				
				</td>

			

				<td>
				<b>Orang Tua</b>: $nama_ortu 
				<br><b>Alamat</b> : </b> $alamat
				<br><b>No Orang Tua</b>: $no_tlpo
				<br><b>Penghasilan Orang Tua</b>: Rp $penghasilan
				<br><b>Jumlah Tanggungan</b>: $jumlah_tanggungan Orang
			
				<br><b>Detail Nama Keluarga</b> :
				$nama_saudara
				<br><b>Detail Status Keluarga</b> : 
				$status	
				<br><b>Detail Tanggal Lahir Keluarga</b> : 
				<br>$tgl1  
				| $tgl2   
				| $tgl3	 
				</td>

			

			
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$nama_periode</td>		
				<td>

				<b>Nama :  $nama_pendaftar ($id_pendaftar) </b>
				<br><b>TTL</b> :</b> $tempat_lahir , $tgl_lahir
				<br><b>No Anak</b> : $no_tlpa
				<br><b>IPK</b> :$ipk
				<br><b>Prestasi</b>: $prestasi 
				<br><b>Organisasi yang Diikuti</b> : $organisasi
				
				
				</td>

				

				<td>
				<b>Orang Tua</b>: $nama_ortu 
				<br><b>Alamat</b> : </b> $alamat
				<br><b>No Orang Tua</b>: $no_tlpo
				<br><b>Penghasilan Orang Tua</b>: Rp $penghasilan
				<br><b>Jumlah Tanggungan</b>: $jumlah_tanggungan Orang
			
				<br><b>Detail Nama Keluarga</b> :
				$nama_saudara
				<br><b>Detail Status Keluarga</b> : 
				$status	
				<br><b>Detail Tanggal Lahir Keluarga</b> : 
				<br>$tgl1  
				| $tgl2   
				| $tgl3	 
				</td>

				

			
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data Pendaftar belum tersedia...</blink></td></tr>";}
		
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
		
?>

</table>




</body>
</html>
