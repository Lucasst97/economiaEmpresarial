<?php
include ('conex.php');
$cuit_proveedor= $_POST['cuit_proveedor'];
$razon_social_proveedor=$_POST['razon_social_proveedor'];
$sit_tributaria=$_POST['sit_tributaria'];
$insertarProveedor = "INSERT INTO proveedores (cuit, razonSocial, sitTributaria	) VALUES ('$cuit_proveedor', '$razon_social_proveedor', '$sit_tributaria')";
$rsR = mysqli_query($conex, $insertarProveedor);
?>
<script>
    alert('Proveedor ingresado correctamente.');
    window.location.href = '../libro_diario.php';
</script>