<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php?cat=101");	
 session_start();
 
	$photoid = $_POST['id'];
	$src=$_POST['src'];
	
		mysql_query("DELETE FROM marcus_imagesbiens WHERE id = $photoid");
		unlink ($src);
 ?>