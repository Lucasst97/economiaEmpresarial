<?php
include("modelo/modelo.php");
include("vista/header.php");
include("vista/menu.php");
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="javascript" src="js/script.js"></script>
<script>
    function AgregarLibroDiario(){
        $("#Agregar_libro_diario").modal('show');
        $.ajax({
            type: "post",
            url: "vista/Agregar_libro_diario.php",
            success: function (response) {
                $("#modal-body").html(response);
            }
        });
    }
</script>

<!-- Modal -->
<div class="modal fade" id="Agregar_libro_diario" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar un asiento</h5>
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
        <div class="col-6 contenedor-superior-libro-diario" style="display:flex;justify-content:space-between;flex-wrap:nowrap;justify-content: space-evenly;">
            <button class="btn btn-info" onclick="javascript:AgregarLibroDiario()">Agregar Asiento</button>
            <button class="btn btn-info ml-3" type="button">Agregar Cliente</button>
            <button class="btn btn-info ml-3" type="button">Agregar Proveedor</button>
            
        </div>
        <div class="col-6" style="display:flex;justify-content:space-between;flex-wrap:nowrap;">
            <p style="color:antiquewhite">CUIT:</p>
            <p style="color:antiquewhite">Razon social</p>
            <p style="color:antiquewhite">Fecha inicio de actividades</p>
            <p style="color:antiquewhite">N° de folio:</p>
        </div>
    </div>
</nav>
<!-- Tabla de libro diario: Fecha, numero de asiento, detalle, debe, haber, saldo -->
<div class="conteiner mt-4">
    <div class="row">
        <div class="col-12">
            <div class="table">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="">
                        <tr>
                            <td rowspan="2">Numero de asiento</td>
                            <td rowspan="2">Fecha</td>
                            <td colspan="2">Detalle</th>
                            <td rowspan="2">Debe</td>
                            <td rowspan="2">Haber</td>
                            <td rowspan="2">Saldo</td>
                        </tr>
                        <tr>
                            <td>Codigo</td>
                            <td>Cuenta</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2021-05-01</td>
                            <td>1</td>
                            <td>Compra de mercaderia</td>
                            <td>1000</td>
                            <td>0</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>2021-05-01</td>
                            <td>1</td>
                            <td>Compra de mercaderia</td>
                            <td>1000</td>
                            <td>0</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>2021-05-01</td>
                            <td>1</td>
                            <td>Compra de mercaderia</td>
                            <td>1000</td>
                            <td>0</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>2021-05-01</td>
                            <td>1</td>
                            <td>Compra de mercaderia</td>
                            <td>1000</td>
                            <td>0</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>2021-05-01</td>
                            <td>1</td>
                            <td>Compra de mercaderia</td>
                            <td>1000</td>
                            <td>0</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>2021-05-01</td>
                            <td>1</td>
                            <td>Compra de mercaderia</td>
                            <td>1000</td>
                            <td>0</td>
                            <td>1000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>