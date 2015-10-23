<?php 
include('header.php');
// include('slider.php');

?>

<div id="templatemo_content_panel_1">

	<div id="templatemo_news_section">
    	<h1>Dernière News</h1>
        <div class="templatemo_news_box">
        	<h3><?php echo $le_titrenews; ?></h3>
            <p><?php echo $le_descnews; ?></p>
      </div>
    </div><!-- end of news section -->
    
    <div id="templatemo_section_1_1">
    	<h1>Trouver une propriété</h1>
        <form method="post" action="recherche.php" id="recherche">
        	<div class="left_column">
			
                <div class="form_row"> <label>Un bien, à louer ou à acheter : </label>
				<select name="loueracheter"><option value="">Les deux</option><option value="A-louer">A louer</option><option value="A-vendre">A acheter</option></select>
				</div>
				
				<div class="form_row">
                    	<label>Prix Maximum : </label>
                        <select name="prix">
                            <option value="">Pas d'importance</option>
                            <option value="50000">$50 000</option>
                            <option value="100000">$100 000</option>
                            <option value="200000">$200 000</option>
                           	<option value="300000">$300 000</option>
                            <option value="500000">$500 000</option>
                            <option value="750000">$750 000</option>
                            <option value="1000000">$1 000 000</option>
                            <option value="5000000">$5 000 000</option>
                            <option value="10000000">$10 000 000</option>
                        </select>
                   </div>
				   
				   
                <div class="form_row"> <label>Type de bien : </label>
				<select name="type"><option value="">Toutes les catégories</option><option value="Terrains">Terrains</option><option value="Maisons">Maisons</option><option value="Maisons de luxe">Villas de rêves</option><option value="Condos">Condo / Appartements</option>
				<option value="Fincas">Fincas / Fermes</option><option value="Commerces">Commerces</option><option value="Locations">Locations saisonnières</option></select>
				</div>
				
                <div class="form_row"> <label>Localité : </label>
				<select name="localite"><option value="">Tous les secteurs</option><option value="Environs-de-Tamarindo">Environs de Tamarindo </option><option value="Nord-du-Guanacaste">Nord du Guanacaste</option>
				<option value="Sud-du-Guanacaste">Sud du Guanacaste</option></select>
				</div>
				
				</div>   
				   
            <div class="right_column">
	                
               	<div class="form_row"> <label>Chambres minimum : </label>
                	<select name="chambre">
                    	<option value="">Pas d'importance</option>
                        <option value="1">1 Chambre</option>
                        <option value="2">2 Chambres</option>
                        <option value="3">3 Chambres</option>
                        <option value="4">4 Chambres</option>
                        <option value="5">5 Chambres</option>
                        <option value="10">10 Chambres</option>
                        <option value="15">15 Chambres</option>
                        <option value="20">20 Chambres et plus</option>
                    </select>
                </div><br/><br/>
                
                <div class="form_row"> 
                	<input type="submit" value="Chercher" name="submit" class="submit_btn_02" />
                </div>
            </div>
            
        </form>
    </div><!-- end of section 1 -->
    <div class="cleaner_with_height">&nbsp;</div>
</div>

<div id="templatemo_content_panel_2">
<center><h1>Résultat de votre recherche :</h1></center>

<?php 
				extract($_POST);
                $i = 0;
           			$loueracheter = $_POST['loueracheter'];
						$chaineloueracheter = str_replace("-", " ",$loueracheter);
					$prix = $_POST['prix'];
						$chaineprix = str_replace("-", "",$prix);
					$type = $_POST['type'];
						$chainetype = str_replace("-", " ",$type);
					$localite = $_POST['localite'];
						$chainelocalite = str_replace("-", " ",$localite);
					$chambre = $_POST['chambre'];
					
                // si la variable est présente, on lui affecte une place dans le tableau 'choix[]', qui nous servira ensuite à construire le WHERE de la requête.
                 if(!empty($loueracheter)) { $choix[$i++] = "etatbien = '$chaineloueracheter'"; }
                 if(!empty($prix)) { $choix[$i++] = "prix <= $chaineprix"; }
                 if(!empty($type)) { $choix[$i++] = "categorie = '$chainetype'"; }
                 if(!empty($localite)) { $choix[$i++] = "region = '$chainelocalite'"; }
                 if(!empty($chambre)) { $choix[$i++] = "chambreacoucher >= $chambre"; }
				 
 
                // on insère les éléments remplis dans une variable $critere, en commençant par la première occurrence, puis on boucle
                 $critere = $choix[0]." ";
 
                for($j=1;$j<$i;$j++)
                {
                         $critere .= " AND ".$choix[$j]." ";
                 }
 
                // enfin on fait la requête si $i >0, ça veut dire qu'il y a des critères
                 if($i > 0)
                {
                         // requete de selection
                         $lesbiens = mysql_query("SELECT * FROM marcus_biens WHERE $critere ORDER BY id DESC") or die(mysql_error());
                 }
 
                // si $i = 0, alors l'utilisateur n'a pas saisi de critère, là soit on fait la même requete mais sans "WHERE $critere", soit on lui demande de saisir au moins un critère.
                 else
                {
                         $lesbiens = mysql_query( "SELECT * FROM marcus_biens ORDER BY id DESC") or die(mysql_error());
                 }

		
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
		
        <div class="readmore"><a href="biensolo.php?id=<?php echo $le_id; ?>">Voir le bien</a></div>                       
    </div>
    
<?php
}
?>
    <div class="cleaner_with_height">&nbsp;</div>
</div> <!-- end of content panel 2 -->

<?php 

// include('3biens.php'); 
include('footer.php'); 

?>

