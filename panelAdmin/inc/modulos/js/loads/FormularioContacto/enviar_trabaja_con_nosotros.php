<?
$dir=explode('inc',dirname(__FILE__));
$permiteAcceso=1;
require_once($dir[0]."inc/controlador.php");

	if($_FILES['CV'][ 'name'])
	{
		if(esPdf($_FILES['CV'][ 'name'])||esDoc($_FILES['CV'][ 'name']))
		{
			$dir=explode('inc',dirname(__FILE__));
			$destino = $dir[0].'img/cv';
			$nombreFoto = cadenatexto(12); // Genera string aleatoriamente
			move_uploaded_file($_FILES['CV']['tmp_name'],$destino . '/' .$nombreFoto.'.'.extensionArchivo($_FILES['CV']['name' ]));
			$archivoFoto = $nombreFoto.'.'.extensionArchivo($_FILES['CV']['name' ]);
			$msj = 'Ha llegado un nuevo CV:

';
			foreach($_POST as $clave => $valor)
			{
				$msj .= $clave.': '.$valor.'
';
			
			}
			$msj .= 'Link de descarga: http://nettsalud.cl/panelAdmin/img/cv/'.$nombreFoto.'.'.extensionArchivo($_FILES['CV']['name' ]);
				mail($Informacion['Email'],'Nuevo CV',$msj,"From: ".$Informacion['Email']." <".$Informacion['Email'].">");
				mail('ajaramillo@nettsalud.cl','Nuevo CV',$msj,"From: ".$Informacion['Email']." <".$Informacion['Email'].">");
				mail('jbarrera@nettsalud.cl','Nuevo CV',$msj,"From: ".$Informacion['Email']." <".$Informacion['Email'].">");
				MsjAprob("Hemos recibido tu CV con éxito");
		} else { MsjError("Debes subir un PDF o Word"); }
	}
	


?>