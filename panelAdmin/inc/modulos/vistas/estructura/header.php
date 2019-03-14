<header>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="<?php echo $ruta;?>"><img src="<?php echo $ruta; ?>img/logoDes.png" alt="MMW"></a>
			</div>
			<div class="col-md-6 header">
				<h6>Panel de administración</h6>
				<?php
				date_default_timezone_set("America/Santiago");
				$dias = array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				?>
				<p><?php echo $dias[date('N')-1]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'); ?></p><br>

				
				<div class="sesion">
					<?php if($_SESSION['idUsuariosAdmin']){ ?>
					<p><span class="glyphicon glyphicon-user"></span><?php echo nombreAdmin($_SESSION['idUsuariosAdmin']); ?></p><a href="<?php echo $ruta;?>cerrarSesionAdmin"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a>
					<?php }else{ ?>
					<p>Iniciar sesión</p>
					<?php } ?>
				</div>
				
			</div>
		</div>
	</div>
</header>
<div id="cargando"></div>