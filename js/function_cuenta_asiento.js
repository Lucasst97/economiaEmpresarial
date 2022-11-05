/* 
Funcion de boton (REGISTRAR ASIENTO): En esta funcion tomamos los valores de los inputs que agregan las CUENTAS, a travs de los id,
toma los valores y los guarda en variables (var), a traves del for recorremos los distintos inputs que haya cargado el ususario.     
Definimos una variable llamada i para realizar el recorrido del ciclo for y de esta forma poder tomar los datos de las distintas cuentas ya parseadas a JSON.
 */
    var i = 0;
    function Registro_nuevo_asiento(){
        $("#boton").click(function() {

            var array = new Array();
            var debe = 0;
            var haber = 0;


            for (let i = 0; i < x; i++) {
                var cuenta = document.getElementById("id_cuenta_" + i).value;
                var detalle = document.getElementById("detalle_cuenta_" + i).value;
                var saldo = document.getElementById("saldo_cuenta_" + i).value;
                var tipo = document.getElementById("tipo_cuenta_" + i).value;
                var json_cuenta = '{"cuenta": ' + cuenta + ',"detalle": "' + detalle + '", "saldo": ' + saldo + ', "tipo": ' + tipo + '}';
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
                
            }else{
                alert('Debe ingresar al menos dos cuentas');
            }

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
            // console.log('Total debe: ' + debe);
            // console.log('Total haber: ' + haber);

            /* Validacion de saldos debe y haber, deben ser iguales. */
            if (debe == haber) {
                console.log('Saldos correctos');
                // alert('Saldos correctos');
            } else {
                console.log('Saldos incorrectos');
                // alert('Los saldos deben ser iguales.Revise las cuentas ingresadas');
            }

            // var tipo_saldo = json_array_cuenta_asiento.tipo;
            // let tipo_saldo = array.map((json_cuenta) => json_cuenta.tipo);
            // console.log(tipo_saldo);
            // console.log(saldo_array + ' , ' +  tipo_saldo);

        })
    };