<?php
	include ('conex.php');
    //include ('getBloque.php');
	
    $cod_rubro = $_POST['cod_rubro'];
	$cod_bloque = $_POST['cod_bloque'];
    $cod_grupo = $_POST['cod_grupo'];

    echo $cod_cuenta;
    echo $cod_bloque;
    echo $cod_grupo;
	
	$queryC = "SELECT cod_cuenta, nombre_cuenta FROM cuenta WHERE cod_rubro = '$cod_rubro' and cod_bloque= '$cod_bloque' and cod_grupo= '$cod_grupo' ";
    $rsC = mysqli_query($conex, $queryC);
	if ($rsC) {
        echo 'ok';
    }
	$html= "<option value='0'>Seleccionar Cuenta</option>";
	
	while($rowC = mysqli_fetch_assoc($rsC)){
		$html.= "<option value='".$rowC['cod_cuenta']."'>".$rowC['nombre_cuenta']."</option>";
	}
	
	echo $html;
?>