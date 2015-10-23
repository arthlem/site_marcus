<center><a href="connexion.php?upload=1&cat=100&agence=<?php echo $bienagence; ?>"><b>Pour ajouter des nouvelles photos, CLIQUEZ ICI</b></a></center><br>
<!--<h1>La photo de couverture est :</h1><br/><br/>
<?php

$modifphoto = mysql_query("SELECT * FROM marcus_biens WHERE agence='$numagence'");
while ($modifphotos = mysql_fetch_array($modifphoto) ) 
{
$bienid = $modifphotos['id']; 
$biensrc = $modifphotos['src']; 

?>
<img src="<?php echo $biensrc; ?>" height="100px" width="150px"><br/><br/><br/>
<div class="cleaner_with_height">&nbsp;</div>-->
<?php
}echo '<h1>Les photos du biens sont ci-dessous :</h1><br/><br/>';
?>
<div class="cleaner_with_height">&nbsp;</div>
<?php
$modifphoto1 = mysql_query("SELECT * FROM marcus_imagesbiens WHERE numbien='$bienid'");
while ($modifphotos1 = mysql_fetch_array($modifphoto1) ) 
{
$bienid = $modifphotos1['id']; 
$biensrc = $modifphotos1['src']; 
$bientitre = $modifphotos1['titre'];

?>
<form action="adm_supphoto.php" method="post">

<input type="HIDDEN" name="id" id="id" value="<?php echo $bienid; ?>">
<input type="HIDDEN" name="src" id="src" value="<?php echo $biensrc; ?>">
<img src="<?php echo $biensrc; ?>" title="<?php echo $bientitre; ?>" height="100px" width="150px"><br/><br/><br/>
<input type="submit" name="supprimer" value="SUPPRIMER LA PHOTO">

</form>
<div class="cleaner_with_height">&nbsp;</div>
<?php
}
?>