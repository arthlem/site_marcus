<?php
include('header.php');
// include('slider.php');
?>


<!-- it works the same with all jquery version from 1.x to 2.x -->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<!-- use jssor.slider.mini.js (40KB) instead for release -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
<script>

    jQuery(document).ready(function ($) {

        var _SlideshowTransitions = [
            //Fade in L
            {
                $Duration: 1200,
                x: 0.3,
                $During: {$Left: [0.3, 0.7]},
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade out R
            , {
                $Duration: 1200,
                x: -0.3,
                $SlideOut: true,
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade in R
            , {
                $Duration: 1200,
                x: -0.3,
                $During: {$Left: [0.3, 0.7]},
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade out L
            , {
                $Duration: 1200,
                x: 0.3,
                $SlideOut: true,
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }

            //Fade in T
            , {
                $Duration: 1200,
                y: 0.3,
                $During: {$Top: [0.3, 0.7]},
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2,
                $Outside: true
            }
            //Fade out B
            , {
                $Duration: 1200,
                y: -0.3,
                $SlideOut: true,
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2,
                $Outside: true
            }
            //Fade in B
            , {
                $Duration: 1200,
                y: -0.3,
                $During: {$Top: [0.3, 0.7]},
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade out T
            , {
                $Duration: 1200,
                y: 0.3,
                $SlideOut: true,
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }

            //Fade in LR
            , {
                $Duration: 1200,
                x: 0.3,
                $Cols: 2,
                $During: {$Left: [0.3, 0.7]},
                $ChessMode: {$Column: 3},
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2,
                $Outside: true
            }
            //Fade out LR
            , {
                $Duration: 1200,
                x: 0.3,
                $Cols: 2,
                $SlideOut: true,
                $ChessMode: {$Column: 3},
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2,
                $Outside: true
            }
            //Fade in TB
            , {
                $Duration: 1200,
                y: 0.3,
                $Rows: 2,
                $During: {$Top: [0.3, 0.7]},
                $ChessMode: {$Row: 12},
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade out TB
            , {
                $Duration: 1200,
                y: 0.3,
                $Rows: 2,
                $SlideOut: true,
                $ChessMode: {$Row: 12},
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }

            //Fade in LR Chess
            , {
                $Duration: 1200,
                y: 0.3,
                $Cols: 2,
                $During: {$Top: [0.3, 0.7]},
                $ChessMode: {$Column: 12},
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2,
                $Outside: true
            }
            //Fade out LR Chess
            , {
                $Duration: 1200,
                y: -0.3,
                $Cols: 2,
                $SlideOut: true,
                $ChessMode: {$Column: 12},
                $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade in TB Chess
            , {
                $Duration: 1200,
                x: 0.3,
                $Rows: 2,
                $During: {$Left: [0.3, 0.7]},
                $ChessMode: {$Row: 3},
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2,
                $Outside: true
            }
            //Fade out TB Chess
            , {
                $Duration: 1200,
                x: -0.3,
                $Rows: 2,
                $SlideOut: true,
                $ChessMode: {$Row: 3},
                $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }

            //Fade in Corners
            , {
                $Duration: 1200,
                x: 0.3,
                y: 0.3,
                $Cols: 2,
                $Rows: 2,
                $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]},
                $ChessMode: {$Column: 3, $Row: 12},
                $Easing: {
                    $Left: $JssorEasing$.$EaseInCubic,
                    $Top: $JssorEasing$.$EaseInCubic,
                    $Opacity: $JssorEasing$.$EaseLinear
                },
                $Opacity: 2,
                $Outside: true
            }
            //Fade out Corners
            , {
                $Duration: 1200,
                x: 0.3,
                y: 0.3,
                $Cols: 2,
                $Rows: 2,
                $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]},
                $SlideOut: true,
                $ChessMode: {$Column: 3, $Row: 12},
                $Easing: {
                    $Left: $JssorEasing$.$EaseInCubic,
                    $Top: $JssorEasing$.$EaseInCubic,
                    $Opacity: $JssorEasing$.$EaseLinear
                },
                $Opacity: 2,
                $Outside: true
            }

            //Fade Clip in H
            , {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 3,
                $Assembly: 260,
                $Easing: {$Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade Clip out H
            , {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 3,
                $SlideOut: true,
                $Assembly: 260,
                $Easing: {$Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade Clip in V
            , {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 12,
                $Assembly: 260,
                $Easing: {$Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
            //Fade Clip out V
            , {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 12,
                $SlideOut: true,
                $Assembly: 260,
                $Easing: {$Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear},
                $Opacity: 2
            }
        ];

        var options = {
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideDuration: 960,                                //Specifies default duration (swipe) for slide in milliseconds

            $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },

            $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            },

            $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $DisplayPieces: 10,                             //[Optional] Number of pieces to display, default value is 1
                $ParkingPosition: 360                          //[Optional] The offset position to park thumbnail
            }
        };

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth)
                jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 960), 300));
            else
                window.setTimeout(ScaleSlider, 30);
        }

        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>

<?php

$idbien = $_GET['id'];

// Chargement de la Configuration ...
$bienss = mysql_query("SELECT * FROM marcus_biens WHERE id='$idbien'");

while ($bien = mysql_fetch_array($bienss)) {
    $bien_id = $bien['id'];
    $bien_titre = $bien['titre'];
    $bien_soustitre = $bien['soustitre'];
    $bien_description = $bien['description'];
    $bien_prix = $bien['prix'];
    $bien_nouveauprix = $bien['nouveauprix'];
    $bien_src = $bien['src'];
    $bien_flash = $bien['flash'];
    $bien_agence = $bien['agence'];
    $bien_etatbien = $bien['etatbien'];
    $bien_categorie = $bien['categorie'];
    $bien_region = $bien['region'];
    $bien_localite = $bien['localite'];
    $bien_type = $bien['type'];
    $bien_municipalite = $bien['municipalite'];
    $bien_surface = $bien['surface'];
    $bien_transport = $bien['transport'];
    $bien_ecolegardienne = $bien['ecolegardienne'];
    $bien_ecoleprimaire = $bien['ecoleprimaire'];
    $bien_marcheplage = $bien['marcheplage'];
    $bien_prochecommerce = $bien['prochecommerce'];
    $bien_vuemer = $bien['vuemer'];
    $bien_vuevallee = $bien['vuevallee'];

    $bien_constructionantisismique = $bien['antisismique'];
    $bien_anneeconstruction = $bien['anneeconstruction'];
    $bien_surfacehabitable = $bien['surfacehabitable'];
    $bien_chambreacoucher = $bien['chambreacoucher'];
    $bien_salledebains = $bien['salledebains'];
    $bien_ecolesecondaire = $bien['ecolesecondaire'];
    $bien_lignetelephonique = $bien['lignetelephonique'];
    $bien_sourceeau = $bien['sourceeau'];
    $bien_electricite = $bien['electricite'];
    $bien_raccordementtv = $bien['raccordementtv'];
    $bien_internet = $bien['internet'];
    $bien_piscine = $bien['piscine'];
    $bien_emplacementbbq = $bien['emplacementbbq'];
    $bien_airconditionne = $bien['airconditionne'];
    $bien_quartport = $bien['quartport'];
    $bien_abrijardinrancho = $bien['abrijardinrancho'];
    $bien_buanderie = $bien['buanderie'];
    $bien_terrasse = $bien['terrasse'];
    $bien_meuble = $bien['meuble'];
    $bien_chargemensuelles = $bien['chargemensuelles'];
    $bien_gardiensecurite = $bien['gardiensecurite'];
    $bien_accesroutepave = $bien['accesroutepave'];
    $bien_taxesannuelles = $bien['taxesannuelles'];
    $bien_latitude = 10.481424;
    $bien_longitude = -85.760460;
}

?>

<div id="templatemo_content_panel_1">
    <center>
        <h1><u><?php echo $bien_titre; ?></u>

            <h2><?php echo $bien_soustitre; ?></h2><br/>

            <h1>

                <?php
                if ($bien_etatbien == "Vendu") {

                    if ($bien_nouveauprix == '') {
                        ?>

                        <s><font color="grey">US $ <?php echo $bien_prix; ?></font></s> <font color="red">Vendu</font>

                        <?php
                    } else {
                        ?>

                        <s><font color="grey">US $ <?php echo $bien_prix; ?> Prix réduit à US
                                $ <?php echo $bien_nouveauprix; ?></font></s> <font color="red">Vendu</font>

                        <?php
                    }
                } else {
                    if ($bien_etatbien == "Loué") {

                        if ($bien_nouveauprix == '') {
                            ?>

                            <s><font color="grey">US $ <?php echo $bien_prix; ?></font></s> <font
                                color="red">Loué</font>

                            <?php
                        } else {
                            ?>

                            <s><font color="grey">US $ <?php echo $bien_prix; ?> Prix réduit à US
                                    $ <?php echo $bien_nouveauprix; ?></font></s> <font color="red">Loué</font>

                            <?php
                        }
                    } else {
                        if ($bien_etatbien == "A louer") {
                            ?><s><font color="grey">US $ <?php echo $bien_prix; ?></font></s> <font color="red">A
                                louer</font><?php
                        } else {
                            if ($bien_nouveauprix == '') {
                                echo $bien_etatbien . ' US $ ' . $bien_prix;
                            } else {
                                ?>
                                <?php echo $bien_etatbien; ?> <s><font color="grey">US
                                        $ <?php echo $bien_prix; ?></font></s> <font color="red">Prix réduit à US
                                    $ <?php echo $bien_nouveauprix; ?></font>
                                <?php
                            }
                        }
                    }
                }
                ?>
            </</h1>
    </center>
</div>
<!-- Jssor Slider Begin -->
<!-- To move inline styles to css file/block, please specify a class name for each element. -->
<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 960px;
        height: 556px; background: #191919; overflow: hidden;">

    <!-- Loading Screen -->
    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
        </div>
        <div style="position: absolute; display: block; background: url(img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
        </div>
    </div>

    <!-- Slides Container -->
    <div u="slides"
         style="cursor: move; position: absolute; left: 0px; top: 0px; width: 960px; height: 456px; overflow: hidden;">

        <?php

        // $idbien = $_GET['id'];

        // Chargement de la Configuration ...
        $lesbiens = mysql_query("SELECT * FROM marcus_imagesbiens WHERE numbien='$idbien' ORDER BY id DESC");

        while ($lebien = mysql_fetch_array($lesbiens)) {
            $le_id = $lebien['id'];
            $le_numbien = $lebien['numbien'];
            $le_titre = $lebien['titre'];
            $le_src = $lebien['src'];


            ?>
            <div>
                <img u="image" src="<?php echo $le_src; ?>" height="1600px" width="1200px"/>
                <img u="thumb" src="<?php echo $le_src; ?>" height="72px" width="72px"/>
            </div>
            <?php
        }
        ?>


    </div>

    <!--#region Arrow Navigator Skin Begin -->
    <style>
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url(img/a17.png) no-repeat;
            overflow: hidden;
        }

        .jssora05l {
            background-position: -10px -40px;
        }

        .jssora05r {
            background-position: -70px -40px;
        }

        .jssora05l:hover {
            background-position: -130px -40px;
        }

        .jssora05r:hover {
            background-position: -190px -40px;
        }

        .jssora05l.jssora05ldn {
            background-position: -250px -40px;
        }

        .jssora05r.jssora05rdn {
            background-position: -310px -40px;
        }
    </style>
    <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="top: 158px; left: 8px;">
        </span>
    <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="top: 158px; right: 8px">
        </span>
    <!--#endregion Arrow Navigator Skin End -->
    <!--#region Thumbnail Navigator Skin Begin -->
    <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-jquery.html -->
    <style>
        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */

        .jssort01 {
            position: absolute;
            /* size of thumbnail navigator container */
            width: 960px;
            height: 100px;
        }

        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }

        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }

        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url(img/t01.png) -960px -960px no-repeat;
            _background: none;
        }

        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }

        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }

        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }

        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
    </style>

    <!-- thumbnail navigator container -->
    <div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
        <!-- Thumbnail Item Skin Begin -->
        <div u="slides" style="cursor: default;">
            <div u="prototype" class="p">
                <div class=w>
                    <div u="thumbnailtemplate" class="t"></div>
                </div>
                <div class=c></div>
            </div>
        </div>
        <!-- Thumbnail Item Skin End -->
    </div>
    <!--#endregion Thumbnail Navigator Skin End -->
