<?php 
include('header.php');

?>
<script src="//code.jquery.com/jquery-latest.min.js"></script>
<script src="//unslider.com/unslider.min.js"></script>

<script>

    $(function() {
        $('.banner').unslider();
    });
</script>

<!-- Le Slider -->
<div class="banner" style="position: relative; top: 0px; left: 0px; width: 960px;
        height: 456px; background: #191919; overflow: hidden;">
    <ul>
        <li style="background-image: url('images/photos_biens/10.%20CASA%20PIPILACHA%20-%20JARDIN.jpg');">
            <div class="inner">
                <h1>The jQuery slider that just slides.</h1>
                <p>No fancy effects or unnecessary markup, and it’s less than 3kb.</p>

                <a class="btn" href="#download">Download</a>
            </div>
        </li>

        <li style="background-image: url('images/photos_biens/10.%20CASA%20PIPILACHA%20-%20JARDIN.jpg');">
            <div class="inner">
                <h1>Fluid, flexible, fantastically minimal.</h1>
                <p>Use any HTML in your slides, extend with CSS. You have full control.</p>

                <a class="btn" href="#download">Download</a>
            </div>
        </li>

        <li style="background-image: url('images/photos_biens/10.%20CASA%20PIPILACHA%20-%20JARDIN.jpg');">
            <div class="inner">
                <h1>Open-source.</h1>
                <p>Everything to do with Unslider is hosted on GitHub.</p>

                <a class="btn" href="//github.com/idiot/unslider">Contribute</a>
            </div>
        </li>

        <li style="background-image: url('images/photos_biens/10.%20CASA%20PIPILACHA%20-%20JARDIN.jpg');">
            <div class="inner">
                <h1>Uh, that’s about it.</h1>
                <p>I just wanted to show you another slide.</p>

                <a class="btn" href="#download">Download</a>
            </div>
        </li>
    </ul>
</div>
<!-- Le Slider FIN -->



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

<?php 

include('3biens.php'); 
include('footer.php'); 

?>

