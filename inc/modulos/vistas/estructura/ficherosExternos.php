<!-- Estilos -->
<link async href="<?php echo $ruta ?>css/reset.css" rel="stylesheet" type="text/css">
<link async href="<?php echo $ruta ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link async href="<?php echo $ruta ?>css/estilo.css?50" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo $ruta; ?>css/t-scroll.min.css">
<link async href="<?php echo $ruta ?>css/hover.css" rel="stylesheet" type="text/css">
<!-- Scripts -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script async type="text/javascript" src="<?php echo $ruta ?>js/funciones.js?2"></script>
<script async type="text/javascript" src="<?php echo $ruta ?>js/bootstrap.js"></script>
<script src="<?php echo $ruta ?>js/parallax.min.js"></script>
<script type="text/javascript" src="<?php echo $ruta; ?>js/t-scroll.min.js"></script>
<script>
$('button:not(.navbar-toggle)').addClass("hvr-bounce-in");
$('.img').addClass("parallax");
$('.img').attr("data-paroller-factor","0.1");
$('.bgNosotros').addClass("parallax");
$('.bgNosotros').attr("data-paroller-factor","0.1");
if(screen.width > 700)
{
	$('body:not(#S_Servicio) .hoja').addClass("animado");
	$('body:not(#S_Servicio) .hoja').addClass("fadeIn");
	$('.equipo li').addClass("animado");
	$('.equipo li').addClass("bounceIn");
}
Tu.tScroll({
	      't-element': '.animado',
	      't-duration': 1
	    });
	    $('.parallax').paroller({
                            factor: 0.3,            // multiplier for scrolling speed and offset
                            type: 'background',     // background, foreground
                            direction: 'vertical' // vertical, horizontal, TODO: diagonal
                        });
/* Loader */
		
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
	
		/* Fin Loader*/
		$(function() {
  $(window).scroll(function() {
if ($(window).scrollTop() > 80) {
  $("header").addClass("fijo");
} else {
  $("header").removeClass("fijo");
}
  });
});
		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth',
            inline:'start'
        });
    });
});
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});
	</script>