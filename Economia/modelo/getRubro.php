<?php
	include ('conex.php');
	
	$cod_bloque = $_POST['cod_bloque'];
    $cod_grupo = $_POST['cod_grupo'];
	
	$queryR = "SELECT cod_rubro, nombre_rubro FROM rubro WHERE cod_bloque = '$cod_bloque'  and cod_grupo= '$cod_grupo' ";
    $rsR = mysqli_query($conex, $queryR);
	/* if ($rsR) {
        echo 'ok';
    } */
	$html= "<option value='0'>Seleccionar Rubro</option>";
	
	while($rowR = mysqli_fetch_assoc($rsR)){
		$html.= "<option value='".$rowR['cod_rubro']."'>".$rowR['nombre_rubro']."</option>";
	}
	
	echo $html;
?>