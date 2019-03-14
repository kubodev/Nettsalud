<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php 
	    
	    require_once("../inc/modulos/vistas/estructura/cabecera.php");
	    
		if(isset($_GET['idProducto'])) { $Var['Producto']['idProducto'] = $_GET['idProducto']; $Var['Producto']['idProductoCategoria'] = $Producto->arrayCategorias($Var['Producto']['idProducto'])[0]; }
		else if(isset($_GET['idProductoCategoria'])) 
		{  
			$Var['Producto']['idProductoCategoria'] = $_GET['idProductoCategoria'];
			$Var['Producto']['idProducto'] = $CategoriaProductos->obtenerProductos($Var['Producto']['idProductoCategoria'])[0];
		}
		echo $Producto->metaTitle($Var['Producto']['idProducto']);
	    ?>		
	</head>
	<body id="S_Servicio">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		<div class="hoja" id="Servicio">
			<div class="container">
				<h1><?php echo $CategoriaProductos->obtenerNombre($Var['Producto']['idProductoCategoria']); ?></h1>
				<div class="medicos">
					<?php
					$aux=0;
					foreach($CategoriaProductos->obtenerProductos($Var['Producto']['idProductoCategoria']) as $idProducto)
					{
						?>
						<a href="?idProducto=<?php echo $idProducto; ?>" <?php if($idProducto == $Var['Producto']['idProducto']) echo'class="activo"'; ?>><?php echo $Producto->obtenerInformacion($idProducto)['Nombre']; ?></a>
						<?php
						$aux++;
					}
					?>
				</div>
				<div class="imagen img" style="background-image: url(<?php echo $ruta; ?>panelAdmin/img/Productos/<?php echo $Producto->obtenerFotos($Var['Producto']['idProducto'])[0]; ?>);">

				</div>

			</div>
			<div class="gris">
				<div class="container">
					<h2><?php echo $Producto->obtenerInformacion($Var['Producto']['idProducto'])['Nombre']; ?></h2>
					<?php echo $Producto->obtenerInformacion($Var['Producto']['idProducto'])['Caracteristicas']; ?>
				</div>
			</div>
		</div>

		
		
	    <!-- ./ Contenido -->
	    <?php require_once("../inc/modulos/vistas/estructura/footer.php");?>
	</body>


	<!-- Ficheros externos -->
	<?php require("../inc/modulos/vistas/estructura/ficherosExternos.php"); ?>
</html>
