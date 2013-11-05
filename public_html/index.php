
<!DOCTYPE HTML>
<html prefix="dc: http://purl.org/dc/elements/1.1/" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8" />

<title>Fiat channel</title>
<meta name="description" content="Fiat channel."/>
<meta name="keywords" content="Fiat channel"/>

<!-- [If IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="imagetoolbar" content="no" />
<[Endif] -->
  
<link href="images/favicon.ico" rel="shortcut icon"  type="image/x-icon" />


<meta content='width=device-width, initial-scale=1.0' name='viewport' />

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilos_fiat.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="js/jquery-ui-1.10.0.custom/js/jquery-1.9.0.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery-ui-1.10.0.custom/js/jquery-ui-1.10.0.custom.js"></script>
<script type="text/javascript" src="js/carouFredSel-6.2.0/jquery.carouFredSel-6.2.0.js"></script>
<!-- optionally include helper plugins -->
<script type="text/javascript" language="javascript" src="js/carouFredSel-6.2.0/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" language="javascript" src="js/carouFredSel-6.2.0/helper-plugins/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript" src="js/carouFredSel-6.2.0/helper-plugins/jquery.transit.min.js"></script>
<script type="text/javascript" language="javascript" src="js/carouFredSel-6.2.0/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
<script src="js/carousel/jqueryMigrate.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/basicos/basicos.js"></script>
<script type="text/javascript" src="js/response.min.js"></script>




<script type="text/javascript">
var varAuto = '';
var varVideo = '';
var modelosV = false;
var videosV = false;
var videosIDP1 = 0;
var videosIDP2 = 0;
var videosIMG = '';
var videosTitulo = '';
var videosFrase = '';
var videosIDPTemp = '';
var urlTem = "";
var currentV = 'home';
var animacionV = false;
var anchoMod = '';
var cantModulos = 0;
//lanzar movimiento auto
function lanzarModelo(){
	
	if(currentV=='modelos'){	
		if($('#'+varAuto).attr('data-left')>0){
			
			restLeft = $('#'+varAuto).attr('data-left');
			
			$('.modAutoCont').each(function (i) {
				thisLeft = parseInt($(this).css("left"))-restLeft;
				$(this).stop(true, true).animate({"left": thisLeft}, "fast");
	
			});
			
			$('.modAutoVolante').animate({rotate: "+=23deg"}, "fast");
			$('.modAutoVolante').animate({rotate: '-=23deg'}, 'slow');
		}
	}else if((currentV=='videos')||(currentV=='postventa')||(currentV=='eventos')){
		
		
		
		if($('#'+varAuto).attr('data-left')>0){
			
			restLeft = $('#'+varAuto).attr('data-left');
			
			$('.modAutoCont').each(function (i) {
				thisLeft = parseInt($(this).css("left"))-restLeft;
				$(this).stop(true, true).animate({"left": thisLeft}, "fast");
	
			});
			
			$('.modAutoVolante').animate({rotate: "+=23deg"}, "fast");
			$('.modAutoVolante').animate({rotate: '-=23deg'}, 'slow');
		}
	}

}
//Cambiar Auto	
function cambiarAuto(elegido){		
	
	

	if(animacionV==false){
		
		eTV = $('#'+varAuto).attr('data-leftid');
		
		restLeft = anchoMod*$('#'+elegido).attr('data-leftid');
		
		animacionV = true;	
										
		$('.modAutoCont').each(function (i) {
			thisLeft = parseInt($(this).attr("data-left"))-restLeft;
			$(this).animate({"left": thisLeft}, "easeInExpo", function () {
				
				if(i==cantModulos-1){
					if((currentV=='videos')||(currentV=='postventa')||(currentV=='eventos')){
						$('.playerGral').each(function (i) {
							$(this).attr('src','');
							$(this).attr('src',$(this).attr('data-link'));
							switch(currentV){
								case 'videos':
									varId = 'video_comercial_';
									break;
								case 'postventa':
									varId = 'video_postventa_';
									break;
								case 'eventos':
									varId = 'video_eventos_';
									break;
							}
							if(varId+i==elegido){
								linksrc =  $('#'+elegido+' iframe').attr('data-link');
								$('#'+elegido+' iframe').attr('src', linksrc+'&autoplay=1');
							}
						});
						varAuto = elegido;
						animacionV = false;
						
					}else if(currentV=='modelos'){
						if((elegido=='modelo_video_1')){
							videosV=true;
							switch(varAuto){
								case 'modelo_video_1':
									$('#player1').attr('src', '');
									break;
							}
						}else{
							videosV=false;
							$('#player1').attr('src', '');
						}
						varAuto = elegido;
						animacionV = false;
					}
				}
			});
			
		});
		
		if(eTV>$('#'+elegido).attr('data-leftid')){
			$('.modAutoVolante').animate({rotate: '-=23deg'}, 'easeInExpo');
			$('.modAutoVolante').animate({rotate: "+=23deg"}, "slow");
		}else if(eTV<$('#'+elegido).attr('data-leftid')){
			$('.modAutoVolante').animate({rotate: "+=23deg"}, "easeInExpo");
			$('.modAutoVolante').animate({rotate: '-=23deg'}, 'slow');
		}

	}
	isPropagationStopped();
}

function changeSec(modelo_auto){
		modelosV= true;

		switch(modelo_auto){
			case 'home':
				currentV = 'home';
				$('.modelosElegirAuto').css({
					'display': 'none'
				});	
				$('.videosElegir').css({
					'display': 'none'
				});	
				$('.postventaElegir').css({
					'display': 'none'
				});	
				$('.eventosElegir').css({
					'display': 'none'
				});	
				
				modelosV= false;
				break;
			case 'eventos':
				currentV = 'eventosGral';
				urlTem="inc_eventos.html";
				varItem='';
				loadAjax(urlTem,varItem);
				break;
			case 'video_eventos_0': case 'video_eventos_1': case 'video_eventos_2': case 'video_eventos_3': case 'video_eventos_4':
				currentV = 'eventos';
				urlTem="inc_eventos_elegidos.html";
				varItem='';
				varAuto = modelo_auto;
				videosV=true;
				loadAjax(urlTem,varItem);
				break;
			case 'postventa':
				currentV = 'postventaGral';
				urlTem="inc_postventa.html";
				varItem='';
				loadAjax(urlTem,varItem);
				break;
			case 'video_postventa_0': case 'video_postventa_1': case 'video_postventa_2': case 'video_postventa_3': case 'video_postventa_4':
				currentV = 'postventa';
				urlTem="inc_postventa_elegidos.html";
				varItem='';
				varAuto = modelo_auto;
				videosV=true;
				loadAjax(urlTem,varItem);
				break;
			case 'comerciales':
				currentV = 'comercialesGral';
				urlTem="inc_comerciales.html";
				varItem='';
				loadAjax(urlTem,varItem);
				break;
			case 'video_comercial_0': case 'video_comercial_1': case 'video_comercial_2': case 'video_comercial_3': case 'video_comercial_4': case 'video_comercial_5': case 'video_comercial_6':
				currentV = 'videos';
				urlTem="inc_comerciales_elegidos.html";
				varItem='';
				varAuto = modelo_auto;
				videosV=true;
				loadAjax(urlTem,varItem);
				break;
			case 'modelosGral':
				currentV = 'modelosGral';
				urlTem="inc_modelos.html";
				varItem='';
				loadAjax(urlTem,varItem);
				break;
			case 'modelo_auto_0': case 'modelo_auto_1': case 'modelo_auto_2': case 'modelo_auto_3': case 'modelo_auto_4':
			case 'modelo_auto_5': case 'modelo_auto_6': case 'modelo_auto_7': case 'modelo_auto_8': case 'modelo_auto_9':
			case 'modelo_auto_10': case 'modelo_auto_11': case 'modelo_auto_12': case 'modelo_auto_13': case 'modelo_auto_14':
			case 'modelo_auto_15': case 'modelo_auto_16': case 'modelo_auto_17': case 'modelo_auto_18': 
				currentV = 'modelos';
				urlTem="inc_modelos_elegidos.html";
				varItem='';
				varAuto = modelo_auto;
				loadAjax(urlTem,varItem);
				break;
		}
		
		
}
$(document).ready(function(){

//Efecto de botones Home
	$(".liCont").hover(			
		function() {
			var moverTop = $(this).height()*0.15;
			$(this).stop(true, true).animate({"margin-top": "-"+moverTop+"px","margin-bottom": moverTop+"px"}, "fast");
		},
		function() {
			$(this).stop(true, true).animate({"margin-top": "0", "margin-bottom": "0"}, "fast");
	});
	//
	setup_navigation();
});
	function loadAjax(url, varGets){
		
		urlV = url;
		
		$.ajax({
			type: "get",
			url: urlV,
			data: varGets,
			cache: false,
			beforeSend:showLoadingImgFn($('.contAjax'), $('.ocultAjax'))
		})
		.done(function(html) {
			//alert(html);
			hideLoadingImgFn($('.contAjax'), $('.ocultAjax'), html);
		})
		.fail(function() {
			//alert("error");
		})
		.always(function() {
			//alert("finished");
		});
	}
	
    $(document).ready(function(){ 

		 $(window).resize(function(){
			 if(modelosV==true){				 	
				loadAjax(urlTem,'');
			 }
		});
		$(window).resize();		

    }); 
</script>
</head>

<body data-responsejs='{ 
    "create": [{ 
        "prop": "width"
      , "prefix": "src"
      , "breakpoints": [0, 320, 481, 641, 961, 1025, 1281] 
  }]
}'>

