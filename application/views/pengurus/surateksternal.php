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
		<th>Asal</th>
		<th>Jenis Surat</th>
		<th>Keterangan</th>
		<th>Download</th>
	</tr>
	<?php foreach($data as $dt){?>
	<tr>
		<td><?php echo $number?></td>
		<td><?php echo $dt['ASAL']?></td>
		<td><?php 
		if($dt['JENIS_SURAT']==1){
			echo "Surat Permintaan Kerjasama";
		}else if($dt['JENIS_SURAT']==2){
			echo "Surat Undangan";
		}else if($dt['JENIS_SURAT']==3){
			echo "Surat Peminjaman";
		}else if($dt['JENIS_SURAT']==4){
			echo "Surat Keramaian";
		}else if($dt['JENIS_SURAT']==5){
			echo "Surat Permohonan";
		}else if($dt['JENIS_SURAT']==6){
			echo "Surat Keterangan";
		}
		
		?></td>
		<td><?php echo $dt['KETERANGAN']?></a></td>
		<td><a href="<?php echo $dt['LINK']?>">Download</a></td>
	</tr>
	<?php 
	$number = $number +1;
	}?>
</table>

<form method="POST" action="<?php echo base_url()."pengurus"?>"><button>Back</button></form></br>

</body>
</html>