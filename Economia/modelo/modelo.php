<?php 
require 'conex.php';

//Función para obtener los datos de la base de datos
function conectar() {
    $conex = mysqli_connect("localhost", "root", "", "economia_empresarial_v4");
    if (!$conex) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $conex;
}

//Funcion para insertar datos en la base de datos
function desconectar($conex) {
    mysqli_close($conex);
}

function selectTotalGrupos() {
    $conex = conectar();
    $sql = "SELECT * FROM cuenta LIMIT 10";
    $result = mysqli_query($conex, $sql);
    return $result;
}

?>