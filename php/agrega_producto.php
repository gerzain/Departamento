<?php
include('conexion.php');
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO departamento (descripcion)VALUES('$nombre')");
	break;

	case 'Edicion':
		mysql_query("UPDATE departamento SET descripcion = '$nombre' WHERE id_departamento = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM departamento ORDER BY id_departamento ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAXde

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Descripción</th>
							  <th width="50">Opciones</th>
              </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['descripcion'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_departamento'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_departamento'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>
