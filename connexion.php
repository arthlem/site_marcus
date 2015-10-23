<?php 
include('header.php');




	// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	
	$base = mysql_connect ('todaviawkg123.mysql.db', 'todaviawkg123', '9fU8fBmxvUzd');
	mysql_select_db ('todaviawkg123', $base);
	
	
	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM marcus_membres WHERE email="'.mysql_escape_string($_POST['login']).'" AND mdp="'.mysql_escape_string($_POST['pass']).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);


	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		
		echo '<meta http-equiv="refresh" content="0; url=connexion.php">';
		
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($sql[0] == 0) {
		$erreur_log = "Nom de Compte ou Mot de Passe incorrect.";
	}
	// sinon, alors la, il y a un gros problème 
	else {
		$erreur_log = "Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.";
	}
	}
	else {
		$erreur_log = "Au moins un des champs est vide.";
	}
}


?>

<div id="templatemo_content_panel_1">

	<div id="templatemo_news_section">
    	<h1>Dernière News</h1>
        <div class="templatemo_news_box">
        	<h3><?php echo $le_titrenews; ?></h3>
            <p><?php echo $le_descnews; ?></p>
      </div>
    </div><!-- end of news section -->
    
<?php
			if (!isset($_SESSION['login'])) 
			{
?>
    <div id="templatemo_section_1_2">
    	<h1>Connexion</h1>
        	  <!-- Affichage du message d'erreur -->
        <font color="red"><b><?php echo $erreur_log;?></b></font><br/>
		
<br/>
						<style>
form#connexion label { display:inline-block; width:100px; }
form#connexion input { display:inline-block; }
						</style>
		<form id="connexion" action="" method="post">
			
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">E-mail :</label> <input placeholder="Email" id="id1"style="text-align:center;" type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id2">Mot de passe :</label> <input placeholder="Mot de Passe" id="id2" style="text-align:center;" type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="connexion" value="Connexion"><br/>
			
		</form>
		
		
    </div><!-- end of section 1 -->
	
	
	<?php
}else{
session_start();

// Chargement des données utilisateur

$sess = $_SESSION['login'];
$membre = mysql_query("SELECT * FROM marcus_membres WHERE email='$sess'");


while ($membres = mysql_fetch_array($membre) ) 
{
$mnompreno = $membres['nomprenom']; 
}

?>



<div id="templatemo_section_1_2">
    	<h1>Bienvenue <?php echo $le_nomprenom; ?></h1>
        	  <!-- Affichage du message d'erreur -->
        
		
<br/>

<?php
$categorie = $_GET['cat'];
if ($categorie == 0){
?>
<center>
<a href="connexion.php?cat=1">Ajouter une maison</a><br/>
<a href="connexion.php?cat=2">Modifier une maison</a><br/>
<a href="connexion.php?cat=3">Supprimer une maison</a><br/>
<br/>
<a href="connexion.php?cat=4">Ajouter une FAQ</a><br/>
<a href="connexion.php?cat=5">Modifier une FAQ</a><br/>
<a href="connexion.php?cat=6">Supprimer une FAQ</a><br/>
<br/>
<a href="connexion.php?cat=7">Modifier la configuration du site</a><br/>
<br/>
<a href="connexion.php?cat=8">Modifier la news</a><br/>
<br/>
<!--<a href="connexion.php?cat=11">Ajouter une page</a> FINI<br/>-->
<a href="connexion.php?cat=9">Modifier une page</a><br/>
<!--<a href="connexion.php?cat=12">Supprimer une page</a> FINI<br/>-->
<br/>
<a href="connexion.php?cat=10">Modifier vos informations personnelles</a><br/>

<br/>
<center><a href="deconnexion.php"><input style="background-color:red;" type="submit" value="Déconnexion"></a></center>
</center>

<?php
}elseif ($categorie == 7){

		$marcus_config=mysql_query("SELECT * FROM marcus_config");
		while ($marcus_config1=mysql_fetch_array($marcus_config))
		{
?>

		
				<h2><center>Configuration du Site Web :</center></h2>
						<style>
form#configsite label { display:inline-block; width:100px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_modifconfig.php" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre du Site :</label> <input placeholder="Titre du Site" id="id1"style="text-align:center;" type="text" name="titre" size="58" value="<?php echo $marcus_config1[1]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Sous Titre du Site :</label> <input placeholder="Sous Titre du Site" id="id1"style="text-align:center;" type="text" name="soustitre" size="58" value="<?php echo $marcus_config1[7]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id2">Nom et Prénom :</label> <input placeholder="Nom / Prénom" id="id2" style="text-align:center;" type="text" name="nomprenom" size="58" value="<?php echo $marcus_config1[8]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id2">E-mail Admin :</label> <input placeholder="E-mail Admin" id="id2" style="text-align:center;" type="text" name="email" size="58" value="<?php echo $marcus_config1[2]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id2">Téléphone :</label> <input placeholder="Téléphone" id="id2" style="text-align:center;" type="text" name="telephone" size="58" value="<?php echo $marcus_config1[3]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id2">Copyright :</label> <input placeholder="Copyright" id="id2" style="text-align:center;" type="text" name="copyright" size="58" value="<?php echo $marcus_config1[4]; ?>"><br />
				
				<hr/>
				<h2><center>Référencement :</center></h2>
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Description du Site :</label> <textarea placeholder="Description du Site" id="id1"style="text-align:center;" type="text" name="description" cols="59" rows="10"><?php echo $marcus_config1[6]; ?></textarea><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id2">Mots Clés :</label> <input placeholder="Keywords" id="id2" style="text-align:center;" type="text" name="keywords" size="58" value="<?php echo $marcus_config1[5]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id2">Abstract :</label> <input placeholder="Abstract" id="id2" style="text-align:center;" type="text" name="abstract" size="58" value="<?php echo $marcus_config1[9]; ?>"><br />
				
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
<?php
}
}elseif ($categorie == 8){

		$marcus_config=mysql_query("SELECT * FROM marcus_config");
		while ($marcus_config1=mysql_fetch_array($marcus_config))
		{
		?>
		
		
		
		<h2><center>Configuration de la News :</center></h2>
						<style>
form#configsite label { display:inline-block; width:100px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_modifnews.php" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre News :</label> <input placeholder="Titre News" id="id1"style="text-align:center;" type="text" name="titre" size="58" value="<?php echo $marcus_config1[10]; ?>"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Description News :</label> <textarea id="id1" class="ckeditor" name="editor1"><?php echo $marcus_config1[11]; ?></textarea><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}
		}elseif ($categorie == 10){

		$marcus_config=mysql_query("SELECT * FROM marcus_membres");
		while ($marcus_config1=mysql_fetch_array($marcus_config))
		{
		?>
		
		
		
		<h2><center>Modification des Informations Personnelles :</center></h2>
						<style>
form#configsite label { display:inline-block; width:100px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_modifinfoperso.php" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Nom et Prénom :</label> <input placeholder="Nom et Prénom" id="id1"style="text-align:center;" type="text" name="nomprenom" size="58" value="<?php echo $marcus_config1[3]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">E-mail :</label> <input placeholder="E-mail" id="id1"style="text-align:center;" type="text" name="email" size="58" value="<?php echo $marcus_config1[1]; ?>"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Mot de Passe :</label> <input placeholder="Mot de Passe" id="id1"style="text-align:center;" type="text" name="mdp" size="58" value="<?php echo $marcus_config1[2]; ?>"><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}
		}elseif ($categorie == 4){

		?>
		
		
		
		<h2><center>Ajout d'une FAQ :</center></h2>
						<style>
form#configsite label { display:inline-block; width:100px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_ajoutfaq.php" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Numéro :</label> <input placeholder="Numéro" id="id1"style="text-align:center;" type="text" name="numero" size="58"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre :</label> <input placeholder="Titre" id="id1"style="text-align:center;" type="text" name="titre" size="58"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Description :</label> <textarea id="id1" class="ckeditor" name="editor1"></textarea><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 6){

		?>
		
		
		
		<h2><center>Suppression d'une FAQ :</center></h2>
		
		<?php
$supfaq = mysql_query("SELECT * FROM marcus_faq");


while ($supfaq1 = mysql_fetch_array($supfaq) ) 
{
$faqid = $supfaq1['id']; 
$faqtitre = $supfaq1['titre'];

		?>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="adm_supfaq.php?id=<?php echo $faqid; ?>"><font color="red"><b>SUPPRIMER</b></font></a> <?php echo $faqtitre; ?></br>
<?php
}
?>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 12){

		?>
		
		
		
		<h2><center>Suppression d'une Page :</center></h2>
		
		<?php
$suppage = mysql_query("SELECT * FROM marcus_page");


while ($suppage1 = mysql_fetch_array($suppage) ) 
{
$pageid = $suppage1['id']; 
$pagetitre = $suppage1['titre'];

		?>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="adm_suppage.php?id=<?php echo $pageid; ?>"><font color="red"><b>SUPPRIMER</b></font></a> <?php echo $pagetitre; ?></br>
<?php
}
?>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 3){

		?>
		
		
		
		<h2><center>Suppression d'une Maison :</center></h2>
		
		<?php
$supmaison = mysql_query("SELECT * FROM marcus_biens ORDER BY id DESC");


while ($supmaison1 = mysql_fetch_array($supmaison) ) 
{
$maisonid = $supmaison1['id']; 
$maisontitre = $supmaison1['titre'];

		?>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="adm_supmaison.php?id=<?php echo $maisonid; ?>"><font color="red"><b>SUPPRIMER</b></font></a> <?php echo $maisontitre; ?></br>
<?php
}
?>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 5){

		?>
		
		
		
		<h2><center>Modification d'une FAQ :</center></h2>
		
		<?php
$supfaq = mysql_query("SELECT * FROM marcus_faq");


while ($supfaq1 = mysql_fetch_array($supfaq) ) 
{
$faqid = $supfaq1['id']; 
$faqtitre = $supfaq1['titre'];

		?>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="connexion.php?cat=55&id=<?php echo $faqid; ?>"><font color="red"><b>MODIF</b></font></a> <?php echo $faqtitre; ?></br>
<?php
}
?>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 2){

		?>
		
		
		
		<h2><center>Modification d'un bien :</center></h2>
		
		<?php
$supfaq = mysql_query("SELECT * FROM marcus_biens ORDER BY id DESC");


while ($supfaq1 = mysql_fetch_array($supfaq) ) 
{
$bienid = $supfaq1['id']; 
$bientitre = $supfaq1['titre'];
$bienagence = $supfaq1['agence'];

		?>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="connexion.php?cat=22&id=<?php echo $bienid; ?>"><font color="red"><b>MODIF</b></font></a> -  <?php echo $bienagence; ?>  - <?php echo $bientitre; ?></br>
<?php
}
?>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 9){

		?>
		
		
		
		<h2><center>Modification d'une Page :</center></h2>
		
		<?php
$modifpage = mysql_query("SELECT * FROM marcus_page");


while ($modifpage1 = mysql_fetch_array($modifpage) ) 
{
$pageid = $modifpage1['id']; 
$pagetitre = $modifpage1['titre'];
$pagecontenu = $modifpage1['contenu'];

		?>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="connexion.php?cat=99&id=<?php echo $pageid; ?>"><font color="red"><b>MODIF</b></font></a> <?php echo $pagetitre; ?></br>
<?php
}
?>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 55){

		?>
		
		
		
		<h2><center>Modification d'une FAQ :</center></h2>
		
		<?php
$iddelafaq = $_GET['id'];

$modifaq = mysql_query("SELECT * FROM marcus_faq WHERE id='$iddelafaq'");

while ($modifaq1 = mysql_fetch_array($modifaq) ) 
{
$faqid = $modifaq1['id']; 
$faqnumero = $modifaq1['numero']; 
$faqtitre = $modifaq1['titre'];
$faqdesc = $modifaq1['description'];
}

		?>
				
						<style>
form#configsite label { display:inline-block; width:100px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_modifaq.php?id=<?php echo $faqid; ?>" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Numéro :</label> <input value="<?php echo $faqnumero; ?>" placeholder="Numéro" id="id1"style="text-align:center;" type="text" name="numero" size="58"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre :</label> <input value="<?php echo $faqtitre; ?>" placeholder="Titre" id="id1"style="text-align:center;" type="text" name="titre" size="58"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Description :</label> <textarea id="id1" class="ckeditor" name="editor1"><?php echo $faqdesc; ?></textarea><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 99){

		?>
		
		
		
		<h2><center>Modification d'une Page :</center></h2>
		
		<?php
$iddelapage = $_GET['id'];

$modifpage = mysql_query("SELECT * FROM marcus_page WHERE id='$iddelapage'");

while ($modifpage1 = mysql_fetch_array($modifpage) ) 
{
$pageid = $modifpage1['id']; 
$pagetitre = $modifpage1['titre']; 
$pagecontenu = $modifpage1['contenu'];
$pagenumero = $modifpage1['numero'];
}

		?>
				
						<style>
form#configsite label { display:inline-block; width:100px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_modifpage.php?id=<?php echo $pageid; ?>" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Numéro :</label> <input value="<?php echo $pagenumero; ?>" placeholder="Numéro" id="id1"style="text-align:center;" type="text" name="numero" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre :</label> <input value="<?php echo $pagetitre; ?>" placeholder="Titre" id="id1"style="text-align:center;" type="text" name="titre" size="58"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Contenu :</label> <textarea id="id1" class="ckeditor" name="editor1"><?php echo $pagecontenu; ?></textarea><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 22){

		?>
		
		
		
						<h2><center>Modification d'une Maison :</center></h2>
		
		<?php
$iddelapage = $_GET['id'];

$modifbien = mysql_query("SELECT * FROM marcus_biens WHERE id='$iddelapage'");

while ($modifbien1 = mysql_fetch_array($modifbien) ) 
{
$bienid = $modifbien1['id']; 
$bientitre = $modifbien1['titre']; 
$biensoustitre = $modifbien1['soustitre']; 
$bienagence = $modifbien1['agence']; 
$bienprix = $modifbien1['prix']; 
$biennouveauprix = $modifbien1['nouveauprix']; 
$biendescription = $modifbien1['description']; 
$bienflash = $modifbien1['flash']; 
$bienetatbien = $modifbien1['etatbien']; 
$biencategorie = $modifbien1['categorie']; 
$bienregion = $modifbien1['region']; 
$bienlocalite = $modifbien1['localite']; 
$bientype = $modifbien1['type']; 
$bienmunicipalite = $modifbien1['municipalite']; 
$biensurface = $modifbien1['surface']; 
$bientransport = $modifbien1['transport']; 
$bienecolegardienne = $modifbien1['ecolegardienne']; 
$bienecoleprimaire = $modifbien1['ecoleprimaire']; 
$bienecolesecondaire = $modifbien1['ecolesecondaire']; 
$bienmarcheplage = $modifbien1['marcheplage']; 
$bienprochecommerce = $modifbien1['prochecommerce']; 
$bienvuemer = $modifbien1['vuemer'];
$bienvuevallee = $modifbien1['vuevallee'];
$bienantisismique = $modifbien1['antisismique'];
$bienanneeconstruction = $modifbien1['anneeconstruction'];
$biensurfacehabitable = $modifbien1['surfacehabitable'];
$bienchambreacoucher = $modifbien1['chambreacoucher'];
$biensalledebains = $modifbien1['salledebains'];
$bienchargemensuelles = $modifbien1['chargemensuelles'];
$bientaxesannuelles = $modifbien1['taxesannuelles'];

$biengardiensecurite = $modifbien1['gardiensecurite'];
$bienlignetelephonique = $modifbien1['lignetelephonique'];
$biensourceeau = $modifbien1['sourceeau'];
$bienelectricite = $modifbien1['electricite'];
$bienaccesroutepave = $modifbien1['accesroutepave'];
$bienraccordementtv = $modifbien1['raccordementtv'];
$bieninternet = $modifbien1['internet'];
$bienpiscine = $modifbien1['piscine'];
$bienemplacementbbq = $modifbien1['emplacementbbq'];
$bienairconditionne = $modifbien1['airconditionne'];
$bienquartport = $modifbien1['quartport'];
$bienabrijardinrancho = $modifbien1['abrijardinrancho'];
$bienbuanderie = $modifbien1['buanderie'];
$bienterrasse = $modifbien1['terrasse'];
$bienmeuble = $modifbien1['meuble'];
}
		?>
				
						<style>
form#configsite label { display:inline-block; width:150px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_modifmaison.php?id=<?php echo $iddelapage;?>" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre :</label> <input value="<?php echo $bientitre;?>" placeholder="Titre" id="id1"style="text-align:center;" type="text" name="titre" size="50"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Sous Titre :</label> <input value="<?php echo $biensoustitre;?>" placeholder="Sous Titre" id="id1"style="text-align:center;" type="text" name="soustitre" size="50"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Agence :</label> <input value="<?php echo $bienagence;?>" placeholder="Agence" id="id1"style="text-align:center;" type="text" name="agence" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Prix :</label> <input value="<?php echo $bienprix;?>" placeholder="Prix" id="id1"style="text-align:center;" type="text" name="prix" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Nouveau Prix :</label> <input value="<?php echo $biennouveauprix;?>" placeholder="Nouveau Prix" id="id1"style="text-align:center;" type="text" name="nouveauprix" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Description :</label> <textarea id="id1" class="ckeditor" name="editor1"><?php echo $biendescription; ?></textarea><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Première page :</label> <select id="id1" name="flash"><?php if ($bienflash == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?></select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Etat de vente :</label> <select id="id1" name="etatbien"><?php if ($bienetatbien == 'A vendre'){echo '<option value="A vendre">A vendre</option><option value="Vendu">Vendu</option><option value="Loué">Loué</option><option value="A louer">A louer</option>';}elseif ($bienetatbien == 'Vendu'){echo '<option value="Vendu">Vendu</option><option value="A vendre">A vendre</option><option value="Loué">Loué</option><option value="A louer">A louer</option>';}elseif ($bienetatbien == 'Loué'){echo '<option value="Loué">Loué</option><option value="A vendre">A vendre</option><option value="Vendu">Vendu</option><option value="A louer">A louer</option>';}elseif ($bienetatbien == 'A louer'){echo '<option value="A louer">A louer</option><option value="A vendre">A vendre</option><option value="Vendu">Vendu</option><option value="Loué">Loué</option>';}?></select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Catégorie :</label> <select id="id1" name="categorie">
				
				<?php
if ($biencategorie == 'Terrains'){
echo '			<option value="Terrains">Terrains</option>
				<option value="Maisons">Maisons</option>
				<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Condos">Condominium / Appartements</option>
				<option value="Fincas">Fincas / Fermes</option>
				<option value="Commerces">Commerces</option>
				<option value="Locations">Locations</option>';
				
}elseif ($biencategorie == 'Maisons'){
echo '			<option value="Maisons">Maisons</option>
				<option value="Terrains">Terrains</option>
				<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Condos">Condominium / Appartements</option>
				<option value="Fincas">Fincas / Fermes</option>
				<option value="Commerces">Commerces</option>
				<option value="Locations">Locations</option>';
				
}elseif ($biencategorie == 'Maisons de luxe'){
echo '			<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Terrains">Terrains</option>
				<option value="Maisons">Maisons</option>
				<option value="Condos">Condominium / Appartements</option>
				<option value="Fincas">Fincas / Fermes</option>
				<option value="Commerces">Commerces</option>
				<option value="Locations">Locations</option>';
				
}elseif ($biencategorie == 'Condos'){
echo '			<option value="Condos">Condominium / Appartements</option>
				<option value="Terrains">Terrains</option>
				<option value="Maisons">Maisons</option>
				<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Fincas">Fincas / Fermes</option>
				<option value="Commerces">Commerces</option>
				<option value="Locations">Locations</option>';
				
}elseif ($biencategorie == 'Fincas'){
echo '			<option value="Fincas">Fincas / Fermes</option>
				<option value="Terrains">Terrains</option>
				<option value="Maisons">Maisons</option>
				<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Condos">Condominium / Appartements</option>
				<option value="Commerces">Commerces</option>
				<option value="Locations">Locations</option>';
				
}elseif ($biencategorie == 'Commerces'){
echo '			<option value="Commerces">Commerces</option>
				<option value="Terrains">Terrains</option>
				<option value="Maisons">Maisons</option>
				<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Condos">Condominium / Appartements</option>
				<option value="Fincas">Fincas / Fermes</option>
				<option value="Locations">Locations</option>';
				
}elseif ($biencategorie == 'Locations'){
echo '			<option value="Locations">Locations</option>
				<option value="Terrains">Terrains</option>
				<option value="Maisons">Maisons</option>
				<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Condos">Condominium / Appartements</option>
				<option value="Fincas">Fincas / Fermes</option>
				<option value="Commerces">Commerces</option>';
}?>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Région :</label> <select id="id1" name="region">
				<?php
if ($bienregion == 'Environs de Tamarindo'){
echo '			<option value="Environs de Tamarindo">Environs de Tamarindo</option>
				<option value="Nord du Guanacaste">Nord du Guanacaste</option>
				<option value="Sud du Guanacaste">Sud du Guanacaste</option>';
				
}elseif ($bienregion == 'Nord du Guanacaste'){
echo '			<option value="Nord du Guanacaste">Nord du Guanacaste</option>
				<option value="Environs de Tamarindo">Environs de Tamarindo</option>
				<option value="Sud du Guanacaste">Sud du Guanacaste</option>';
				
}elseif ($bienregion == 'Sud du Guanacaste'){
echo '			<option value="Sud du Guanacaste">Sud du Guanacaste</option>
				<option value="Environs de Tamarindo">Environs de Tamarindo</option>
				<option value="Nord du Guanacaste">Nord du Guanacaste</option>';
}?>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Localité :</label> <input value="<?php echo $bienlocalite; ?>" placeholder="Localité" id="id1"style="text-align:center;" type="text" name="localite" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Type du bien :</label> <input value="<?php echo $bientype; ?>" placeholder="Type du bien" id="id1"style="text-align:center;" type="text" name="type" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Municipalité :</label> <input value="<?php echo $bienmunicipalite; ?>" placeholder="Municipalité" id="id1"style="text-align:center;" type="text" name="municipalite" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Surface du terrain:</label> <input value="<?php echo $biensurface; ?>" placeholder="Surface" id="id1"style="text-align:center;" type="text" name="surface" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Transport en commun:</label> <input value="<?php echo $bientransport; ?>" placeholder="Transport" id="id1"style="text-align:center;" type="text" name="transport" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ecole Gardienne :</label> <input value="<?php echo $bienecolegardienne; ?>" placeholder="Ecole Gardienne" id="id1"style="text-align:center;" type="text" name="ecolegardienne" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ecole Primaire :</label> <input value="<?php echo $bienecoleprimaire; ?>" placeholder="Ecole Primaire" id="id1"style="text-align:center;" type="text" name="ecoleprimaire" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ecole secondaire :</label> <input value="<?php echo $bienecolesecondaire; ?>" placeholder="Ecole secondaire" id="id1"style="text-align:center;" type="text" name="ecolesecondaire" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Temps de marche Plage :</label> <input value="<?php echo $bienmarcheplage; ?>" placeholder="Temps de marche Plage" id="id1"style="text-align:center;" type="text" name="marcheplage" size="10"><br /><br />

				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Proche des Commerces :</label> <select id="id1" name="prochecommerce">
				<?php if ($bienprochecommerce == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Vue mer :</label> <select id="id1" name="vuemer">
				<?php if ($bienvuemer == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Vue Vallée :</label> <select id="id1" name="vuevallee">
				<?php if ($bienvuevallee == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Construction anti-sismique :</label> <select id="id1" name="constructionantisismique">
				<?php if ($bienantisismique == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Année de construction :</label> <input value="<?php echo $bienanneeconstruction; ?>" placeholder="Année de construction" id="id1"style="text-align:center;" type="text" name="anneeconstruction" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Surface Habitable :</label> <input value="<?php echo $biensurfacehabitable; ?>" placeholder="Surface Habitable" id="id1"style="text-align:center;" type="text" name="surfacehabitable" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Chambres à coucher :</label> <input value="<?php echo $bienchambreacoucher; ?>" placeholder="Chambres à coucher" id="id1"style="text-align:center;" type="text" name="chambreacoucher" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Salles de bains :</label> <input value="<?php echo $biensalledebains; ?>" placeholder="Salles de bains" id="id1"style="text-align:center;" type="text" name="salledebains" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Charges Mensuelles :</label> <input value="<?php echo $bienchargemensuelles; ?>" placeholder="Charges Mensuelles" id="id1"style="text-align:center;" type="text" name="chargemensuelles" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Taxes Annuelles :</label> <input value="<?php echo $bientaxesannuelles; ?>" placeholder="Taxes Annuelles" id="id1"style="text-align:center;" type="text" name="taxesannuelles" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Gardien de sécurité :</label> <select id="id1" name="gardiensecurite">
				<?php if ($biengardiensecurite == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ligne téléphonique :</label> <select id="id1" name="lignetelephonique">
				<?php if ($bienlignetelephonique == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Source d’eau :</label> <input value="<?php echo $biensourceeau; ?>" placeholder="Source d’eau" id="id1"style="text-align:center;" type="text" name="sourceeau" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Electricité :</label> <select id="id1" name="electricite">
				<?php if ($bienelectricite == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Accès route pavée :</label> <select id="id1" name="accesroutepave">
				<?php if ($bienaccesroutepave == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Raccordement TV :</label> <select id="id1" name="raccordementtv">
				<?php if ($bienraccordementtv == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Internet :</label> <select id="id1" name="internet">
				<?php if ($bieninternet == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Piscine :</label> <select id="id1" name="piscine">
				<?php if ($bienpiscine == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Emplacement Barbecue :</label> <select id="id1" name="emplacementbbq">
				<?php if ($bienemplacementbbq == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Air conditionné :</label> <select id="id1" name="airconditionne">
				<?php if ($bienairconditionne == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Quart port :</label> <select id="id1" name="quartport">
				<?php if ($bienquartport == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Abri de jardin / Rancho :</label> <select id="id1" name="abrijardinrancho">
				<?php if ($bienabrijardinrancho == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Buanderie :</label> <select id="id1" name="buanderie">
				<?php if ($bienbuanderie == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Terrasse :</label> <select id="id1" name="terrasse">
				<?php if ($bienterrasse == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Meublé :</label> <select id="id1" name="meuble">
				<?php if ($bienmeuble == 'Oui'){echo '<option value="Oui">Oui</option><option value="Non">Non</option>';}else{echo '<option value="Non">Non</option><option value="Oui">Oui</option>';}?>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 11){

		?>
		
		
		
		<h2><center>Ajout d'une Page :</center></h2>

				
						<style>
form#configsite label { display:inline-block; width:100px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_ajoutpage.php" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Numéro :</label> <input placeholder="Numéro" id="id1"style="text-align:center;" type="text" name="numero" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre :</label> <input placeholder="Titre" id="id1"style="text-align:center;" type="text" name="titre" size="58"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Contenu :</label> <textarea id="id1" class="ckeditor" name="editor1"></textarea><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 1){

		?>
		
		
		
		<h2><center>Ajout d'une Maison :</center></h2>
						<style>
form#configsite label { display:inline-block; width:150px; }
form#configsite input { display:inline-block; }
						</style>
		<form id="configsite" action="adm_ajoutmaison.php" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Titre :</label> <input placeholder="Titre" id="id1"style="text-align:center;" type="text" name="titre" size="50"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Sous Titre :</label> <input placeholder="Sous Titre" id="id1"style="text-align:center;" type="text" name="soustitre" size="50"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Agence :</label> <input placeholder="Agence" id="id1"style="text-align:center;" type="text" name="agence" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Prix :</label> <input placeholder="Prix" id="id1"style="text-align:center;" type="text" name="prix" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Nouveau Prix :</label> <input placeholder="Nouveau Prix" id="id1"style="text-align:center;" type="text" name="nouveauprix" size="10"><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Description :</label> <textarea id="id1" class="ckeditor" name="editor1"></textarea><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Première page :</label> <select id="id1" name="flash"><option value="Oui">Oui</option><option value="Non">Non</option></select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Etat de vente :</label> <select id="id1" name="etatbien"><option value="A vendre">A vendre</option><option value="Vendu">Vendu</option><option value="Loué">Loué</option><option value="A louer">A louer</option></select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Catégorie :</label> <select id="id1" name="categorie">
				<option value="Terrains">Terrains</option>
				<option value="Maisons">Maisons</option>
				<option value="Maisons de luxe">Villas de rêves</option>
				<option value="Condos">Condominium / Appartements</option>
				<option value="Fincas">Fincas / Fermes</option>
				<option value="Commerces">Commerces</option>
				<option value="Locations">Locations</option>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Région :</label> <select id="id1" name="region">
				<option value="Environs de Tamarindo">Environs de Tamarindo</option>
				<option value="Nord du Guanacaste">Nord du Guanacaste</option>
				<option value="Sud du Guanacaste">Sud du Guanacaste</option>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Localité :</label> <input placeholder="Localité" id="id1"style="text-align:center;" type="text" name="localite" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Type du bien :</label> <input placeholder="Type du bien" id="id1"style="text-align:center;" type="text" name="type" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Municipalité :</label> <input placeholder="Municipalité" id="id1"style="text-align:center;" type="text" name="municipalite" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Surface du terrain:</label> <input placeholder="Surface" id="id1"style="text-align:center;" type="text" name="surface" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Transport en commun:</label> <input placeholder="Transport" id="id1"style="text-align:center;" type="text" name="transport" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ecole Gardienne :</label> <input placeholder="Ecole Gardienne" id="id1"style="text-align:center;" type="text" name="ecolegardienne" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ecole Primaire :</label> <input placeholder="Ecole Primaire" id="id1"style="text-align:center;" type="text" name="ecoleprimaire" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ecole secondaire :</label> <input placeholder="Ecole secondaire" id="id1"style="text-align:center;" type="text" name="ecolesecondaire" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Temps de marche Plage :</label> <input placeholder="Temps de marche Plage" id="id1"style="text-align:center;" type="text" name="marcheplage" size="10"><br /><br />

				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Proche des Commerces :</label> <select id="id1" name="prochecommerce">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Vue mer :</label> <select id="id1" name="vuemer">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Vue Vallée :</label> <select id="id1" name="vuevallee">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Construction anti-sismique :</label> <select id="id1" name="constructionantisismique">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				
				
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Année de construction :</label> <input placeholder="Année de construction" id="id1"style="text-align:center;" type="text" name="anneeconstruction" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Surface Habitable :</label> <input placeholder="Surface Habitable" id="id1"style="text-align:center;" type="text" name="surfacehabitable" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Chambres à coucher :</label> <input placeholder="Chambres à coucher" id="id1"style="text-align:center;" type="text" name="chambreacoucher" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Salles de bains :</label> <input placeholder="Salles de bains" id="id1"style="text-align:center;" type="text" name="salledebains" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Charges Mensuelles :</label> <input placeholder="Charges Mensuelles" id="id1"style="text-align:center;" type="text" name="chargemensuelles" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Taxes Annuelles :</label> <input placeholder="Taxes Annuelles" id="id1"style="text-align:center;" type="text" name="taxesannuelles" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Gardien de sécurité :</label> <select id="id1" name="gardiensecurite">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Ligne téléphonique :</label> <select id="id1" name="lignetelephonique">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Source d’eau :</label> <input placeholder="Source d’eau" id="id1"style="text-align:center;" type="text" name="sourceeau" size="10"><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Electricité :</label> <select id="id1" name="electricite">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Accès route pavée :</label> <select id="id1" name="accesroutepave">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Raccordement TV :</label> <select id="id1" name="raccordementtv">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Internet :</label> <select id="id1" name="internet">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Piscine :</label> <select id="id1" name="piscine">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Emplacement Barbecue :</label> <select id="id1" name="emplacementbbq">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Air conditionné :</label> <select id="id1" name="airconditionne">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Quart port :</label> <select id="id1" name="quartport">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Abri de jardin / Rancho :</label> <select id="id1" name="abrijardinrancho">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Buanderie :</label> <select id="id1" name="buanderie">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Terrasse :</label> <select id="id1" name="terrasse">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;<label for="id1">Meublé :</label> <select id="id1" name="meuble">
				<option value="Non">Non</option>
				<option value="Oui">Oui</option>
				</select><br /><br />
				
				&nbsp;&nbsp;&nbsp;&nbsp;<br/><center><input type="submit" name="enregistrer" value="Enregistrer"></center><br/>
			
		</form>
		

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 100){

		?>
		
		
		
		<h2><center>Ajout des photos :</center></h2>
		
		<?php
		$numagence = $_SESSION['agence'];
		
$ajoutphoto = mysql_query("SELECT * FROM marcus_biens WHERE agence='$numagence'");
while ($ajoutphotos = mysql_fetch_array($ajoutphoto) ) 
{
$bienid = $ajoutphotos['id']; 
}

include('adm_ajoutphoto.php');
?>

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}elseif ($categorie == 101){

		?>
		
		
		
		<h2><center>Modifications des photos :</center></h2>
		
		<?php
		$numagence = $_SESSION['agence'];
		
$modifphoto = mysql_query("SELECT * FROM marcus_biens WHERE agence='$numagence'");
while ($modifphotos = mysql_fetch_array($modifphoto) ) 
{
$bienid = $modifphotos['id']; 
$bienagence = $modifphotos['agence']; 
}

include('adm_modifphoto.php');
?>

<br/><br/>   
<center><a href="connexion.php"><input type="submit" value="Retour à la Page de sélection"></a></center>
		
		
		<?php
		}
?>
</div><!-- end of section 1 -->
<?php
}
?>

    <div class="cleaner_with_height">&nbsp;</div>
</div>



<?php 

include('3biens.php'); 
include('footer.php'); 

?>

