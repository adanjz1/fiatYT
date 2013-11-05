<?php
define('CANT_AUTOS',18);
    function htmlHeader(){
        return '<!DOCTYPE html>
            <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <link rel="stylesheet" type="text/css" media="all" href="media/css/styles.css">
                    <link rel="stylesheet" type="text/css" media="all" href="media/css/carousel.css">
                    <script src="media/js/jquery.js"></script>                    
                    <script src="media/js/carousel.js"></script>
                    
                    <script src="media/js/main.js"></script>
                    
                    
                    <!-- optionally include helper plugins -->
		<script type="text/javascript" language="javascript" src="media/js/helper-plugins/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/helper-plugins/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
                    <script src="media/js/jquery-animate-css-rotate-scale.js" type="text/javascript"></script>
                    <link rel="stylesheet" type="text/css" media="all" href="media/css/carousel2.css">
                    <script src="media/js/jqueryCarousel2.js" type="text/javascript" charset="utf-8"></script>
                    <script src="media/js/jqueryMigrate.js" type="text/javascript" charset="utf-8"></script>
                    <title>Fiat channel</title>';
    }
    function containerHtmlTop(){
        return '<div class="container">
                    <div class="cajaCentral">
                        <div class="borderSIzq corner"></div>
                        <div class="margenS"></div>
                        <div class="borderSDer corner"></div>
                        <div class="contenido">
                            <div class="bordeIzquierda"></div>
                            <div class="bordeDerecha"></div>';
    }
    function containerHtmlBottom(){
        return '
            </div>
            <div class="borderIIzq corner">
            </div>
            <div class="margenI">
            </div>
            <div class="borderIDer corner">
            </div>
        </div>
        </div>';
    }
    function Seccion($id,$c,$eventos){?>
        <div id="<?= strtoupper($id); ?>" class="elemento">
                <div id="CARROUSEL<?= strtoupper($id); ?>">
                
                <div class="carousel-container">

                  <div id="carousel-<?= $id ?>">
                    <? 
                    for($i=0;$i<count($eventos);$i++){
                        echo '<div class="carousel-feature">
                                <a href="javascript:void(0)" onclick="goHorizontalTo'. $id .'(\'.postventasRotator\',\''.$id.'_'.$i.'\')"><img class="carousel-image" alt="Image Caption" src="http://img.youtube.com/vi/'.$eventos[$i]['id'].'/0.jpg"></a>
                              </div>';
                    }
                    ?>
                  </div>

                  <div id="but_prev_<?= $id ?>" class="prevcarr1"><img src="media/img/flecha.png" /></div>
                  <div id="but_next_<?= $id ?>" class="nextcarr1"><img src="media/img/flecha.png" /></div>
                </div>
  
                </div>
                <div id="<?= strtoupper($id); ?>UNICO">
                    <div class="cabinaSuperior"></div>
                    <div class="<?= $id; ?>AlaVista">
                        <div class="<?= $id; ?>sRotator">
                        <? 
                        for($i=0;$i<count($eventos);$i++){
                            echo '<div class="auto" id="'.$id.'_'.$i.'">
                                    <div class="innermodelData">'.$eventos[$i]['titulo'].'</div>
                                    <iframe width="500" height="280" src="http://www.youtube.com/embed/'.$eventos[$i]['id'].'" frameborder="0" allowfullscreen></iframe>
                                  </div>';
                        }
                        ?>
                        </div>
                    </div>    
                <div class="volanteBottom">
                    
                    <div class="volanteBack">
                            <div class="volante"></div>
                    </div>
                    <div class="volantecostado">
                    </div>
                </div>
                    <div class="<?= $id?>s">
                        <ul>
                            <?
                            for($i=0;$i<count($eventos);$i++){
                                echo '<li style="width: 75px; height: 50px;"><a href="javascript:void(0)" onclick="goHorizontalTo'.$id.'(\'.'.$id.'Rotator\',\''.$id.'_'.$i.'\')"><img alt="Image Caption" src="http://img.youtube.com/vi/'.$eventos[$i]['id'].'/0.jpg" width="75" height="50"></a></li>';
                            }
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                        <div id="prev<?=$c?>" class="thumb_prev"></div>
                        <div id="next<?=$c?>" class="thumb_next"></div>
                    </div>
                </div>
                <div class="volver"></div>
            </div>
            <?
    }
?>
