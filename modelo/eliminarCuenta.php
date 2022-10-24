<?php
include('conex.php');

/* ===Se reciben los datos desde la funcion EliminarCuenta()=== */
$cod_grupo = $_POST['cod_grupo'];
$cod_bloque = $_POST['cod_bloque'];
$cod_rubro = $_POST['cod_rubro'];
$cod_cuenta = $_POST['cod_cuenta'];

/* ===Se genera la Query para Eliminar la cuenta recibida y se ejecuta=== */ 
$queryD = "DELETE FROM cuenta WHERE cod_cuenta='$cod_cuenta' and cod_rubro='$cod_rubro' and cod_bloque='$cod_bloque' and cod_grupo='$cod_grupo'";
$rsD = mysqli_query($conex, $queryD);

?>