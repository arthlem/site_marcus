<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
	$faqid = $_GET['id'];
	
	
		mysql_query("DELETE FROM marcus_page WHERE id = $faqid");
		
 
 ?>