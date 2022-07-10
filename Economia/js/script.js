$(document).ready(function () {
  $("#option_grupo").change(function () {
    $('#option_rubro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
    $("#option_grupo option:selected").each(function () {
      cod_grupo = $(this).val();
      console.log(typeof (cod_grupo), cod_grupo);
      $.post("modelo/getBloque.php", {
        cod_grupo: cod_grupo
      }, function (data) {
        $("#option_bloque").html(data);
      });
    });
  })
});

$(document).ready(function () {
  $("#option_bloque").change(function () {
    $("#option_bloque option:selected").each(function () {
      cod_bloque = $(this).val();
      console.log(typeof (cod_bloque), cod_bloque);
      //console.log(cod_grupo, cod_bloque);
      //console.log(cod_bloque);
      $.post("modelo/getRubro.php", {
        cod_grupo: cod_grupo,
        cod_bloque: cod_bloque
      }, function (data) {
        $("#option_rubro").html(data);
      });
    });
  })
});

$(document).ready(function () {
  $("#option_rubro").change(function () {
    $("#option_rubro option:selected").each(function () {
      cod_rubro = $(this).val();
      //alert(cod_rubro)
      console.log(typeof (cod_rubro), cod_rubro);
      //console.log(cod_bloque);
      $.post("modelo/getCuenta.php", {
        cod_grupo: cod_grupo,
        cod_bloque: cod_bloque,
        cod_rubro: cod_rubro
      }, function (data) {
        $("#option_cuenta").html(data);
      });
    });
  })
});







function EliminarCuenta(cod_grupo, cod_bloque, cod_rubro, cod_cuenta) {
  console.log(cod_grupo, cod_bloque, cod_rubro, cod_cuenta)
  Swal.fire({
    title: '¿Esta seguro que desea eliminar la cuenta?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Si',
    denyButtonText: `No`,
  }).then((result) => {
    if (result.isConfirmed) {
      /* var formData = 'cod_grupo=' + cod_grupo + '&cod_bloque=' + cod_bloque + '&cod_rubro=' + cod_rubro + '&cod_cuenta=' + cod_cuenta;
      var ajax = nuevoAjax();
      ajax.open("POST", "modelo/eliminarCuenta.php", true);
      ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      ajax.send(formData);
      
      ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {
          var respuesta = ajax.responseText;
          //alert(respuesta)
        }else{
        }
      } */

      $.ajax({
        type: "post",
        url: "modelo/eliminarCuenta.php",
        data: {
          cod_grupo,
          cod_bloque,
          cod_rubro,
          cod_cuenta
        },

        success: function (response) {
          location.reload();

        }
      })



      Swal.fire('Confirmado', '', 'success')
    } else if (result.isDenied) {
      Swal.fire('Los cambios no seran guardados', '', 'info')
    }
  })
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