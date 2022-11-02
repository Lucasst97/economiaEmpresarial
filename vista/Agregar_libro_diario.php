<?php
    include("../modelo/conex.php");
    include("../modelo/modelo.php");
    $SeleccionTotalDeCuentas = SeleccionTotalDeCuentas();
   
?>
<!-- modal formulario para ingresar un asiento contable -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   

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
    function AgregarCuentaLibroDiario() {
        $("#Modal_libro_diario").modal('show');
        $.ajax({
            type: "post",
            url: "vista/AgregarCuentaLibroDiario.php",
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
        <button class="btn btn-info ml-3" onclick="javascript:AgregarCuentaLibroDiario()">Agregar Cuenta</button>
    </div>
    <div class="row">
       
        
    </div>
</div>