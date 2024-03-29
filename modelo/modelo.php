<?php 
require 'conex.php';

//Función para obtener los datos de la base de datos
function conectar() {
    // $conex = mysqli_connect("mysql.webcindario.com", "economia20", "Economia20", "economia20");
    $conex = mysqli_connect("localhost", "root", "", "economia20");
    if (!$conex) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $conex;
}

function selectTotalGrupos() {
    $conex = conectar();

    $sql = "SELECT cod_grupo, cod_bloque, cod_rubro, cod_cuenta, nombre_cuenta, saldo_cuenta FROM cuenta order by cod_grupo, cod_bloque, cod_rubro, cod_cuenta LIMIT 10";

    $result = mysqli_query($conex, $sql);
    return $result;
}

function selectTotalGruposPdf() {
    $conex = conectar();
    $sql = "SELECT cod_grupo, cod_bloque, cod_rubro, cod_cuenta, nombre_cuenta, saldo FROM cuenta order by cod_grupo, cod_bloque, cod_rubro, cod_cuenta";
    $result = mysqli_query($conex, $sql);
    return $result;
}

function SeleccionTotalDeCuentas(){
    $conex = conectar();

    $sql = "SELECT id_cuenta, cod_grupo, cod_bloque, cod_rubro, cod_cuenta, nombre_cuenta FROM cuenta order by cod_grupo, cod_bloque, cod_rubro, cod_cuenta";

    $result = mysqli_query($conex, $sql);
    return $result;
}

function responsable_iva(){
    $conex=conectar();
    $sql="SELECT * FROM sittributaria";
    $result = mysqli_query($conex, $sql);
    return $result;
}

?>