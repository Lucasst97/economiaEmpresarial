<?php
include("modelo/conex.php");
include("modelo/modelo.php");
include("vista/header.php");
include("vista/menu.php");
$selectcuentastotales = selectTotalGrupos();
?>

<div class="d-flex">
  <div class="w-100">
    <div class="py-3">
      <div class="container">

        <!-- ========================Contenido de Index========================= -->
        <div class="row">
          <!-- ========================Titulo del Sitio========================= -->
          <h1 style="color:#FFF; text-align: center; margin-left: auto; margin-right: auto; padding: 20px ; ">Economia Empresarial</h1>

          <div class="col-6" style="padding:20px; margin: auto; width: 100%; background-color:#FFF">
            <div style="justify-content: center; padding:auto; width:80%; margin-left:auto; margin-right:auto;">
              <img style="width:100%; margin-left:auto; margin-right:auto; margin :20px; border-radius:20px" src="elements/economia.jpg">
            </div>


            <div style="padding:25px; font-size: 18px;">
              <p style="text-indent: 20px">Este Sitio Web esta siendo desarrollado por estudiantes de 3ro de la carrera Tecnicatura Superio en Analisis, 
                Desarrollo y Pogramacion de aplicaciones para la instancia evaluativa de la materia Economia 
                empresarial.</p>
              <p style="text-indent: 20px">Actualmente, se incorporo al sistema la seccion "Plan de Cuentas" donde la empresa puede visualizar 
              todas las cuentas cargadas en dicho plan e imprimirlas  en formato PDF en "Descargar cuentas". Estas 
              cuentas pueden ser eliminadas mediante un boton solo si la cuenta posee saldo 0. Ademas, puede 
              modificarse el nombre de las mismas e ingresar nuevas al plan seleccionando previamente el Grupo, Bloque
              y Rubro al cual pertenecera dicha cuenta.
              </p>
              <p style="text-indent: 20px">
              Esperamos que cumpla las expectativas de la catedra y que pueda ser util en un futuro proximo.
              </p>
            </div>
            
          </div>

        </div>
        <!-- =================================================================== -->

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
<?php
include("vista/footer.php");
?>