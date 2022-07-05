<?php
$grupoCuenta = $_POST['grupo'];
$bloqueCuenta = $_POST['bloque'];
$rubroCuenta = $_POST['rubro'];
?>

<div class="content">
    <div class="form">
        <form class="form-group" method="post">
            <label for="">Grupo de Cuenta</label>
            <input type="hidden" value= "<?php  echo $grupoCuenta ?>">
            <input type="hidden" value="<?php ?>">
            <input type="text" class="form-control" id="grupoCuenta" name="grupoCuenta" value="">
        </form>
    </div>
</div>