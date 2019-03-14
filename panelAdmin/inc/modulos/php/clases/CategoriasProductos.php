<?php
class CategoriaProductos
{
	public function busquedaPorNombre($array,$nombreBusqueda)
	{
		$Producto = new Productos();
		$auxArray = array();
		foreach($array as $idProducto) 
		{
			$arrayProducto = array();
			$arrayProducto['idProducto'] = $idProducto;
			$arrayProducto['Nombre'] = $Producto->obtenerInformacion($idProducto)['Nombre'];
			array_push($auxArray, $arrayProducto);
		}

		$auxRet = array();
		foreach($auxArray as $arr)
		{
			if (strpos(sanear_string($arr['Nombre']), sanear_string($nombreBusqueda)) !== false) array_push($auxRet, $arr['idProducto']);
		}
		return $auxRet;
	}
	public function ordenarPorCriterio($array,$idProductoCriterioOrden)
	{
		$Producto = new Productos();
		$auxArray = array();
		foreach($array as $idProducto) 
		{
			$arrayProducto = array();
			$arrayProducto['Precio'] = $Producto->precioFinal($idProducto,false);
			$arrayProducto['idProducto'] = $idProducto;
			$arrayProducto['Nombre'] = $Producto->obtenerInformacion($idProducto)['Nombre'];
			array_push($auxArray, $arrayProducto);
		}
		function sortBySubValue($array, $value, $asc = true, $preserveKeys = false)
		{
		    if (is_object(reset($array))) {
		        $preserveKeys ? uasort($array, function ($a, $b) use ($value, $asc) {
		            return $a->{$value} == $b->{$value} ? 0 : ($a->{$value} - $b->{$value}) * ($asc ? 1 : -1);
		        }) : usort($array, function ($a, $b) use ($value, $asc) {
		            return $a->{$value} == $b->{$value} ? 0 : ($a->{$value} - $b->{$value}) * ($asc ? 1 : -1);
		        });
		    } else {
		        $preserveKeys ? uasort($array, function ($a, $b) use ($value, $asc) {
		            return $a[$value] == $b[$value] ? 0 : ($a[$value] - $b[$value]) * ($asc ? 1 : -1);
		        }) : usort($array, function ($a, $b) use ($value, $asc) {
		            return $a[$value] == $b[$value] ? 0 : ($a[$value] - $b[$value]) * ($asc ? 1 : -1);
		        });
		    }
		    return $array;
		}
		function ordenarPorNombreASC($a, $b) 
		{
		  return strcmp($a['Nombre'], $b['Nombre']);
		}
		function ordenarPorNombreDESC($a, $b) 
		{
		  return strcmp($b['Nombre'], $a['Nombre']);
		}
		switch($idProductoCriterioOrden)
		{
			case 1:
				usort($auxArray, 'ordenarPorNombreASC');
			break;
			case 2:
				usort($auxArray, 'ordenarPorNombreDESC');
			break;
			case 3:
				$auxArray=sortBySubValue($auxArray, 'Precio', true, false);
			break;
			case 4:
				$auxArray=sortBySubValue($auxArray, 'Precio', false, false);
			break;

		}
		if($idProductoCriterioOrden == 1)
		{
			usort($auxArray, 'ordenarPorNombreASC');
		}
		if($idProductoCriterioOrden == 2)
		{
			usort($auxArray, 'ordenarPorNombreDESC');
		}
		if($idProductoCriterioOrden == 3)
		{
			$auxArray=sortBySubValue($auxArray, 'Precio', true, false);
		}
		if($idProductoCriterioOrden == 4)
		{
			$auxArray=sortBySubValue($auxArray, 'Precio', false, false);
		}
		$auxRet = array();
		foreach($auxArray as $arr)
		{
			array_push($auxRet, $arr['idProducto']);
		}
		return $auxRet;
	}
	public function mostrarClickeable($idProductoCategoria,$checked)
	{
		if($checked) $strChecked = ' checked ';
			$auxReturn .= '<input type="checkbox" name="idProductoCategoria'.$idProductoCategoria.'" value="1"'.$strChecked.'>';
			$auxReturn .= '<label>';
				$auxReturn .= $this->obtenerNombre($idProductoCategoria);
			$auxReturn .= '</label>';
		return $auxReturn;
	}
	public function cantidadProductos($idProductoCategoria)
	{
		$auxReturn=0;
		$sql = mysql_query("SELECT * FROM Producto");
		while($col = mysql_fetch_array($sql))
		{
			$sql2 = mysql_query("SELECT * FROM rel_Producto_ProductoCategoria WHERE idProducto = '".$col['idProducto']."' AND idProductoCategoria = '".$idProductoCategoria."'");
			if(mysql_num_rows($sql2)) $auxReturn++;
		}
		return $auxReturn;
	}
	function metaTitle($idProductoCategoria)
	{
		return "<title>".$this->obtenerNombre($idProductoCategoria)." - ".$GLOBALS['Sufijo']."</title>";
	}
	public function mostrarNoClickeable($idProductoCategoria)
	{
		$auxReturn .= '<label class="noClickeable">'.$this->obtenerNombre($idProductoCategoria).'</label>';
		return $auxReturn;
	}
	public function imprimirEtiquetaTitle($idProductoCategoria)
	{
		$sql = mysql_query("SELECT * FROM ProductoCategoria WHERE idProductoCategoria = '".seguridad_sql($idProductoCategoria)."'");
		$col = mysql_fetch_array($sql);
		echo '<title>'.$col['detalle'].'</title>';
	}
	public function obtenerNombre($idProductoCategoria)
	{
		$sql = mysql_query("SELECT nombre FROM ProductoCategoria WHERE idProductoCategoria = '".seguridad_sql($idProductoCategoria)."'");
		$col = mysql_fetch_array($sql);
		return $col['nombre'];
	}
	public function obtenerPosicion($idProductoCategoria)
	{
		$sql = mysql_query("SELECT orden FROM ProductoCategoria WHERE idProductoCategoria = '".seguridad_sql($idProductoCategoria)."'");
		$col = mysql_fetch_array($sql);
		return $col['orden'];
	}
	public function obtenerDescripcion($idProductoCategoria)
	{
		$sql = mysql_query("SELECT descripcion FROM ProductoCategoria WHERE idProductoCategoria = '".seguridad_sql($idProductoCategoria)."'");
		$col = mysql_fetch_array($sql);
		return $col['descripcion'];
	}
	public function obtenerImg($idProductoCategoria)
	{
		$sql = mysql_query("SELECT img FROM ProductoCategoria WHERE idProductoCategoria = '".seguridad_sql($idProductoCategoria)."'");
		$col = mysql_fetch_array($sql);
		return $col['img'];
	}
	public function obtenerCategoria($id)
	{
		$sql = mysql_query("select * from ProductoCategoria where idProductoCategoria = '".seguridad_sql($id)."'");
		$col = mysql_fetch_array($sql);
		return $col;
	}
	public function obtenerCategorias()
	{
		$arrayReturn = array();
		$sql = mysql_query("SELECT * FROM ProductoCategoria ORDER BY Orden ASC");
		while($col = mysql_fetch_array($sql))
		{
			if(!$this->obtenerPadre($col['idProductoCategoria']))
			{
				if($this->tieneHijos($col['idProductoCategoria'])) $arrayReturn[$col['idProductoCategoria']] = $this->obtenerFamilia($col['idProductoCategoria']);
				else array_push($arrayReturn,$col['idProductoCategoria']);
			}
		}
		return $arrayReturn;
	}
	public function obtenerFamilia($idProductoCategoria)
	{
		$arrayReturn = array();

			$auxCont = array();
			$arrayReturn = array();
			foreach($this->obtenerHijos($idProductoCategoria) as $categoriaNivel2)
			{
				if($this->obtenerHijos($categoriaNivel2)) $arrayReturn[$categoriaNivel2] = array(); else $arrayReturn[$categoriaNivel2] = $categoriaNivel2;
				foreach($this->obtenerHijos($categoriaNivel2) as $categoriaNivel3)
				{
					if($this->obtenerHijos($categoriaNivel3)) $arrayReturn[$categoriaNivel2][$categoriaNivel3] = array(); else $arrayReturn[$categoriaNivel2][$categoriaNivel3] = $categoriaNivel3;
					foreach($this->obtenerHijos($categoriaNivel3) as $categoriaNivel4)
					{
						if($this->obtenerHijos($categoriaNivel4)) $arrayReturn[$categoriaNivel2][$categoriaNivel3][$categoriaNivel4] = array(); else $arrayReturn[$categoriaNivel2][$categoriaNivel3][$categoriaNivel4] = $categoriaNivel4;
						foreach($this->obtenerHijos($categoriaNivel4) as $categoriaNivel5)
						{
							if($this->obtenerHijos($categoriaNivel5)) $arrayReturn[$categoriaNivel2][$categoriaNivel3][$categoriaNivel4][$categoriaNivel5] = array(); else $arrayReturn[$categoriaNivel2][$categoriaNivel3][$categoriaNivel4][$categoriaNivel5] = $categoriaNivel5;
							foreach($this->obtenerHijos($categoriaNivel5) as $categoriaNivel6)
							{
								if($this->obtenerHijos($categoriaNivel6)) $arrayReturn[$categoriaNivel2][$categoriaNivel3][$categoriaNivel4][$categoriaNivel5][$categoriaNivel6] = array(); else $arrayReturn[$categoriaNivel2][$categoriaNivel3][$categoriaNivel4][$categoriaNivel5][$categoriaNivel6] = $categoriaNivel6;
							}
						}
					}
				}
			}
		return $arrayReturn;
	}
	public function obtenerPadre($idProductoCategoria)
	{
		$sql = mysql_query("SELECT idProductoCategoria_Padre FROM rel_ProductoCategoria_ProductoCategoria WHERE idProductoCategoria_Hijo = '".$idProductoCategoria."'");
		$col = mysql_fetch_array($sql);
		return $col['idProductoCategoria_Padre'];
	}
	public function obtenerHijos($idProductoCategoria)
	{
		$auxReturn = array();
		$sql = mysql_query("SELECT * FROM rel_ProductoCategoria_ProductoCategoria inner join ProductoCategoria on ProductoCategoria.idProductoCategoria = rel_ProductoCategoria_ProductoCategoria.idProductoCategoria_Hijo WHERE rel_ProductoCategoria_ProductoCategoria.idProductoCategoria_Padre = '".$idProductoCategoria."' ORDER BY ProductoCategoria.Orden ASC");
		while($col = mysql_fetch_array($sql))
		{
			array_push($auxReturn,$col['idProductoCategoria_Hijo']);
		}
		return $auxReturn;
	}
	public function tieneHijos($idProductoCategoria)
	{
		$sql = mysql_query("SELECT * FROM rel_ProductoCategoria_ProductoCategoria WHERE idProductoCategoria_Padre = '".$idProductoCategoria."'");
		if(mysql_num_rows($sql)) return true; else return false;
	}
	public function obtenerProductos($Categorias)
	{
		if($Categorias)
		{
			if(!is_array($Categorias)) $Categorias = array($Categorias);
		}
		else
		{
			$Categorias = array();
			$query = "select * from ProductoCategoria where Listar = '1'";
			$sql = mysql_query($query);
			while($col = mysql_fetch_array($sql)) array_push($Categorias, $col['idProductoCategoria']);
		}
		$cargadorItems=array();

		foreach($Categorias as $idProductoCategoria)
		{	
				if(!$this->tieneHijos($idProductoCategoria))
				{
					$query = "select * from rel_Producto_ProductoCategoria where idProductoCategoria = ".seguridad_sql($idProductoCategoria);
					$sql = mysql_query($query);
					while($col = mysql_fetch_array($sql)) array_push($cargadorItems, $col['idProducto']);
				}
				else
				{
					foreach($this->obtenerHijos($idProductoCategoria) as $categoriaNivel2)
					{
						$query = "select * from rel_Producto_ProductoCategoria where idProductoCategoria = ".seguridad_sql($categoriaNivel2);
						$sql = mysql_query($query);
						while($col = mysql_fetch_array($sql)) array_push($cargadorItems, $col['idProducto']);
						foreach($this->obtenerHijos($categoriaNivel2) as $categoriaNivel3)
						{
							$query = "select * from rel_Producto_ProductoCategoria where idProductoCategoria = ".seguridad_sql($categoriaNivel3);
							$sql = mysql_query($query);
							while($col = mysql_fetch_array($sql)) array_push($cargadorItems, $col['idProducto']);
							foreach($this->obtenerHijos($categoriaNivel3) as $categoriaNivel4)
							{
								$query = "select * from rel_Producto_ProductoCategoria where idProductoCategoria = ".seguridad_sql($categoriaNivel4);
								$sql = mysql_query($query);
								while($col = mysql_fetch_array($sql)) array_push($cargadorItems, $col['idProducto']);
								foreach($this->obtenerHijos($categoriaNivel4) as $categoriaNivel5)
								{
									$query = "select * from rel_Producto_ProductoCategoria where idProductoCategoria = ".seguridad_sql($categoriaNivel5);
									$sql = mysql_query($query);
									while($col = mysql_fetch_array($sql)) array_push($cargadorItems, $col['idProducto']);
									foreach($this->obtenerHijos($categoriaNivel5) as $categoriaNivel6)
									{
										$query = "select * from rel_Producto_ProductoCategoria where idProductoCategoria = ".seguridad_sql($categoriaNivel6);
										$sql = mysql_query($query);
										while($col = mysql_fetch_array($sql)) array_push($cargadorItems, $col['idProducto']);
									}
								}
							}
						}
					}
				}
			
		}
		$AuxCargador = array();
			$Producto = new Productos();
			foreach($cargadorItems as $Item)
			{
				$Pasa = 1;
				
				if($_SESSION['filtrosBuscador']['Stock'][1]) // En stock
				{
					if($Producto->Informacion($Item)['Stock PM'] <= 0 && $Producto->Informacion($Item)['Stock SM'] <= 0) $Pasa = 0;
				}
				if(count($_SESSION['filtrosBuscador']['Compatibilidad']))
				{
					foreach($_SESSION['filtrosBuscador']['Compatibilidad'] as $Num)
					{
						
						$sql2 = mysql_query("SELECT * FROM rel_ProductoInformacion_Producto WHERE (idProductoInformacion = '".$Num."' AND idProducto = '".$Item."' AND detalle = '1') OR (idProductoInformacion = '9' AND detalle = '1' AND idProducto = '".$Item."')");
					
						if(!mysql_num_rows($sql2)) $Pasa = 0;
					}
				}

				if($Pasa == 1) array_push($AuxCargador,$Item);
			}
			$Cargador = array();
			foreach($AuxCargador as $Item)
			{
				$Pasa = 1;
				if(count($_SESSION['filtrosBuscador']['idProductoCategoria'])>0)
				{
					$Pasa = 0;
					foreach($_SESSION['filtrosBuscador']['idProductoCategoria'] as $idProductoCategoria)
						if(in_array($idProductoCategoria,$Producto->arrayCategorias($Item))) $Pasa = 1;
						
				}
				if($Pasa == 1) if(!in_array($Item,$Cargador)) array_push($Cargador,$Item);
			}
		
		return $Cargador;
	}
	public function obtenerNav($idProductoCategoria)
	{
		$aux = array();
		$Padre1 = $this->obtenerPadre($idProductoCategoria);
		$Padre2 = $this->obtenerPadre($Padre1);
		$Padre3 = $this->obtenerPadre($Padre2);
		$Padre4 = $this->obtenerPadre($Padre3);
		$Padre5 = $this->obtenerPadre($Padre4);
		if($Padre5) array_push($aux, $Padre5);
		if($Padre4) array_push($aux, $Padre4);
		if($Padre3) array_push($aux, $Padre3);
		if($Padre2) array_push($aux, $Padre2);
		if($Padre1) array_push($aux, $Padre1);
		if($idProductoCategoria) array_push($aux, $idProductoCategoria);
		return $aux;

	}
}