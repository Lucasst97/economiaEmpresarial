<?php
include ('conex.php');

/* ===Se reciben los datos desde la funcion InsertCuenta()=== */
$grupoCuenta = $_POST['cod_grupo'];
$bloqueCuenta = $_POST['cod_bloque'];
$rubroCuenta = $_POST['cod_rubro'];
?>

<!-- ===Formulario para tomar la Insercion de la nueva cuenta=== -->
<div class="content">
    <div class="form">
        <form class="form-group" method="post" action="modelo/ingresarCuenta.php">
            <label for="">Nombre de Nueva Cuenta</label>
            <input name="cod_grupo"  type="hidden" value= "<?php  echo $grupoCuenta ?>">
            <input name="cod_bloque" type="hidden" value= "<?php  echo $bloqueCuenta ?>">
            <input name="cod_rubro"  type="hidden" value= "<?php  echo $rubroCuenta ?>">
            <input type="text" class="form-control" id="grupoCuenta" name="grupoCuenta" value="">
            <button style="margin-top: 20px;" class="btn btn-primary" type="submit">Ingresar Cuenta</button>
        </form>
    </div>
</div>