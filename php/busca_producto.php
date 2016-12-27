<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM departamento WHERE descripcion LIKE '%$dato%' ORDER BY id_departamento ASC");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="50">Opciones</th>
                </tr>';
if(mysql_num_rows($registro)>0)
{
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['descripcion'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_departamento'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_departamento'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			  </tr>';
}
echo '</table>';
?>
