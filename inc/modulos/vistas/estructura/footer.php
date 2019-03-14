<footer>
	<div class="container">
		<div class="flex">
			<div class="animado fadeIn">
				<img src="<?php echo $ruta; ?>img/f_logo.png">
				<hr>
				<?php echo $seccion->obtenerTexto(2);?>
			</div>
			<div class="animado fadeIn">
				<b>Acerca de Nettsalud</b>
				<ul>
					<li><a href="<?php echo $ruta; ?>nosotros">Nosotros</a></li>
					<li><a href="<?php echo $ruta; ?>servicios-medicos">Servicios Medicos</a></li>
					<li><a href="<?php echo $ruta; ?>servicios-dentales">Servicios Dentales</a></li>
					<li><a href="<?php echo $ruta; ?>trabaja-con-nosotros">Trabaja con nosotros</a></li>
					<li><a href="<?php echo $ruta; ?>convenios">Convenios</a></li>
					<li><a href="<?php echo $ruta; ?>blog">Blog</a></li>
				</ul>

			</div>
			<div class="animado fadeIn">
				<b>Contacto</b>
				<ul>
					<li>
						<div>
							<img src="<?php echo $ruta; ?>img/tel.png"> 
						</div>
						<div>
							<a href="tel:<?php echo $Informacion['Telefono']; ?>">Emergencias: <b><?php echo $Informacion['Telefono']; ?></b></a>
						</div>
					</li>
					<li>
						<div>
							<img src="<?php echo $ruta; ?>img/mail.png"> 
						</div>
						<div>
							<a href="mailto:<?php echo $Informacion['Email']; ?>"><b><?php echo $Informacion['Email']; ?></b></a>
						</div>
					</li>
					<li>
						<div>
							<img src="<?php echo $ruta; ?>img/mail.png"> 
						</div>
						<div>
							<a href="mailto:<?php echo $Informacion['Email 2']; ?>"><b><?php echo $Informacion['Email 2']; ?></b></a>
						</div>
					</li>
					<li>
						<div>
							<img src="<?php echo $ruta; ?>img/dir.png"> 
						</div>
						<div>
							<?php echo $Informacion['Direccion']; ?>
						</div>
					</li>
				</ul>
			</div>
			<div class="animado fadeIn">
				<a href="<?php echo $ruta; ?>reservar">
					<button class="tipo1">Reservar hora</button>
				</a>
				<a href="<?php echo $ruta; ?>anular">
					<button class="tipo2">Anular hora</button>
				</a>
				<hr>
				<b>Estamos en</b>
				<a href="<?php echo $Informacion['Link FB']; ?>" target="_blank">
					<img src="<?php echo $ruta; ?>img/f_fb.png">
				</a>
				<a href="<?php echo $Informacion['Link IN']; ?>" target="_blank">
					<img src="<?php echo $ruta; ?>img/f_in.png">
				</a>
			</div>

		</div>
	</div>
	<div class="bajo animado fadeIn">
		<div class="container">
			<b>Nettsalud ®</b> <?php echo date("Y"); ?>
		</div>
	</div>
</footer>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'bjhbDkwqfS';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131663950-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131663950-1');
</script>