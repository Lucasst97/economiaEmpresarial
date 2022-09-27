<?php
include ('conex.php');

/* ===Se reciben los datos desde el Form de ModalModificarCuenta=== */
$cod_grupo = $_POST['cod_grupo'];
$cod_bloque = $_POST['cod_bloque'];
$cod_rubro = $_POST['cod_rubro'];
$cod_cuenta = $_POST['cod_cuenta'];
$nombre_cuenta = $_POST['grupoCuenta'];

/* ===Se genera la Query para modificar la cuenta recibida y se ejecuta=== */ 
$queryU = "UPDATE cuenta SET nombre_cuenta='$nombre_cuenta' WHERE cod_grupo='$cod_grupo' and cod_bloque = '$cod_bloque' and cod_rubro='$cod_rubro' AND cod_cuenta='$cod_cuenta'";
$rsU = mysqli_query($conex, $queryU);

?>