// JavaScript Document
//Efecto Placeholder PreHTML5
function placeHolderJs(){
	
	$('.phinput').val( $('.phinput').attr('placeholder'));
	
	$('input[type=text]').focus(function(){
        if($(this).val() == $(this).attr('placeholder')){
            $(this).val('');
        }
    });
 
    $('input[type=text]').blur(function(){
        if($(this).val() == ''){
            $(this).val($(this).attr('placeholder'));
        }
	});
	$('textarea').focus(function(){
        if($(this).val() == $(this).attr('placeholder')){
            $(this).val('');
        }
    }); 
    $('textarea').blur(function(){
        if($(this).val() == ''){
            $(this).val($(this).attr('placeholder'));
        }
	});
	/*if(comentario == '' || comentario == $('#comment').attr('defaultValue')) {
					//Programación del error
	}*/
};

// EFECTO FADE OVER
function efectoFade(element, valueOn, valueOff) {
	element.hover(
		function() {
			$($(this)).stop().animate({"opacity": valueOn}, "fast");
		},
		function() {
			$($(this)).stop().animate({"opacity": valueOff}, "fast");
	});
};
// LIMITADOR DE TEXTO
function limita(texto, maxlong, elEvento) {
	var evento = elEvento || window.event;
	var codigoCaracter = evento.charCode || evento.keyCode;
	if(codigoCaracter == 37 || codigoCaracter == 39) {
		return true;
	}
	if(codigoCaracter == 8 || codigoCaracter == 46) {
		return true;
	}
	else if(texto.value.length >= maxlong ) {
		return false;
	}
	else {
		return true;
	}
}
function limitaActual(texto, maxlong, aviso) {
	var info = $("#"+aviso);
	var largoTxt = $(texto).val().length;
	var restan;
	
	if(largoTxt >= maxlong ) {
		
		info.html("(M&aacute;ximo de caracteres)");
	//	info.innerHTML = "(Máximo "+maxlong+" caracteres)";
	}
	else {
		restan = maxlong-largoTxt;
		
		info.html("(Restan "+ restan + " caracteres)");
	}
	var tecla, int_value, out_value;
	if (largoTxt > maxlong)
	{
		in_value = $(texto).val();
		out_value = in_value.substring(0,maxlong);
		$(texto).val(out_value);
		alert("La longitud maxima es de " + maxlong + " caracteres");
		return false;
	}
	return true;
}
// SETEAR COD AREA
function setCod(origen, origenSelect, destino) {
	$(destino).val('+ '+$(origenSelect).attr('ac'));
	
	$(origen).change(function() {  
		var ac = $(this).find("option:selected").attr("ac");  
        $(destino).val('+ '+ac);
    });
}
//
//MOSTRAR PRECARGA EN LOADING PAGE

