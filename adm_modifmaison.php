<?php 
		// FRANCAIS
 include("config/conn.php"); 
 header("Location:connexion.php?cat=101");	
 session_start();
 
$iddelapage = $_GET['id'];


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
	
	
		mysql_query("UPDATE marcus_biens SET titre='$chainetitre1' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET soustitre='$chainesoustitre1' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET description='$description' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET prix='$prix' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET nouveauprix='$nouveauprix' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET flash='$flash' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET agence='$agence' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET etatbien='$etatbien' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET categorie='$categorie' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET region='$region' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET localite='$localite' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET type='$type' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET municipalite='$municipalite' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET surface='$surface' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET transport='$transport' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET ecolegardienne='$ecolegardienne' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET ecoleprimaire='$ecoleprimaire' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET marcheplage='$marcheplage' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET prochecommerce='$prochecommerce' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET vuemer='$vuemer' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET vuevallee='$vuevallee' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET antisismique='$constructionantisismique' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET anneeconstruction='$anneeconstruction' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET surfacehabitable='$surfacehabitable' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET chambreacoucher='$chambreacoucher' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET salledebains='$salledebains' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET ecolesecondaire='$ecolesecondaire' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET lignetelephonique='$lignetelephonique' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET sourceeau='$sourceeau' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET electricite='$electricite' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET raccordementtv='$raccordementtv' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET internet='$internet' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET piscine='$piscine' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET emplacementbbq='$emplacementbbq' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET airconditionne='$airconditionne' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET quartport='$quartport' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET abrijardinrancho='$abrijardinrancho' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET buanderie='$buanderie' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET terrasse='$terrasse' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET meuble='$meuble' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET chargemensuelles='$chargemensuelles' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET gardiensecurite='$gardiensecurite' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET accesroutepave='$accesroutepave' WHERE id='$iddelapage'");
		mysql_query("UPDATE marcus_biens SET taxesannuelles='$taxesannuelles' WHERE id='$iddelapage'");
 
 ?>