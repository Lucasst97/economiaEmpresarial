<?php
include ('conex.php');

/* ===Se reciben los datos desde la funcion Modificar()=== */
$grupoCuenta = $_POST['cod_grupo'];
$bloqueCuenta = $_POST['cod_bloque'];
$rubroCuenta = $_POST['cod_rubro'];
$cuentaCuenta = $_POST['cod_cuenta'];

?>

<!-- ===Formulario para tomar la modificacion de la cuenta=== -->
<div class="content">
    <div class="form">
        <form class="form-group" method="post" action="modelo/modificarCuenta.php">
            <label for="">Nuevo Nombre de Cuenta</label>
            <input name="cod_grupo"  type="hidden" value= "<?php  echo $grupoCuenta ?>">
            <input name="cod_bloque" type="hidden" value= "<?php  echo $bloqueCuenta ?>">
            <input name="cod_rubro"  type="hidden" value= "<?php  echo $rubroCuenta ?>">
            <input name="cod_cuenta"  type="hidden" value= "<?php  echo $cuentaCuenta ?>">
            <input type="text" class="form-control" id="grupoCuenta" name="grupoCuenta" value="">
            <button style="margin-top: 20px;" class="btn btn-primary" type="submit">Modificar Cuenta</button>
        </form>
    </div>
</div>