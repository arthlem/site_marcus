<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
	$modif="1";
 
	$titre=$_POST['titre'];
	$soustitre=$_POST['soustitre'];
	$nomprenom=$_POST['nomprenom'];
	$email=$_POST['email'];
	$telephone=$_POST['telephone'];
	$copyright=$_POST['copyright'];
	$description=$_POST['description'];
	$keywords=$_POST['keywords'];
	$abstract=$_POST['abstract'];
	
	
		mysql_query("UPDATE marcus_config SET titre='$titre' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET soustitre='$soustitre' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET email='$email' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET telephone='$telephone' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET copyright='$copyright' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET keywords='$keywords' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET description='$description' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET nomprenom='$nomprenom' WHERE id=$modif");
		mysql_query("UPDATE marcus_config SET abstract='$abstract' WHERE id=$modif");

 
 
 
 
 ?>