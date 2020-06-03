<?php
	include 'Connection.php';
	
	$id_menu=$_GET['id_menu'];
	$Query_delete="DELETE FROM menu WHERE id_menu='".$id_menu."'";
	$Procces_Delete=$conn->query($Query_delete);
	
	if ($Procces_Delete) 
	{
		echo'<script type = "text/javascript">';
		echo 'window.location="menu.php"';
		echo '</script>';
	}
	else
	{
		echo "Data Delete Failed";
	}
?>