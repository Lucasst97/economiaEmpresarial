<?php
include("modelo/conex.php");
include("modelo/modelo.php");
$selectcuentastotales= selectTotalGrupos();
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

    function InsertCuenta() {
      $('#ModalInsertCuenta').modal('show');
      $.ajax({
        type: "post",
        url: "modelo/ModalinsertCuenta.php",
        data: {
          grupo: $("#option_grupo").find('option:selected').text(),
          bloque: $("#option_bloque").find('option:selected').text(),
          rubro: $("#option_rubro").find('option:selected').text(),
        },
        success: function(response) {
          $('#modal-body').html(response);
        }
      });
    }
  </script>
</head>

<!-- MODAL FORMULARIO DE CUENTA -->
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
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <div class="col-12 justify-content-center">
                <button class="btn btn-secondary">Descargar Cuentas</button>
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