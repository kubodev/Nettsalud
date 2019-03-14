<?php
$NumFormularios = $FormularioContacto->CantidadNoLeidos();
?>

<aside>
	<nav>
		<ul>
			<li>
				<a href="<?php echo $ruta;?>"><span class="glyphicon glyphicon-home"></span>Panel de administración</a>
			</li>
			<?php
			if($Configuracion['sistemaPublicaciones'] == 1)
			{
				?>
				<?php 
				$sql = mysql_query("SELECT * FROM PublicacionCategoria");	
				if(mysql_num_rows($sql)) 
				{ 
					?>
					<li><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span>Publicaciones</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $ruta;?>publicaciones">Gestionar publicaciones</a></li>
						<?php if($Configuracion['sistemaPublicacionesCategoria'] == 1) { ?><li><a href="<?php echo $ruta;?>publicaciones/categorias">Gestionar Etiquetas</a></li><?php } ?>
					</ul>
				</li>
				<?php 
				} 
			}
			?>
			<li><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span>Pestañas de contenido</a>
				<ul class="dropdown-menu">
					<span>Seleccione la pestaña a editar:</span>
					<?php
					$sql = mysql_query("SELECT * FROM Seccion");
					while($col = mysql_fetch_array($sql)){ ?>
						<li><a href="<?php echo $ruta; ?>seccion/seccion.php?idSeccion=<?php echo $col['idSeccion']; ?>"><?php echo $col['Identificador']; ?></a></li>
					<?php } ?>
				</ul>
			</li>

			<?php $sql = mysql_query("SELECT * FROM Album");	if(mysql_num_rows($sql)) { ?><li><a href="<?php echo $ruta;?>galerias"><span class="glyphicon glyphicon-camera"></span>Galerías</a></li><?php } ?>
			<li><a href="<?php echo $ruta;?>configuraciones"><span class="glyphicon glyphicon-cog"></span>Configuraciones generales</a></li>
			<li><a href="<?php echo $ruta;?>formulariosContacto"><span class="glyphicon glyphicon-envelope"></span>Formularios de contacto <br>(<?php echo $NumFormularios; ?> nuevo<?php if($NumFormularios!=1) echo 's'; ?>)</a></li>
			<?php if($Configuracion['SistemaMarcas'] == 1) { ?><li><a href="<?php echo $ruta;?>productos/marcas"><span class="glyphicon glyphicon-cog"></span>Marcas de producto</a></li><?php } ?>
			<?php if($Configuracion['CodigosDescuento'] == 1) { ?><li><a href="<?php echo $ruta;?>productos/codigos"><span class="glyphicon glyphicon-cog"></span>Códigos de descuento (giftcard)</a></li><?php } ?>
			<li><a href="<?php echo $ruta;?>productos"><span class="glyphicon glyphicon-cog"></span>Manejar personal</a></li>
			<li><a href="<?php echo $ruta;?>productos/categorias"><span class="glyphicon glyphicon-cog"></span>Manejar categorías de personal</a></li>
			<?php if($Configuracion['SistemaModelos'] == 1) { ?><li><a href="<?php echo $ruta;?>productos/atributos"><span class="glyphicon glyphicon-cog"></span>Atributos de producto</a></li><?php } ?>
			<?php if($Configuracion['SistemaUsuarios'] == 1) { ?><li><a href="<?php echo $ruta;?>usuarios"><span class="glyphicon glyphicon-cog"></span>Usuarios</a></li><?php } ?>
			<?php if($Configuracion['SistemaPedidos'] == 1) { ?><li><a href="<?php echo $ruta;?>pedidos"><span class="glyphicon glyphicon-cog"></span>Pedidos/Compras</a></li><?php } ?>
		</ul>
	</nav>
</aside>