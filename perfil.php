<?php
    include("modelo/modelo.php");
    include("vista/header.php");
    include("vista/menu.php");
?>
<script>
    function CambioDeVista(vista){
        $.ajax({
            type: "POST",
            url: "vista/cambio_perfil.php",
            data: {
                vista : vista,
            },
            success: function (response) {
                $('#contenedor-vista').html(response);
            }
        });
    }
    
</script>
<div class="container bg-white mt-4 w-100">
    <div class="row">
        <div class="col-4 p-4" style="background-color:#D9D9E2;display:flex;flex-wrap: wrap;flex-direction: column;align-items: center;justify-content: center">
            <button type="button" onclick="CambioDeVista(1)" class="btn btn-primary mb-3 w-50">Clientes</button>
            <button type="button" onclick="CambioDeVista(2)" class="btn btn-primary mb-3 w-50">Proveedores</button>
            <button type="button" onclick="CambioDeVista(3)" class="btn btn-primary mb-3 w-50">Información</button>
        </div>
        <div class="col-8" style="height:650px">
            <div class="contenedor-vista w-100" id="contenedor-vista">
                <form action="" method="POST" style="margin:5rem;margin: 5rem;display: flex;flex-wrap: wrap;flex-direction: column;">
                    <div class="form-group mt-1">
                        <label>CUIT</label>
                        <input type="number" class="form-control" name="" id="" required>
                    </div>
                    <div class="form-group mt-3">
                        <label>Razon social</label>
                        <input type="text" class="form-control" name="" id="" required>
                    </div>
                    <div class="form-group mt-3">
                        <label>Fecha inicio de actividades</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group mt-5" style="text-align:center">
                        <button type="submit" class="btn btn-primary">Guardar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>