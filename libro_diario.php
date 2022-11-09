<?php
include("modelo/modelo.php");
include("vista/header.php");
include("vista/menu.php");
$SelectCuenta = SelectCuentasLibroDiario();


?>
<style>

</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="javascript" src="js/script.js"></script>
<script>
    function AgregarLibroDiario() {
        $("#Modal_libro_diario").modal('show');
        $('#Modal_libro_diario').modal({
            backdrop: 'static',
            keyboard: false
        })
        $.ajax({
            type: "post",
            url: "vista/AgregarCuentaLibroDiario.php",
            success: function(response) {
                $("#modal-body").html(response);
            }
        });
    }
</script>

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" id="Modal_libro_diario" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body"></div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Seccion superior con informacion del libro diario, botones para agregar asiento, cliente, proveedor. -->
<nav class="w-100 bg-dark pt-3 pb-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-5 contenedor-superior-libro-diario" style="display:flex;flex-wrap:nowrap">
            <button class="btn btn-info" onclick="javascript:AgregarLibroDiario()">Agregar Asiento</button>
        </div>
        <div class="col-5" style="display:flex;justify-content:space-between;flex-wrap:nowrap;">
            <p style="color:antiquewhite">CUIT:</p>
            <p style="color:antiquewhite">Razon social</p>
            <p style="color:antiquewhite">Fecha inicio de actividades</p>
            <p style="color:antiquewhite">N° de folio:</p>
        </div>
        <div class="col-1"></div>
    </div>
</nav>
<!-- Tabla de libro diario: Fecha, numero de asiento, detalle, debe, haber, saldo -->
<div class="conteiner h-100">
    <div class="row">
        <div class="col-12">
            <div class="table">
                <table class="table table-hover table-striped table-bordered bg-light">
                    <thead class="">
                        <tr>
                            <td rowspan="2">Numero de asiento</td>
                            <td rowspan="2">Fecha</td>
                            <td colspan="2">Detalle</th>
                            <td rowspan="2">Debe</td>
                            <td rowspan="2">Haber</td>
                        </tr>
                        <tr>
                            <td>Codigo</td>
                            <td>Cuenta</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($SelectCuenta)) {
                            $cod_grupo = $row['cod_grupo'];
                            $cod_bloque = $row['cod_bloque'];
                            $cod_rubro = $row['cod_rubro'];
                            $cod_cuenta = $row['cod_cuenta'];
                            $saldo = $row['saldo'];
                            $tipoSaldo = $row['tipo_saldo'];
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
                        ?>
                            <tr>
                                <td><?php echo $row['asiento'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td><?php echo $cod_grupo . '.' . $cod_bloque . '.' . $cod_rubro . '.' . $cod_cuenta ?></td>
                                <td><?php echo $row['cuenta'] ?></td>
                                <!-- ESTA PARTE DE LA TABLA HACE UNA CONDICION PARA
                                DIFERENCIAR EL DEBE/HABER A TRAVES DEL TIPO SALDO QUE TRAEMOS DE LA TABLA. -->
                                <?php if ($row['tipo_saldo'] == 0) { ?>

                                    <td><?php echo $row['saldo'] ?></td>
                                    <td> - </td>

                                <?php } else {
                                ?>
                                    <td> - </td>
                                    <td><?php echo $row['saldo'] ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>