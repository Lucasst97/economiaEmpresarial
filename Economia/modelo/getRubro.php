<?php
	include ('conex.php');
	
	/* ===Se recibe el codigo del grupo y bloque seleccionado en los select>option=== */
	$cod_bloque = $_POST['cod_bloque'];
    $cod_grupo = $_POST['cod_grupo'];
   
	/* ===Se genera la Query para traer los rubros que pertenecen al bloque seleccionado=== */
	$queryR = "SELECT cod_rubro, nombre_rubro FROM rubro WHERE cod_bloque = '$cod_bloque'  and cod_grupo= '$cod_grupo' ";
    $rsR = mysqli_query($conex, $queryR);
	
	/* ===Se genera el primer option estatico para el select de Rubros=== */
	$html= "<option value='0'>Seleccionar Rubro</option>";
	
	/* ===Se generan options dinamicos para el select de Rubros=== */
	while($rowR = mysqli_fetch_assoc($rsR)){
		$html.= "<option value='".$rowR['cod_rubro']."'>".$rowR['nombre_rubro']."</option>";
	}

	/* ===Se imprimen los options generados para que sean leídos como HTML y 
		la funcion encargada lo tome y lo inserte en el select de Rubros=== */
	echo $html;
?>