<?php
include("../modelo/conex.php");
include("../modelo/modelo.php");
$SeleccionTotalDeCuentas = SeleccionTotalDeCuentas();
?>
<!-- En este archivo vamos a tener la vista de el formulario para poder ingresar una cuenta a determinado asiento. Deriva de el modal Agregar asiento. -->
<!-- <script language src="js/function_cuenta_asiento.js"></script> -->

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
            </div>
            
            <div class="row mb-4 mt-4">
                <hr style="color:#000">
                <label class="col-sm-2 col-form-label text-center">Detalle de asiento:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="detalle_asiento" id="detalle_asiento" required>
                </div>
                <label class="col-sm-2 col-form-label text-center" for="">Cliente/Proveedor</label>
                <div class="col-sm-2">
                    <select class="form-select" onclick="SelectCliente_Proveedor(this.value)" name="usuario_tipo" id="usuario_tipo">
                        <option value="1">Cliente</option>
                        <option value="0">Proveedor</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-select" name="" id="">
                        <option value="">Elegir...</option>
                        <?php
                        // if()
                        // while ($reg = mysqli_fetch_array($listaUsuario)){
                        //     echo "<option value='".$reg['id']."'>".$reg['razonSocial']."</option>";
                        // }
                        ?>
                    </select>
                </div>
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


<!-- Funcion de boton (REGISTRAR ASIENTO): En esta funcion tomamos los valores de los inputs que agregan las CUENTAS, a travs de los id,
toma los valores y los guarda en variables (var), a traves del for recorremos los distintos inputs que haya cargado el ususario.     
Definimos una variable llamada i para realizar el recorrido del ciclo for y de esta forma poder tomar los datos de las distintas cuentas ya parseadas a JSON. -->


<script type="text/javascript">
    var i = 0;
    function Registro_nuevo_asiento(){
        $("#boton").click(function() {

            var array = new Array();
            var debe = 0;
            var haber = 0;


            for (let i = 0; i < x; i++) {
                var cuenta = document.getElementById("id_cuenta_" + i).value;
                // var detalle = document.getElementById("detalle_cuenta_" + i).value;
                var saldo = document.getElementById("saldo_cuenta_" + i).value;
                var tipo = document.getElementById("tipo_cuenta_" + i).value;
                var json_cuenta = '{"cuenta": ' + cuenta + ',"saldo": ' + saldo + ', "tipo": ' + tipo + '}';
                json_array_cuenta_asiento = JSON.parse(json_cuenta);
                array.push(json_array_cuenta_asiento);
            }

            /* Validacion de saldos debe y haber, deben ser iguales.
            Primero necesitamos tomar el tipo de saldo del array en un json.
            El value de debe es 0 y haber es 1 (EN EL FORMULARIO) */

            //Comprobar si se ingresaron al menos dos cuentas
            longArray = array.length;
            console.log(longArray);
            if (longArray>1) {
                
                // Dos tipos de saldos, (DEBE HABER) que se deben sumar por separado y luego comparar para que sea correcta la cuenta.
                // Se necesita de un ciclo para que recorra los array y tome los tipos y saldos de cada cuenta. 
    
                for (let i = 0; i < x; i++) {
                    console.log('____________________');
                    console.log('Iterado: '+i);
                    var tipo_saldo = array[i].tipo;
                    var saldo_array = array[i].saldo;
    
                    if (tipo_saldo == 0) {//saldo haber
                        debe = debe + saldo_array;
                        console.log('Debe: ' + debe);
                    } else {
                        haber = haber + saldo_array;
                        console.log('Haber: ' + haber);
                    }
                    console.log('____________________');
                }
                /* COMPROBACION DE LOS SALDOS TOTALES PARA DEBE Y HABER */
                
                /* Validacion de saldos debe y haber, deben ser iguales. */
                if (debe == haber) {
                    array_string = JSON.stringify(array);
                    $.ajax({
                        type: "POST",
                        url: "modelo/nuevo_asiento.php",
                        data: {
                            array_string: array_string
                            // cuenta: cuenta,
                            // tipo: tipo,
                            // saldo: saldo,
                        },
                        success: function (response) {
                            console.log(response);
                            
                        }
                    });
                    // console.log(json_cuenta);
                    // console.log(json_array_cuenta_asiento);
                    // console.log(array);
                    // array_string = JSON.stringify(array);
                    // console.log(array_string);
                } else {
                    console.log('Saldos incorrectos');
                   
                }
            }else{
                alert('Debe ingresar al menos dos cuentas');
            }
        })
    };

</script>