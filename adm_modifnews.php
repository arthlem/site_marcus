<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
	$modif="1";
 
	$titre=$_POST['titre'];
	$desc=$_POST['editor1'];
	
	
		mysql_query("UPDATE marcus_config SET titrenews='$titre' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET descnews='$desc' WHERE id=$modif");
 
 ?>