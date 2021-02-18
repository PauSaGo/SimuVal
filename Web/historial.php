<style>
table{
	border: 1px solid #FF9100;
}

.isDisabled{
	cursor: not-allowed;
	opacity: 0.5;
  	pointer-events: none;
  	text-decoration: none;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Historial | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');

		$no_page = 3;
        $start = ($_GET['pagina'] - 1) * $no_page;

		$count = mysqli_query($conexion,"SELECT COUNT(*) FROM historial WHERE id_usuario = ".$_SESSION['id']."");
		$result = mysqli_fetch_array($count)[0];
		$total = ceil($result / $no_page);

		if(!$_GET){
			header('Location:historial.php?pagina=1');
		}

		if($total == 0){
			$pag= "w3-hide";
		}else{
			$pag="";
		}
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="container">
	<h1><b>Historial</b></h1>
			<table class="w3-table w3-bordered">
            	<thead>
            		<tr>
              			<th>Examen</th>
              			<th>Area</th>
						<th>Subarea(s)</th>
						<th>Fecha y hora de inicio</th>
						<th>Fecha y hora finalizado</th>
						<th>Cantidad de preguntas</th>
						<th>Resultado</th>
            		</tr>
            	</thead>
            	<tbody>
					<?php 
					$sql = mysqli_query($conexion, "SELECT h.resultado, h.hora_inicio, h.hora_final, e.nombre as examen, a.nombre as area ,s.nombre as subareas, h.no_preguntas FROM historial as h INNER JOIN usuarios as u ON h.id_usuario = u.id 
					INNER JOIN examen as e ON e.id = h.id_examen
					INNER JOIN areas as a ON a.id = h.id_area
					INNER JOIN subareas as s ON s.id = h.subareas
					WHERE h.id_usuario = ".$_SESSION['id']." GROUP BY h.id DESC LIMIT ".$start.", ".$no_page."");

					if(mysqli_num_rows($sql)>0){
						while($row = mysqli_fetch_array($sql)){
					?>
            		<tr>
                		<td><?php echo $row['examen']?></td>
                		<td><?php echo $row['area']?></td>
						<td><?php echo $row['subareas']?></td>
						<td><?php echo $row['hora_inicio']?></td>
						<td><?php echo $row['hora_final']?></td>
						<td><?php echo $row['no_preguntas']?></td>
						<td><?php echo $row['resultado']?></td>
            		</tr>
						<?php } 
						}else{
							echo '<td><h4>No se encontraron registros</h4></td>';
						}?>
            	</tbody>
            </table>

			<div class="w3-center">
				<div class="w3-bar <?php echo $pag;?>">
  					<a class="w3-button <?php echo $_GET['pagina']<=1 ? 'isDisabled' : ''?>" href="historial.php?pagina=<?php echo $_GET['pagina']-1?>">&laquo;</a>
						<?php for($i=0;$i<$total;$i++){?>
  							<a href="historial.php?pagina=<?php echo $i+1?>" class="w3-button <?php echo $_GET['pagina']==$i+1 ? 'w3-green' : ''?>"><?php echo $i+1?></a>
						<?php }?>	  
  					<a href="historial.php?pagina=<?php echo $_GET['pagina']+1?>" class="w3-button <?php echo $_GET['pagina']>=$total ? 'isDisabled' : ''?>">&raquo;</a>
				</div>
			</div>

		</div>
    </div>
</body>
</html>