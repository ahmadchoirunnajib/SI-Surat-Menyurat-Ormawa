<!DOCTYPE html>
<html>
<head>
	<title>Bank Surat - Aplikasi Surat BEM FTIf</title>
	<!--<?php ?>-->
<?php $number = 1;?>
</head>
<body>

Daftar Template Surat :
<table border="1">
	<tr>
		<th>No</th>
		<th>Nama File</th>
		<th>Download</th>
	</tr>
	<?php foreach($bank as $bs){?>
	<tr>
		<td><?php echo $number?></td>
		<td><?php echo $bs['NAMA_FILE']?></td>
		<td><a href="<?php echo $bs['LINK']?>">Download</a></td>
	</tr>
	<?php 
	$number = $number +1;
	}?>
</table>

<form method="POST" action="<?php echo base_url()."pengurus"?>"><button>Back</button></form></br>

</body>
</html>