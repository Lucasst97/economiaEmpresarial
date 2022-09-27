<?php
include ('conex.php');

/* ===Se reciben los datos desde el Form de ModalInsertCuenta=== */
$cod_grupo = $_POST['cod_grupo'];
$cod_bloque = $_POST['cod_bloque'];
$cod_rubro = $_POST['cod_rubro'];
$nombre_cuenta = $_POST['grupoCuenta'];

/* ===Se genera una Query para tomar el ultimo codigo de cuenta e incrementarla para el nuevo codigo=== */
$queryC = "SELECT MAX(cod_cuenta) FROM cuenta WHERE cod_rubro = '$cod_rubro' and cod_bloque= '$cod_bloque' and cod_grupo= '$cod_grupo' ";
$rsC = mysqli_query($conex, $queryC);
$rowC = mysqli_fetch_assoc($rsC);

$codCuenta = $rowC['MAX(cod_cuenta)'];
$codCuenta = $codCuenta+1;

/* ===Se genera la Query para Ingresar la cuenta deseada y se ejecuta=== */ 
$queryI= "INSERT INTO `cuenta`(`cod_cuenta`, `nombre_cuenta`, `cod_rubro`, `cod_bloque`, `cod_grupo`) VALUES ('$codCuenta','$nombre_cuenta','$cod_rubro','$cod_bloque','$cod_grupo')";
$insert = mysqli_query($conex, $queryI);

?>