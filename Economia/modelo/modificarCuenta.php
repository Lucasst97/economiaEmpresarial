<?php
include ('conex.php');

$cod_grupo = $_POST['cod_grupo'];
$cod_bloque = $_POST['cod_bloque'];
$cod_rubro = $_POST['cod_rubro'];
$cod_cuenta = $_POST['cod_cuenta'];
$nombre_cuenta = $_POST['grupoCuenta'];
 
$queryU = "UPDATE cuenta SET nombre_cuenta='$nombre_cuenta' WHERE cod_grupo='$cod_grupo' and cod_bloque = '$cod_bloque' and cod_rubro='$cod_rubro' AND cod_cuenta='$cod_cuenta'";
$rsU = mysqli_query($conex, $queryU);



?>