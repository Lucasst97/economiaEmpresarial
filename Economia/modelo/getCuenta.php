<?php
include('conex.php');

$cod_rubro = $_POST['cod_rubro'];
$cod_bloque = $_POST['cod_bloque'];
$cod_grupo = $_POST['cod_grupo'];


$queryC = "SELECT `cod_cuenta`, nombre_cuenta FROM cuenta WHERE cod_rubro = '$cod_rubro' and cod_bloque= '$cod_bloque' and cod_grupo= '$cod_grupo' ";
$rsC = mysqli_query($conex, $queryC);

$html = "<th>Codigo</th><th>Cuenta</th><th></th>";

$html =  $cod_grupo . $cod_bloque . $cod_rubro;
?>
<?php
while ($rowC = mysqli_fetch_assoc($rsC)) {
    $cod_cuenta = $rowC['cod_cuenta'];
    $html .= "<tr><td>" . $rowC['nombre_cuenta'] . "</td><td><input type='button' class='' name='boton' id='boton' onclick='Modificar($cod_grupo, $cod_bloque, $cod_rubro, $cod_cuenta)' value='Modificar'></td><td><input type='button' class='' name='boton' id='boton' onclick='EliminarCuenta($cod_grupo, $cod_bloque, $cod_rubro,$cod_cuenta)' value='Eliminar'></td></tr>";
}


?>
<?php
echo $html;
?>
<tr>
    <td></td>
    <td></td>
    <td>
        <input type='button' class='' name='boton' id='boton' onclick="InsertCuenta('<?php echo $cod_grupo ?>', '<?php echo $cod_bloque ?>', '<?php echo $cod_rubro ?>')" value='Ingresar'>
    </td>
</tr>


<script>
    function Modificar(cod_grupo, cod_bloque, cod_rubro, cod_cuenta) {
        console.log(cod_grupo, cod_bloque, cod_rubro, cod_cuenta)
        $('#ModalModificarCuenta').modal('show');
        $.ajax({
            type: "post",
            url: "modelo/ModalModificarCuenta.php",
            data: {
                cod_bloque,
                cod_rubro,
                cod_grupo,
                cod_cuenta
            },
            success: function(response) {
                $('#modal-bodyI').html(response);
            }
        });
    }




    function InsertCuenta(cod_grupo, cod_bloque, cod_rubro) {
        console.log(cod_grupo)
        $('#ModalInsertCuenta').modal('show');
        $.ajax({
            type: "post",
            url: "modelo/ModalinsertCuenta.php",
            data: {
                cod_bloque,
                cod_rubro,
                cod_grupo
            },
            success: function(response) {
                $('#modal-body').html(response);
            }
        });
    }




    function Eliminar(cod_grupo, cod_bloque, cod_rubro, cod_cuenta) {
        console.log(cod_grupo, cod_bloque, cod_rubro, cod_cuenta)

        var send =
            cod_cuenta = cod_cuenta.toString()
        var formData = 'cod_grupo=' + cod_grupo + '&cod_bloque=' + cod_bloque + '&cod_rubro=' + cod_rubro + '&cod_cuenta=' + cod_cuenta;

        //var ajax = nuevoAjax();
        var ajax = nuevoAjax();
        ajax.open("POST", "modelo/eliminarCuenta.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send(formData);
        /* "cod_grupo="+cod_grupo, "cod_bloque="+cod_bloque, "cod_rubro="+cod_rubro,"cod_cuenta="+cod_cuenta */

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4) {
                var respuesta = ajax.responseText;
                alert(respuesta)
                //document.getElementById("informacion").innerHTML=respuesta; 
            }
        }
    }

    function pruebaModificar(cod_grupo, cod_bloque, cod_rubro, cod_cuenta) {
        if (cod_cuenta > 0 && cod_cuenta < 10) {
            codAux = '00';
            cod_cuenta = cod_cuenta.toString();
            //console.log("2: ", cod_cuenta, typeof(cod_cuenta));
            cod_cuenta = codAux + cod_cuenta;
            //console.log("3: tipo: ", typeof(cod_cuenta));
            console.log("Cod Cuenta: ", cod_cuenta);
        } else {
            if (cod_cuenta >= 10 && cod_cuenta < 100) {
                //console.log("cuenta mayor a 10");
                codAux = '0';
                //console.log(typeof(cod_cuenta));

                cod_cuenta = cod_cuenta.toString();
                //console.log(typeof(cod_cuenta));
                //console.log(cod_cuenta);

                cod_cuenta = codAux + cod_cuenta;
                // console.log(typeof(cod_cuenta));
                //console.log(cod_cuenta);
                console.log("Cod Cuenta: ", cod_cuenta);
            } else {
                console.log("...");
                if (cod_cuenta >= 100 && cod_cuenta <= 999) {
                    //console.log("cuenta mayor a 10");
                    codAux = '';
                    //console.log(typeof(cod_cuenta));

                    cod_cuenta = cod_cuenta.toString();
                    // console.log(typeof(cod_cuenta));
                    //console.log(cod_cuenta);

                    cod_cuenta = codAux + cod_cuenta;
                    //console.log(typeof(cod_cuenta));
                    //console.log(cod_cuenta);
                    console.log("Cod Cuenta: ", cod_cuenta);
                } else {
                    console.log("Codigo de Cuenta Incorrecto");
                }
            }
        }

        /* var ajax = nuevoAjax();
        ajax.open("POST", "eliminarCuenta.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("cod_cuenta=" + cod_cuenta, "cod_grupo=" + cod_grupo, "cod_bloque=" + cod_bloque, "cod_rubro=" + cod_rubro);

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4) {
                var respuesta = ajax.responseText;
                alert(respuesta)
                //document.getElementById("informacion").innerHTML=respuesta; 
            }
        } */
    }















    function nuevoAjax() {
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest != "undefined") {
            xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
    }
</script>