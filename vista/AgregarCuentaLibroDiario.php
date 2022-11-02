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
                <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label" for="cuenta">Cuenta</label>
                    <div class="col-sm-10">
                        <select name="id_cuenta_0" class="form-select" id="id_cuenta_0">
                            <option value="">Seleccione la cuenta</option>
                            <?php
                            while ($reg = mysqli_fetch_array($SeleccionTotalDeCuentas)) { ?>
                                <option value="<?php echo $reg['id_cuenta'] ?>"><?php echo $reg['nombre_cuenta'] ?></option>
                            <?php }
                            mysqli_data_seek($SeleccionTotalDeCuentas, 0); ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label" for="detalle">Detalle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detalle_cuenta_0" id="detalle_cuenta_0" required>
                    </div>
                </div>
                <!-- saldo -->
                <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label" for="saldo">Saldo</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="saldo_cuenta_0" id="saldo_cuenta_0" required>
                    </div>
                </div>
                <!-- checkbox debe haber -->
                <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label" for="saldo">Tipo de saldo</label>
                    <div class="col-sm-10">
                        <select name="tipo_cuenta_0" id="tipo_cuenta_0" class="form-select" class="js-example-basic-multiple form-select" id="">
                            <option value="">Seleccione tipo de saldo</option>
                            <option value="0">Debe</option>
                            <option value="1">Haber</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label></label>
                        <button onclick="AgregarCuenta(0)" style="width:100%" type="button" class="btn btn-danger btn-sm" id="agregar_cuenta">+</button>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <a type="" class="btn btn-primary" id="boton">Registrar asiento</a>
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
        var fieldHTML = '<input type="hidden" name="codigo_' + x + '" value="' + x + '">' +
            '<div form-group mt-3>' +
            '<label class="col-sm-2 col-form-label">Cuenta</label>' +
            '<div class="col-sm-10">' +
            '<select id="id_cuenta_'+ x +'" name="id_cuenta_' + x + '" class="form-select" class="js-example-basic-multiple form-select">' +
            '<option >Seleccione la cuenta</option>' +
            '<?php while ($reg_cuenta = mysqli_fetch_array($SeleccionTotalDeCuentas)) { ?>' +
            '<option value="<?php echo $reg_cuenta['id_cuenta'] ?>"><?php echo $reg_cuenta['nombre_cuenta'] ?></option>' +
            ' <?php } ?>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div form-group mt-3>' +
            '<label class="col-sm-2 col-form-label">Detalle</label>' +
            '<div class="col-sm-10">' +
            '<input type="text" name="detalle_cuenta_' + x + '" id="detalle_cuenta_' +x+ '" class="form-control border-dark" value="">' +
            '</div>' +
            '</div>' +
            '<div form-group mt-3>' +
            '<label class="col-sm-2 col-form-label">Saldo</label>' +
            '<div class="col-sm-10">' +
            '<input type="number" id="saldo_cuenta_' + x + '" name="saldo_cuenta_' + x + '" class="form-control border-dark" value="">' +
            '</div>' +
            '</div>' +
            '<div class="form-group mt-3">' +
            '<select name="tipo_cuenta_' + x + '" id="tipo_cuenta_' + x + '" class="form-select" class="js-example-basic-multiple form-select" id="">' +
            '<option value="">Seleccione tipo de saldo</option>' +
            '<option value="0">Debe</option>' +
            '<option value="1">Haber</option>' +
            '</select>' +
            '</div>';

        //Initial field counter is 1
        if (x < maxField) { //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        } else {
            Swal.fire('No se pueden agregar mas campos.');
        }
    }
    // -----------------------------------------

    var i = 0;
    //Funcion de boton: En esta funcion tomamos los valores de los inputs que agregan las CUENTAS, a travs de los id,
    // toma los valores y los guarda en variables (var), a traves del for recorremos los distintos inputs que haya cargado el ususario.   
    $("#boton").click(function() {
        // console.log("x", x);
        var array = new Array();
        for (let i=0; i < x; i++) {

            var cuenta = document.getElementById("id_cuenta_"+i).value;
            var detalle = document.getElementById("detalle_cuenta_"+i).value;
            var saldo = document.getElementById("saldo_cuenta_"+i).value;
            var tipo = document.getElementById("tipo_cuenta_"+i).value;
            //console.log(cuenta, detalle, saldo, tipo);
            var json_cuenta = '{"cuenta": "'+cuenta+'","detalle": "'+detalle+'", "saldo": "'+saldo+'", "tipo": "'+tipo+'"}';
            array.push(json_cuenta);
            
        }
        console.log(array);
        //console.log(json_cuenta);
    }); 
</script>