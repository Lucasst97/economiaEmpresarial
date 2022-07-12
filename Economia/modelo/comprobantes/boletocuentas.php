<?php
require('../../elements/dompdf/autoload.inc.php');
require('../conex.php');
require('../modelo.php');
$selectcuentastotales = selectTotalGruposPdf();

$h = '<h1 style="text-align:center; font-family:Arial, sans-serif;">Plan de Cuentas</h1>';
$h = $h . '<table border="1" style="font-family:Arial, sans-serif; border-collapse:collapse; align-content: center; align-items: center; margin-left: auto; margin-right: auto;" class="table table-bordered">';
$h = $h . '<tr style="font-size:18px"><th style="text-align:center; padding:10px;">Codigo</th><th style="text-align:center; padding:10px;">Nombre Cuenta</th><th style="text-align:center; padding:10px;">Saldo</th><th style="text-align:center; padding:10px;">Tipo de Saldo</th></tr>';


while ($reg = mysqli_fetch_array($selectcuentastotales)) {
    $cod_grupo = $reg['cod_grupo'];
    $cod_bloque = $reg['cod_bloque'];
    $cod_rubro = $reg['cod_rubro'];
    $cod_cuenta = $reg['cod_cuenta'];
    $saldo = $reg['saldo'];
    $tipoSaldo = '-';
    $cero = '0';
    //$color = '';

    /* ===Se valida que el codigo de rubro siempre tenga dos digitos=== */
    if ($cod_rubro < 10) {
        $cod_rubro = $cero . $cod_rubro;
    }

    /* ===Se valida que el codigo de cuenta siempre tenga dos digitos=== */
    if ($cod_cuenta >= 0 && $cod_cuenta < 10) {
        $cod_cuenta = $cero . $cero . $cod_cuenta;
    } elseif ($cod_cuenta >= 10 && $cod_cuenta < 100) {
        $cod_cuenta = $cero . $cod_cuenta;
    }

    /* ===Se diferencian dos Tipos de saldo en condicion a si 
        el saldo es positivo o negativo=== */
    if ($saldo > 0) {
        $tipoSaldo = 'Debe';
    } elseif ($saldo < 0) {
        $saldo = $saldo * -1;
        $tipoSaldo = 'Haber';
        //$color = ' color: #db020f';
    }

    /* ===Se listan todas las cuentas en una tabla HTML=== */
    $h = $h . '<tr><td style="text-align:left; padding:10px;">' . $cod_grupo .'.'. $cod_bloque .'.'.  $cod_rubro .'.'. $cod_cuenta . '</td>';
    $h = $h . '<td style="text-align:left; padding:10px;">' . $reg["nombre_cuenta"] . '</td>';
    $h = $h . '<td style="text-align:right; padding:10px;">' . $saldo . '</td>';
    $h = $h . '<td style="text-align:center; padding:10px;">' . $tipoSaldo . '</td>';
    $h = $h . '</tr>';
};

$h = $h . '</table>';

$h = utf8_decode($h);
/* CONFIGURACION PARA CONVERTIR EN PDF Y DESCARGAR EL CONTENIDO DE ESTE ARCHIVO */
//Almacena el contenido ubicado en la memoria en una variable
//$html = ob_get_clean();
//echo $html;
//Uso de la libreria y creacion de un nuevo pdf
use Dompdf\Dompdf;

$dompdf = new Dompdf();
//Opciones de pdf
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
//Formato de hoja que se va a utilizar
$dompdf->setPaper('A4', 'portrait');
//Carga el contenido de la variable html en el pdf
$dompdf->loadHtml($h);
//Renderizacion del contenido de la variable html y guardado del pdf
$dompdf->render();
$dompdf->stream("Resumen_cuentas.pdf", array("Attachment" => false));
