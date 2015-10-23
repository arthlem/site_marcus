<?php 
include('header.php');
// include('slider.php');


$iddelapage = $_GET['id'];
$page = mysql_query("SELECT * FROM marcus_page WHERE numero='$iddelapage'");

while ($page1 = mysql_fetch_array($page) ) 
{
$pageid = $page1['id']; 
$pagetitre = $page1['titre']; 
$pagecontenu = $page1['contenu'];
}


?>



<div id="templatemo_content_panel_1">

	<h1><?php echo $pagetitre; ?></h1>
	
	<br/>
	
	<?php echo $pagecontenu; ?>
	
    <div class="cleaner_with_height">&nbsp;</div>
</div>


<?php 

include('3biens.php'); 
include('footer.php'); 

?>

