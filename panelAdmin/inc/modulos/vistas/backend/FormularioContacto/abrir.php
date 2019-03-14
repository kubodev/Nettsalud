<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Formularios de contacto</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li><a href="<?php echo $ruta; ?>formulariosContacto">Formularios de contacto</a></li>
			<li class="active">Abrir</li>
		</ol>
	</section>

	<section class="seccion">
	<div class="table-responsive">
		<h1 class="titulo">Información</h1>
		<br>
			
			<?php
			$idFormularioContacto = $_GET['idFormularioContacto'];
			mysql_query("UPDATE FormularioContacto SET Leido = '1' WHERE idFormularioContacto = '".seguridad_sql($idFormularioContacto)."'");
			?>
			Enviado desde la IP <?php echo $FormularioContacto->ObtenerAtributo($idFormularioContacto)['IP']; ?></br>
			<?php
			foreach($FormularioContacto->ListarInformacion($idFormularioContacto) as $NombreAtributo => $Detalle)
			{
				if(!strlen($Detalle)) $Detalle = '<i>< Vacío ></i>';
				?>
				<b><?php echo $NombreAtributo; ?>:</b> <?php echo $Detalle; ?><br>
				<?php
			}
			?>
			<br><br>
			<b>Estado del formulario</b>: 
			<select name="idEstadoFormularioContacto">
				<?php 
				$sql = mysql_query("SELECT * FROM EstadoFormularioContacto");
				while($col = mysql_fetch_array($sql))
				{
					?>
					<option value="<?php echo $col['idEstadoFormularioContacto']; ?>" <?php if($FormularioContacto->ObtenerAtributo($idFormularioContacto)['idEstadoFormularioContacto'] == $col['idEstadoFormularioContacto']) echo 'selected'; ?>><?php echo $col['detalle']; ?></option>
					<?php
				}
				?>
			</select>
			<div class="clear" style="height:50px"></div>
			<a href="../eliminar/?idFormularioContacto=<?php echo $idFormularioContacto; ?>" class="eliminar boton">Eliminar</a>
			
			    <?php
			    $dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_FormularioContactoAbrir.php"); 
				?>
			  </div>
	</section>
</div>