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

  <!-- <script language="javascript" src="js/jquery-3.6.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script language="javascript">
    $(document).ready(function() {
      $("#option_grupo").change(function() {
        $('#option_rubro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $("#option_grupo option:selected").each(function() {
          cod_grupo = $(this).val();
          console.log(typeof(cod_grupo), cod_grupo);
          $.post("modelo/getBloque.php", {
            cod_grupo: cod_grupo
          }, function(data) {
            $("#option_bloque").html(data);
          });
        });
      })
    });

    $(document).ready(function() {
      $("#option_bloque").change(function() {
        $("#option_bloque option:selected").each(function() {
          cod_bloque = $(this).val();
          console.log(typeof(cod_bloque), cod_bloque);
          //console.log(cod_grupo, cod_bloque);
          //console.log(cod_bloque);
          $.post("modelo/getRubro.php", {
            cod_grupo: cod_grupo,
            cod_bloque: cod_bloque
          }, function(data) {
            $("#option_rubro").html(data);
          });
        });
      })
    });

    $(document).ready(function() {
      $("#option_rubro").change(function() {
        $("#option_rubro option:selected").each(function() {
          cod_rubro = $(this).val();
          //alert(cod_rubro)
          console.log(typeof(cod_rubro), cod_rubro);
          //console.log(cod_bloque);
          $.post("modelo/getCuenta.php", {
            cod_grupo: cod_grupo,
            cod_bloque: cod_bloque,
            cod_rubro: cod_rubro
          }, function(data) {
            $("#option_cuenta").html(data);
          });
        });
      })
    });
  </script>
</head>

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
          <!-- <div class="row">
            <div class="col-lg-12">
              <form style="padding: 5%; background-color: white" class="rounded">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Usuario</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Ingresar</button>
              </form>
            </div>
          </div> -->
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
                  <select  type="text" name="option_bloque" id="option_bloque" style="width: 200px; padding:.375rem .75rem">

                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Rubro</label>
                  <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                  <select type="text" name="option_rubro" id="option_rubro" style="width: 200px; padding:.375rem .75rem">

                  </select>
                </div>

                <div class="mb-3">
                  <label  type="text" class="form-label">Cuenta</label>
                  <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                  <table border="1" name="option_cuenta" id="option_cuenta">
                    <tr>
                      <th>Codigo</th>
                      <th>Cuenta</th>
                      <th></th>
                    </tr>

                   
                    
                  </table>
                </div>

                <!-- <div class="mb-3">
                  <label class="form-label">Cuenta</label>
                  <input type="text" name="cuenta" class="form-control" style="width: 200px; padding:.375rem .75rem" id="exampleInputPassword1">
                </div> -->

                <button type="submit" class="btn btn-primary">Ingresar</button>
              </form>
            </div>

            <div class="col-lg-6">
              <div class="row rounded" style="padding: 5%; background-color: white; width:100%;">
                <div class="col-lg-12  d-grid gap-2">
                  <button type="button" style="width:50%; text-align:center" class="btn btn-primary">Modificar Cuenta</button>
                  <button type="button" style="width:50%; text-align:center" class="btn btn-primary">Eliminar Cuenta</button>
                </div>
              </div>

            </div>
          </div>
          <!-- ==== PUBLICACIONES SIMILARES ==== -->

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>