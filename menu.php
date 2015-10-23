<style>
.clearfix:after {
    display:block;
    clear:both;
}
/*----- Menu Outline -----*/
.menu-wrap {
    width:100%;
    box-shadow:0px 1px 3px rgba(0,0,0,0.2);
    background:#3e3436;
}
 
.menu {
    width:1000px;
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
    font-family:'Ek Mukta';
}
 
.menu a {
    transition:all linear 0.15s;
    color:#919191;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:#be5b70;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
/*----- Top Level -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
}
 
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    background:#2e2728;
}
 
/*----- Bottom Level -----*/
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
 
.sub-menu {
    width:100%;
    position:absolute;
    top:100%;
    left:0px;
    z-index:-1;
    opacity:0;
    transition:opacity linear 0.15s;
    box-shadow:0px 2px 3px rgba(0,0,0,0.2);
    background:#0A1521;
}
 
.sub-menu li {
    display:block;
    font-size:16px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
 
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}
</style>                    
					
<div class="menu-wrap">
    <nav class="menu">
		<ul class="clearfix">
				<li>
				<a href="index.php" class="current">Accueil <span class="arrow">&#9660;</span></a>
					<ul class="sub-menu">
                    <li><a href="page.php?id=1">Tamarindo</a></li>
                    <li><a href="page.php?id=2">Liens</a></li>
                    <li><a href="page.php?id=3">Le Costa Rica</a></li>
					</ul>
				</li>
                    <li><a>Biens à vendre</a>
					
					<ul class="sub-menu">
                    <li><a href="recherche.php">Tous</a></li>					
                    <li><a href="nouveaute.php">Nouveautés</a></li>
                    <li><a href="recherche.php">Rechercher</a></li>
                    <!--<li><a href="#">Carte des biens</a></li>-->
					</ul>
					
					</li>
                    <li><a href="nouveaute.php">Nouveautés</a>
					
					<!--<ul class="sub-menu">
                    <li><a href="page.php?id=4">Acheter</a></li>
                    <li><a href="page.php?id=5">Vendre</a></li>
                    <li><a href="page.php?id=6">Délégation</a></li>
					</ul>-->
					
					</li>
                    <li><a href="recherche.php">Rechercher</a>
					
					<!--<ul class="sub-menu">
                    <li><a href="page.php?id=7">Mission & Vision</a></li>
                    <li><a href="page.php?id=8"><font color="green"><b>Serveur Vert</b></font></a></li>
					</ul>-->
					
					</li>
                    <li><a href="faq.php">FAQ's</a></li>
                    <li><a href="contact.php">Contact</a></li>
		</ul>
    </nav>
</div>