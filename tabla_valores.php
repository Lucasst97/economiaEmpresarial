<?php
include("modelo/conex.php");
include("modelo/modelo.php");
include("vista/header.php");
include("vista/menu.php");
$selectcuentastotales = selectTotalGrupos();
?>

<div class="d-flex">
    <div class="w-100">
        <div class="py-3">
            <div class="container">
                <div class="row">
                    <!--  =================================================================== 
                                     TABLA DE VALORES DE CUENTAS INGRESADAS
                        =================================================================== -->
                    <h2 style="color:#FFF; text-align: center; margin-left: auto; margin-right: auto; padding: auto;">Plan de Cuentas</h2>
                    <div class="col-6" style="margin: auto; width: 100%; background-color:#FFF">

                        <form action="modelo/comprobantes/boletocuentas.php" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Codigo</td>
                                        <td>Nombre de Cuenta</td>
                                        <td>Saldo</td>
                                        <td>Tipo de Saldo</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($reg = mysqli_fetch_array($selectcuentastotales)) {
                                        $cod_grupo = $reg['cod_grupo'];
                                        $cod_bloque = $reg['cod_bloque'];
                                        $cod_rubro = $reg['cod_rubro'];
                                        $cod_cuenta = $reg['cod_cuenta'];

                                        $saldo = $reg['saldo_cuenta'];

                                        $tipoSaldo = '-';
                                        $cero = '0';

                                        /* ===Se valida que el codigo de rubro siempre tenga dos digitos=== */
                                        if ($cod_rubro < 10) {
                                            $cod_rubro = $cero . $cod_rubro;
                                        }

                                        /* ===Se valida que el codigo de cuenta siempre tenga dos digitos=== */
                                        if ($cod_cuenta > 0 && $cod_cuenta < 10) {
                                            $cod_cuenta = $cero . $cero . $cod_cuenta;
                                        } elseif ($cod_cuenta > 10 && $cod_cuenta < 100) {
                                            $cod_cuenta = $cero . $cod_cuenta;
                                        }

                                        /* ===Se diferencian dos Tipos de saldo en condicion a si 
                                            el saldo es positivo o negativo=== */
                                        if ($saldo > 0) {
                                            $tipoSaldo = 'Debe';
                                        } elseif ($saldo < 0) {
                                            $saldo = $saldo * -1;
                                            $tipoSaldo = 'Haber';
                                        }
                                    ?>
                                        <!-- ===Se listan todas las cuentas en una tabla HTML=== -->
                                        <tr>
                                            <td><?php echo $cod_grupo . '.' . $cod_bloque . '.' . $cod_rubro . '.' . $cod_cuenta ?></td>
                                            <td style="text-align: left;"><?php echo $reg['nombre_cuenta'] ?></td>
                                            <td><?php echo $saldo ?></td>
                                            <td><?php echo $tipoSaldo ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="text-center p-2">
                                <button class="btn btn-warning">Descargar Cuentas</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
include("vista/footer.php");
?>