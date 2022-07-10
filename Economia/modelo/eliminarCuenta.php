<?php
include('conex.php');

$cod_grupo = $_POST['cod_grupo'];
$cod_bloque = $_POST['cod_bloque'];
$cod_rubro = $_POST['cod_rubro'];
$cod_cuenta = $_POST['cod_cuenta'];

//echo $cod_grupo . "." . $cod_bloque . "." . $cod_rubro . "." . $cod_cuenta;

$queryC = "SELECT saldo FROM cuenta WHERE cod_rubro = '$cod_rubro' and cod_bloque= '$cod_bloque' and cod_grupo= '$cod_grupo' and cod_cuenta='$cod_cuenta'";
$rsC = mysqli_query($conex, $queryC);
$rowC = mysqli_fetch_assoc($rsC);

$saldo = $rowC['saldo'];

if ($saldo == 0) {

    //----------------------------------------------------------
    $queryD = "DELETE FROM cuenta WHERE cod_cuenta='$cod_cuenta' and cod_rubro='$cod_rubro' and cod_bloque='$cod_bloque' and cod_grupo='$cod_grupo'";
    //echo $queryD;
    $rsD = mysqli_query($conex, $queryD);
?>
<script>Swal.fire('Cuenta eliminada con éxito', '', 'success')</script>
<?php
    /* if ($rsD) {
        echo "";
    } else {
        echo "<script>Swal.fire('Error al eliminar', '', 'error')</script>";
    } */
    //----------------------------------------------------------

}else {
    echo "<script>Swal.fire('Esta cuenta no puede ser eliminada. Verificar saldo', '', 'error')</script>";
}
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
?>
