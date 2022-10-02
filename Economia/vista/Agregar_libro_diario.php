<?php
    include("../modelo/conex.php");
    include("../modelo/modelo.php");
    $SeleccionTotalDeCuentas = SeleccionTotalDeCuentas();
   
?>
<!-- modal formulario para ingresar un asiento contable -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    function AgregarClienteLibroDiario() {
        $("#Modal_libro_diario").modal('show');
        $.ajax({
            type: "post",
            url: "vista/Agregar_cliente.php",
            success: function(response) {
                $("#modal-body").html(response);
            }
        });
    }

    function AgregarProveedorLibroDiario() {
        $("#Modal_libro_diario").modal('show');
        $.ajax({
            type: "post",
            url: "vista/Agregar_proveedor.php",
            success: function(response) {
                $("#modal-body").html(response);
            }
        });
    }
</script>
<style>
    .select-cuenta {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>
<div class="container">
    <div>
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button class="btn btn-info ml-3" onclick="javascript:AgregarClienteLibroDiario()">Agregar Cliente</button>
        <button class="btn btn-info ml-3" onclick="javascript:AgregarProveedorLibroDiario()">Agregar Proveedor</button>
    </div>
    <div>
       
        <form action="modelo/insertar_libro_diario.php" method="POST">
            <div class="form-group mt-3">
                <label for="cuenta">Cuenta</label>
                <select name="" class="js-example-basic-multiple form-select" id="">
                    <option value="">Seleccione la cuenta</option>
                    <?php
                    while ($reg_cuenta = mysqli_fetch_array($SeleccionTotalDeCuentas)) { ?>
                        <option><?php echo $reg_cuenta['nombre_cuenta'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="detalle">Detalle</label>
                <input type="text" class="form-control" name="detalle" id="detalle" required>
            </div>
            <!-- saldo -->
            <div class="form-group mt-3">
                <label for="saldo">Saldo</label>
                <input type="number" class="form-control" name="saldo" id="saldo" required>
            </div>
            <!-- checkbox debe haber -->
            <div class="form-group mt-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Debe</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Haber</label>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Registrar asiento</button>
        </form>
    </div>
</div>