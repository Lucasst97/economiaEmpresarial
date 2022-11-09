<?php
include("../modelo/conex.php");
include("../modelo/modelo.php");
$vista=$_POST['vista'];

switch($vista){
    // VISTA DE CLIENTES
    case '1':
       ?>
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
       </script>
        <div class="contenedor-vista" id="contenedor-vista">
            <table class="table bordered">
                <thead>
                    <tr>
                        <td>Cliente</td>
                        <td>CUIT</td>
                        <td>Situacion Triburaria</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <?php
        break;
    case '2':
        ?>
        <script>
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
        <div class="contenedor-vista" id="contenedor-vista">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col">Proveedor</td>
                        <td scope="col">CUIT</td>
                        <td scope="col">Situacion Tributaria</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <?php
        break;
    case '3':
        ?>
        <div class="contenedor-vista" id="contenedor-vista">
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
        <?php
        break;
}

?>