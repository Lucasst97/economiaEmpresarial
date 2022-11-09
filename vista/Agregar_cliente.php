<?php
    include("../modelo/conex.php");
    include("../modelo/modelo.php");
    $responsable_iva= responsable_iva();

?>

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
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Ingrese un nuevo cliente en el sistema</h3>
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            <form action="modelo/nuevo_cliente.php" method="POST">
                <div class="form-group mt-1">
                    <label for="fecha">CUIT </label>
                    <input type="number" class="form-control" name="cuit_cliente" id="cuit_cliente" required>
                </div>
                <div class="form-group mt-3">
                    <label for="numero_asiento">Nombre / Razon social</label>
                    <input type="text" class="form-control" name="razon_social_cliente" id="razon_social_cliente" required>
                </div>
                <div class="form-group mt-3">
                    <label for="numero_asiento">Situacion Tributaria</label>
                    <select class="form-select" name="sit_tributaria">
                        <option value="">Eliga la opcion</option>
                        <?php
                            while($reg=mysqli_fetch_array($responsable_iva)){ ?>
                        <option value="<?php echo $reg['id_sitTributaria'] ?>">
                            <?php echo $reg['sitTributaria']; ?>
                        </option>

                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Agregar cliente</button>
                </div>
            </form>
        </div>
        <div class="col-5" style="display: flex;justify-content: center;align-items: center;">
            <img style="width:200px"src="elements/cliente.png" alt="">
        </div>
        <div class="col-1"></div>
    </div>
</div>