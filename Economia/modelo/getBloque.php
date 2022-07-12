<?php
	include ('conex.php');
	
	/* ===Se recibe el codigo del grupo seleccionado en el select>option=== */
	$cod_grupo = $_POST['cod_grupo'];
	
	/* ===Se genera la Query para traer los bloques que pertenecen al grupo seleccionado=== */ 
	$queryB = "SELECT cod_bloque, nombre_bloque FROM bloque WHERE cod_grupo = '$cod_grupo'";
    $rsB = mysqli_query($conex, $queryB);

	/* ===Se genera el primer option estatico para el select de Bloques=== */
	$html= "<option value='0'>Seleccionar Bloque</option>";
	
	/* ===Se generan options dinamicos para el select de Bloques=== */
	while($rowB = mysqli_fetch_assoc($rsB)){
		$html.= "<option value='".$rowB['cod_bloque']."'>".$rowB['nombre_bloque']."</option>";
	}

	/* ===Se imprimen los options generados para que sean leídos como HTML y 
		la funcion encargada lo tome y lo inserte en el select de Bloques=== */
	echo $html;
?>