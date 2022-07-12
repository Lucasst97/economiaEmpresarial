<?php
include('conex.php');

/* ===Se recibe el codigo del grupo, bloque y cuenta seleccionado en los select>option=== */
$cod_rubro = $_POST['cod_rubro'];
$cod_bloque = $_POST['cod_bloque'];
$cod_grupo = $_POST['cod_grupo'];

/* ===Se genera la Query para traer las cuentas que pertenecen al rubro seleccionado=== */
$queryC = "SELECT `cod_cuenta`, nombre_cuenta, saldo FROM cuenta WHERE cod_rubro = '$cod_rubro' and cod_bloque= '$cod_bloque' and cod_grupo= '$cod_grupo' ";
$rsC = mysqli_query($conex, $queryC);

/* ===Se genera el primer option estatico para el select de Rubros=== */
$html = "<tr><th>Codigo</th><th>Cuenta</th><th></th></tr>";


$html =  $cod_grupo . $cod_bloque . $cod_rubro;

/* ===Se generan datos dinamicos para la tabla de cuentas=== */
while ($rowC = mysqli_fetch_assoc($rsC)) {
    $cod_cuenta = $rowC['cod_cuenta'];
    $saldo = $rowC['saldo'];
    $html .= "<tr><td style='text-align:left;'>" . $rowC['nombre_cuenta'] . "</td><td><input type='button' class='btn btn-primary' name='boton' id='boton' onclick='Modificar($cod_grupo, $cod_bloque, $cod_rubro, $cod_cuenta)' value='Modificar'></td><td><input type='button' class='btn btn-primary' name='boton' id='boton' onclick='EliminarCuenta($cod_grupo, $cod_bloque, $cod_rubro,$cod_cuenta,$saldo)' value='Eliminar'></td></tr>";
}

/* ===Se imprimen los options generados para que sean leídos como HTML y 
		la funcion encargada lo tome y lo inserte en la tabla de Cuentas=== */
echo $html;
?>

<!-- ===Se agrega nueva fila a la tabla para el boton de Ingresar Cuenta=== -->
<tr>
    <td colspan="3">
        <input type='button' style="width: 80%;" class='btn btn-primary' name='boton' id='boton' onclick="InsertCuenta('<?php echo $cod_grupo ?>', '<?php echo $cod_bloque ?>', '<?php echo $cod_rubro ?>')" value='Ingresar'>
    </td>
</tr>