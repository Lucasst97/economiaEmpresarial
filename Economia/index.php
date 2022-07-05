<?php
include("modelo/conex.php");
include("modelo/modelo.php");
include ("vista/header.php");
include ("vista/menu.php");
$selectcuentastotales= selectTotalGrupos();

?>
<div class="modal fade" id="ModalInsertCuenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

  <div class="d-flex">
    <div class="w-100">
      <div class="py-3">
        <div class="container">
          <div class="row">
            <!-- Formulario de insert para plan de cuenta -->
            <div class="col-lg-6">
              <form style="padding: 5%; background-color: white; width:100%;" method="post" action="modelo.php" class="rounded">

                <div class="mb-3">
                  <label class="form-label">Grupo</label>
                  <!-- <input type="tetx" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                  <select type="text" name="option_grupo" id="option_grupo" style="width: 200px; padding:.375rem .75rem">
                    <option>Seleccione Grupo</option>
                    <?php
                    $queryG = "select g.cod_grupo 'cod_grupo', g.nombre_grupo 'nombre_grupo' from grupo g";
                    $rs = mysqli_query($conex, $queryG);

                    while ($row = mysqli_fetch_assoc($rs)) {
                      //echo $row['nombre_grupo'];
                      echo '<option value="' . $row['cod_grupo'] . '">' . $row['nombre_grupo'] . '</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Bloque</label>
                  <select type="text" name="option_bloque" id="option_bloque" style="width: 200px; padding:.375rem .75rem">

                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Rubro</label>
                  <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                  <select type="text" name="option_rubro" id="option_rubro" style="width: 200px; padding:.375rem .75rem">

                  </select>
                </div>

                <div class="mb-3">
                  <label type="text" class="form-label">Cuenta</label>
                  <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                  <table border="1" name="option_cuenta" id="option_cuenta">
                    
                  </table>
                </div>



                <!-- <button type="submit" class="btn btn-primary">Ingresar</button> -->

                <input type='button' class='' name='boton' id='boton' onclick='javascript:InsertCuenta()' value='Ingresar'>

              </form>
            </div>
            <div class="col-lg-6" style="background-color:#FFF">
              <form action="modelo/boletocuentas.php" method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Cuenta Codigo</td>
                      <td>Nombre Cuenta</td>
                      <td>Saldo</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($reg=mysqli_fetch_array($selectcuentastotales)){ ?>
                    <tr>
                      <td> - </td>
                      <td><?php echo $reg['cod_bloque'] ?></td>
                      <td><?php echo $reg['nombre_cuenta'] ?></td>
                      <td><?php echo $reg['cod_rubro'] ?></td>
                      <td><?php ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <div class="col-12 text-center p-2">
                  <button class="btn btn-warning">Descargar Cuentas</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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

    function nuevoAjax() {
      var xmlhttp = false;
      try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
        try {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
        } catch (E) {
          xmlhttp = false;
        }
      }
      if (!xmlhttp && typeof XMLHttpRequest != "undefined") {
        xmlhttp = new XMLHttpRequest();
      }
      return xmlhttp;
    }
  </script>
</body>

</html>
<?php 
  include ("vista/footer.php");
?>