<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
 
	$titre=$_POST['titre'];
	$numero=$_POST['numero'];
	$contenu=$_POST['editor1'];
	
	
		mysql_query("INSERT INTO marcus_page VALUES ('', '$titre', '$contenu', '$numero')");
 
 ?>