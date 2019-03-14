<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Editar etiqueta</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li><a href="<?php echo $ruta; ?>publicaciones/categorias">Categorías de Publicación</a></li>
			<li class="active">Editar etiqueta</li>
		</ol>
	</section>

	
	<section class="seccion">
		<?php
		$dir=explode('inc',dirname(__FILE__));
		$sql = mysql_query("SELECT * FROM PublicacionCategoria WHERE idPublicacionCategoria = '".seguridad_sql($_GET['idPublicacionCategoria'])."'");
		$col = mysql_fetch_array($sql);
		?>
		<form onsubmit="javascript:cargadorOn()" id="publicacionCategoria-editar" method="post">

			<div class="lineaform"><label>Nombre:</label><input name="Nombre" value="<?php echo $col['Nombre']; ?>" maxlength="200" type="text"/></div>
			<?php
			if(count($idiomas) > 1) // Sistema de idiomas

			{

				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba

				echo'<div class="lineaform"><label>Nombre ['.$idiomas[$posicion].']:</label><input value="'.$col['Nombre_'.$idiomas[$posicion]].'" name="Nombre_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';

			}
			?>
			<?php if($Configuracion['CategoriasImg'] == 1) { ?><div class="lineaform"><label>Imágen:</label><input name="img" maxlength="120" type="file" required/></div><?php } ?>
			<div class="lineaform">
			<input type="hidden" name="idPublicacionCategoria" value="<?php echo $_GET['idPublicacionCategoria']; ?>">
			<a href="../eliminar/?idPublicacionCategoria=<?php echo $_GET['idPublicacionCategoria']; ?>" class="eliminar boton">Eliminar</a>
			<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>

			</div>

		</form>
		<?php require("../../../inc/modulos/js/funciones_publicacionCategoria-editar.php"); ?>
	</section>
		
	
</div>