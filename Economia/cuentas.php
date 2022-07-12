<?php
include("modelo/conex.php");
include("modelo/modelo.php");
include("vista/header.php");
include("vista/menu.php");
$selectcuentastotales = selectTotalGrupos();
?>

<!-- =======================ModalInsertCuenta=========================== -->
<div class="modal fade" id="ModalInsertCuenta" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Insertar Nueva Cuenta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
        <button style="background-color: #dc3741;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- =================================================================== -->


<!-- ====================ModalModificarCuenta============================ -->
<div class="modal fade" id="ModalModificarCuenta" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal-Modificar">Modificar Cuenta</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-bodyI">

      </div>
      <div class="modal-footer">
        <button style="background-color: #dc3741;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- =================================================================== -->


<div class="d-flex">
  <div class="w-100">
    <div class="py-3">
      <div class="container">
        <div class="row">

          <!--  =================================================================== 
                          Filtracion de Grupos, Bloques, Rubros y Cuentas          
                =================================================================== -->
          <h2 style="color:#FFF; text-align: center; margin-left: auto; margin-right: auto; padding: auto;">Plan de Cuentas</h2>
          <div class="col-lg-6" style="margin: auto; width: 100%; ">

            <form style="padding: 5%; background-color: white; width:100%;" method="post" action="modelo.php" class="rounded">
              <div class="row">
                <div class="col-sm">
                  <label class="form-label">Grupo</label>

                  <select type="text" name="option_grupo" id="option_grupo" style="position:  relative;left: 10px;width: 200px; padding:.375rem .75rem">
                    <option>Seleccione Grupo</option>
                    <?php
                    $queryG = "select g.cod_grupo 'cod_grupo', g.nombre_grupo 'nombre_grupo' from grupo g";
                    $rs = mysqli_query($conex, $queryG);

                    while ($row = mysqli_fetch_assoc($rs)) {

                      echo '<option value="' . $row['cod_grupo'] . '">' . $row['nombre_grupo'] . '</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="col-sm">
                  <label class="form-label">Bloque</label>
                  <select type="text" name="option_bloque" id="option_bloque" style="position:  relative;left: 3px;width: 200px; padding:.375rem .75rem">
                    <!-- ===Aca se cargan los Bloques del Grupo seleccionado=== -->
                  </select>
                </div>

                <div class="col-sm">
                  <label class="form-label">Rubro</label>
                  <select type="text" name="option_rubro" id="option_rubro" style="position:  relative;left: 11px;width: 200px; padding:.375rem .75rem">
                    <!-- ===Aca se cargan los Rubros del Bloque seleccionado=== -->
                  </select>
                </div>

                <div class="mb-3">
                  <label class="titulo-table" type="text" class="form-label">Cuenta</label>
                  <table class="table table-bordered" border="1" name="option_cuenta" id="option_cuenta">
                    <!-- ===Aca se cargan las Cuentas del Rubro seleccionado=== -->
                  </table>
                </div>
                
              </div>
            </form>
          </div>


        </div>

      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="javascript" src="js/script.js"></script>
<script>
  function Ingresar(cod_grupo, cod_bloque, cod_rubro) {
    cod_cuenta = cod_cuenta.toString()
    var formData = 'cod_grupo=' + cod_grupo + '&cod_bloque=' + cod_bloque + '&cod_rubro=' + cod_rubro;

    var ajax = nuevoAjax();
    ajax.open("POST", "modelo/ingresarCuenta.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(formData);

    ajax.onreadystatechange = function() {
      if (ajax.readyState == 4) {
        var respuesta = ajax.responseText;
        alert(respuesta)
        //document.getElementById("informacion").innerHTML=respuesta; 
      }
    }
  }

  function FuncionInsertCuentaNueva() {

    $.ajax({
      type: "post",
      url: "vista/ajaxInsertarCuentaNueva.php",
      data: {
        cod_grupo: $("#option_grupo").val(),
        cod_bloque: $("#option_bloque").val(),
        cod_rubro: $("#option_rubro").val(),
        cod_cuenta: $("#option_cuenta").val()
      },

      success: function(response) {
        location.reload();

      }
    })

  }

  function ModificarCuenta(cod_grupo, cod_bloque, cod_rubro, cod_cuenta) {
    console.log(cod_grupo, cod_bloque, cod_rubro, cod_cuenta)
    alert("parametros recibidos: " + cod_grupo + cod_bloque + cod_rubro + cod_cuenta)
    Swal.fire({
      title: '¿Esta seguro que desea modificar la cuenta?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Si',
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Modificaciones aplicadas', '', 'success')

      } else if (result.isDenied) {
        Swal.fire('Los cambios no seran guardados', '', 'info')

      }
    })
  }
</script>
</body>

</html>
<?php
include("vista/footer.php");
?>