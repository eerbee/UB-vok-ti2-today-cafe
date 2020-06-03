<?php
	include 'Connection.php';
		$id_menu=$_GET['id'];
		$nama=$_GET['nama'];
		$kategori=$_GET['kategori'];
		$harga=$_GET['harga'];
	
	$sqlUpdate = "UPDATE menu SET id_menu = '".$id_menu."', nama_menu = '".$nama."',
				 kategori = '".$kategori."', harga = '".$harga."' WHERE id_menu = '".$id_menu."' ";
	
	$Procces_update = $conn->query($sqlUpdate);
	if ($Procces_update) 
	{
		echo'<script type = "text/javascript">';
		echo 'window.location="menu.php"';
		echo '</script>';
	}
	else
	{
		echo "Data Tidak Berhasil di Edit";
		var_dump($sqlUpdate);
	}
	
	?>