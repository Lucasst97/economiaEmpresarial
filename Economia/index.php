<?php
include("modelo/conex.php");
include("modelo/modelo.php")
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Hoja Estilo -->
  <link rel="stylesheet" type="text/css" media="screen" href="style.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-image: url('elements/background.jpg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: auto;
    }

    .menu-contable:hover {
      color: black;
      text-decoration: underline;
    }

    .card {
      border: none;
      width: 300px;
      height: 450px;
    }
  </style>
  <title>Economia Empresarial</title>

  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script language="javascript" src="js/script.js"></script>
  
  <script>
  /* function InsertCuenta(cod_grupo){
      console.log(cod_grupo)
      $('#ModalInsertCuenta').modal('show');
      $.ajax({
        type: "post",
        url: "modelo/ModalinsertCuenta.php",
        data:{
          grupo:$("#option_grupo").find('option:selected').text(),
          bloque:$("#option_bloque").find('option:selected').text(),
          rubro:$("#option_rubro").find('option:selected').text(),
        },
        success: function (response) {
          $('#modal-body').html(response);
        }
      });
    } */
    </script>
  
</head>

<div class="modal fade" id="ModalInsertCuenta" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal-Insert">Insertar Nueva Cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ModalModificarCuenta" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal-Modificar">Modificar Cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-bodyI">

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<body>
  <nav class="navbar navbar-expand-lg " style="background-color: #284078;">
    <div class="container-fluid align-self-center">
      <a class="navbar-brand d-block text-light " href="#">
        <img src="elements/economy.png" alt="" width="30" height="30" class="d-inline-block align-text-top me-2">
        Estudio Contable
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse position-absolute end-0" id=" navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 pull-xs-left">
          <li class="nav-item">
            <a class="nav-link active text-light menu-contable" style="padding-right: 30px" aria-current="page" href="#">Inicio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-light menu-contable" style="padding-right: 30px" href="#">Plan de Cuentas
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light menu-contable" style="padding-right: 30px" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Balance
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item menu-contable" href="#">Nuevo Balance</a></li>
              <li><a class="dropdown-item menu-contable" href="#">Hitorial</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link text-light menu-contable" style="padding-right: 30px">Libro Diario</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="d-flex">
    <div class="w-100">
      <div class="py-3">
        <div class="container">
          <div class="row">
            <!-- Formulario de insert para plan de cuenta -->
            <!-- <div class="col-lg-6"> -->
            <div class="col-12">
              <!-- <form style="padding: 5%; background-color: white; width:100%;" method="post" action="modelo.php" class="rounded">

                <div class="mb-3">
                  <label class="form-label">Grupo</label>
                  <input type="tetx" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
              <!-- <select type="text" name="option_grupo" id="option_grupo" style="width: 200px; padding:.375rem .75rem">
                    <option>Seleccione Grupo</option> -->
              <?php
              /* $queryG = "select g.cod_grupo 'cod_grupo', g.nombre_grupo 'nombre_grupo' from grupo g";
                    $rs = mysqli_query($conex, $queryG);

                    while ($row = mysqli_fetch_assoc($rs)) {
                      //echo $row['nombre_grupo'];
                      echo '<option value="' . $row['cod_grupo'] . '">' . $row['nombre_grupo'] . '</option>';
                    } */
              ?>
              <!-- </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Bloque</label>
                  <select type="text" name="option_bloque" id="option_bloque" style="width: 200px; padding:.375rem .75rem">

                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Rubro</label>
                   <input type="text" class="form-control" id="exampleInputPassword1"> -->
              <!--  <select type="text" name="option_rubro" id="option_rubro" style="width: 200px; padding:.375rem .75rem">

                  </select>
                </div>

                <div class="mb-3">
                  <label type="text" class="form-label">Cuenta</label>
                   -->
              <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
              <!-- <table border="1" name="option_cuenta" id="option_cuenta">
                    



                  </table>
                </div>
 -->


              <!-- <button type="submit" class="btn btn-primary">Ingresar</button> -->

              <!-- <input type='button' class='' name='boton' id='boton' onclick="InsertCuenta(cod_grupo)" value='Ingresar'>
 -->
              <!-- </form> -->
              <form style="padding: 5%; background-color: white; width:100%;" method="post" action="modelo.php" class="rounded">
                <div class="row">
                  <div class="col-sm">
                    <label class="form-label">Grupo</label>
                    <!-- <input type="tetx" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <select type="text" name="option_grupo" id="option_grupo" style="position:  relative;left: 10px;width: 200px; padding:.375rem .75rem">
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

                  <div class="col-sm">
                    <label class="form-label">Bloque</label>
                    <select type="text" name="option_bloque" id="option_bloque" style="position:  relative;left: 3px;width: 200px; padding:.375rem .75rem">

                    </select>
                  </div>

                  <div class="col-sm">
                    <label class="form-label">Rubro</label>
                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                    <select type="text" name="option_rubro" id="option_rubro" style="position:  relative;left: 11px;width: 200px; padding:.375rem .75rem">

                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="titulo-table" type="text" class="form-label">Cuenta</label>
                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                    <table class="table table-bordered" border="1" name="option_cuenta" id="option_cuenta">
                      <!-- <tr>
                        <th>Codigo</th>
                        <th>Cuenta</th>
                        <th></th>
                      </tr> -->



                    </table>
                  </div>



                  <!-- <button type="submit" class="btn btn-primary">Ingresar</button> -->

                  <input type='button' class='btn btn-primary w-50 table' name='boton' id='boton' onclick='javascript:FuncionInsertCuentaNueva(<?php echo ["$cod_grupo", "$cod_bloque", "$cod_rubro"] ?>)' value='Ingresar'>

              </form>
            </div>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






  </script>
</body>

</html>