<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM departamento WHERE id_departamento = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos =  $valores2['descripcion'];

echo json_encode($datos);
?>
