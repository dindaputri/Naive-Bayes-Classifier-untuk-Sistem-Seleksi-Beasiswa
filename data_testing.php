<?php
error_reporting(0);
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('user/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, keterangan=0'); } 
</script>

<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

	<link rel="stylesheet" href="js/jquery-ui.css">
  	<link rel="stylesheet" href="resources/demos/style.css">
	<script src="js/jquery-1.12.4.js"></script>
  	<script src="js/jquery-ui.js"></script>
	  <script>
	  $( function() {
	    $( "#accordion" ).accordion({
	      collapsible: true
	    });
	  } );
	  </script>

<?php
if($_GET["pro"]=="ubah"){
	$id_datatesting=$_GET["kode"];
	$sql="select * from `$tbdatatesting` where `id_datatesting`='$id_datatesting'";
	$d=getField($conn,$sql);
				$id_datatesting0=$d["id_datatesting"];
				$ipk=$d["ipk"];
				$prestasi=$d["prestasi"];
				$penghasilan=$d["penghasilan"];
				$jumlah_tanggungan=$d["jumlah_tanggungan"];
				$organisasi=$d["organisasi"];
				$penilaian=$d["penilaian"];
				$keterangan=$d["keterangan"];
				
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Testing</h3>
  <div> 

<form name="import_export_form" method="post" action="" enctype="multipart/form-data">
    <label>Select Excel File : </label><input type="file" name="excelfile"/><br>
    <input type="submit" name="form_submit2" class="btn btn-info" />
    </form>
<hr>
  
<!-- <form action="" method="post" enctype="multipart/form-data">
<table width="444">

<tr>
<td width="145" height="52"><label for="ipk">IPK</label><td width="30">:
<td width="194" colspan="2">
<input class="form-control" name="ipk" type="text" id="ipk" value="<?php echo $ipk;?>" size="30" /></td>
</tr>

<tr>
<td height="56" valign="top"><label for="prestasi">Prestasi</label><td valign="top">:<td colspan="2" valign="top">
<input  type="radio" name="prestasi" id="prestasi"  value="Layak" <?php if($prestasi=="Internasional"){echo"checked";}?>/>Tingkat Internasional <br>
<input  type="radio" name="prestasi" id="prestasi" value="Nasional" <?php if($prestasi=="Nasional"){echo"checked";}?>/>Tingkat Nasional <br>
<input  type="radio" name="prestasi" id="prestasi"  value="Kabupaten" <?php if($prestasi=="Propinsi"){echo"checked";}?>/>Tingkat Propinsi <br>

<input  type="radio" name="prestasi" id="prestasi" checked="checked"  value="Tidak Ada" <?php if($prestasi=="Tidak Ada"){echo"checked";}?>/>Tidak Ada



</td>
</tr>

<tr>
<td height="47"><label for="penghasilan">Penghasilan</label><td>:
<td><input class="form-control" name="penghasilan" type="text" id="penghasilan" value="<?php echo $penghasilan;?>" size="30" />
</td>
</tr>

<tr>
<td height="44"><label for="jumlah_tanggungan">Jumlah Tanggungan</label>
<td>:
<td colspan="2">
<input class="form-control" name="jumlah_tanggungan" type="text" id="jumlah_tanggungan" value="<?php echo $jumlah_tanggungan;?>" size="15" /></td>
</tr>


<tr>
<td height="44"><label for="organisasi">Organisasi yang Diikuti</label>
<td>:
<td colspan="2">
<input class="form-control" name="organisasi" type="text" id="organisasi" value="<?php echo $organisasi;?>" size="15" /></td>
</tr>

<tr>
<td height="44"><label for="keterangan">Catatan</label>
<td>:<td colspan="2"><input class="form-control" name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="15" /></td></tr>


<?php
if($_GET["pro"]=="ubah"){
	?>
<tr>
<td height="43"><label for="penilaian">Hasil Penilaian</label>
<td>:<td colspan="2">
<input type="radio" name="penilaian" id="penilaian"  value="Layak" <?php if($penilaian=="Layak"){echo"checked";}?>/>Layak 
<input type="radio" name="penilaian" id="penilaian" value="Tidak Layak" <?php if($penilaian=="Tidak Layak"){echo"checked";}?>/>Tidak Layak
<input type="radio" name="penilaian" id="penilaian" checked="checked"  value="Cadangan" <?php if($penilaian=="Cadangan"){echo"checked";}?>/>Cadangan
</td></tr>

<?php
}
?>
<tr>
<td>
<td>
<td colspan="2">	<input class="btn btn-info" name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_datatesting0" type="hidden" id="id_datatesting0" value="<?php echo $id_datatesting0;?>" />
        <a href="?mnu=data_testing"><input class="btn btn-danger" name="Batal" type="button" id="Batal" value="Batal" /></a><br>
<!-- <input onClick="return confirm('Apakah Anda benar-benar akan Generate data latih #WARNING DATA LAMA AKAN DIHILANGKAN !')" class="btn btn-info" name="gen" type="submit" id="gen" value="Generate Data Latih" /> -->
<!-- </td></tr>
</table>
</form> --> 
</div>


<h3>Validasi Data Testing</h3>
  <div>
  
Data Testing <?php echo $penilaian;?>: 
<br><br>

<table width="809" class="table table-striped table-bordered table-hover" id="example2">
  	<thead>
  	<tr >
    <th width="5%"><center>No</th>
     <th width="10%"><center>IPK</th>
    <th width="15%"><center>Prestasi</th>
    <th width="15%"><center>Penghasilan</th>
    <th width="15%"><center>Jumlah Tanggungan</th>
	<th width="15%"><center>Organisasi</th>
	<th width="15%"><center>Target</th>
	<th width="15%"><center>Prediksi</th>
  	</tr>
  	</thead>
  	<tbody>
<?php  

$TP=0;
$TN=0;
$FP=0;
$FN=0;

$no=1;
  $sqlk="select * from `tbl_datatesting`  where `flag`='0' order by `penilaian` asc";
  $jumk=getJum($conn,$sqlk);
		if($jumk > 0){
	
	$arrk=getData($conn,$sqlk);
		foreach($arrk as $dk) {							
				$id_datatesting=$dk["id_datatesting"];
				$ipk=$dk["ipk"];
				$prestasi=$dk["prestasi"];
				$penghasilan=$dk["penghasilan"];
				$jumlah_tanggungan=$dk["jumlah_tanggungan"];
				$organisasi=$dk["organisasi"];
				$keterangan=$dk["keterangan"];
				$penilaian=$dk["penilaian"];
				
				$k1=$dk["n1"];
				$k2=$dk["n2"];
				$k3=$dk["n3"];
				$k4=$dk["n4"];
				$k5=$dk["n5"];
				
			//===========================


					$sql="select distinct(penilaian) from `tbl_datalatih`  order by `penilaian` asc";		
					$arr=getData($conn,$sql);
					$i=0;
						foreach($arr as $d) {						
								$penilaianx=$d["penilaian"];
								$ik[$i]=$penilaianx;
								$nhasil[$i]=$penilaianx;
								$i++;
						}
					
					$jumK1=getOut($conn,$ik[0]);
					$jumK2=getOut($conn,$ik[1]);
					
					$totK=$jumK1+$jumK2;

				$jumG1A=getKK($conn,'n1',$k1,$ik[0]);
				$jumG1B=getKK($conn,'n1',$k1,$ik[1]);

				$jumG2A=getKK($conn,'n2',$k2,$ik[0]);
				$jumG2B=getKK($conn,'n2',$k2,$ik[1]);

				$jumG3A=getKK($conn,'n3',$k3,$ik[0]);
				$jumG3B=getKK($conn,'n3',$k3,$ik[1]);

				$jumG4A=getKK($conn,'n4',$k4,$ik[0]);
				$jumG4B=getKK($conn,'n4',$k4,$ik[1]);

				$jumG5A=getKK($conn,'n5',$k5,$ik[0]);
				$jumG5B=getKK($conn,'n5',$k5,$ik[1]);


					
				$HA=($jumK1/$totK)*($jumG1A/$jumK1)*($jumG2A/$jumK1)*($jumG3A/$jumK1)*($jumG4A/$jumK1)*($jumG5A/$jumK1);
				$HB=($jumK2/$totK)*($jumG1B/$jumK2)*($jumG2B/$jumK2)*($jumG3B/$jumK2)*($jumG4B/$jumK2)*($jumG5B/$jumK2);

				$SHA="($jumK1/$totK) x ($jumG1A/$jumK1) x ($jumG2A/$jumK1) x ($jumG3A/$jumK1) x ($jumG4A/$jumK1) x ($jumG5A/$jumK1) ";
				$SHB="($jumK2/$totK) x ($jumG1B/$jumK2) x ($jumG2B/$jumK2) x ($jumG3B/$jumK2) x ($jumG4B/$jumK2) x ($jumG5B/$jumK2) ";



					$max=$HA;
					$smax=$SHA;
					$index=2;
				if($HA>=$HB  ){
					$max=$HA;
					$smax=$SHA;
					$index=0;
					}
				else if($HB>=$HA ){
					$max=$HB;
					$smax=$SHB;
					$index=1;
					}
				$nout=$nhasil[$index];
				$iout=$ik[$index];


$HA=$HA;// *10000;
$HB=$HB;// *10000;

// ini untuk confusion matrix
if($penilaian==$nout && $penilaian=="Layak"){$TP++;}
else if($penilaian!=$nout && $penilaian=="Layak"){$FP++;}

if($penilaian==$nout && $penilaian=="Tidak Layak"){$TN++;}
else if($penilaian!=$nout && $penilaian=="Tidak Layak"){$FN++;}

$rekapitulasi="$ik[0]=$SHA =$HA
				<br>
				$ik[1]=$SHB =$HB";
			//==========================	

 $sql="update `tbl_datatesting` set prediksi='$nout',rekapitulasi='$rekapitulasi' where `id_datatesting`='$id_datatesting'";

$up=process($conn,$sql);


echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td><label title='A$no'>$ipk</label></td>
				<td><label title='B$no'>$prestasi</label></td>
				<td><label title='C$no'>$penghasilan</label></td>
				<td><label title='D$no'>$jumlah_tanggungan</label></td>
				<td><label title='E$no'>$organisasi</label></td>
				<td><label title='F$no'>$penilaian</label></td>
				<td><label title='G$no'>$nout</label></td>
			
				</tr>";
	
	echo"<tr bgcolor='$color'>
				<td></td>
				<td colspan='7'>
					<b>IPK</b> $v1 ($k1) x <b>Prestasi</b> $v2 ($k2) x <b>Penghasilan</b> $v3 ($k3) x <b>Jumlah Tanggungan</b> $v4 ($k4) x <b>Organisasi</b> $v5 ($k5)<br>
					$rekapitulasi
					</td>
			
				</tr>";


			$no++;
			}
		}//if
		else{echo"<tr><td colspan='8'><blink>Maaf, Data Testing belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>






<?php
if( $jumk>0){
	echo"<center><b>The Confusion Matrix(Rumus Akurasi)</b></center>";

	echo"<table border='1' class='table table-striped table-bordered table-hover' width='30%'>";
	echo"<tr><td><td><td>TP<td>TN<td>";
	// echo"<tr><td><td><td>True<td>False<td>";

	echo"<tr><td><td><td>$TP<td>$TN<td>";
	echo"<tr><td>FP<td>FN<td>$FP<td>$FN<td>";

	echo"</table>";

	$hasil=(($TP+$TN)/($TP+$TN+$FP+$FN)) *100;
	$shasil="(($TP+$TN)/($TP+$TN+$FP+$FN)) *100";


	echo "<center><h1>Akurasi : $shasil =$hasil%</h1></center>";
	// echo"<center><b><a href='?mnu=data_testing&pro=simpan'>SIMPAN</a></b></center>";
	// echo "<img src='../images/cm.png'>";
	// echo "<br>";
	// echo "TP adalah True Positive, yaitu jumlah data positif yang terklasifikasi dengan benar oleh sistem";
	// echo "<br>";
	// echo "TN adalah True Negative, yaitu jumlah data negatif yang terklasifikasi dengan benar oleh sistem";
	// echo "<br>";
	// echo "FN adalah False Negative, yaitu jumlah data negatif namun terklasifikasi salah oleh sistem";
	// echo "<br>";
	// echo "FP adalah False Positive, yaitu jumlah data positif namun terklasifikasi salah oleh sistem";
	//echo"<a href='?mnu=data_testing&pro=reset'>RESET</a>";
}
?>

<?php

if($_GET["pro"]=="simpan"){
	$sql="update  `tbl_datatesting`  set `flag`='1'";
	$up=process($conn,$sql);
	echo"<script>alert('Data Testing sukses disimpan...');document.location.href='?mnu=data_testing';</script>";
}

if($_GET["pro"]=="reset"){
	$sql="delete from `tbl_datatesting` where  `flag`='0'";
	$up=process($conn,$sql);
	echo"<script>alert('Data Testing sukses direset...');document.location.href='?mnu=data_testing';</script>";
}


 if(isset($_POST['form_submit2'])){
		require_once 'Excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$filename = $_FILES['excelfile']['tmp_name'];
		$nf = $_FILES['excelfile']['name'];
	
	$simpan=process($conn,"truncate `tbl_datatesting` ");

	$data->read($filename);//'Book1.xls');
$n=0;

	for($x =2; $x <=count ($data->sheets[0]["cells"]); $x++){
		$ipk = $data->sheets[0]["cells"][$x][2];
		$prestasi = $data->sheets[0]["cells"][$x][3];
		$penghasilan = $data->sheets[0]["cells"][$x][4];
		$jumlah_tanggungan = $data->sheets[0]["cells"][$x][5];
		$organisasi = $data->sheets[0]["cells"][$x][6];
		$penilaian = $data->sheets[0]["cells"][$x][7];
		//ipk penghasilan jumlah_tanggungan prestasi organisasi
	$v1=getV1($ipk); 
	$v2=getV2($prestasi);
	$v3=getV3($penghasilan);
	$v4=getV4($jumlah_tanggungan);
	$v5=getV5($organisasi);
	
	$n++;
 $sql=" INSERT INTO `tbl_datatesting` (
`id_datatesting` ,`n1` ,`n2` ,`n3` ,`n4` ,`n5` ,
`ipk` ,
`prestasi` ,
`penghasilan` ,
`jumlah_tanggungan` ,
`organisasi` ,
`keterangan` ,
`penilaian` 

) VALUES (
'','$v1', '$v2', '$v3', '$v4', '$v5',  
'$ipk', 
'$prestasi',
'$penghasilan',
'$jumlah_tanggungan',
'$organisasi',
'$nf',
'$penilaian'
)";
	process($conn,$sql);	
		
}
echo "<script>alert('Import data testing $loop berhasil !');document.location.href='?mnu=data_testing';</script>";
}

?>
