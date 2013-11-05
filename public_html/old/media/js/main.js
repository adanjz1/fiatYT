$(document).ready(function() {
    //$('#COMERCIALES').css('margin-top',$('#COMERCIALES').position().top);
    //$('#MODELOS').css('left',$('.ELEMENTOS').width()+200);
    
    
    $('.autos ul').carouFredSel({
            auto: false,
            prev: '#prev2',
            next: '#next2',
            mousewheel: true,
            swipe: {
                    onMouse: true,
                    onTouch: true
            },
            scroll : {
                        items           : 1
                     }
    });
    
    
    
    $('.comerciales ul').carouFredSel({
            auto: false,
            prev: '#prev3',
            next: '#next3',
            mousewheel: true,
            swipe: {
                    onMouse: true,
                    onTouch: true
            },
            scroll : {
                        items           : 1
                     }
    });
    $('.Eventos ul').carouFredSel({
            auto: false,
            prev: '#prev4',
            next: '#next4',
            mousewheel: true,
            swipe: {
                    onMouse: true,
                    onTouch: true
            },
            scroll : {
                        items           : 1
                     }
    });
    $('.postventas ul').carouFredSel({
            auto: false,
            prev: '#prev5',
            next: '#next5',
            mousewheel: true,
            swipe: {
                    onMouse: true,
                    onTouch: true
            },
            scroll : {
                        items           : 1
                     }
    });
    var carousel = $("#carousel").featureCarousel({
          autoPlay:0
          // include options like this:
          // (use quotes only for string values, and no trailing comma after last option)
          // option: value,
          // option: value
        });
    carousel.stop();
        $("#but_prev").click(function () {
          carousel.prev();
        });
          
        
        $("#but_next").click(function () {
          carousel.next();
        });

var carousel2 = $("#carousel-comerciales").featureCarousel({
          autoPlay:0
          // include options like this:
          // (use quotes only for string values, and no trailing comma after last option)
          // option: value,
          // option: value
        });
    carousel2.stop();
        $("#but_prev_comercial").click(function () {
          carousel2.prev();
        });
          
        
        $("#but_next_comercial").click(function () {
          carousel2.next();
        });
    
var carousel3 = $("#carousel-Evento").featureCarousel({
          autoPlay:0
          // include options like this:
          // (use quotes only for string values, and no trailing comma after last option)
          // option: value,
          // option: value
        });
    carousel3.stop();
        $("#but_prev_Evento").click(function () {
          carousel3.prev();
        });
          
        
        $("#but_next_Evento").click(function () {
          carousel3.next();
        });
var carousel4 = $("#carousel-postventa").featureCarousel({
          autoPlay:0
          // include options like this:
          // (use quotes only for string values, and no trailing comma after last option)
          // option: value,
          // option: value
        });
    carousel4.stop();
        $("#but_prev_postventa").click(function () {
          carousel4.prev();
        });
          
        
        $("#but_next_postventa").click(function () {
          carousel4.next();
        });
        $('.volver').click(function(){
           $('.ELEMENTOS').animate({ 
                'top': 0
            }, 'slow' );
            $('.modelosRotator').css('left',900);
            $('#CARROUSELMODELOS').show();
            $('.autos').hide();
            $('#MODELOUNICO').css('left',950);
            
            $('.comercialesRotator').css('left',900);
            $('#CARROUSELCOMERCIALES').show();
            $('.comerciales').hide();
            $('#COMERCIALUNICO').css('left',950);
            
            $('.postventasRotator').css('left',900);
            $('#CARROUSELPOSTVENTA').show();
            $('.postventas').hide();
            $('#POSTVENTAUNICO').css('left',950);
            
            $('.EventoRotator').css('left',900);
            $('#CARROUSELEVENTO').show();
            $('.Eventos').hide();
            $('#EVENTOUNICO').css('left',950);
            $('.videoGrande').hide();
            $('.video2Boton').hide();
            $('.imagenAutoUnico').removeClass('imagenAutoUnicoBis')
            $('.videoPlayer').css('display','inline');
            $('.videoPlayer2').css('display','inline');
            $('.titles').css('display','inline');
            $('.sombra1').removeClass('sombra1Bis');
            $('.sombra2').removeClass('sombra2Bis');
            
        });
        $('.playerToBig').click(function(){
               $(this).parent().parent().find('.videoGrande').css('display','inline');
               $(this).parent().parent().find('.video2Boton').css('display','inline');
               $(this).parent().parent().find('.videoGrande').html('<iframe width="400" height="290" src="http://www.youtube.com/embed/'+$(this).attr('video')+'" frameborder="0" allowfullscreen></iframe>');
               $(this).parent().parent().find('.video2Boton').attr('video',$(this).attr('video2'));
               $(this).parent().parent().find('.video2Boton').attr('video2',$(this).attr('video'));
               $(this).parent().parent().find('.videoPlayer').hide();
               $(this).parent().parent().find('.sombra1').addClass('sombra1Bis');
               $(this).parent().parent().find('.sombra2').addClass('sombra2Bis');
               $(this).parent().parent().find('.titles').hide();
               $(this).parent().parent().find('.videoPlayer2').hide();
               $(this).parent().parent().parent().find('.imagenAutoUnico').addClass('imagenAutoUnicoBis');
        });
        $('.marcoVideo2').click(function(){
           $(this).parent().find('.playerToBig').click(); 
        });
        $('.marcoVideo1').click(function(){
           $(this).parent().find('.playerToBig').click(); 
        });
});
function goHorizontalTo(caja,elemento){
    $('#MODELOUNICO').css('left',0);
    $('#'+elemento).show();
    $('#CARROUSELMODELOS').hide();
    $('.autos').show();
    var posElemento = $('#'+elemento).position();
    $(caja).css('position','absolute');
    if(posElemento.left > -($('.modelosRotator').css('left')).replace('px', '')){
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
    }else{
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
    }
    $(caja).animate({ 
        'left': '-'+(posElemento.left+100)
      }, 'slow' );
}
function goHorizontalToComercial(caja,elemento){
    $('#COMERCIALUNICO').css('left',0);
    $('#'+elemento).show();
    $('#CARROUSELCOMERCIALES').hide();
    $('.comerciales').show();
    var posElemento = $('#'+elemento).position();
    $(caja).css('position','absolute');
    if(posElemento.left > -($('.comercialesRotator').css('left')).replace('px', '')){
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
    }else{
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
    }
    $(caja).animate({ 
        'left': '-'+(posElemento.left+100)
      }, 'slow' );
}
function goHorizontalToEvento(caja,elemento){
    console.log('evento');
    $('#EVENTOUNICO').css('left',0);
    $('#'+elemento).show();
    $('#CARROUSELEVENTO').hide();
    $('.Eventos').show();
    console.log(elemento);
    console.log($('#'+elemento).position());
    var posElemento = $('#'+elemento).position();
    $('.EventosRotator').css('position','absolute');
    if(posElemento.left > -($('.EventosRotator').css('left')).replace('px', '')){
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
    }else{
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
    }
    $('.EventosRotator').animate({ 
        'left': '-'+(posElemento.left+100)
      }, 'slow' );
}
function goHorizontalToPostVenta(caja,elemento){
    $('#POSTVENTAUNICO').css('left',0);
    $('#'+elemento).show();
    $('#CARROUSELPOSTVENTA').hide();
    $('.postventas').show();
    var posElemento = $('#'+elemento).position();
    $(caja).css('position','absolute');
    if(posElemento.left > -($('.postventasRotator').css('left')).replace('px', '')){
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
    }else{
          $('.volante').animate({rotate: '-=23deg'}, 'slow');
          $('.volante').animate({rotate: '+=23deg'}, 'slow');
    }
    $(caja).animate({ 
        'left': '-'+(posElemento.left+100)
      }, 'slow' );
}
function moveTopTo(elemento){
    var posElemento = $('#'+elemento).position();
    $('.ELEMENTOS').css('position','absolute');
    $('.ELEMENTOS').animate({ 
        'top': "-"+posElemento.top+"px",
      }, 'slow' );
    $('#'+elemento).show();
}

    