function showLoadingImgFn(contPrecarga, contenido){
		$(contPrecarga).append('<div class="preloaderDiv"><span><img src="images/ajax_loaded.gif" width="32" height="32" alt="" /></span></div>');
		$(contPrecarga).css({
			height:  $(contenido).height()+'px'
		});
		$(contenido).css({
			display: "none"
		});
}
function hideLoadingImgFn(contPrecarga, contenido, html){
	if(currentV=='modelosGral'){	
		$('.preloaderDiv').fadeOut(1, function () {
			$('.preloaderDiv').remove();
			$(contenido).html(html);
			$(contenido).fadeIn(1, function () {
				altoV = ((560-300)/2);
				$('#carousel').css({
					'padding-top': altoV+'px'
				});
				$('#carousel').css({
					'padding-top': altoV+'px'
				});
				
				primeroV = true;
				currModCar = 2;	
				
				if(parseInt($('.pageContent').width()) >480){	
					$('#carouselModelos').carouFredSel({
						auto: false,
						prev	: {
							button	: ".thumb_prev",
							onBefore: function() {
								currModCar--;
								if(currModCar<1){
									currModCar=18;
								}
								reziseModelos();
							}
						},
						next	: {
							button	: ".thumb_next",
							onBefore: function() {
								currModCar++;
								if(currModCar>18){
									currModCar=1;
								}
								reziseModelos();
							}
						},
						pagination: false,
						mousewheel: false,
						responsive: true,
						width: '100%',
						scroll	: {
							items: 1,
							onAfter	: function( data ) {}
						},
						responsive: true,
						items: {
							width: 400,
							height: 300,	//	optionally resize item-height
							visible: 3
						},
						swipe: {
							onMouse: true,
							onTouch: false
						}
					}); 
						
					$("#carouselModelos li").each(function (i) {
							$(this).attr('data-ancho',($(this).width()));
							$(this).attr('data-id',(i+1));
							$(this).attr('id','id'+(i+1));
							if(i==17){
								reziseModelos();
							}
					});				
				}else{
					$('#carouselModelos').carouFredSel({
						auto: false,
						prev	: {
							button	: ".thumb_prev",
							onBefore: function() {}
						},
						next	: {
							button	: ".thumb_next",
							onBefore: function() {}
						},
						pagination: false,
						mousewheel: false,
						responsive: true,
						width: '100%',
						scroll	: {
							items: 1,
							onAfter	: function( data ) {}
						},
						responsive: true,
						items: {
							width: 400,
							height: 300,	//	optionally resize item-height
							visible: 1
						},
						swipe: {
							onMouse: true,
							onTouch: false
						}
					}); 
					$("#carouselModelos li").each(function (i) {
						$(this).css({"padding-top": "40px"});
					});	
				}
				function reziseModelos(){	
					if(primeroV==true){
						primeroV=false;
					}
					$("#carouselModelos li").each(function (i) {
						if($(this).attr('data-id')==currModCar){
							$(this).stop().animate({"width": ((parseInt($(this).attr('data-ancho')))+150)+"px", "margin-right": "-50px", "margin-left": "-50px", "padding-right": "0", "padding-left": "0", "padding-top": "10px"}, "slow");
							$('#'+$(this).attr('id')+' .titModelo').stop().animate({"opacity": 1});
						}else{
							$(this).stop().animate({"width": (parseInt($(this).attr('data-ancho')))+"px", "margin-right": "6px", "margin-left": "6px", "padding-right": "50px", "padding-left": "50px", "padding-top": "100px"}, "slow");
							$('#'+$(this).attr('id')+' .titModelo').stop().animate({"opacity": 0});
						}				
					});				
				}
				
			
			});
		});   
	}else if((currentV=='comercialesGral')||(currentV=='postventaGral')||(currentV=='eventosGral')){	
		
		switch(currentV){
			case 'comercialesGral':
				maxV = 7;
				maxV2 = 6;
				break;
			case 'postventaGral':
				maxV = 5;
				maxV2 = 4;
				break;
			case 'eventosGral':
				maxV = 5;
				maxV2 = 4;
				break;
		}
		
		$('.preloaderDiv').fadeOut(1, function () {
			$('.preloaderDiv').remove();
			$(contenido).html(html);
			$(contenido).fadeIn(1, function () {
				altoV = ((560-400)/2);
				$('#carousel').css({
					'padding-top': altoV+'px'
				});
				$('#carousel').css({
					'padding-top': altoV+'px'
				});
				
				primeroV = true;
				currModCar = 2;	
				
				if(parseInt($('.pageContent').width()) >480){	
					$('#carouselModelos').carouFredSel({
						auto: false,
						prev	: {
							button	: ".thumb_prev",
							onBefore: function() {
								currModCar--;
								if(currModCar<1){
									currModCar=maxV;
								}
								reziseComerciales();
							}
						},
						next	: {
							button	: ".thumb_next",
							onBefore: function() {
								currModCar++;
								if(currModCar>maxV){
									currModCar=1;
								}
								reziseComerciales();
							}
						},
						pagination: false,
						mousewheel: false,
						responsive: true,
						width: '100%',
						scroll	: {
							items: 1,
							onAfter	: function( data ) {}
						},
						responsive: true,
						items: {
							width: 200,
							height: 360,	//	optionally resize item-height
							visible: 3
						},
						swipe: {
							onMouse: true,
							onTouch: false
						}
					}); 
						
					$("#carouselModelos li").each(function (i) {
							$(this).attr('data-ancho',($(this).width()));
							$(this).attr('data-id',(i+1));
							$(this).attr('id','id'+(i+1));
							if(i==maxV2){
								reziseComerciales();
							}
					});				
				}else{
					$('#carouselModelos').carouFredSel({
						auto: false,
						prev	: {
							button	: ".thumb_prev",
							onBefore: function() {}
						},
						next	: {
							button	: ".thumb_next",
							onBefore: function() {}
						},
						pagination: false,
						mousewheel: false,
						responsive: true,
						width: '100%',
						scroll	: {
							items: 1,
							onAfter	: function( data ) {}
						},
						items: {
							width: 200,
							height: 360,	//	optionally resize item-height
							visible: 1
						},
						swipe: {
							onMouse: true,
							onTouch: false
						}
					}); 
					$("#carouselModelos li").each(function (i) {
						$(this).css({"padding-top": "80px"});
					});	
				}
				function reziseComerciales(){	
					if(primeroV==true){
						primeroV=false;
					}
					$("#carouselModelos li").each(function (i) {
						if($(this).attr('data-id')==currModCar){
							$(this).stop().animate({"width": ((parseInt($(this).attr('data-ancho')))+150)+"px", "margin-right": "-50px", "margin-left": "-50px", "padding-right": "0", "padding-left": "0", "padding-top": "40px"}, "slow");
							$('#'+$(this).attr('id')+' .titModelo').stop().animate({"opacity": 1});
						}else{
							$(this).stop().animate({"width": (parseInt($(this).attr('data-ancho')))+"px", "margin-right": "6px", "margin-left": "6px", "padding-right": "50px", "padding-left": "50px", "padding-top": "100px"}, "slow");
							$('#'+$(this).attr('id')+' .titModelo').stop().animate({"opacity": 0});
						}				
					});				
				}
				
			
			});
		});   
	}else{					
		 $('.preloaderDiv').fadeOut("slow");
		 $('.preloaderDiv').fadeOut("slow", function () {
			 $('.preloaderDiv').remove();
			 $(contenido).html(html);
				 $(contenido).fadeIn("slow", function () {
					if(currentV=='modelos'){
						$('.modelosElegirAuto').css({
							'display': 'block'
						});				
						//	Scrolled by user interaction
						$('#modelosEALista').carouFredSel({
							auto: false,
							prev: '#prev2',
							next: '#next2',
							mousewheel: true,
							width: '100%',
							swipe: {
									onMouse: true,
									onTouch: false
							},
							items: {
								height: 86,
								visible: {
									min         : 3,
									max         : 10
								}

							},
							scroll : {
							  items: 1
						   }
						});
					}else if(currentV=='videos'){	
						$('.videosElegir').css({
							'display': 'block'
						});				
						//	Scrolled by user interaction
						$('#comercialesLista').carouFredSel({
							auto: false,
							prev: '#prev3',
							next: '#next3',
							mousewheel: true,
							swipe: {
									onMouse: true,
									onTouch: false
							},
							scroll : {
							  items: 1
						   }
						});
					}else if(currentV=='postventa'){	
						$('.postventaElegir').css({
							'display': 'block'
						});				
						//	Scrolled by user interaction
						$('#postventaLista').carouFredSel({
							auto: false,
							prev: '#prev4',
							next: '#next4',
							mousewheel: true,
							swipe: {
									onMouse: true,
									onTouch: false
							},
							scroll : {
							  items: 1
						   }
						});
					}else if(currentV=='eventos'){	
						$('.eventosElegir').css({
							'display': 'block'
						});			
						//	Scrolled by user interaction
						$('#eventosLista').carouFredSel({
							auto: false,
							prev: '#prev5',
							next: '#next5',
							mousewheel: true,
							swipe: {
									onMouse: true,
									onTouch: false
							},
							scroll : {
							  items: 1
						   }
						});
					};
				 });
			 $(contenido).css({
				display: "block"
			});
		 });
	}
}
//
//CONFIRM
function tryAgain(contPrecarga, contenido){
		$('.preloaderDiv').remove();
		$(contPrecarga).append('<div class="grid_6 alpha omega c_institucional"><strong>Error al intentar cargar los datos.</strong></div>');
		$(contenido).css({
			display: "block"
		});
}
//
// Botones de nav (ScrollTo)
function setup_navigation() {

  // Navegación top
  $('.linkScroll').click(function(event){
    event.preventDefault();
    
    $new_section = $( $(this).attr('href') );

    scroll_to( (-1)*($new_section.attr('data-topPos') ) );//$new_section.offset().top+ parseInt($new_section.data('offset'))
  });
  
}
function scroll_to( scrolltop ) {
  $('.pageContent').stop().animate({
    top: scrolltop+"px"
  	}, 1500,'easeOutExpo', function () {
		if(currentV=='home'){
			if(videosV==true){
				videosV=false;
				$('#player1').attr('src', '');
				$('#player2').attr('src', '');
				$('.playerGral').each(function (i) {
					$(this).attr('src','');
				}); 
			}
		}
  });
  
}