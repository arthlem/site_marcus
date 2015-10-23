<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
	$modif="1";
 
	$email=$_POST['email'];
	$mdp=$_POST['mdp'];
	$nomprenom=$_POST['nomprenom'];
	
	
		mysql_query("UPDATE marcus_membres SET email='$email' WHERE id=$modif");
		mysql_query("UPDATE marcus_membres SET mdp='$mdp' WHERE id=$modif");
		mysql_query("UPDATE marcus_membres SET nomprenom='$nomprenom' WHERE id=$modif");
 
 ?>