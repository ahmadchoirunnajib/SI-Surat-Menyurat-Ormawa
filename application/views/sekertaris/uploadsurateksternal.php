<!DOCTYPE html>
<html>
<head>
	<title>Upload Surat Eksternal - Aplikasi Surat BEM FTIf</title>
	<!--<?php ?>-->
</head>
<body>
	<form method="POST" action="<?php echo base_url().'pengurus/uploadsurateksternal' ?>" enctype="multipart/form-data">
	Upload surat dari Eksternal
	<br>
	<br>
	Departemen : <select name="departemen">
		<option value="" disabled="" selected="">Pilih salah satu</option>
		<?php foreach($departemen as $dp){ ?>
		<option value="<?php echo $dp['ID_DEPARTEMEN']; ?>"><?php echo $dp['NAMA']; ?></option>
		<?php } ?>
	</select>
	<br>
	<br>
	File : <input type="file" name="berkas">
	<br>
	<br>
	ID_DEPARTEMEN : <input type="text" name="ID_DEPARTEMEN">
	<br>
	<br>
	Keterangan : <textarea name="keterangan"></textarea>
	<br>
	<br>
	<button type="submit">Upload</button>
	</form>
	<br>
	<form method="POST" action="<?php echo base_url()."pengurus"?>"><button>Back</button></form>
</body>
</html>