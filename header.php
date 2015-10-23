<?php 
		session_start();

		include("config/conn.php");
		
		// Chargement de la Configuration ...
		$config =	mysql_query("SELECT * FROM marcus_config");
		
	while($laconf = mysql_fetch_array($config))
	{
		$le_titre=$laconf['titre'];
		$le_soustitre=$laconf['soustitre'];
		$le_email=$laconf['email'];
		$le_telephone=$laconf['telephone'];
		$le_copyright=$laconf['copyright'];
		$le_keywords=$laconf['keywords'];
		$le_description=$laconf['description'];
		$le_nomprenom=$laconf['nomprenom'];
		$le_abstract=$laconf['abstract'];
		$le_titrenews=$laconf['titrenews'];
		$le_descnews=$laconf['descnews'];
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $le_titre; ?> | <?php echo $le_soustitre; ?></title>


<meta name="robots" content="index, follow" />

<meta name="keywords" content="<?php echo $le_keywords; ?>" />

<meta name="description" content="<?php echo $le_description; ?>" />

<meta name="abstract" content="<?php echo $le_abstract; ?>" />

<meta name="copyright" content="<?php echo $le_copyright; ?>" />
<meta name="author" content="<?php echo $le_email; ?>" />


<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
	<!-- le slider -->
	<link href="./css/gallery.css" rel="stylesheet" type="text/css" />
	<link href="./css/gallery-theme.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="gallery_style.css" />


<!-- Inclusion du panel pour écrire -->
<script src="ckeditor/ckeditor.js"></script>


</head>
<body>
<div id="templatemo_container">
<div id="templatemo_top_panel">
	<div id="templatemo_header_section">
		<div id="templatemo_header">
        	<?php echo $le_titre; ?>
        </div>
		<div id="templatemo_header2">
        	<?php echo $le_soustitre; ?>
        </div>
    </div> <!-- end of header section -->
    
	
	
    <div id="templatemo_menu_login_section">
    	<div id="templatemo_menu_section">
        	<div id="templatemo_menu_panel">
			
	<ul>	
	<?php include('menu.php'); ?>
	</ul>
	
	 </div> <!-- end of menu -->
        </div>
        <div id="templatemo_login_section">
		<?php
		date_default_timezone_set('Etc/GMT+6');
		$heurecr = date('d/m/Y');
		$heurecr1 = date('H:i:s');
		?>
        	<br/><center>Nous sommes le <?php echo $heurecr; ?> il est <?php echo $heurecr1; ?></center>
        </div>
    </div> <!-- end of menu login section -->
	
	
	
	
</div> <!-- end of top panel -->