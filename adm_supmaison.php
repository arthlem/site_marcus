<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php");	
 session_start();
 
$maisonid = $_GET['id'];
	
$modifphoto1 = mysql_query("SELECT * FROM marcus_imagesbiens WHERE numbien='$maisonid'");
while ($modifphotos1 = mysql_fetch_array($modifphoto1) ) 
{
$biensrc = $modifphotos1['src']; 
unlink ($biensrc);
}


		mysql_query("DELETE FROM marcus_biens WHERE id = $maisonid");
		mysql_query("DELETE FROM marcus_imagesbiens WHERE numbien = $maisonid");
		
		

 
 ?>