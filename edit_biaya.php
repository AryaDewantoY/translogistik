<?php
include "conn.php";
$edit=mysql_query("SELECT * FROM pemesanan where id_pemesanan='$_GET[id]'");
    $r=mysql_fetch_array($edit);
echo "<h4>Konfrimasi Biaya</h4>
	<hr><br>
          <form method=POST action=./aksi.php?module=biaya&act=update>
          <input type=hidden name=id value='$r[id_pemesanan]'>
          <table class='table table-bordered table-striped'>
          <tr><td>Kode Pemesanan</td><td> : <input type=text name='kode' value='$r[kode_pemesanan]' size=15 readonly></td></tr>
<tr><td>Nama Barang </td><td> : <input type=text name='barang' value='$r[barang]' size=15 readonly></td></tr>

<tr><td>  Jumlah</td><td> : <input type=text name='jml' value='$r[jml]' size=15 readonly></td></tr>
<tr><td> Nama Pemesanan </td><td> : <input type=text name='nama' value='$r[nama]' size=15 readonly></td></tr>
<tr><td>  Nama Perusahaan</td><td> : <input type=text name='perusahaan' value='$r[perusahaan]' size=15 readonly></td></tr>
<tr><td>  Keterangan</td><td> : <textarea name='keterangan' cols='' rows='' readonly>$r[keterangan]</textarea></td></tr>
<tr><td>  Biaya</td><td> : <input type=text name='biaya'  size=15 ></td></tr>

		  	  		  
		  
          <tr><td colspan=2><input type=submit value=Konfirmasi Biaya class='btn btn-primary'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'></td></tr>
          </table></form>";
		  ?>