<?php
include('conex.php');

$cod_rubro = $_POST['cod_rubro'];
$cod_bloque = $_POST['cod_bloque'];
$cod_grupo = $_POST['cod_grupo'];


$queryC = "SELECT `cod_cuenta`, nombre_cuenta FROM cuenta WHERE cod_rubro = '$cod_rubro' and cod_bloque= '$cod_bloque' and cod_grupo= '$cod_grupo' ";
$rsC = mysqli_query($conex, $queryC);

$html = "<th>Codigo</th><th>Cuenta</th><th></th>";

$html =  $cod_grupo . $cod_bloque . $cod_rubro;

while ($rowC = mysqli_fetch_assoc($rsC)) {

    $cod_cuenta = $rowC['cod_cuenta'];

    $html .= "<tr><td>".$cod_cuenta."</td><td>" . $rowC['nombre_cuenta'] . "</td><td><input type='button' class='matricularBtn' name='boton' id='boton' onclick='Cuenta($cod_grupo, $cod_bloque, $cod_rubro, $cod_cuenta)' value='Modificar'></td><td><input type='button' class='matricularBtn' name='boton' id='boton' onclick='Cuenta($cod_grupo, $cod_bloque, $cod_rubro, $cod_cuenta)' value='Eliminar'></td></tr>";
}


echo $html;
?>
<script>
    function Cuenta(cod_grupo, cod_bloque, cod_rubro, cod_cuenta) {
        //cCuenta=cod_cuenta.toString(); 
        //alert(typeof(cod_cuenta));
        //console.log(cod_cuenta+", "+typeof(cod_cuenta));
        /* num = parseInt(cod_cuenta,10);
        console.log('jña: '+num); */
        
        /* if (typeof(cod_cuenta=='number')) {
            cod_cuenta= cod_cuenta.toString();
            console.log("tipo de dato cambiado");
            console.log(typeof(cod_cuenta));
            vara = (cod_cuenta+5);
            console.log(vara);
        } */
        //console.log("cod: " + cod_cuenta, typeof(cod_cuenta));
        if (cod_cuenta > 0 && cod_cuenta < 10) {
            codAux = '00';
            /* console.log("cuenta menor a 10");
            console.log("1: ",typeof(cod_cuenta)); */

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
                /* console.log(typeof(cod_cuenta));
                console.log(cod_cuenta); */

                cod_cuenta = codAux + cod_cuenta;
                /* console.log(typeof(cod_cuenta));
                console.log(cod_cuenta); */
                console.log("Cod Cuenta: ", cod_cuenta);
            } else {
                console.log("...");
                if (cod_cuenta >= 100 && cod_cuenta <= 999) {
                //console.log("cuenta mayor a 10");
                codAux = '';
                //console.log(typeof(cod_cuenta));

                cod_cuenta = cod_cuenta.toString();
                /* console.log(typeof(cod_cuenta));
                console.log(cod_cuenta); */

                cod_cuenta = codAux + cod_cuenta;
                /* console.log(typeof(cod_cuenta));
                console.log(cod_cuenta); */
                console.log("Cod Cuenta: ", cod_cuenta);
            } else {
                console.log("Codigo de Cuenta Incorrecto");
            }
            }
        }

        /* var ajax=nuevoAjax();
        ajax.open("POST", "eliminarCuenta.php" , true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("cod_cuenta="+cod_cuenta, "cod_grupo="+cod_grupo, "cod_bloque="+cod_bloque, "cod_rubro="+cod_rubro );

        ajax.onreadystatechange=function() 
        { 
        	if (ajax.readyState==4)
        	{
        		var respuesta= ajax.responseText;
        		//alert(respuesta)
                document.getElementById("informacion").innerHTML=respuesta; 
            }
        } */
    }
</script>