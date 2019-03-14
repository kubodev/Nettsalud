<?php
if(isset($_POST['envimg'])) // Actualizar fotos
{
	$sql2 = mysql_query("SELECT * FROM SeccionFoto WHERE idSeccion = '".$idSeccion."'");
	if(mysql_num_rows($sql2) > 0)
	{
		while($col2 = mysql_fetch_array($sql2))
		{
			if($_FILES [ 'img'.$col2['idSeccionFoto'] ][ 'size' ] > 0)
			{
				$nombreArchivo = cadenatexto(12); // Genera string aleatoriamente
				$dirimg=explode('panelAdmin',dirname(__FILE__));
				$destino = $dirimg[0].'img' ; 
				if(esImagen($_FILES ['img'.$col2['idSeccionFoto'] ][ 'name' ]))
				{ 
					GuardarFotoMin(1400,$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES ['img'.$col2['idSeccionFoto'] ][ 'name' ]),$_FILES [ 'img'.$col2['idSeccionFoto'] ][ 'tmp_name' ]);
					mysql_query("UPDATE SeccionFoto SET NombreArchivo = '".$nombreArchivo.'.'.extensionArchivo($_FILES ['img'.$col2['idSeccionFoto'] ][ 'name' ])."' WHERE idSeccionFoto = '".$col2['idSeccionFoto']."'");
				} else MsjError("La imagen tiene un formato incorrecto");
			}
		}
	}
	
}
?>