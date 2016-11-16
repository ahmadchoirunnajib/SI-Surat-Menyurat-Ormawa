<!DOCTYPE html>
<html>
<head>
	<title>Pengurus - Aplikasi Surat BEM FTIf</title>
	<!--<?php ?>-->
</head>
<body>

Daftar Menu Pengurus :<br>
<form action="<?php echo base_url()."pengurus/generatenumber"; ?>" method="POST">
<button type="submit">Generate Nomor Surat</button><br></form>

<form action="#" method="POST">
<button type="submit">Upload Surat</button><br></form>

<form action="<?php echo base_url()."pengurus/banksurat"; ?>" method="POST">
<button type="submit">Bank & Template Surat</button><br></form>

<form action="<?php echo base_url()."pengurus/surateksternal"; ?>" method="POST">
<button type="submit">Daftar Surat Eksternal</button><br><br></form>

<form action="<?php echo base_url()."pengurus/logout"; ?>" method="POST">
<button type="submit">Logout</button><br></form>

</body>
</html>