<div id="todo">
	<div id="page">
    	<header class="headPage">
            <img src="images/titulo320.png" alt="example" data-src481="images/titulo480.png" data-src641="images/titulo.png" />
		    <h1>Fiat Auto Argentina</h1>
            <h2>La vida es mejor cuando la manejás</h2>
        </header>
    	
        <div id="pageMain">
            <div id="pageMInner">
            	<div class="pageWrapper">
                	<div class="pageContent">
                    	<a id="home" data-topPos="0"></a>
                        <div class="contSec secHome">
                            <ul class="ulModelos">
                                <li>
                                
                                	<a href="#test" class="linkScroll"  id="liModelos" onclick="changeSec('modelosGral')">
                                    
                                    	<span class="liCont">
                                        	<div class="vinetaHome"></div>
                                        	<img src="images/icon_modelos_320.png" data-src481="images/icon_modelos_960.png">
                                            <span class="liTit">MODELOS</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                	<a href="#test" class="linkScroll"  id="liComerciales" onclick="changeSec('comerciales')">
                                    	<span class="liCont">
                                       		<div class="vinetaHome"></div>
                                       		<img src="images/icon_comerciales_320.png" data-src481="images/icon_comerciales_960.png">
                                            <span class="liTit">COMERCIALES</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                	<a href="#test" class="linkScroll"  id="liPostventa" onclick="changeSec('postventa')">
                                    	<span class="liCont">
                                        	<div class="vinetaHome"></div>
                                       		<img src="images/icon_postventa_320.png" data-src481="images/icon_postventa_960.png">
                                            <span class="liTit">POSTVENTAS</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                	<a href="#test" class="linkScroll"  id="liEventos" onclick="changeSec('eventos')">
                                    	<span class="liCont">
                                        	<div class="vinetaHome"></div>
                                       		<img src="images/icon_eventos_320.png" data-src481="images/icon_eventos_960.png">
                                            <span class="liTit">EVENTOS</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="homeFrase">
                            	<img src="images/img_categoria.jpg" alt="Elige una categoría">
                            </div>
                        </div>
                        <a id="test" data-topPos="560"></a>
                        <div class="contSec">
                        	<a href="#home" class="btnCategorias linkScroll" onclick="changeSec('home')"><span>Categorias</span></a>
                        	<div class="contAjax conImgModelos">                    		                                    
                            <div class="ocultAjax"></div>

                        </div>
                
                
                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <div class="modelosElegirAuto">
    	<div class="modelosElegirAutoCont">
			<div class="wrapperAutos">
				<ul id="modelosEALista">
					<li id="liAuto_1">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_1" ></a>
                    </li>
					<li id="liAuto_2">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_2" ></a>
                    </li>
					<li id="liAuto_3">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_3" ></a>
                    </li>
					<li id="liAuto_4">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_4" ></a>
                    </li>
					<li id="liAuto_5">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_5" ></a>
                    </li>
					<li id="liAuto_6">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_6" ></a>
                    </li>
					<li id="liAuto_7">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_7" ></a>
                    </li>
					<li id="liAuto_8">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_8" ></a>
                    </li>
					<li id="liAuto_9">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_9" ></a>
                    </li>
					<li id="liAuto_10">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_10" ></a>
                    </li>
					<li id="liAuto_11">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_11" ></a>
                    </li>
					<li id="liAuto_12">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_12" ></a>
                    </li>
					<li id="liAuto_13">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_13" ></a>
                    </li>
					<li id="liAuto_14">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_14" ></a>
                    </li>
					<li id="liAuto_15">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_15" ></a>
                    </li>
					<li id="liAuto_16">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_16" ></a>
                    </li>
					<li id="liAuto_17">
                    	<a href="#" class="imgModAutos"  data-autoinfo="modelo_auto_17" ></a>
                    </li>
					<li id="liAuto_18">
                    	<a href="#"  class="imgModAutos"  data-autoinfo="modelo_auto_18" ></a>
                    </li>
				</ul>
				<div class="clearfix"></div>
				<a id="prev2" class="prev thumb_prev" href="#"></a>
				<a id="next2" class="next thumb_next" href="#"></a>
			</div>   
        </div>                         
    </div> 
    
    <div class="videosElegir">
    	<div class="modelosElegirAutoCont">
			<div class="wrapperAutos">
				<ul id="comercialesLista">
					<li><a href="#" data-videoinfo="video_comercial_0" ><img src="http://img.youtube.com/vi/-GrtHuCMLKg/0.jpg"width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_comercial_1" ><img src="http://img.youtube.com/vi/FWTPCNR-TFc/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_comercial_2"><img src="http://img.youtube.com/vi/TbEhrs4Nqzc/0.jpg"  width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_comercial_3"><img src="http://img.youtube.com/vi/8gjsp-yRuow/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_comercial_4"><img src="http://img.youtube.com/vi/eGsWci8Z1eg/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_comercial_5"><img src="http://img.youtube.com/vi/feOuht332_8/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_comercial_6"><img src="http://img.youtube.com/vi/5qW7cb6XGzs/0.jpg" width="75" height="50"></a></li>
				</ul>
				<div class="clearfix"></div>
				<a id="prev3" class="prev thumb_prev" href="#"></a>
				<a id="next3" class="next thumb_next" href="#"></a>
			</div>   
        </div>                         
    </div> 
    
    <div class="postventaElegir">
    	<div class="modelosElegirAutoCont">
			<div class="wrapperAutos">
				<ul id="postventaLista">
					<li><a href="#" data-videoinfo="video_postventa_0"><img src="http://img.youtube.com/vi/Bz9CKZNPRfU/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_postventa_1"><img src="http://img.youtube.com/vi/WKTUyB7umsc/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_postventa_2"><img src="http://img.youtube.com/vi/ai5LWOOaSfI/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_postventa_3"><img src="http://img.youtube.com/vi/Q5I7aERY8UQ/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_postventa_4"><img src="http://img.youtube.com/vi/5p1gOibTa70/0.jpg" width="75" height="50"></a></li>
				</ul>
				<div class="clearfix"></div>
				<a id="prev4" class="prev thumb_prev" href="#"></a>
				<a id="next4" class="next thumb_next" href="#"></a>
			</div>   
        </div>                         
    </div> 
    
    
    <div class="eventosElegir">
    	<div class="modelosElegirAutoCont">
			<div class="wrapperAutos">
				<ul id="eventosLista">
					<li><a href="#" data-videoinfo="video_eventos_0"><img src="http://img.youtube.com/vi/Bz9CKZNPRfU/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_eventos_1"><img src="http://img.youtube.com/vi/WKTUyB7umsc/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_eventos_2"><img src="http://img.youtube.com/vi/ai5LWOOaSfI/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_eventos_3"><img src="http://img.youtube.com/vi/Q5I7aERY8UQ/0.jpg" width="75" height="50"></a></li>
                    <li><a href="#" data-videoinfo="video_eventos_4"><img src="http://img.youtube.com/vi/5p1gOibTa70/0.jpg" width="75" height="50"></a></li>
				</ul>
				<div class="clearfix"></div>
				<a id="prev5" class="prev thumb_prev" href="#"></a>
				<a id="next5" class="next thumb_next" href="#"></a>
			</div>   
        </div>                         
    </div> 
        
        
        
    </div>
    <div class="clearfix"></div>
</div>

</body>
</html>
