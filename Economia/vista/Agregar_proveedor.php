<?php
    include("../modelo/conex.php");
    include("../modelo/modelo.php");
    $responsable_iva= responsable_iva();

?>
<!-- modal formulario para ingresar un asiento contable -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        <form action="modelo/modelo_libro_diario.php" method="POST">
            <div class="form-group mt-1">
                <label for="fecha">CUIT </label>
                <input type="number" class="form-control" name="cuit_proveedor" id="cuit_cliente" required>
            </div>
            <div class="form-group mt-3">
                <label for="numero_asiento">Nombre / Razon social</label>
                <input type="text" class="form-control" name="razon_social_proveedor" id="razon_social_cliente" required>
            </div>
            <div class="form-group mt-3">
                <label for="numero_asiento">Situacion Tributaria</label>
                <select class="form-select" name="sit_tributaria">
                    <option value="">Eliga la opcion</option>
                    <?php while($reg=mysqli_fetch_array($responsable_iva)){?>    
                        <option value="<?php echo $reg['id_sitTribut']?>">
                            <?php echo $reg['sitTributaria'];?>
                        </option>
                    <?php                   
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Agregar proveedor</button>
            </div>
        </form>
    </div>
</div>