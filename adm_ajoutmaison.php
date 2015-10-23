<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php?cat=100");	
 session_start();
 
	$_SESSION['agence'] = $_POST['agence'];
	$titre=$_POST['titre'];
	$chainetitre = str_replace("'", "&#39;",$titre);
	$chainetitre1 = str_replace("-", "&#45;",$chainetitre);
	$soustitre=$_POST['soustitre'];
	$chainesoustitre = str_replace("'", "&#39;",$soustitre);
	$chainesoustitre1 = str_replace("-", "&#45;",$chainesoustitre);
	$description=$_POST['editor1'];
	$prix=$_POST['prix'];
	$nouveauprix=$_POST['nouveauprix'];
	$flash=$_POST['flash'];
	$agence=$_POST['agence'];
	$etatbien=$_POST['etatbien'];
	$categorie=$_POST['categorie'];
	$region=$_POST['region'];
	$localite=$_POST['localite'];
	$type=$_POST['type'];
	$municipalite=$_POST['municipalite'];
	$surface=$_POST['surface'];
	$transport=$_POST['transport'];
	$ecolegardienne=$_POST['ecolegardienne'];
	$ecoleprimaire=$_POST['ecoleprimaire'];
	$marcheplage=$_POST['marcheplage'];
	$prochecommerce=$_POST['prochecommerce'];
	$vuemer=$_POST['vuemer'];
	$vuevallee=$_POST['vuevallee'];
	
	$constructionantisismique=$_POST['constructionantisismique'];
	$anneeconstruction=$_POST['anneeconstruction'];
	$surfacehabitable=$_POST['surfacehabitable'];
	$chambreacoucher=$_POST['chambreacoucher'];
	$salledebains=$_POST['salledebains'];
	$ecolesecondaire=$_POST['ecolesecondaire'];
	$lignetelephonique=$_POST['lignetelephonique'];
	$sourceeau=$_POST['sourceeau'];
	$electricite=$_POST['electricite'];
	$raccordementtv=$_POST['raccordementtv'];
	$internet=$_POST['internet'];
	$piscine=$_POST['piscine'];
	$emplacementbbq=$_POST['emplacementbbq'];
	$airconditionne=$_POST['airconditionne'];
	$quartport=$_POST['quartport'];
	$abrijardinrancho=$_POST['abrijardinrancho'];
	$buanderie=$_POST['buanderie'];
	$terrasse=$_POST['terrasse'];
	$meuble=$_POST['meuble'];
	$chargemensuelles=$_POST['chargemensuelles'];
	$gardiensecurite=$_POST['gardiensecurite'];
	$accesroutepave=$_POST['accesroutepave'];
	$taxesannuelles=$_POST['taxesannuelles'];
	
	
		mysql_query("INSERT INTO marcus_biens VALUES ('', '$chainetitre1', '$chainesoustitre1', '$description', '$prix', '$nouveauprix', '', '$flash', '$agence', '$etatbien',
					'$categorie', '$region', '$localite', '$type', '$municipalite', '$surface', '$transport', '$ecolegardienne', '$ecoleprimaire', 
					'$marcheplage', '$prochecommerce', '$vuemer', '$constructionantisismique', '$anneeconstruction', '$surfacehabitable', '$chambreacoucher',
					'$salledebains', '$ecolesecondaire', '$lignetelephonique', '$sourceeau', '$electricite', '$raccordementtv', '$internet', '$piscine',
					'$emplacementbbq', '$airconditionne', '$quartport', '$abrijardinrancho', '$buanderie', '$terrasse', '$meuble', '$vuevallee', 
					'$chargemensuelles', '$gardiensecurite', '$accesroutepave', '$taxesannuelles')");
 
 ?>