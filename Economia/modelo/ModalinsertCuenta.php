<?php
include ('conex.php');
$grupoCuenta = $_POST['cod_grupo'];
$bloqueCuenta = $_POST['cod_bloque'];
$rubroCuenta = $_POST['cod_rubro'];

/* echo $grupoCuenta ;
echo $bloqueCuenta ;
echo $rubroCuenta;
 */
?>

<div class="content">
    <div class="form">
        <form class="form-group" method="post" action="modelo/ingresarCuenta.php">
            <label for="">Grupo de Cuenta</label>
            <input name="cod_grupo"  type="hidden" value= "<?php  echo $grupoCuenta ?>">
            <input name="cod_bloque" type="hidden" value= "<?php  echo $bloqueCuenta ?>">
            <input name="cod_rubro"  type="hidden" value= "<?php  echo $rubroCuenta ?>">
            <input type="text" class="form-control" id="grupoCuenta" name="grupoCuenta" value="">
            <button type="submit">Ingresar Cuenta</button>
        </form>
    </div>
</div>