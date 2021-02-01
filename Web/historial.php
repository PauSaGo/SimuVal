<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Historial | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="container">
	<h1><b>Historial</b></h1>
			<table class="w3-table w3-striped w3-bordered">
            	<thead>
            		<tr>
              			<th>Examen</th>
              			<th>Area</th>
						<th>Subarea(s)</th>
						<th>Tiempo de puesto</th>
						<th>Tiempo finalizado</th>
						<th>Fecha y hora de inicio</th>
						<th>Fecha y hora finalizado</th>
						<th>Resultado</th>
            		</tr>
            	</thead>
            	<tbody>
					<?php 
					$sql = mysqli_query($conexion, "SELECT h.resultado, h.hora_inicio, h.hora_final, h.tiempo_puesto, h.tiempo_real,e.nombre as examen, a.nombre as area ,s.nombre as subareas FROM historial as h INNER JOIN usuarios as u ON h.id_usuario = u.id 
					INNER JOIN examen as e ON e.id = h.id_examen
					INNER JOIN areas as a ON a.id = h.id_area
					INNER JOIN subareas as s ON s.id = h.subareas
					WHERE h.id_usuario = ".$_SESSION['id']."");

					if(mysqli_num_rows($sql)>0){
						while($row = mysqli_fetch_array($sql)){
					?>
            		<tr>
                		<td><?php echo $row['examen']?></td>
                		<td><?php echo $row['area']?></td>
						<td><?php echo $row['subareas']?></td>
						<td><?php echo $row['tiempo_puesto']?></td>
						<td><?php echo $row['tiempo_real']?></td>
						<td><?php echo $row['hora_inicio']?></td>
						<td><?php echo $row['hora_final']?></td>
						<td><?php echo $row['resultado']?></td>
            		</tr>
						<?php } 
						}else{
							echo '<td><h4>No se encontraron registros</h4></td>';
						}?>
            	</tbody>
            </table>
		</div>
    </div>
</body>
</html>