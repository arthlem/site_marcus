<div id="templatemo_content_panel_2">


<?php 

		// Chargement de la Configuration ...
		$lesbiens =	mysql_query("SELECT * FROM marcus_biens WHERE flash='oui' ORDER BY id DESC LIMIT 12");
		
	while($lebien = mysql_fetch_array($lesbiens))
	{
		$le_id=$lebien['id'];
		$le_titre=$lebien['titre'];
		$le_soustitre=$lebien['soustitre'];
		$le_description=$lebien['description'];
		$le_prix=$lebien['prix'];
		$le_nouveauprix=$lebien['nouveauprix'];
		$le_src=$lebien['src'];
		$le_flash=$lebien['flash'];
		$le_localite=$lebien['localite'];
	

?>


	<div class="templatemo_section_2">
        <a href="biensolo.php?id=<?php echo $le_id; ?>"><img src="<?php echo $le_src; ?>" alt="image" height="190px" width="270px" /></a>
        <h4><?php $longueur1 = 40;
		$letexte1 = substr($le_titre, 0, $longueur1);
		if (strlen($letexte1) >= 40){
		?>
		<font color="#ff6803"><?php echo $letexte1."...";?></font>
		<?php
		}else{
		?>
		<font color="#ff6803"><?php echo $letexte1;?></font>
		<?php
		}

		?></h4>

        <p>
		
		<?php 
		
		$longueur = 82;
		$letexte = substr($le_soustitre, 0, $longueur);
		
		if (strlen($letexte) >= 82){
		echo $letexte."..."; 
		}else{
		echo $letexte;
		}
		
		?></p>
        <div class="price">Prix:<span> <?php

	if ($le_nouveauprix == ''){
	echo '$'.$le_prix; 
	}else{
	?>
	<s><font color="grey"?>$<?php echo $le_prix; ?></font></s> <font color="red">Réduit à $<?php echo $le_nouveauprix; ?></font>
	<?php
	}
	?></span></div>  
		
        <b><center><?php echo $le_localite; ?></center></b><div class="readmore"><a href="biensolo.php?id=<?php echo $le_id; ?>">Voir le bien</a></div>                       
    </div>
    
<?php
}
?>
    <div class="cleaner_with_height">&nbsp;</div>
</div> <!-- end of content panel 2 -->