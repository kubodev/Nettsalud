<style>
/* Loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(<?php echo $ruta; ?>img/loader.gif) center no-repeat #fff;
}
/* Fin Loader */
</style>
<div class="se-pre-con"></div>
<header>
	<div class="sup animado fadeDown t-animated">
			<div class="row">
				<div class="col-md-5">
					<img src="<?php echo $ruta; ?>img/dir.png"> <?php echo $Informacion['Direccion']; ?>
				</div>
				<div class="col-md-2">
					<img src="<?php echo $ruta; ?>img/mail.png"> <a href="mailto:<?php echo $Informacion['Email']; ?>"><?php echo $Informacion['Email']; ?></a>
				</div>
				<div class="col-md-2">
					<img src="<?php echo $ruta; ?>img/mail.png"> <a href="mailto:<?php echo $Informacion['Email']; ?>"><?php echo $Informacion['Email 2']; ?></a>
				</div>
				<div class="col-md-2">
					<img src="<?php echo $ruta; ?>img/tel.png"> <a href="tel:<?php echo $Informacion['Telefono']; ?>"><?php echo $Informacion['Telefono']; ?></a>
				</div>
				<div class="col-md-1">
					<a href="<?php echo $Informacion['Link FB']; ?>" target="_blank">
						<img src="<?php echo $ruta; ?>img/fb.png">
					</a>
					<a href="<?php echo $Informacion['Link IN']; ?>" target="_blank">
						<img src="<?php echo $ruta; ?>img/in.png">
					</a>
				</div>
				<!--<div class="col-md-1">
					<a href="#">
						<img src="<?php echo $ruta; ?>img/buscar.png">
					</a>
				</div>-->
			</div>
	</div>
	<div class="bajo">
		<div class="container">
			<div class="flex">
				<div id="logo" class="animado fadeLeft t-animated">
					<a href="<?php echo $ruta; ?>"><img src="<?php echo $ruta; ?>img/logo.png"></a>
				</div>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

						<span class="sr-only">Toggle navigation</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

					</button>
				<nav class="animado fadeRight t-animated">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

						<ul class="nav navbar-nav">
							<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>">Inicio</a>
							</li>
							<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>nosotros">Nosotros</a>
							</li>
							<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>servicios-medicos">Servicios médicos</a>
							</li>
							<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>servicios-dentales">Servicios dentales</a>
							</li>
							<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>trabaja-con-nosotros">Trabaja con nosotros</a>
							</li>
							<!--<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>convenios">Convenios</a>
							</li>-->
							<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>blog">Blog</a>
							</li>
							<li class="hvr-fade">
								<a href="<?php echo $ruta; ?>contacto">Contacto</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>