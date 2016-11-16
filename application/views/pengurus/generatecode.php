<!DOCTYPE html>
<html>
<head>
	<title>Generate Number - Aplikasi Surat BEM FTIf</title>
	<!--<?php ?>-->
</head>
<body>
<form method="POST" action="<?php echo base_url()."Pengurus/generatenumber"?>">
	Program Kerja :
	<select name="program_kerja">
		<option value="" disabled="" selected="">Pilih salah satu</option>
		<?php foreach($proker as $pk){ ?>
		/<option value="<?php echo $pk['ID_PROKER']; ?>"><?php echo $pk['NAMA']; ?></option>
		<?php } ?>
	</select>
	</br>
	</br>
	Jenis Surat :
	<select name="jenis_surat">
		<option value="" disabled="" selected="">Pilih salah satu</option>
		<?php foreach($jenissurat as $js){ ?>
		<option value="<?php echo $js['ID_JENIS']; ?>"><?php echo $js['NAMA']; ?></option>
		<?php } ?>
	</select>
	</br>
	</br>
	Keterangan : <input type="text" name="keterangan">
	</br>
	</br>
	<button type="submit" >Get Nomor Surat</button>
</form></br>
<form method="POST" action="<?php echo base_url()."pengurus"?>"><button>Back</button></form></br>
<form method="POST" action="<?php echo base_url()."pengurus/logout"?>"><button>Logout</button></form>
</body>
</html>
