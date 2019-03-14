<?php
class Carro
{
	public function numeroProductos()
	{
		return count($_SESSION['carro']);
	}
	public function guardarPedido($ordenCompra,$costoEnvio)
	{
		$Producto = new Productos();
		foreach($this->obtenerCarro() as $productoCarro)
		{
			mysql_query("INSERT INTO OrdenCompra VALUES ('".ExtraerFechaHoraDB()."','1','1','','','','','','".$ordenCompra."','".$productoCarro['modelo']."','','".$productoCarro['cantidad']."')");
		}
	}
	public function generarOrdenCompra()
	{
		$rand = rand(111,999);
		return date("Y").date("m").date("d").date("H").date("i").date("s").$rand;
	}
	public function totalPedido()
	{
		$total = 0;
		$producto = new Productos();
		foreach($_SESSION['carro'] as $Item)
		{
			$idProducto = $Item['idProducto'];
			$modelo = $Item['modelo'];
			$cantidad = $Item['cantidad'];
			$precioProducto = $producto->precioFinal($idProducto,$modelo)*$cantidad;
			$total = $precioProducto+$total;
		}
		return $total;
	}
	function obtenerAtributos($idProducto)
	{ // Obtiene los valores de los atributos
		$producto = $this->obtenerProducto($idProducto);
		$return = array();
		$atributosexp = explode(',',$producto['atributos']);
		$countatributosexp = count($atributosexp)-1;
		for($aux=1; $aux<$countatributosexp; $aux++)
		{
			array_push($return, $atributosexp[$aux]);
		}
		return $return;
	}
	public function stringAtributos($idRel_ProductoAtributoDetalle_Producto)
	{
		$ret='';
		$sql = mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idRel_ProductoAtributoDetalle_Producto = '".$idRel_ProductoAtributoDetalle_Producto."'");
		while($col = mysql_fetch_array($sql))
		{
			$sql2 = mysql_query("SELECT ProductoAtributoDetalle.detalle as Det2,ProductoAtributo.detalle as Det1 FROM ProductoAtributoDetalle inner join ProductoAtributo on ProductoAtributo.idProductoAtributo = ProductoAtributoDetalle.idProductoAtributo WHERE ProductoAtributoDetalle.idProductoAtributoDetalle = '".$col['idProductoAtributoDetalle']."'");
			$col2 = mysql_fetch_array($sql2);
			$ret.= $col2['Det1'].': '.$col2['Det2'].' ';
		}	
		return $ret;
	}
	public function agregarProducto($idProducto,$cantidad,$idRel_ProductoAtributoDetalle_Producto)
	{
	
				$aux = array(
					"idProducto" => $idProducto,
					"cantidad" => $cantidad,
					"modelo" => $idRel_ProductoAtributoDetalle_Producto
				);
				if(isset($_SESSION['carro']))
				{
					array_push($_SESSION['carro'],$aux);
				}
				else
				{
					$_SESSION['carro'] = array($aux);
				}
				return true;
	}
	public function obtenerCarro()
	{
		return $_SESSION["carro"];
	}
	public function tieneProducto($idProducto)
	{
		for($recorre=0; $recorre<=count($this->obtenerCarro()); $recorre++)
		{
			if($this->obtenerCarro()[$recorre]['idProducto'] == $idProducto)
			{
				return true;
			}
		}
		return false;
	}
	public function quitarProducto($idProducto)
	{
		if($this->tieneProducto($idProducto) == true)
		{	
			for($posarray=0; $posarray<=count($_SESSION['carro']); $posarray++)
			{
				if($_SESSION['carro'][$posarray]['idProducto'] == $idProducto)
				{
					unset($_SESSION['carro'][$posarray]); // Borra producto
				}
			}
		} else return false;
	}
	public function obtenerProducto($idProducto)
	{
		if($this->tieneProducto($idProducto) == true){
			for($posarray=0; $posarray<=count($_SESSION['carro']); $posarray++){
				if($_SESSION['carro'][$posarray]['idProducto'] == $idProducto){
					return $_SESSION['carro'][$posarray];
				}
			}
		}else{
			return false;
		}
	}
	public function destruir()
	{
		unset($_SESSION['carro']);
	}
}
