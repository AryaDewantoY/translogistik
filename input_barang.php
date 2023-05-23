<?php
include "conn.php";
$page = $_GET[page];
$act = $_GET[act];
//if($page=='registrasi' and $act=='save')
//{
if(empty($_POST[nama]) 
or empty($_POST[kode])
or empty($_POST[alamat]) 
or empty($_POST[perusahaan]) 
or empty($_POST[jml]) 

 
){
 echo"<script>alert('Silahkan Lengkapi Data Anda Terlebih Dahulu !');window.location.href='media.php?module=tambah_barang'</script>";
}else{
$cek=mysql_query("select * from pemesanan where kode_pemesanan='$_POST[kode]'");
$jumlah=mysql_num_rows($cek);
if ($jumlah)
{
 echo"<script>alert('Maaf, data ini sudah terdaftar');window.location.href='media.php?module=lihat_dosen'</script>";
} else {
			
$kl=mysql_query("insert into pemesanan(kode_pemesanan,barang,jml,nama,perusahaan,alamat_perusahaan,keterangan,status,pengiriman)
 value('$_POST[kode]','$_POST[barang]','$_POST[jml]','$_POST[nama]','$_POST[perusahaan]','$_POST[alamat]','$_POST[ket]','Belum Konfirmasi','Belum di Proses')");
 
 
 echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=tambah_barang'</script>";


}
}
?>