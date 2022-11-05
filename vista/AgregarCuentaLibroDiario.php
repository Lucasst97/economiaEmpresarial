<?php
include("../modelo/conex.php");
include("../modelo/modelo.php");
$SeleccionTotalDeCuentas = SeleccionTotalDeCuentas();
?>
<!-- En este archivo vamos a tener la vista de el formulario para poder ingresar una cuenta a determinado asiento. Deriva de el modal Agregar asiento. -->

<div class="container">
    <div class="row">
        <form action="" method="POST">
            <div class="contenedor-cuenta" id="contenedor-cuenta">
                <div class="row mb-4 mt-4">
                    <label class="col-sm-1 col-form-label text-center" for="cuenta">Cuenta</label>
                    <div class="col-sm-4">
                        <select name="id_cuenta_0" class="form-select" id="id_cuenta_0">
                            <option value="">Seleccione la cuenta</option>
                            <?php
                            while ($reg = mysqli_fetch_array($SeleccionTotalDeCuentas)) { ?>
                                <option value="<?php echo $reg['id_cuenta'] ?>"><?php echo $reg['nombre_cuenta'] ?></option>
                            <?php }
                            mysqli_data_seek($SeleccionTotalDeCuentas, 0); ?>
                        </select>
                    </div>
                    <label class="col-sm-1 col-form-label text-center" for="saldo">Saldo</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="saldo_cuenta_0" id="saldo_cuenta_0" required>
                    </div>
                    <label class="col-sm-2 col-form-label text-center" for="saldo">Tipo de saldo</label>
                    <div class="col-sm-2">
                        <select name="tipo_cuenta_0" id="tipo_cuenta_0" class="form-select" class="js-example-basic-multiple form-select" id="">
                            <option value="">Seleccione tipo de saldo</option>
                            <option value="0">Debe</option>
                            <option value="1">Haber</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label" for="detalle">Detalle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detalle_cuenta_0" id="detalle_cuenta_0" required>
                    </div>
                </div> -->
                <!-- saldo -->
                <!-- <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label" for="saldo">Saldo</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="saldo_cuenta_0" id="saldo_cuenta_0" required>
                    </div>
                </div>
                <!-- checkbox debe haber -->
                <!-- <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label" for="saldo">Tipo de saldo</label>
                    <div class="col-sm-10">
                        <select name="tipo_cuenta_0" id="tipo_cuenta_0" class="form-select" class="js-example-basic-multiple form-select" id="">
                            <option value="">Seleccione tipo de saldo</option>
                            <option value="0">Debe</option>
                            <option value="1">Haber</option>
                        </select>
                    </div>
                </div>  -->
                <!-- <div class="col-1">
                    <div class="form-group">
                        <label></label>
                        <button onclick="AgregarCuenta(0)" style="width:100%" type="button" class="btn btn-danger btn-sm" id="agregar_cuenta">+</button>
                    </div>
                </div> -->
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <button onclick="AgregarCuenta(0)" style="width:200px" type="button" class="btn btn-danger btn-sm" id="agregar_cuenta">Agregar nueva cuenta</button>
                </div>             
                <div class="col-6"></div>
                <div class="col-3">
                    <a type="" class="btn btn-primary" style="width:200px" onclick="Registro_nuevo_asiento()" id="boton">Registrar asiento</a>
                </div>     
            </div>
        </form>
    </div>
</div>

<script>
    var x = 1;

    function AgregarCuenta() {
        var maxField = 10; //Limite de incremento de campos 
        var addButton = $('#agregar_cuenta'); //Add button selector
        var wrapper = $('#contenedor-cuenta'); //Se llama al contendedor de los campos que se requiere repetir para hacer una nueva cuenta.
        var fieldHTML = 
            '<div class="row mb-4 mt-4">'+
                '<label class="col-sm-1 col-form-label text-center" for="cuenta">Cuenta</label>'+
                '<div class="col-sm-4">'+
                    '<select name="id_cuenta_0" class="form-select " id="id_cuenta_'+ x +'">'+
                        '<option value="">Seleccione la cuenta</option>'+
                        '<?php while ($reg = mysqli_fetch_array($SeleccionTotalDeCuentas)) { ?>'+
                            '<option value="<?php echo $reg['id_cuenta'] ?>"><?php echo $reg['nombre_cuenta'] ?></option>'+
                        '<?php }?> '+
                        '<?php mysqli_data_seek($SeleccionTotalDeCuentas, 0); ?>'+
                    '</select>'+
                '</div>'+
                '<label class="col-sm-1 col-form-label text-center" for="saldo">Saldo</label>'+
                '<div class="col-sm-2">'+
                    '<input type="number" class="form-control" name="saldo_cuenta_0" id="saldo_cuenta_'+ x +'" required>'+
                '</div>'+
                '<label class="col-sm-2 col-form-label text-center" for="saldo">Tipo de saldo</label>'+
                '<div class="col-sm-2">'+
                    '<select name="tipo_cuenta_0" id="tipo_cuenta_'+ x +'" class="form-select" class="js-example-basic-multiple form-select" id="">'+
                        '<option value="">Seleccione tipo de saldo</option>'+
                        '<option value="0">Debe</option>'+
                        '<option value="1">Haber</option>'+
                    '</select>'+
                '</div>'+
            '</div>';
        //Initial field counter is 1
        if (x < maxField) { //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        } else {
            Swal.fire('No se pueden agregar mas campos.');
        }
    }

</script>