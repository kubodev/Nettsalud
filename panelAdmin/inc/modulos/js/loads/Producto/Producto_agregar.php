<?php

	$dir=explode('inc',dirname(__FILE__));

	require_once($dir[0]."inc/controlador.php");

	mysql_query("INSERT INTO Producto () VALUES ()");

	$idProducto = mysql_insert_id();



	/* Subida Campos de Informacion */

	$sql = mysql_query("SELECT * FROM ProductoInformacion ORDER BY idTipoDescripcion_campo ASC");

	while($col = mysql_fetch_array($sql))

	{

		if($col['idTipoDescripcion_campo'] != 2) 

		mysql_query("INSERT INTO rel_ProductoInformacion_Producto (`detalle`,`idProductoInformacion`,`idProducto`) VALUES('".seguridad_sql($_POST['ProductoInformacion'.$col['idProductoInformacion']])."','".$col['idProductoInformacion']."','".$idProducto."')");

		else 

		{ // Subida Documentos

			$nombreArchivo = cadenatexto(12); 

			$dir=explode('inc',dirname(__FILE__));

			$destino = $dir[0].'img/Productos/Documentos' ;

			move_uploaded_file($_FILES['ProductoInformacion'.$col['idProductoInformacion']]['tmp_name'],$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES['ProductoInformacion'.$col['idProductoInformacion']]['name']));

			mysql_query("INSERT INTO rel_ProductoInformacion_Producto (`detalle`,`idProductoInformacion`,`idProducto`) VALUES('".seguridad_sql($nombreArchivo.'.'.extensionArchivo($_FILES['ProductoInformacion'.$col['idProductoInformacion']]['name']))."','".$col['idProductoInformacion']."','".$idProducto."')");

		}

	}

	/* Fin Subida Campos de Informacion */



	/* Sistema de precios */

	if($Configuracion['Precios'] == 1)

	{
		mysql_query("UPDATE Producto SET Precio = '".seguridad_sql($_POST['Precio'])."' WHERE idProducto = '".$idProducto."'");
	}

	/* Fin sistema de precios */

	/* Sistema de descuentos */

	if($Configuracion['SistemaDescuentos'] == 1)

	{
		if($_POST['Descuento'] == 1)
		{
			mysql_query("UPDATE Producto SET Precio = '' WHERE idProducto = '".$idProducto."'");
			mysql_query("INSERT INTO ProductoDescuento (`idProducto`,`Porcentaje`,`PrecioAnterior`,`PrecioNuevo`) VALUES ('".$idProducto."','".seguridad_sql($_POST['Porcentaje'])."','".seguridad_sql($_POST['PrecioAnterior'])."','".seguridad_sql($_POST['PrecioNuevo'])."')");
		}
	}

	/* Fin sistema de descuentos */

	/* Sistema de marcas */

	if($Configuracion['SistemaMarcas'] == 1)

	{

		mysql_query("UPDATE Producto SET idProductoMarca = '".seguridad_sql($_POST['idProductoMarca'])."' WHERE idProducto = '".$idProducto."'");

	}

	/* Fin sistema de marcas */

	/* Sistema de categorías */

	$sql = mysql_query("SELECT * FROM ProductoCategoria");

	while($col = mysql_fetch_array($sql))

	{

		if(!$CategoriaProductos->tieneHijos($col['idProductoCategoria']))

		{

			if(isset($_POST['idProductoCategoria'.$col['idProductoCategoria']])) mysql_query("INSERT INTO rel_Producto_ProductoCategoria (idProducto,idProductoCategoria) VALUES ('".$idProducto."','".$col['idProductoCategoria']."')");

		}	

	}

	/* Fin sistema de categorías */



	/* Subida Imagenes */

	foreach($_SESSION['subiendoFotos'] as $foto)
		{
			mysql_query("INSERT INTO ProductoFoto (`NombreArchivo`,`idProducto`) VALUES ('".$foto."','".$idProducto."')");
		}

	/* Fin Subida Imagenes */

	if($Configuracion['SistemaModelos'] == 1)
	{
		/* Subida Modelos */

		$datos = json_decode($_POST["modelos"]);
		$aux = array();
		foreach($datos->Modelo as $resultado)
		{
			$auxintro=0;
			$sql = mysql_query("SELECT MAX(idRel_ProductoAtributoDetalle_Producto) AS id FROM rel_ProductoAtributoDetalle_Producto");
			$col = mysql_fetch_array($sql);
			$idRel_Rel = $col["id"] + 1;
			foreach ($resultado->espesificaciones as $x)
			{
				mysql_query("insert into rel_ProductoAtributoDetalle_Producto (`idRel_ProductoAtributoDetalle_Producto`,`idProductoAtributoDetalle`,`idProducto`,`Stock`,`Precio`,`SKU`) 
					values('".$idRel_Rel."','".seguridad_sql($x->valor)."','".$idProducto."','".seguridad_sql($resultado->stock)."','".seguridad_sql($resultado->valor)."','".seguridad_sql($resultado->sku)."');");
			}
		}
		/* Fin Subida Modelos */

	}
	if($Configuracion['ProductosRelacionados'] > 0)
	{
		for($aux = 1; $aux<=$Configuracion['ProductosRelacionados']; $aux++)
		{
			if($_POST['relacionado_'.$aux]>0)
			{
				mysql_query("INSERT INTO rel_Producto_Producto (`idProducto_1`,`idProducto_2`) VALUES ('".$idProducto."','".seguridad_sql($_POST['relacionado_'.$aux])."')");
			}
		}
	}
	/* URL Amigable */

			$Categoria2 = strtolower($CategoriaProductos->obtenerNombre($Producto->arrayCategorias($idProducto)[0]));
			$Categoria1 = strtolower($CategoriaProductos->obtenerNombre($CategoriaProductos->obtenerPadre($Producto->arrayCategorias($idProducto)[0])));
			$Categoria1 = limpiarurl(trim(substr(str_replace(' ','-',$Categoria1),0,30)));
			$Categoria2 = limpiarurl(trim(substr(str_replace(' ','-',$Categoria2),0,30)));
			$NombreProducto = limpiarurl(trim(substr(str_replace(' ', '-', strtolower($Producto->obtenerInformacion($idProducto)['Nombre'])),0,50)));
			$URL = $Categoria1.'/'.$NombreProducto.'/'.$idProducto;
			mysql_query("UPDATE Producto SET URL = '".seguridad_sql($URL)."' WHERE idProducto = '".$idProducto."'");
	/* Fin URL Amigable */
	MsjAprob("Producto subido con éxito");

?>