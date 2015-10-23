<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
	$idmodif = $_GET['id'];
 
	$numero=$_POST['numero'];
	$titre=$_POST['titre'];
	$description=$_POST['editor1'];
	
	
		mysql_query("UPDATE marcus_faq SET numero='$numero' WHERE id=$idmodif");
		mysql_query("UPDATE marcus_faq SET titre='$titre' WHERE id=$idmodif");
		mysql_query("UPDATE marcus_faq SET description='$description' WHERE id=$idmodif");
 
 ?>