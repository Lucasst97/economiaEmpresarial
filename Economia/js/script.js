
$(document).ready(function () {
  /* ===Se detecta cuando se cambia una opcion del select de Grupo=== */
  $("#option_grupo").change(function () {
    /* ===Se resetean las opciones seleccionadas de proximos select cuando la anterior cambia=== */
    $('#option_rubro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
    $('#option_bloque').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
    /* ===Se toma la opcion seleccionada del select de Grupo=== */
    $("#option_grupo option:selected").each(function () {
      cod_grupo = $(this).val();
      /* ===Se envia la opcion seleccionada al siguiente doc PHP=== */
      $.post("modelo/getBloque.php", {
        cod_grupo: cod_grupo
      }, function (data) {
        /* ===Se recibe los datos extraidos del doc PHP=== */
        $("#option_bloque").html(data);
      });
    });
  })
});


$(document).ready(function () {
  /* ===Se detecta cuando se cambia una opcion del select de Bloque=== */
  $("#option_bloque").change(function () {
    /* ===Se toma la opcion seleccionada del select de Bloque=== */
    $("#option_bloque option:selected").each(function () {
      cod_bloque = $(this).val();
      /* ===Se envia la opcion seleccionada al siguiente doc PHP=== */
      $.post("modelo/getRubro.php", {
        cod_grupo: cod_grupo,
        cod_bloque: cod_bloque
      }, function (data) {
        /* ===Se recibe los datos extraidos del doc PHP=== */
        $("#option_rubro").html(data);
      });
    });
  })
});


$(document).ready(function () {
  /* ===Se detecta cuando se cambia una opcion del select de Rubro=== */
  $("#option_rubro").change(function () {
    /* ===Se toma la opcion seleccionada del select de Rubro=== */
    $("#option_rubro option:selected").each(function () {
      cod_rubro = $(this).val();
      /* ===Se envia la opcion seleccionada al siguiente doc PHP=== */
      $.post("modelo/getCuenta.php", {
        cod_grupo: cod_grupo,
        cod_bloque: cod_bloque,
        cod_rubro: cod_rubro
      }, function (data) {
        /* ===Se recibe los datos extraidos del doc PHP=== */
        $("#option_cuenta").html(data);
      });
    });
  })
});


/* ===Funcion para Insertar nueva cuenta=== */
function InsertCuenta(cod_grupo, cod_bloque, cod_rubro) {
  /* ===Se muestra un Input text para Ingresar una Cuenta y enviarla al Form ModalInsertCuenta=== */
  $('#ModalInsertCuenta').modal('show');
  $.ajax({
      type: "post",
      url: "modelo/ModalinsertCuenta.php",
      data: {
          cod_bloque,
          cod_rubro,
          cod_grupo
      },
      success: function(response) {
          $('#modal-body').html(response);
      }
  });
}

/* ===Funcion para Modificar nueva cuenta=== */
function Modificar(cod_grupo, cod_bloque, cod_rubro, cod_cuenta) {
  /* ===Se muestra un Input text para Modificar una Cuenta y enviarla al Form ModalModificarCuenta=== */
  $('#ModalModificarCuenta').modal('show');
  $.ajax({
      type: "post",
      url: "modelo/ModalModificarCuenta.php",
      data: {
          cod_bloque,
          cod_rubro,
          cod_grupo,
          cod_cuenta
      },
      success: function(response) {
          $('#modal-bodyI').html(response);
      }
  });
}

/* ===Funcion para Eliminar una cuenta=== */
function EliminarCuenta(cod_grupo, cod_bloque, cod_rubro, cod_cuenta, saldo) {
  /* ===Se verifica si el saldo es cero para poder eliminarla, de lo contrario, no se elimina=== */
  if (saldo== 0) {
    /* ===Muestra un Alert para confirmar eliminacion=== */
    Swal.fire({
      title: '¿Esta seguro que desea eliminar la cuenta?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Si',
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
        /* ===Envia los datos de la cuenta al siguiente doc PHP para su eliminacion=== */
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
          }
        })
        /* ===Muestra un Alert que confirma la eliminacion=== */
        Swal.fire('Confirmado', '', 'success')
        Swal.fire({
          title: 'Cuenta Eliminada con Exito',
          confirmButtonText: 'Aceptar',
        }).then((result) => {
          if (result.isConfirmed){
            /* ===Se recarga la pagina actual=== */
            location.reload();
          }
        })
      } else if (result.isDenied) {
        /* ===Muestra un Alert que notifica que los cambios no seran guardados=== */
        Swal.fire('Los cambios no seran guardados', '', 'info')
      }
    })
  } else {
    /* ===Muestra un Alert que avisa que no se puede eliminar la cuenta por tener saldo=== */
    Swal.fire('Esta cuenta no puede ser eliminada. Verificar saldo', '', 'error')
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