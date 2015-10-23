<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
	$modif="1";
 
	$numero=$_POST['numero'];
	$titre=$_POST['titre'];
	$description=$_POST['editor1'];
	
	
		mysql_query("INSERT INTO marcus_faq VALUES ('', '$numero', '$titre', '$description')");
 
 ?>