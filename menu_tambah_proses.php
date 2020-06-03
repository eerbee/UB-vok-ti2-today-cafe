<?php 
	include 'Connection.php';
	
	$id = $_GET['fid'];
	$nama = $_GET['fnama'];
	$kategori = $_GET['fkategori'];
	$harga = $_GET['fharga'];
	$sql = "INSERT INTO menu (
								id_menu, 
								nama_menu, 
								kategori, 
								harga
							 ) 
							 VALUES 
							 (
							 	'$id',
							 	'$nama',
							 	'$kategori',
							 	'$harga'
							 )";

	$Procces_insert = $conn->query($sql);
	if ($Procces_insert) 
	{
		echo'<script type = "text/javascript">';
		echo 'window.location="menu.php"';
		//echo $sql;
		echo '</script>';
	}else{
		echo "Data Tidak Berhasil Di Tambah";
		
		var_dump($sql);
	}
?>