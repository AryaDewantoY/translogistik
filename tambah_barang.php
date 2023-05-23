<?php
$KodeCust = $_REQUEST['id'];
$queryPelanggan = mysql_query("select * from pemesanan where id_pemesanan = '$KodeCust'");
$tampilPelanggan = mysql_fetch_array($queryPelanggan);
//buat kode otomatis
	$query_oto = mysql_query("select max(kode_pemesanan) as maksi from pemesanan");
	$data_oto = mysql_fetch_array($query_oto);
	$data_potong = substr($data_oto['maksi'],3,5);
	$data_potong++;
	$kode="";
	for ($i=strlen($data_potong); $i<=2; $i++)
		$kode = $kode."0";
	   $data['kode_pemesanan'] = "P$kode$data_potong";
?>
<?php

$edit=mysql_query("SELECT * FROM rb_login where nama_lengkap='$_SESSION[namalengkap]' ");
    $r=mysql_fetch_array($edit);

?>
<form class='form-horizontal' action='input_barang.php' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	  <fieldset>
		<div class='alert alert-alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Silahkan Mengisi Data pada Form di bawah ini dengan baik dan benar.
		</div><br/>
		 <div class='control-group'>
	      <label class='control-label' for='input01'>Kode Pemesanan </label>
	      <div class='controls'>
	        <input type='text' data-field="x_username" id="x_username" name='kode' class='required' placeholder="Kode Pemesanan" value="<?php echo $data['kode_pemesanan']; ?>">      
	      </div>
	</div>
	    <div class='control-group'>
	      <label class='control-label' for='input01'>Nama Barang </label>
	      <div class='controls'>
	        <input type='text' data-field="x_username" id="x_username" name='barang' class='required' placeholder="Nama Barang">      
	      </div>
	</div>
	
	 <div class='control-group'>
		<label class='control-label' for='input01'>Jumlah Pemesanan</label>
		<div class='controls'>
	        <input type='text' data-field="x_password" id="x_password" name='jml' class='required' placeholder="Jumlah Pemesanan"> 
	        <br /> <span id='error1'></span>            
       </div>
	</div>
	
	<div class='control-group'>
		
		<label class='control-label' for='input01'>Nama Pemesan</label>
		<div class='controls'>
	       <input type="text" name="nama" value="<?php echo "$r[nama_lengkap]";?>" size="15">   
      </div>
	</div>
	
	 <div class='control-group'>
		<label class='control-label' for='input01'>Perusahaan </label>
		<div class='controls'>
	         <input type="text" name="perusahaan" value="<?php echo "$r[perusahaan]";?>" size="15">  
       </div>

	</div>
	 <div class='control-group'>
		<label class='control-label' for='input01'>Alamat</label>
		<div class='controls'>
	       <textarea name="alamat" cols="" rows=""><?php echo "$r[alamat]";?></textarea> 
       </div>

	</div>
	 <div class='control-group'>
		<label class='control-label' for='input01'>Keterangan </label>
		<div class='controls'>
	         <textarea name="ket" cols="" rows="" placeholder="Keterangan"></textarea>  
       </div>

	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button type='submit' class='btn btn-success' rel='tooltip' title='first tooltip'>Simpan</button>
	       
	      </div>
	
	</div> 
</fieldset>
	</form>