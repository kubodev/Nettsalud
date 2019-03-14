<title>Editar pestaña - <? echo $sufijoTitulo; ?></title>
<?php $idSeccion = $_GET['idSeccion']; ?>

	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo"><?php echo $seccion->obtenerAtributo('Titulo',$idSeccion); ?></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>seccion">Pestañas de contenido</a></li>
				<li class="active">Editar pestaña</li>
			</ol>
		</section>

		<section id="admSecciones">
			<form method="post" onsubmit="javascript:cargadorOn()" id="seccionYElementos" action="" enctype="multipart/form-data" class="seccion">				
				<?php
				$dir=explode('inc',dirname(__FILE__));

				/* Scripts para envío de formulario */
				require_once($dir[0].'inc/modulos/php/scripts/secciones/infoSeccion.php');
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0].'inc/modulos/php/scripts/secciones/elementos.php');
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0].'inc/modulos/php/scripts/secciones/slider.php');
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0].'inc/modulos/php/scripts/secciones/fotos.php');
				/* Fin Scripts para envío de formulario */
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-infoSeccion.php");
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-elementos.php");
				?>
			</form>
			<?php
			$dir=explode('inc',dirname(__FILE__));
			require_once($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-fotos.php");
			$dir=explode('inc',dirname(__FILE__));
			require_once($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-slider.php");
			?>
		</section>
	</div>