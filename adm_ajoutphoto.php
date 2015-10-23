<b><center><font color="red"><u>La dernière image enregistré sera l'image de présentation</u></font></center></b><br/>

<?php
$num = $bienid;
	/* variables à modifier */
		$fictailmax = 512000; // taille max d'un fichier (multiple de 1024)
		$fictyp = "/jpeg|gif|png/i"; // types de fichiers acceptés, séparés par |
		$ficext = "/\.jpeg|\.jpg|\.gif\.png/i"; // extensions correspondantes
		$ficrep = "images/photos_biens/"; // répertoire de destination
		$maxfichier = 30; // nombre maximal de fichiers
	/* fin des modifications */

	// fichier courant (URI absolue) : formulaire récursif
	$PHP_SELF = basename($_SERVER['PHP_SELF']);

	if($_POST) {
		$msg = array(); // message
		$fichier = $_FILES['lefichier']; // simplication du tableau $_FILES
		for($i=0; $i<count($fichier['name']); $i++) {
			// nom du fichier original = nom par défaut
			$nom = $fichier['name'][$i];
		
		// test existence fichier
		if(!strlen($nom)) 
		{
			$msg[] = "Aucun fichier !";
			continue;
		}
		
		// si un nouveau nom est renseigné (avec extension correcte)
		if(preg_match($ficext, $_POST['lenom'][$i]))
			$nom = $_POST['lenom'][$i];
			$nomphoto = $_POST['lenom'][$i];
		// répertoire de destination
		$destination = $ficrep.$nom;
		
		// test erreur (PHP 4.3)
		if($fichier['error'][$i])
		{
			switch($fichier['error'][$i]) 
			{
				// dépassement de upload_max_filesize dans php.ini
				case UPLOAD_ERR_INI_SIZE:
				  $msg[] = "Fichier trop volumineux !"; break;
				// dépassement de MAX_FILE_SIZE dans le formulaire
				case UPLOAD_ERR_FORM_SIZE:
				  $msg[] = "Fichier trop volumineux (supérieur à ".(INT)($fictailmax/1024)." Mo)"; break;
				// autres erreurs
				default:
				  $msg[] = "Impossible d'uploader le fichier !";
			}
		}
		
		// test taille fichier
		elseif($fichier['size'][$i] > $fictailmax)
			$msg[] = "Fichier $nom trop volumineux : ".$fichier['size'][$i];
		// test type fichier
		elseif(!preg_match($fictyp, $fichier['type'][$i]))
			$msg[] = "Fichier $nom de type incorrect : ".$fichier['type'][$i];
		// test upload sur serveur (ficrep. temporaire)
		elseif(!@is_uploaded_file($fichier['tmp_name'][$i]))
			$msg[] = "Impossible d'uploader $nom";
		// test transfert du serveur au répertoire
		elseif(!@move_uploaded_file($fichier['tmp_name'][$i], $destination))
			$msg[] = "Problème de transfert avec $nom";
		else
		{	$msg[] = "Fichier $nomphoto téléchargé avec succès dans $destination !";
			mysql_query("INSERT INTO marcus_imagesbiens VALUES ('','$num','$nomphoto','images/photos_biens/$nom')");
			mysql_query("UPDATE marcus_biens SET src='images/photos_biens/$nom' WHERE id='$num'");
		}
	}
	// affichage confirmation
	echo "<p><font color='green'><b>Les images ont été chargées avec succès.</b></font></p>";
}

// 1 fichier par défaut (ou supérieur à $maxfichier)
$upload = (isset($_REQUEST['upload']) && $_REQUEST['upload'] <= $maxfichier) ? $_REQUEST['upload'] : 1;

		if (isset($_POST['retour']))
		{
			if ($_POST['retour']=="oui")
			{
				include ('adm_p2.php');
			}
		}
		else
		{
			// choix du nombre $upload de fichier(s)
			echo "<form action='$PHP_SELF?cat=100&agence=$numagence' method='post'>\n";
			echo "Quantité <select name='upload' onChange=\"window.open(this.options[this.selectedIndex].value,'_self')\">\n";
			for($i=1; $i<=$maxfichier; $i++)
			{
				echo "<option value='$PHP_SELF?upload=$i&cat=100&agence=$numagence'";
				if($i == $upload) echo " selected";
				echo ">$i\n";
			}
			echo "</select>\n";
			// echo "<input name='upload' value='$upload' size='3'>\n";
			echo "<input type='HIDDEN' type='submit' value='Modifier'></form>\n";
echo "<br/><br/><br/>";
			// le formulaire
			echo "<form action='$PHP_SELF?cat=100&agence=$numagence' enctype='multipart/form-data' method='post'>\n";

			?>
			<input type="hidden" name="retour" value="non" maxlength=300 size=200/>
<?php 
			 // boucle selon nombre de fichiers $upload
			for($i=1; $i<=$upload; $i++) 
			{
				echo "<p><input type='hidden' name='MAX_FILE_SIZE' value='$fictailmax'>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Photo $i : <input type='file' size='80' name='lefichier[]'>\n";	
				echo "<input type='HIDDEN' name='lenom[]' size='60' placeHolder='Merci de nommer cette image ici'  ></p>";

			}
?>
					<div><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type='submit' value='Envoyer le Bien'/></div>
<?php	
		}
?>


	
	</form>