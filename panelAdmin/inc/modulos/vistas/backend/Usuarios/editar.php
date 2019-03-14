<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Editar usuario</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li><a href="<?php echo $ruta; ?>usuarios">Usuarios</a></li>
			<li class="active">Editar</li>
		</ol>
	</section>

	
	<section class="seccion">
		<?php
		$dir=explode('inc',dirname(__FILE__));
		$idUsuarios = $_GET['idUsuarios'];
		?>
		
				<form class="col-md-5" id="perfil">
					<?php
						$sql = mysql_query("SELECT * FROM UsuariosInformacion ORDER BY idTipoDescripcion_campo ASC");
							while($col = mysql_fetch_array($sql)){
								if($col['idTipoDescripcion_campo'] == 1){ ?>
									<div class="lineaform">
										<label><?php echo $col['detalle']; ?>:</label>
										<input name="idUsuariosInformacion<?php echo $col['idUsuariosInformacion']; ?>" value="<?php echo $Usuarios->obtenerInformacion($col['detalle'],$idUsuarios); ?>" type="text" required>
									</div>
								<?php
								}else if($col['idTipoDescripcion_campo'] == 2){ ?>
									<div class="lineaform">
										<label><?php echo $col['detalle']; ?>:</label>
										<input name="idUsuariosInformacion<?php echo $col['idUsuariosInformacion']; ?>" type="file">
									</div>
								<?php
								}else if($col['idTipoDescripcion_campo'] == 3){ ?>
									<div class="lineaform">
										<label><?php echo $col['detalle']; ?>:</label>
										<input name="idUsuariosInformacion<?php echo $col['idUsuariosInformacion']; ?>" value="<?php echo $Usuarios->obtenerInformacion($col['detalle'],$idUsuarios); ?>" type="text" required>
									</div>
								<?php
								}else if($col['idTipoDescripcion_campo'] == 4){ ?>
									<div class="lineaform">
										<label><?php echo $col['detalle']; ?>:</label>
										<input name="idUsuariosInformacion<?php echo $col['idUsuariosInformacion']; ?>" value="<?php echo $Usuarios->obtenerInformacion($col['detalle'],$idUsuarios); ?>" type="text" required>
									</div>
								<?php
								}else if($col['idTipoDescripcion_campo'] == 5){ ?>
									<div class="lineaform">
										<label><?php echo $col['detalle']; ?>:</label>
										<input name="idUsuariosInformacion<?php echo $col['idUsuariosInformacion']; ?>" value="<?php echo $Usuarios->obtenerInformacion($col['detalle'],$idUsuarios); ?>" type="email" required>
									</div>
								<?php }
								else if($col['idTipoDescripcion_campo'] == 6){ ?>
									<div class="lineaform">
										<label><?php echo $col['detalle']; ?>:</label><br><br>
										<textarea name="idUsuariosInformacion<?php echo $col['idUsuariosInformacion']; ?>" required><?php echo $Usuarios->obtenerInformacion($col['detalle'],$idUsuarios); ?></textarea>
									</div>
									<script>cargarEditor('textarea[name="idUsuariosInformacion<?php echo $col['idUsuariosInformacion']; ?>"]');</script>
								<?php
								}

							}
							?>
							<div class="lineaform">
								<label>Mascota:</label>
								<select name="idMascota">
									<?php
									$sql = mysql_query("SELECT * FROM Mascota");
									while($col = mysql_fetch_array($sql)){ ?>
										<option value="<?php echo $col['idMascota']; ?>" <?php if($Usuarios->atributo($idUsuarios)['idMascota'] == $col['idMascota']) echo 'selected'; ?>><?php echo $col['detalle']; ?></option>
									<?php } ?>
								</select>
							</div>
							<input type="hidden" value="<?php echo $idUsuarios; ?>" name="idUsuarios">
					<div class="lineaform">
						<input type="submit" name="enviar" class="boton_agregar" value="Enviar">
					</div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_usuariosEditar.php");
				 ?>
	</section>
</div>