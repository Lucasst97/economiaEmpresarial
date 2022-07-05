<?php
	include ('conex.php');
	
	$cod_grupo = $_POST['cod_grupo'];
    echo $cod_grupo;
	
	$queryB = "SELECT cod_bloque, nombre_bloque FROM bloque WHERE cod_grupo = '$cod_grupo'";
    echo $queryB.'...';
    $rsB = mysqli_query($conex, $queryB);
	if ($rsB) {
        echo 'ok';
    }
	$html= "<option value='0'>Seleccionar Bloque</option>";
	
	while($rowB = mysqli_fetch_assoc($rsB)){
		$html.= "<option value='".$rowB['cod_bloque']."'>".$rowB['nombre_bloque']."</option>";
	}
	
	echo $html;
?>