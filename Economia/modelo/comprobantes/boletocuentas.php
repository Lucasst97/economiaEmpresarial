<?php
require('../../elements/dompdf/autoload.inc.php');
require ('../conex.php');
require ('../modelo.php');
$selectcuentastotales = selectTotalGrupos();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <title>Cuentas</title>
       
    </head>
<div class="container">
     <table class="table table-bordered">
          <thead>
               <tr>
                    <td>Cuenta Codigo</td>
                    <td>Nombre Cuenta</td>
                    <td>Saldo</td>
               </tr>
          </thead>
          <tbody>
               <?php
               while ($reg = mysqli_fetch_array($selectcuentastotales)) { ?>
                    <tr>
                         <td><?php echo $reg['cod_bloque'] ?></td>
                         <td><?php echo $reg['nombre_cuenta'] ?></td>
                         <td><?php echo $reg['cod_rubro'] ?></td>
                    </tr>
               <?php
               }
               ?>
          </tbody>
     </table>
</div>
<?php
    /* CONFIGURACION PARA CONVERTIR EN PDF Y DESCARGAR EL CONTENIDO DE ESTE ARCHIVO */
    //Almacena el contenido ubicado en la memoria en una variable
    $html=ob_get_clean();
    //Uso de la libreria y creacion de un nuevo pdf
    use Dompdf\Dompdf; 
    $dompdf = new Dompdf();
    //Opciones de pdf
    $options=$dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);
    //Formato de hoja que se va a utilizar
    $dompdf->setPaper('A4');
    //Carga el contenido de la variable html en el pdf
    $dompdf->loadHtml($html);
    //Renderizacion del contenido de la variable html y guardado del pdf
    $dompdf->render();
    $dompdf->stream("Resumen_cuentas.pdf", array("Attachment" => false));
?>
