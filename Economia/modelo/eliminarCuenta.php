<?php
include('conex.php');

$cod_grupo = $_POST['cod_grupo'];
$cod_bloque = $_POST['cod_bloque'];
$cod_rubro = $_POST['cod_rubro'];
$cod_cuenta = $_POST['cod_cuenta'];
$cod_rubro = '0'.$cod_rubro;
echo $cod_grupo.".". $cod_bloque.".". $cod_rubro.".". $cod_cuenta;

//validar saldo 0

$queryD = "DELETE FROM cuenta WHERE cod_cuenta='$cod_cuenta' and cod_rubro='$cod_rubro' and cod_bloque='$cod_bloque' and cod_grupo='$cod_grupo'";
echo $queryD;
$rsD = mysqli_query($conex, $queryD);

if ($rsD) {
    echo "<script>alert('Cuenta Eliminada')</script>";
}else{
    echo "<script>alert('error')</script>";
}

?>
<script src="https://code.jquery.com/jquery-latest.js"></script>