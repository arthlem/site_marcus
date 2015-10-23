<?php


		include("config/conn.php");

		$idfaq = $_GET['num'];
		
		$faq123 =	mysql_query("SELECT * FROM marcus_faq WHERE id=$idfaq");
		
	while($faq1234 = mysql_fetch_array($faq123))
	{
		$numerofaq=$faq1234['numero'];
		$titrefaq=$faq1234['titre'];
		$descriptionfaq=$faq1234['description'];
	}

?>
<br/><br/><br/><br/>
<center><h2><?php echo $numerofaq; ?>. <?php echo $titrefaq; ?></h2></center><br/><br/>

<center>
<h4><?php echo $descriptionfaq; ?></h4>
<br/>

<button value="Fermer la FAQ" onclick="parent.close();">Fermer la FAQ</button>
</center>

