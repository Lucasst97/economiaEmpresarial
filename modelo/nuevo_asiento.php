<?php
include("../modelo/conex.php");
include("../modelo/modelo.php");
$array_string = $_POST['array_string'];

// list($cuenta,$saldo,$tipo)= explode(",",$_POST["array"]);


// $cuenta = $_POST['cuenta'];
// $tipo = $_POST['tipo'];
// $saldo = $_POST['saldo'];
// echo $cuenta.'<br>';
// echo $tipo.'<br>';
// echo $saldo.'<br>';
// print_r($array);
// CALL AsientoJsonArray($array);
// $array ='[
//     {
//        "id_cuenta":"112233",
//        "saldo_ac":125.65,
//        "tipo_saldo":0
       
//     },
//     {
//        "id_cuenta":"114456",
//        "saldo_ac":200.00,
//        "tipo_saldo":1
       
//     }
//  ]'; 
//<script>
//parseado = JSON.parse($array);
//</script> -->


try {
    $sql = "CALL AsientoJsonArray('".$array_string."')";
    $stmt = $conex->prepare($sql);
    $stmt->execute();
    print_r($array_string);
    print_r("try catch correcto");
} catch (mysqli_sql_exception $e) {
    print_r($e);
}


// $sql = "INSERT INTO cliente VALUES('1','1','1','1')";
// $sql = "INSERT INTO asiento_cuenta(id_cuenta,tipo_saldo, saldo_ac)
// VALUES('$cuenta', '$tipo','$saldo')";
// $resultado = mysqli_query($conex,$stmt);

// print_r($resultado);
