<?php 
include('header.php');
include('slider.php');
?>

<style>

form#myform label { display:inline-block; width:100px; }
form#myform input { display:inline-block; width:300px; }
form#myform input[type=submit] { color:#fff; background-color:green; }

</style>


<div id="templatemo_content_panel_1">

    	<center>
		<h1>Demande de Contact</h1>
		</center>
		



				<section id="content">
          <div class="wrapper">
		
		<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = $le_email;

// copie ? (envoie une copie au visiteur)
$copie = 'non';

// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';

// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu, vous obtiendrez une réponse d'ici peu.<br /> Merci de votre patience.<br/><br/>";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/

/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}

	$text = nl2br($text);
	return $text;
};

/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}

// formulaire envoyé, on récupère tous les champs.
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin

if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
		//$headers .= 'Reply-To: '.$email. "\r\n" ;
		//$headers .= 'X-Mailer:PHP/'.phpversion();

		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.','.$email;
		}
		else
		{
			$cible = $destinataire;
		};

		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('<br>','',$message);
		$message = str_replace('<br />','',$message);
		$message = str_replace("&lt;","<",$message);
		$message = str_replace("&gt;",">",$message);
		$message = str_replace("&amp;","&",$message);

		// Envoi du mail
		if (mail($cible, $objet, $message, $headers))
		{
			echo '<b><p><center><font color="green">'.$message_envoye.'</font></center></p></b>';
		}
		else
		{
			echo '<b><p><center><font color="red">'.$message_non_envoye.'</font></center></p></b>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<b><p><center><font color="red">'.$message_formulaire_invalide.'</font></center></p></b>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))

if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire
	echo '<center>
	<form id="myform" method="post" action="'.$form_action.'">
              <div>
                <div class="wrapper"> <span><label for="idUn">Votre Nom :</label></span>
                  <input type="text" class="input" id="idUn" name="nom" value="'.stripslashes($nom).'" tabindex="1" />
                </div><br/>
                <div class="wrapper"> <span><label for="idDeux">Votre E-mail:</label></span>
                  <input type="text" class="input" id="idDeux" name="email" value="'.stripslashes($email).'" tabindex="2" />
                </div><br/>
				<div class="wrapper"> <span><label for="idTrois">Sujet :</label></span>
                  <input type="text" class="input" id="idTrois" name="objet" value="'.stripslashes($objet).'" tabindex="3" />
                </div><br/>
                <div class="textarea_box"> <span><label for="idQuatre">Votre Message:</label></span>
                  <textarea id="idQuatre" name="message" tabindex="4" cols="40" rows="7">'.stripslashes($message).'</textarea>
                </div><br/>
				
                <span>&nbsp;<label></label></span> <input type="submit" name="envoi" class="button" value="Envoyez le formulaire" /> </div>
				
            </form>
			</center>
			';
};
?>
		
		
		

            
          </div>
        </section>

	

        
		



<br/>
</div>

<?php 

include('footer.php'); 

?>

