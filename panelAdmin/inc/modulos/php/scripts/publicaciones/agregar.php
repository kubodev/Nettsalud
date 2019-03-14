<?php
if($_POST['enviar'] == "Enviar")

	{

			$nombreArchivo = cadenatexto(12); 
			$dirimg=explode('panelAdmin',dirname(__FILE__));
			$destino = $dirimg[0].'img' ;

			if(esImagen($_FILES ['NombreArchivo'][ 'name' ]))

			{ 

				move_uploaded_file($_FILES [ 'NombreArchivo' ][ 'tmp_name' ],$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES ['NombreArchivo'][ 'name' ]));

				$sql = 'INSERT INTO Publicacion (`idPublicacionCategoria`,`Titulo`,`Texto`,`NombreArchivo`,`Fecha`';

				if(count($idiomas) > 1) // Sistema de idiomas

				{

					for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba

					{

						$sql .= ',`Titulo_'.$idiomas[$posicion].'`';

						$sql .= ',`Texto_'.$idiomas[$posicion].'`';

					}

				}

				$sql .= ') VALUES (\''.seguridad_sql($_POST['idPublicacionCategoria']).'\',\''.seguridad_sql($_POST['Titulo']).'\',\''.seguridad_sql($_POST['Texto']).'\',\''.$nombreArchivo.'.'.extensionArchivo($_FILES ['NombreArchivo'][ 'name' ]).'\',\''.seguridad_sql(ExtraerFechaDB()).'\'';

				if(count($idiomas) > 1) // Sistema de idiomas

				{

					for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba

					{

						$sql .= ',\''.$_POST['Titulo_'.$idiomas[$posicion]].'\'';

						$sql .= ',\''.$_POST['Texto_'.$idiomas[$posicion]].'\'';

					}

				}

				$sql .= ')';

				if(mysql_query($sql))

				{				

					redirect("../");

				} else MsjError("Ocurrió un error desconocido");

			} else MsjError("El formato de la imágen es incorrecto");		

	}