</div>


<div id="templatemo_content_panel_1">


    <style>
        label {
            display: block;
            width: 122px;
            float: left;
        }
    </style>


    <div id="templatemo_news_section">
        <h1>Résumé :</h1>

        <div class="templatemo_news_box">
            <b><label for="annonce">•Annonce #</label></b><label id="annonce">: <?php echo $bien_id; ?></label><br/>
            <b><label for="annonce1">•Référence de l'Agence</label></b><label
                id="annonce1">: <?php echo $bien_agence; ?></label><br/><br/>
            <b><label for="annonce2">•Etat de vente du bien</label></b><label
                id="annonce2">: <?php echo $bien_etatbien; ?></label><br/><br/>
            <b><label for="annonce2">•Prix</label></b><label id="annonce2">: US $ <?php echo $bien_prix; ?></label><br/>
            <b><label for="annonce2">•Catégorie</label></b><label id="annonce2">: <?php echo $bien_categorie; ?></label><br/>
            <b><label for="annonce2">•Région</label></b><label id="annonce2">: <?php echo $bien_region; ?></label><br/>
            <b><label for="annonce2">•Localité</label></b><label
                id="annonce2">: <?php echo $bien_localite; ?></label><br/>
            <b><label for="annonce2">•Type de bien</label></b><label
                id="annonce2">: <?php echo $bien_type; ?></label><br/>
            <b><label for="annonce2">•Municipalité</label></b><label
                id="annonce2">: <?php echo $bien_municipalite; ?></label><br/><br/>

        </div>
    </div>
    <!-- end of news section -->

    <div id="templatemo_section_1_2">
        <h1>Description :</h1>

        <p><?php echo $bien_description; ?></p>

        <br/>
        <br/>

        <h1>Détails :</h1><br/>

        <div style="position: static; height: 122px;">
            <?php if ($bien_surface != "") {
                echo '<b><label for="annonce2">•Surface du terrain</label></b><label id="annonce2">: ' . $bien_surface . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_transport != "") {
                echo '<b><label for="annonce2">•Transport en commun</label></b><label id="annonce2">: ' . $bien_transport . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?><br/>
            <?php if ($bien_ecolegardienne != "") {
                echo '<b><label for="annonce2">•Ecole gardienne</label></b><label id="annonce2">: ' . $bien_ecolegardienne . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_ecoleprimaire != "") {
                echo '<b><label for="annonce2">•Ecole primaire</label></b><label id="annonce2">: ' . $bien_ecoleprimaire . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_ecolesecondaire != "") {
                echo '<b><label for="annonce2">•Ecole secondaire</label></b><label id="annonce2">: ' . $bien_ecolesecondaire . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_vuemer == "Oui") {
                echo '<b><label for="annonce2">•Vue Mer</label></b><label id="annonce2">: ' . $bien_vuemer . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_vuevallee == "Oui") {
                echo '<b><label for="annonce2">•Vue Vallée</label></b><label id="annonce2">: ' . $bien_vuevallee . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_marcheplage != "") {
                echo '<b><label for="annonce2">•Temps de marche à la plage</label></b><label id="annonce2">: ' . $bien_marcheplage . '</label><br/><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_prochecommerce == "Oui") {
                echo '<b><label for="annonce2">•Proche des commerces</label></b><label id="annonce2">: ' . $bien_prochecommerce . '</label><br/><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_constructionantisismique == "Oui") {
                echo '<b><label for="annonce2">•Construction anti-sismique</label></b><label id="annonce2">: ' . $bien_constructionantisismique . '</label><br/><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_anneeconstruction != "") {
                echo '<b><label for="annonce2">•Année de construction</label></b><label id="annonce2">: ' . $bien_anneeconstruction . '</label><br/><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_surfacehabitable != "") {
                echo '<b><label for="annonce2">•Surface Habitable</label></b><label id="annonce2">: ' . $bien_surfacehabitable . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_chambreacoucher != "") {
                echo '<b><label for="annonce2">•Chambres à coucher</label></b><label id="annonce2">: ' . $bien_chambreacoucher . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?><br/>
            <?php if ($bien_salledebains != "") {
                echo '<b><label for="annonce2">•Salles de bains</label></b><label id="annonce2">: ' . $bien_salledebains . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_gardiensecurite == "Oui") {
                echo '<b><label for="annonce2">•Gardien de sécurité</label></b><label id="annonce2">: ' . $bien_gardiensecurite . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
            <?php if ($bien_accesroutepave == "Oui") {
                echo '<b><label for="annonce2">•Accès route pavée</label></b><label id="annonce2">: ' . $bien_accesroutepave . '</label><br/>';
            } else {
                $nombrevide = $nombrevide + 1;
            } ?>
        </div><?php
        $i = 0;
        while ($i <= $nombrevide) {
            echo '<br/>';
            $i++;
        }
        ?>

        <div style="float: right;margin-top: -270px;">
            <?php if ($bien_taxesannuelles != "") {
                echo '<b><label for="annonce2">•Taxes annuelles</label></b><label id="annonce2">: ' . $bien_taxesannuelles . '</label><br/>';
            } ?>
            <?php if ($bien_chargemensuelles != "") {
                echo '<b><label for="annonce2">•Charges Mensuelles</label></b><label id="annonce2">: ' . $bien_chargemensuelles . '</label><br/>';
            } ?>
            <?php if ($bien_lignetelephonique == "Oui") {
                echo '<b><label for="annonce2">•Ligne téléphonique</label></b><label id="annonce2">: ' . $bien_lignetelephonique . '</label><br/>';
            } ?>
            <?php if ($bien_sourceeau != "") {
                echo '<b><label for="annonce2">•Source d’eau</label></b><label id="annonce2">: ' . $bien_sourceeau . '</label><br/>';
            } ?>
            <?php if ($bien_electricite == "Oui") {
                echo '<b><label for="annonce2">•Electricité</label></b><label id="annonce2">: ' . $bien_electricite . '</label><br/>';
            } ?>
            <?php if ($bien_raccordementtv == "Oui") {
                echo '<b><label for="annonce2">•Raccordement TV</label></b><label id="annonce2">: ' . $bien_raccordementtv . '</label><br/>';
            } ?>
            <?php if ($bien_internet == "Oui") {
                echo '<b><label for="annonce2">•Internet</label></b><label id="annonce2">: ' . $bien_internet . '</label><br/>';
            } ?>
            <?php if ($bien_piscine == "Oui") {
                echo '<b><label for="annonce2">•Piscine</label></b><label id="annonce2">: ' . $bien_piscine . '</label><br/>';
            } ?>
            <?php if ($bien_emplacementbbq == "Oui") {
                echo '<b><label for="annonce2">•Emplacement Barbecue</label></b><label id="annonce2">: ' . $bien_emplacementbbq . '</label><br/><br/>';
            } ?>
            <?php if ($bien_airconditionne == "Oui") {
                echo '<b><label for="annonce2">•Air conditionné</label></b><label id="annonce2">: ' . $bien_airconditionne . '</label><br/>';
            } ?>
            <?php if ($bien_quartport == "Oui") {
                echo '<b><label for="annonce2">•Quart port</label></b><label id="annonce2">: ' . $bien_quartport . '</label><br/>';
            } ?>
            <?php if ($bien_abrijardinrancho == "Oui") {
                echo '<b><label for="annonce2">•Abri de jardin / Rancho</label></b><label id="annonce2">: ' . $bien_abrijardinrancho . '</label><br/><br/>';
            } ?>
            <?php if ($bien_buanderie == "Oui") {
                echo '<b><label for="annonce2">•Buanderie</label></b><label id="annonce2">: ' . $bien_buanderie . '</label><br/>';
            } ?>
            <?php if ($bien_terrasse == "Oui") {
                echo '<b><label for="annonce2">•Terrasse</label></b><label id="annonce2">: ' . $bien_terrasse . '</label><br/>';
            } ?>
            <?php if ($bien_meuble == "Oui") {
                echo '<b><label for="annonce2">•Meublé</label></b><label id="annonce2">: ' . $bien_meuble . '</label><br/>';
            } ?>
        </div>
    </div>
    <!-- end of section 1 -->


    <div class="cleaner_with_height">&nbsp;</div>
    <?php
    $lesbiens5 = mysql_query("SELECT * FROM marcus_imagesbiens WHERE numbien='$idbien' ORDER BY id DESC");

    while ($lebien6 = mysql_fetch_array($lesbiens5)) {
        $le_id = $lebien6['id'];
        $le_numbien = $lebien6['numbien'];
        $le_titre = $lebien6['titre'];
        $le_src = $lebien6['src'];


        ?>
        <div>
            <img u="image" src="<?php echo $le_src; ?>" height="100%" width="100%"/><br/><br/>
        </div>
        <?php
    }
    ?>
</div>


<?php

include('3biens.php');
include('footer.php');

?>

