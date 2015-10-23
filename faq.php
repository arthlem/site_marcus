<?php 
include('header.php');
include('slider.php');
?>




<div id="templatemo_content_panel_1">

    	<center>
		<h1><u>Les Questions</u> les plus régulièrement posées.</h1>
		</center><br/><br/>
		
<?php 
	$faq =	mysql_query("SELECT * FROM marcus_faq ORDER BY id ASC");
		
	while($lafaq = mysql_fetch_array($faq))
	{
		$faq_id=$lafaq['id'];
		$faq_numero=$lafaq['numero'];
		$faq_titre=$lafaq['titre'];
		$faq_description=$lafaq['description'];
	
?>


    <div style="border-width:1px 2px 3px 2px; border-style:solid dotted; border-color:black black; padding:0 10px;"><br/><a href="javascript:void(0)" onclick="window.open('faq123.php?num=<?php echo $faq_id; ?>','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=500,directories=no,location=no');"><h3><?php echo $faq_numero; ?>. <?php echo $faq_titre; ?></h3></a><br/></div>

	
<?php
	}
?>
        
		



<br/>
</div>

<?php 

include('footer.php'); 

?>

