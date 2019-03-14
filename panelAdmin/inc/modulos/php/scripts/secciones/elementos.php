<?php
if(isset($_POST['elementos'])||isset($_POST['infoSeccion']))
{
	$sql2 = mysql_query("SELECT * FROM Elemento WHERE idSeccion = '".$idSeccion."'");
	if(mysql_num_rows($sql2) > 0)
	{
		while($col2 = mysql_fetch_array($sql2))
		{
			mysql_query("UPDATE Elemento SET Texto = '".seguridad_sql($_POST['Texto_e_'.$col2['idElemento']])."' WHERE idElemento = '".$col2['idElemento']."'");
			if(count($idiomas) > 1) // Sistema de idiomas
			{
				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
				{
					mysql_query("UPDATE Elemento SET Texto_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Texto_e_'.$col2['idElemento'].'_'.$idiomas[$posicion]])."' WHERE idElemento = '".$col2['idElemento']."'");
				}
			}

			mysql_query("UPDATE Elemento SET Titulo = '".seguridad_sql($_POST['Titulo_e_'.$col2['idElemento']])."' WHERE idElemento = '".seguridad_sql($col2['idElemento'])."'");
			if(count($idiomas) > 1) // Sistema de idiomas
			{
				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
				{
					mysql_query("UPDATE Elemento SET Titulo_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Titulo_e_'.$col2['idElemento'].'_'.$idiomas[$posicion]])."' WHERE idElemento = '".$col2['idElemento']."'");
				}
			}
			mysql_query("UPDATE Elemento SET SubTitulo = '".seguridad_sql($_POST['SubTitulo_e_'.$col2['idElemento']])."' WHERE idElemento = '".seguridad_sql($col2['idElemento'])."'");
			if(count($idiomas) > 1) // Sistema de idiomas
			{
				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
				{
					mysql_query("UPDATE Elemento SET SubTitulo_".$idiomas[$posicion]." = '".seguridad_sql($_POST['SubTitulo_e_'.$col2['idElemento'].'_'.$idiomas[$posicion]])."' WHERE idElemento = '".$col2['idElemento']."'");
				}
			}
			mysql_query("UPDATE Elemento SET Link = '".seguridad_sql($_POST['Link_e_'.$col2['idElemento']])."' WHERE idElemento = '".seguridad_sql($col2['idElemento'])."'");
			if(count($idiomas) > 1) // Sistema de idiomas
			{
				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
				{
					mysql_query("UPDATE Elemento SET Link_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Link_e_'.$col2['idElemento'].'_'.$idiomas[$posicion]])."' WHERE idElemento = '".$col2['idElemento']."'");
				}
			}
			if(strlen($col2['FotoNombreArchivo']) > 0)
			{
				if($_FILES [ 'FotoNombreArchivo_'.$col2['idElemento'] ][ 'size' ] > 0)
				{
					$nombreArchivo = cadenatexto(12); // Genera string aleatoriamente
					$dirimg=explode('panelAdmin',dirname(__FILE__));
					$destino = $dirimg[0].'img' ;  
					if(esImagen($_FILES ['FotoNombreArchivo_'.$col2['idElemento'] ][ 'name' ])) GuardarFotoMin(1400,$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES ['FotoNombreArchivo_'.$col2['idElemento'] ][ 'name' ]),$_FILES [ 'FotoNombreArchivo_'.$col2['idElemento'] ][ 'tmp_name' ]);
					else move_uploaded_file($_FILES [ 'FotoNombreArchivo_'.$col2['idElemento'] ][ 'tmp_name' ], $destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES ['FotoNombreArchivo_'.$col2['idElemento'] ][ 'name' ]));

					mysql_query("UPDATE Elemento SET FotoNombreArchivo = '".$nombreArchivo.'.'.extensionArchivo($_FILES ['FotoNombreArchivo_'.$col2['idElemento'] ][ 'name' ])."' WHERE idElemento = '".$col2['idElemento']."'");
				}
			}
		}
	}
}