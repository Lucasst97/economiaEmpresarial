<?php
include ('conex.php');

$cod_grupo = $_POST['cod_grupo'];
$cod_bloque = $_POST['cod_bloque'];
$cod_rubro = $_POST['cod_rubro'];
$nombre_cuenta = $_POST['grupoCuenta'];

$queryC = "SELECT MAX(cod_cuenta) FROM cuenta WHERE cod_rubro = '$cod_rubro' and cod_bloque= '$cod_bloque' and cod_grupo= '$cod_grupo' ";
$rsC = mysqli_query($conex, $queryC);

$rowC = mysqli_fetch_assoc($rsC);

$codCuenta = $rowC['MAX(cod_cuenta)'];
$codCuenta = $codCuenta+1;

$queryI= "INSERT INTO `cuenta`(`cod_cuenta`, `nombre_cuenta`, `cod_rubro`, `cod_bloque`, `cod_grupo`) VALUES ('$codCuenta','$nombre_cuenta','$cod_rubro','$cod_bloque','$cod_grupo')";
$insert = mysqli_query($conex, $queryI)



?>