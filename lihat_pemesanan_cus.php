<?php
	
		include "conn.php" ;
include "config/tglindo.php";
		$batas =  10;
		$halaman = $_GET['halaman'];
		if(empty($halaman)){
			$posisi = 0;
			$halaman = 1;
		}else{
			$posisi = ($halaman - 1) * $batas;
		}
		
		
?>
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
.style4 {
	font-size: 16px;
	font-family: "Trebuchet MS";}
</style>


<table width="880"  border=1  class='table table-bordered table-striped'>
<tr>
<th bgcolor="#999999"><span class="style3">Kode Pemesanan</span></th>

<th bgcolor="#999999"><span class="style3">Nama Barang </span></th>


<th width="7%" bgcolor="#999999"><span class="style3">Jumlah</span></th>
<th width="13%" bgcolor="#999999"><span class="style3">Nama Pemesan</span></th>
<th width="10%" bgcolor="#999999"><span class="style3">Perusahaan</span></th>
<th width="13%" bgcolor="#999999"><span class="style3">Alamat Perusahaan</span></th>
<th width="11%" bgcolor="#999999"><span class="style3">Status</span></th>
<th width="12%" bgcolor="#999999"><span class="style3">Total Biaya</span></th>



<th width="14%" bgcolor="#999999"><span class="style3">Aksi</span></th>



</tr>

<?php
$sql = mysql_query("select * from pemesanan where nama='$_SESSION[namalengkap]' order by id_pemesanan desc limit $posisi, $batas ");
$no=1;
while($r = mysql_fetch_array($sql)){
if($r[aktif]==1){
$status="Online";
}else{
$status="Offline";
}
?>
<tr>


<td class='td' width='10%' ><span class="style3"><?echo"$r[kode_pemesanan]";?></span></td>
<td class='td' width='10%' ><span class="style3"><?echo"$r[barang]";?></span></td>


<td class='td'><span class="style3"><?echo$r[jml];?></span></td>
<td class='td'><span class="style3"><?echo$r[nama];?></span></td>
<td class='td'><span class="style3"><?echo$r[perusahaan];?></span></td>
<td class='td'><span class="style3"><?echo$r[alamat_perusahaan];?></span></td>
<td class='td'><span class="style3"><?echo$r[status];?></span></td>
<td class='td'><span class="style3"><?php echo  "Rp.".number_format($r['biaya']).",-" ?></span></td>


<td width='14%' align='center' class='td style3'>
<a  href='?module=konfirmasi_pemesanan_cus&id=<?echo$r[id_pemesanan];?>'>
<button class='btn btn-warning'>Detail</button></a></td></tr>
<?
$no++;
}
?>
</table>
<?php
echo "Halaman : ";
		
		$sqlhal = mysql_query("select * from pemesanan where status='Belum Konfirmasi'" );
		$sqldat = mysql_query("select * from pemesanan where status='Belum Konfirmasi'");
		$jmldata = mysql_num_rows($sqlhal);
		$jmldat = mysql_num_rows($sqldat);
		$jmlhal = ceil($jmldata/$batas);
		
		// Membuat First dan Previous
		if($halaman > 1){
			$previous = $halaman - 1;
			echo "<a href='$_SERVER[PHP_SELF]?halaman=1&module=lihat_pemesanan_cus' class=\"btn btn-primary edit\">&laquo; First</a>  
			     <a href='$_SERVER[PHP_SELF]?halaman=$previous&module=lihat_pemesanan_cus' class=\"btn btn-primary edit\">&lsaquo; Prev</a>";
		}else{
			echo "&laquo; First | &lsaquo; Prev | ";
		}
			
		//Menampilkan Angka Halaman
		/*for($i=1; $i<=$jmlhal;$i++){
			if($i != $halaman){
				echo " <a href='$_SERVER[PHP_SELF]?halaman=$i'>$i</a> | ";
			}else{
				echo " <b>$i</b> | ";
			}
		}*/
		$angka = ($halaman > 3 ? " ... " : " ");
		
		for($i=$halaman-2; $i<$halaman; $i++){
			if($i < 1)
				continue;
			$angka .= "<a href='$_SERVER[PHP_SELF]?halaman=$i&module=lihat_pemesanan_cus' class=\"btn btn-primary edit\">$i</a> ";
		}
		
		$angka .= " <b>$halaman</b> ";
		
		for($i = $halaman+1; $i<($halaman+3); $i++){
			if($i > $jmlhal)
				break;
			$angka .= "<a href='$_SERVER[PHP_SELF]?halaman=$i&module=lihat_pemesanan_cus' class=\"btn btn-primary edit\">$i</a> ";
		}
		
		$angka .= ($halaman+2 < $jmlhal ? " ... <a href='$_SERVER[PHP_SELF]?halaman=$jmlhal&module=lihat_pemesanan_cus' class=\"btn btn-primary edit\">$jmlhal</a> " : " ");
		
		echo "$angka";
		
		// Membuat Next dan Last
		if($halaman< $jmlhal){
			$next = $halaman + 1;
			echo "<a href='$_SERVER[PHP_SELF]?halaman=$next&module=lihat_pemesanan_cus' class=\"btn btn-primary edit\">Next &rsaquo;</a>  
			     <a href='$_SERVER[PHP_SELF]?halaman=$jmlhal&module=lihat_pemesanan_cus' class=\"btn btn-primary edit\">Last &raquo;</a>";
		}else{
			echo "Next &rsaquo; | Last &raquo; | ";
		}
		
	
		
	
?>
<?
if($_GET[module]=='lihat_pemesanan_cus' and $_GET[act]=='delete'){
$sql=mysql_query("delete from pemesanan where id_pemesanan='$_GET[id]'");
echo"<script>window.location.href='?module=lihat_pemesanan_cus'</script>";
}

?>