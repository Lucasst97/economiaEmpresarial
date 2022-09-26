<!-- En este archivo vamos a encontrar las funciones referentes a el Libro Diario:
- Agregar Asiento-Agregar Cliente
-Agregar Proveedor -->

<?php 
include 'conex.php';

class Libro_diario{

    function Agregar_cliente($cuit, $razon_social){
        $conex = conectar();
        $sql = "INSERT INTO cliente (cuit, razon_social) VALUES ($cuit, $razon_social)";
        $result = mysqli_query($conex, $sql);
        return $result;      
    }
    function Agregar_proveedor($cuit, $nombre_proveedor){
        $conex = conectar();
        $sql = "INSERT INTO proveedor (cuit, nombre_proveedor) VALUES ($cuit, $nombre_proveedor)";
        $result = mysqli_query($conex, $sql);
        return $result;      
    }
}


?>