<?php
    include("../modelo/conex.php");
    include("../modelo/modelo.php");
    $SeleccionTotalDeCuentas=SeleccionTotalDeCuentas();
?>
<!-- modal formulario para ingresar un asiento contable -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<style>
    .select-cuenta{
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
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>
<div class="container">
    <div>
        <h5 class="modal-title" id="exampleModalLabel"></h5> 
    </div>
    <div>
        <form action="modelo/insertar_libro_diario.php" method="POST">
            <div class="form-group mt-1">
                <label for="fecha">CUIT </label>
                <input type="date" class="form-control" name="fecha" id="fecha" required>
            </div>
            <div class="form-group mt-3">
                <label for="numero_asiento">Nombre / Razon social</label>
                <input type="number" class="form-control" name="numero_asiento" id="numero_asiento" required>
            </div>
        </form>
    </div>
</div>