<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
    // Allowed extentions.
    $allowedExts = array("gif", "jpeg", "jpg", "png");

    // Get filename.
    $temp = explode(".", $_FILES["file"]["name"]);

    // Get extension.
    $extension = end($temp);

    // An image check is being done in the editor but it is best to
    // check that again on the server side.
    // Do not use $_FILES["file"]["type"] as it can be easily forged.

        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        // Save file in the uploads folder.
        $dir=explode('inc',dirname(__FILE__));
        move_uploaded_file($_FILES["file"]["tmp_name"],$dir[0]."img/" . $name);
        // Generate response.
        $response = new StdClass;
        $response->link = $Config['Dominio'].$ruta."img/" . $name;
        echo stripslashes(json_encode($response));
    
?>