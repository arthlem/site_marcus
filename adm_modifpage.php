<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
	$idmodif = $_GET['id'];
 
	$titre=$_POST['titre'];
	$numero=$_POST['numero'];
	$contenu=$_POST['editor1'];
	
	
		mysql_query("UPDATE marcus_page SET titre='$titre' WHERE id=$idmodif");
		mysql_query("UPDATE marcus_page SET contenu='$contenu' WHERE id=$idmodif");
		mysql_query("UPDATE marcus_page SET numero='$numero' WHERE id=$idmodif");
 
 ?>