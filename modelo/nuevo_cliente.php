<?php
include ('conex.php');
$cuit_cliente= $_POST['cuit_cliente'];
$razon_social_cliente=$_POST['razon_social_cliente'];
$sit_tributaria=$_POST['sit_tributaria'];
$insertarCliente = "INSERT INTO cliente (cuit, razonSocial, id_sitTributaria) VALUES ('$cuit_cliente', '$razon_social_cliente', '$sit_tributaria')";
$rsR = mysqli_query($conex, $insertarCliente);
?>
<script>
    alert('Cliente ingresado correctamente.');
    window.location.href = '../libro_diario.php';
</script>